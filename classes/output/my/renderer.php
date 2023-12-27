<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


namespace enrol_programs\output\my;

use enrol_programs\local\allocation;
use enrol_programs\local\program;
use enrol_programs\local\content\item,
    enrol_programs\local\content\top,
    enrol_programs\local\content\set,
    enrol_programs\local\content\course;
use stdClass, moodle_url, tabobject;

require_once($CFG->dirroot . '/lib/completionlib.php');


/**
 * Program catalogue renderer.
 *
 * @package    enrol_programs
 * @copyright  Copyright (c) 2023 Criativa EAD (https://www.criativaead.com.br/) and 2022 Open LMS (https://www.openlms.net/)
 * @author     Leonardo Barreiro
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class renderer extends \plugin_renderer_base {
    public function render_program(\stdClass $program): string {
        global $CFG;

        $context = \context::instance_by_id($program->contextid);
        $fullname = format_string($program->fullname);
        $programicon = $this->output->pix_icon('program', '', 'enrol_programs');

        $description = file_rewrite_pluginfile_urls($program->description, 'pluginfile.php', $context->id, 'enrol_programs', 'description', $program->id);
        $description = format_text($description, $program->descriptionformat, ['context' => $context]);

        $tagsdiv = '';
        if ($CFG->usetags) {
            $tags = \core_tag_tag::get_item_tags('enrol_programs', 'program', $program->id);
            if ($tags) {
                $tagsdiv = $this->output->tag_list($tags, '', 'program-tags');
            }
        }

        $programimage = '';
        $presentation = (array)json_decode($program->presentationjson);
        if (!empty($presentation['image'])) {
            $imageurl = \moodle_url::make_file_url("$CFG->wwwroot/pluginfile.php",
                '/' . $context->id . '/enrol_programs/image/' . $program->id . '/'. $presentation['image'], false);
            $programimage = '<div class="float-right programimage">' . \html_writer::img($imageurl, '') . '</div>';
        }

        $result = '';
        $result .= <<<EOT
<div class="programbox clearfix" data-programid="$program->id">
  $programimage
  <div class="info">
  <div class="info">
    <h2 class="programname">{$programicon}{$fullname}</h2>
  </div>$tagsdiv
  <div class="content">
    <div class="summary">$description</div>
  </div>
</div>
EOT;

        return $result;
    }

    private function calculate_course_progress($courseid, $userid) {
        global $DB;
    
        // Obter todos os módulos do curso que contam para a conclusão
        $modules = $DB->get_records_sql("
            SELECT cm.id, cm.completion, cm.instance, m.name as modname
            FROM {course_modules} cm
            JOIN {modules} m ON m.id = cm.module
            WHERE cm.course = ? AND (cm.completion > 0 OR cm.completiongradeitemnumber IS NOT NULL)", [$courseid]);
    
        if (!$modules) {
            // Se não houver módulos para concluir, consideramos que o progresso é 0
            return 0;
        }
    
        $total_modules = 0;
        $completed_modules = 0;
    
        // Verificar quais módulos foram concluídos pelo usuário
        foreach ($modules as $module) {
            // Verificar se o módulo é opcional
            if ($module->completion == COMPLETION_TRACKING_NONE) {
                continue; // Pula módulos que não são obrigatórios para a conclusão
            }
    
            $total_modules++;
    
            // Verificar a conclusão com base na atividade
            $completion = $DB->get_record('course_modules_completion', [
                'coursemoduleid' => $module->id,
                'userid' => $userid
            ]);
    
            // Se a atividade foi concluída, contar como concluída
            if ($completion && $completion->completionstate != 0) {
                $completed_modules++;
            }{
                // Verificar a conclusão com base na nota
                $grade_item = $DB->get_record('grade_items', [
                    'itemtype' => 'mod',
                    'itemmodule' => $module->modname,
                    'iteminstance' => $module->instance,
                    'courseid' => $courseid
                ]);
    
                if ($grade_item) {
                    $grade = $DB->get_record('grade_grades', [
                        'itemid' => $grade_item->id,
                        'userid' => $userid
                    ]);
    
                    if ($grade && $grade->finalgrade >= $grade_item->gradepass) {
                        $completed_modules++;
                    }
                }
            }
        }
    
        // Calcular a porcentagem de progresso
        $progress = $total_modules > 0 ? ($completed_modules / $total_modules) * 100 : 0;
    
        return $progress;
    }
    
    public function render_user_allocation(stdClass $program, stdClass $allocation): string {
        $strnotset = get_string('notset', 'enrol_programs');

        $result = '';

        $result .= '<dl class="row">';
        $result .= '<dt class="col-3">' . get_string('programstatus', 'enrol_programs') . ':</dt><dd class="col-9">'
            . allocation::get_completion_status_html($program, $allocation) . '</dd>';
        $result .= '<dt class="col-3">' . get_string('programstart', 'enrol_programs') . ':</dt><dd class="col-9">'
            . userdate($allocation->timestart) . '</dd>';
        $result .= '<dt class="col-3">' . get_string('programend', 'enrol_programs') . ':</dt><dd class="col-9">'
            . (isset($allocation->timeend) ? userdate($allocation->timeend) : $strnotset) . '</dd>';
        $result .= '<dt class="col-3">' . get_string('completiondate', 'enrol_programs') . ':</dt><dd class="col-9">'
            . (isset($allocation->timecompleted) ? userdate($allocation->timecompleted) : $strnotset) . '</dd>';
        $result .= '</dl>';

        return $result;
    }

    private function get_course_activity_completion($courseid, $userid) {
        global $DB;
    
        // Consulta para contar o total de atividades e quantas foram completadas
        $sql = "SELECT COUNT(cm.id) AS total, 
        SUM(CASE 
            WHEN cmc.completionstate = 1 THEN 1
            WHEN cm.completion = 2 AND EXISTS (
                SELECT 1 FROM {grade_items} gi
                JOIN {grade_grades} gg ON gi.id = gg.itemid
                WHERE gi.itemmodule = cm.module AND gi.iteminstance = cm.instance
                AND gg.userid = cmc.userid AND gg.finalgrade IS NOT NULL
            ) THEN 1
            -- Adicione aqui outras condições específicas, se necessário
            ELSE 0 
            END) AS completed
     FROM {course_modules} cm
     LEFT JOIN {course_modules_completion} cmc ON cmc.coursemoduleid = cm.id AND cmc.userid = :userid
     JOIN {modules} m ON cm.module = m.id
     WHERE cm.course = :courseid AND cm.deletioninprogress = 0
     AND m.name <> 'forum'";

    
        $params = ['courseid' => $courseid, 'userid' => $userid];
        $result = $DB->get_record_sql($sql, $params);
    
        if ($result) {
            return "{$result->completed}/{$result->total}";
        } else {
            return "0/0"; // Ou alguma outra representação para cursos sem atividades
        }
    }
    
    public function calculate_average_progress($programid, $userid) {
        global $DB;
    
        $top = program::load_content($programid);
        $courseProgressData = [];
    
        // Função para calcular o progresso
        $calculateProgress = function($item) use (&$calculateProgress, &$courseProgressData, $userid, &$DB) {
            if ($item instanceof course) {
                $courseid = $item->get_courseid();
                $progress = $this->calculate_course_progress($courseid, $userid);
                $courseProgressData[] = $progress;
            }
    
            // Calcula o progresso para os filhos do item atual
            foreach ($item->get_children() as $child) {
                $calculateProgress($child);
            }
        };
    
        // Chama a função para calcular o progresso
        $calculateProgress($top);
    
        // Calcula a média do progresso geral
        $averageProgress = !empty($courseProgressData) ? array_sum($courseProgressData) / count($courseProgressData) : 0;
    
        return $averageProgress;
    }
    
    
    
    
    
    
    public function render_user_progress(stdClass $program, stdClass $allocation): string {
        global $DB, $USER;
        
        $top = program::load_content($program->id);
        $rows = [];
        $courseProgressData = [];
        $activitiesCompletion = []; // Array para armazenar as atividades faltantes/completas
    
    // Função para renderizar colunas e calcular progresso
    $renderercolumns = function(item $item, $itemdepth) use (&$renderercolumns, &$rows, &$courseProgressData, &$activitiesCompletion, $allocation, &$DB, $USER) {
        $fullname = $item->get_fullname();
            $id = $item->get_id();
            $padding = str_repeat('&nbsp;', $itemdepth * 6);
    
            $completiontype = '';
            if ($item instanceof set) {
                $completiontype = $item->get_sequencetype_info();
            }
    
            if ($item instanceof course) {
                $courseid = $item->get_courseid();
                $progress = $this->calculate_course_progress($courseid, $USER->id);
                $courseProgressData[] = $progress; // Armazena o progresso para cálculo da média
    
                
                // Determina a classe da barra de progresso com base no progresso do curso
                $class = $this->get_progress_bar_class($progress);
                $progressHtml = $this->generate_progress_bar_html($class, $progress);
    
                // Verifica se o usuário tem permissão para ver o curso e cria um link clicável
                $coursecontext = \context_course::instance($courseid, IGNORE_MISSING);
                if ($coursecontext) {
                    $canaccesscourse = false;
                    if (has_capability('moodle/course:view', $coursecontext)) {
                        $canaccesscourse = true;
                    } else {
                        $course = get_course($courseid);
                        if ($course && can_access_course($course, null, '', true)) {
                            $canaccesscourse = true;
                        }
                    }
                    if ($canaccesscourse) {
                        $detailurl = new \moodle_url('/course/view.php', ['id' => $courseid]);
                        $fullname = \html_writer::link($detailurl, $fullname);
                    }}
    
                    if ($item instanceof top) {
                        $itemname = $this->output->pix_icon('itemtop', get_string('program', 'enrol_programs'), 'enrol_programs') . '&nbsp;' . $fullname;
                    } else if ($item instanceof course) {
                        $itemname = $padding . $this->output->pix_icon('itemcourse', get_string('course'), 'enrol_programs') . $fullname;
                    } else {
                        $itemname = $padding . $this->output->pix_icon('itemset', get_string('set', 'enrol_programs'), 'enrol_programs') . $fullname;
                    }

                
                // Obtém as atividades concluídas/não concluídas para o curso
            $activitiesInfo = $this->get_course_activity_completion($courseid, $USER->id);
            $activitiesCompletion[$courseid] = $activitiesInfo; // Armazena as informações no array

            $activitiesInfoBold = "<strong>{$activitiesInfo}</strong>";

                

                // Adiciona a barra de progresso à linha da tabela
               /* $row = [$padding . $fullname, $completiontype, $progressHtml];*/
               $row = [$itemname, $activitiesInfoBold, $progressHtml];
               $rows[] = $row;
            }
    
            // Renderiza colunas para os filhos do item atual
            foreach ($item->get_children() as $child) {
                $renderercolumns($child, $itemdepth + 1);

            }
        };
        
    
          // Chama a função para renderizar as colunas
    $renderercolumns($top, 0);

     // Calcula a média do progresso geral usando a nova função
     $averageProgress = $this->calculate_average_progress($program->id, $USER->id);
     $averageClass = $this->get_progress_bar_class($averageProgress, 'general');
     $averageProgressHtml = $this->generate_progress_bar_html($averageClass, $averageProgress);


    // Adiciona a barra de progresso média no início da tabela
    array_unshift($rows, ['Curso', '', $averageProgressHtml]);
 

    
        // Tabela com os detalhes dos itens e barras de progresso
        $table = new \html_table();
        $table->head = [get_string('item', 'enrol_programs'), get_string('atividades', 'enrol_programs'), get_string('progress', 'enrol_programs')];
        $table->id = 'program_content';
        $table->attributes['class'] = 'admintable generaltable';
        $table->data = $rows;
    
        // Resultado final com a tabela
        $result = $this->output->heading(get_string('tabcontent', 'enrol_programs'), 3);
        $result .= \html_writer::table($table);
    
        return $result;
    }
    
    
    
    private function get_progress_bar_class($progress, $type = 'course') {
        if ($type === 'general') {
            return 'progress-bar-general'; // Classe para a barra de progresso geral
        } else {
            return 'progress-bar-course'; // Classe para as barras de progresso dos cursos
        }
    }
    
    
    
    
    // Função auxiliar para gerar o HTML da barra de progresso
    private function generate_progress_bar_html($class, $progress) {
        $formattedProgress = number_format($progress, 0); // Formata para 0 casas decimais
        return <<<HTML
    <div class="progress">
      <div class="{$class}" role="progressbar" style="width: {$formattedProgress}%" aria-valuenow="{$formattedProgress}" aria-valuemin="0" aria-valuemax="100"></div>
      <strong class="progress-text">{$formattedProgress}%</strong>
    </div>
    HTML;
    }
    
    

                
    /**
     * Returns body of My programs block.
     *
     * @return string
     */
    public function render_block_content(): string {
        global $DB, $USER;

        $sql = "SELECT pa.*
                  FROM {enrol_programs_allocations} pa
                  JOIN {enrol_programs_programs} p ON p.id = pa.programid
                 WHERE pa.userid = :userid AND p.archived = 0 AND pa.archived = 0
              ORDER BY p.fullname ASC";
        $params = ['userid' => $USER->id];
        $allocations = $DB->get_records_sql($sql, $params);

        if (!$allocations) {
            return '<em>' . get_string('errornomyprograms', 'enrol_programs') . '</em>';
        }

        $programicon = $this->output->pix_icon('program', '', 'enrol_programs');
        $strnotset = get_string('notset', 'enrol_programs');
        $dateformat = get_string('strftimedatetimeshort');

        foreach ($allocations as $allocation) {
            $row = [];

            $program = $DB->get_record('enrol_programs_programs', ['id' => $allocation->programid]);
            $fullname = $programicon . format_string($program->fullname);
            $detailurl = new moodle_url('/enrol/programs/catalogue/program.php', ['id' => $program->id]);
            $fullname = \html_writer::link($detailurl, $fullname);
            $row[] = $fullname;

            $row[] = \enrol_programs\local\allocation::get_completion_status_html($program, $allocation);

            $row[] = userdate($allocation->timestart, $dateformat);

            $row[] = (isset($allocation->timedue) ? userdate($allocation->timedue, $dateformat) : $strnotset);

            $row[] = (isset($allocation->timeend) ? userdate($allocation->timeend, $dateformat) : $strnotset);

            $data[] = $row;
        }

        $table = new \html_table();
        $table->head = [get_string('programname', 'enrol_programs'), get_string('programstatus', 'enrol_programs'),
            get_string('programstart', 'enrol_programs'), get_string('programdue', 'enrol_programs'),
            get_string('programend', 'enrol_programs')];
        $table->attributes['class'] = 'admintable generaltable';
        $table->data = $data;
        return \html_writer::table($table);
    }

    /**
     * Returns footer of My programs block.
     *
     * @return string
     */
    public function render_block_footer(): string {
        $url = \enrol_programs\local\catalogue::get_catalogue_url();
        if ($url) {
            return '<div class="float-right">' . \html_writer::link($url, get_string('catalogue', 'enrol_programs')) . '</div>';
        }
        return '';
    }
}
