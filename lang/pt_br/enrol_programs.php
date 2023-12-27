<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Program enrolment plugin language file.
 *
 * @package    enrol_programs
 * @copyright  Copyright (c) 2023 Criativa EAD (https://www.criativaead.com.br/) and 2022 Open LMS (https://www.openlms.net/)
 * @author     Leonardo Barreiro
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addprogram'] = 'Adicionar trilha';
$string['addset'] = 'Adicionar novo conjunto';
$string['allocationend'] = 'Término da inscrição';
$string['allocationend_help'] = 'O significado da data final da inscrição depende das fontes de inscrição habilitadas. Normalmente, não é possível fazer uma nova inscrição após essa data, se especificado.';
$string['allocation'] = 'Inscrição';
$string['allocations'] = 'Inscrições';
$string['Trilhallocations'] = 'inscrições da trilha';
$string['allocationdate'] = 'Data de inscrição';
$string['allocationsources'] = 'Origens da inscrição';
$string['allocationstart'] = 'Início da inscrição';
$string['allocationstart_help'] = 'O significado da data de início da inscrição depende das fontes de inscrição habilitadas. Geralmente, uma nova inscrição só é possível após essa data, se especificada.';
$string['allprograms'] = 'Todos os trilhas';
$string['appenditem'] = 'Anexar item';
$string['appendinto'] = 'Anexar ao item';
$string['archived'] = 'Arquivada';
$string['catalogue'] = 'Catálogo de trilhas';
$string['catalogue_dofilter'] = 'Busca';
$string['catalogue_resetfilter'] = 'Limpar';
$string['catalogue_searchtext'] = 'Buscar texto';
$string['catalogue_tag'] = 'Filtrar por tags';
$string['certificatetemplatechoose'] = 'Escolha um modelo...';
$string['cohorts'] = 'Visível para séries';
$string['cohorts_help'] = 'Trilhas não públicos podem ser visíveis para membros da série especificados.

O status de visibilidade não afeta os trilhas já alocados.';
$string['atividades'] = 'Atividades concluidas';
$string['completiondate'] = 'Data de conclusão';
$string['creategroups'] = 'Grupos de cursos';
$string['creategroups_help'] = 'Se ativado, um grupo será criado em cada curso adicionado aa trilha e todos os usuários inscritos serão adicionados como membros do grupo.';
$string['deleteallocation'] = 'Excluir inscrição da trilha';
$string['deletecourse'] = 'Remover curso';
$string['deleteprogram'] = 'Excluir trilha';
$string['deleteset'] = 'Excluir conjunto';
$string['documentation'] = 'Trilhas para a documentação Moodle';
$string['duedate'] = 'Data de encerramento';
$string['enrolrole'] = 'Função do curso';
$string['enrolrole_desc'] = 'Selecionar a função que será usada por trilhas para inscrição no curso';
$string['errorcontentproblem'] = 'Problema detectado na estrutura de conteúdo da trilha, a conclusão da trilha não será rastreada corretamente!';
$string['errordifferenttenant'] = 'A trilha de outro locatário não pode ser acessada';
$string['errornoallocations'] = 'Nenhuma inscrição de usuário encontrada';
$string['errornoallocation'] = 'Você não está inscrito';
$string['errornomyprograms'] = 'Você ainda não está inscrito em nenhuma trilha.';
$string['errornoprograms'] = 'Nenhuma trilha encontrado.';
$string['errornorequests'] = 'Nenhuma solicitação de trilha encontrada';
$string['errornotenabled'] = 'O plug-in de trilhas não está habilitado';
$string['event_program_completed'] = 'Trilha concluída';
$string['event_program_created'] = 'Trilha criado';
$string['event_program_deleted'] = 'Trilha excluído';
$string['event_program_updated'] = 'Trilha atualizado';
$string['event_program_viewed'] = 'Trilha visualizado';
$string['event_user_allocated'] = 'Usuário inscrito a trilha';
$string['event_user_deallocated'] = 'Usuário desinscrito da trilha';
$string['evidence'] = 'Outra evidência';
$string['evidence_details'] = 'Detalhes';
$string['fixeddate'] = 'Na data fixa';
$string['item'] = 'Item';
$string['itemcompletion'] = 'Conclusão do item da trilha';
$string['management'] = 'Gerenciamento da trilha';
$string['messageprovider:allocation_notification'] = 'Notificação de inscrição da trilha';
$string['messageprovider:approval_request_notification'] = 'Notificação de solicitação de aprovação da trilha';
$string['messageprovider:approval_reject_notification'] = 'Notificação de rejeição de solicitação da trilha';
$string['messageprovider:completion_notification'] = 'Notificação da trilha concluída';
$string['messageprovider:deallocation_notification'] = 'Notificação de desinscrição da trilha';
$string['messageprovider:duesoon_notification'] = 'Notificação de data de entrega da trilha muito próxima';
$string['messageprovider:due_notification'] = 'Notificação de atraso da trilha';
$string['messageprovider:endsoon_notification'] = 'Notificação de data de término da trilha muito próxima';
$string['messageprovider:endcompleted_notification'] = 'Notificação da trilha concluída encerrado';
$string['messageprovider:endfailed_notification'] = 'Falha na notificação da trilha encerrada';
$string['messageprovider:start_notification'] = 'Notificação da trilha iniciada';
$string['moveitem'] = 'Mover item';
$string['moveitemcancel'] = 'Cancelar movimentação';
$string['moveafter'] = 'Mover "{$a->item}" após "{$a->target}"';
$string['movebefore'] = 'Mover "{$a->item}" antes "{$a->target}"';
$string['moveinto'] = 'Mover "{$a->item}" para "{$a->target}"';
$string['myprograms'] = 'Minhas trilhas';
$string['notification_allocation'] = 'Usuário inscrito';
$string['notification_completion'] = 'Trilha concluída';
$string['notification_completion_subject'] = 'Trilha concluído';
$string['notification_completion_body'] = 'Olá, {$a->user_fullname},

você concluiu a trilha "{$a->program_fullname}".
';
$string['notification_deallocation'] = 'Usuário desinscrito';
$string['notification_duesoon'] = 'A data de entrega da trilha é muito próxima';
$string['notification_duesoon_subject'] = 'A conclusão da trilha é esperada em breve';
$string['notification_duesoon_body'] = 'Olá, {$a->user_fullname},

espera-se que a trilha "{$a->program_fullname}" seja concluído em {$a->program_duedate}.
';
$string['notification_due'] = 'Trilha vencido';
$string['notification_due_subject'] = 'A conclusão da trilha era esperada';
$string['notification_due_body'] = 'Olá, {$a->user_fullname},

a conclusão da trilha "{$a->program_fullname}" era esperada antes de {$a->program_duedate}.
';
$string['notification_endsoon'] = 'Data de término da trilha muito próxima';
$string['notification_endsoon_subject'] = 'a trilha termina em breve';
$string['notification_endsoon_body'] = 'Olá, {$a->user_fullname},

a trilha "{$a->program_fullname}" está terminando em {$a->program_enddate}.
';
$string['notification_endcompleted'] = 'Trilha encerrada';
$string['notification_endcompleted_subject'] = 'Trilha encerrada';
$string['notification_endcompleted_body'] = 'Olá, {$a->user_fullname},

a trilha "{$a->program_fullname}" terminou, você o concluiu mais cedo.
';
$string['notification_endfailed'] = 'Trilha encerrada com falha';
$string['notification_endfailed_subject'] = 'Trilha encerrada com falha';
$string['notification_endfailed_body'] = 'Olá, {$a->user_fullname},

a trilha "{$a->program_fullname}" terminou, você não conseguiu concluí-lo.
';
$string['notification_start'] = 'Trilha iniciada';
$string['notification_start_subject'] = 'Trilha iniciada';
$string['notification_start_body'] = 'Olá, {$a->user_fullname},

a trilha "{$a->program_fullname}" foi iniciado.
';
$string['notificationdates'] = 'Datas de notificação';
$string['notset'] = 'Não definido';
$string['plugindisabled'] = 'O plug-in de inscrição na trilha está desabilitado, os trilhas não estão funcionais.

[Enable plugin now]({$a->url})';
$string['pluginname'] = 'Trilhas';
$string['pluginname_desc'] = 'Os trilhas são projetados para permitir a criação de conjuntos de cursos.';
$string['privacy:metadata:field:programid'] = 'ID da trilha';
$string['privacy:metadata:field:userid'] = 'Código do usuário';
$string['privacy:metadata:field:allocationid'] = 'ID de inscrição da trilha';
$string['privacy:metadata:field:sourceid'] = 'Origem da inscrição';
$string['privacy:metadata:field:itemid'] = 'Código do item';
$string['privacy:metadata:field:timecreated'] = 'Data de criação';
$string['privacy:metadata:field:timecompleted'] = 'Data de conclusão';

$string['privacy:metadata:table:enrol_programs_allocations'] = 'Informações sobre incrições da trilha';
$string['privacy:metadata:field:archived'] = 'É o registro arquivado';
$string['privacy:metadata:field:sourcedatajson'] = 'Informações sobre a fonte da inscrição';
$string['privacy:metadata:field:timeallocated'] = 'Data de inscrição da trilha';
$string['privacy:metadata:field:timestart'] = 'Data de início';
$string['privacy:metadata:field:timedue'] = 'Data de encerramento';
$string['privacy:metadata:field:timeend'] = 'Data de encerramento';

$string['privacy:metadata:table:enrol_programs_certs_issues'] = 'Problemas de certificado de inscrição da trilha';
$string['privacy:metadata:field:issueid'] = 'ID do problema';

$string['privacy:metadata:table:enrol_programs_completions'] = 'Conclusões de inscrição da trilha';

$string['privacy:metadata:table:enrol_programs_evidences'] = 'Informações sobre outras evidências de conclusão';
$string['privacy:metadata:field:evidencejson'] = 'Informações sobre evidência de conclusão';
$string['privacy:metadata:field:createdby'] = 'Evidência criada por';

$string['privacy:metadata:table:enrol_programs_requests'] = 'Informações sobre solicitação de inscrição';
$string['privacy:metadata:field:datajson'] = 'Informações sobre a solicitação';
$string['privacy:metadata:field:timerequested'] = 'Data de solicitação';
$string['privacy:metadata:field:timerejected'] = 'Data de rejeição';
$string['privacy:metadata:field:rejectedby'] = 'Solicitação rejeitada por';


$string['privacy:metadata:table:enrol_programs_usr_snapshots'] = 'Instantâneos de inscrição da trilha';
$string['privacy:metadata:field:reason'] = 'Motivo';
$string['privacy:metadata:field:timesnapshot'] = 'Data do instantâneo';
$string['privacy:metadata:field:snapshotby'] = 'Instantâneo por';
$string['privacy:metadata:field:explanation'] = 'Explicação';
$string['privacy:metadata:field:completionsjson'] = 'Informações sobre conclusão';
$string['privacy:metadata:field:evidencesjson'] = 'Informações sobre evidência de conclusão';

$string['program'] = 'Trilha';
$string['Trilhautofix'] = 'Trilha de reparo automático';
$string['programdue'] = 'Trilha previsto';
$string['programdue_help'] = 'A data de vencimento da trilha indica quando os usuários devem concluir a trilha.';
$string['programdue_delay'] = 'Encerrado após o início';
$string['programdue_date'] = 'Data de encerramento';
$string['programend'] = 'Término da trilha';
$string['programend_help'] = 'Os usuários não podem entrar nos cursos da trilha após o término da trilha.';
$string['programend_delay'] = 'Término após o início';
$string['programend_date'] = 'Data de término da trilha';
$string['programcompletion'] = 'Data de conclusão da trilha';
$string['programidnumber'] = 'Idnumber da trilha';
$string['programimage'] = 'Imagem da trilha';
$string['programname'] = 'Nome da trilha';
$string['programurl'] = 'URL da trilha';
$string['programs'] = 'Trilhas';
$string['programsactive'] = 'Ativos';
$string['programsarchived'] = 'Arquivada';
$string['programsarchived_help'] = 'Os trilhas arquivadas ficam ocultas para os usuários e seu progresso é bloqueado.';
$string['programstart'] = 'Início da trilha';
$string['programstart_help'] = 'Os usuários não podem entrar nos cursos da trilha antes do início da trilha.';
$string['programstart_allocation'] = 'Inicie imediatamente após a inscrição';
$string['programstart_delay'] = 'Início do atraso após inscrição';
$string['programstart_date'] = 'Data de início da trilha';
$string['programstatus'] = 'Status da trilha';
$string['programstatus_completed'] = 'Concluídos';
$string['programstatus_any'] = 'Qualquer status da trilha';
$string['programstatus_archived'] = 'Arquivada';
$string['programstatus_archivedcompleted'] = 'Arquivados concluídos';
$string['programstatus_overdue'] = 'Vencidos';
$string['programstatus_open'] = 'Aberto';
$string['programstatus_future'] = 'Ainda não abertos';
$string['programstatus_failed'] = 'Falha';
$string['programs:addcourse'] = 'Adicionar curso aos trilhas';
$string['programs:allocate'] = 'inscrever alunos as trilhas';
$string['programs:delete'] = 'Excluir trilhas';
$string['programs:edit'] = 'Adicionar e atualizar trilhas';
$string['programs:admin'] = 'Administração avançada da trilhas';
$string['programs:manageevidence'] = 'Gerenciar outras evidências de conclusão';
$string['programs:view'] = 'Visualizar gerenciamento das trilhas';
$string['programs:viewcatalogue'] = 'Acessar catálogo das trilhas';
$string['public'] = 'Público';
$string['public_help'] = 'Trilhas públicos são visíveis para todos os usuários.

O status de visibilidade não afeta os trilhas já alocados.';
$string['sequencetype'] = 'Tipo de conclusão';
$string['sequencetype_allinorder'] = 'Tudo em ordem';
$string['sequencetype_allinanyorder'] = 'Todos em qualquer ordem';
$string['sequencetype_atleast'] = 'Pelo menos {$a->min}';
$string['selectcategory'] = 'Selecionar categoria';
$string['source'] = 'Origem';
$string['source_approval'] = 'Solicitações com aprovação';
$string['source_approval_allownew'] = 'Permitir aprovações';
$string['source_approval_allownew_desc'] = 'Permitir a adição de novas fontes de _requests with approval_ aos trilhas';
$string['source_approval_allowrequest'] = 'Permitir novas solicitações';
$string['source_approval_confirm'] = 'Confirme se você deseja solicitar inscrição para a trilha.';
$string['source_approval_daterequested'] = 'Data solicitada';
$string['source_approval_daterejected'] = 'Data rejeitada';
$string['source_approval_makerequest'] = 'Solicitar acesso';
$string['source_approval_notification_allocation_subject'] = 'Notificação de aprovação da trilha';
$string['source_approval_notification_allocation_body'] = 'Olá, {$a->user_fullname},

a sua inscrição na trilha "{$a->program_fullname}" foi aprovada, a data de início é {$a->program_startdate}.
';
$string['source_approval_notification_approval_request_subject'] = 'Notificação de solicitação da trilha';
$string['source_approval_notification_approval_request_body'] = '
O usuário {$a->user_fullname} solicitou acesso aa trilha "{$a->program_fullname}".
';
$string['source_approval_notification_approval_reject_subject'] = 'Notificação de rejeição de solicitação da trilha';
$string['source_approval_notification_approval_reject_body'] = 'Olá, {$a->user_fullname},

sua solicitação de acesso a trilha "{$a->program_fullname}" foi rejeitada.

{$a->reason}
';
$string['source_approval_requestallowed'] = 'Solicitações são permitidas';
$string['source_approval_requestnotallowed'] = 'Solicitações não são permitidas';
$string['source_approval_requests'] = 'Solicitações';
$string['source_approval_requestpending'] = 'Solicitação de acesso pendente';
$string['source_approval_requestrejected'] = 'A solicitação de acesso foi rejeitada';
$string['source_approval_requestapprove'] = 'Aprovar solicitação';
$string['source_approval_requestreject'] = 'Rejeitar solicitação';
$string['source_approval_requestdelete'] = 'Excluir solicitação';
$string['source_approval_rejectionreason'] = 'Motivo da rejeição';
$string['notification_allocation_subject'] = 'Notificação de inscrição da trilha';
$string['notification_allocation_body'] = 'Olá, {$a->user_fullname},

Você foi inscrição para a trilha "{$a->program_fullname}", a data de início é {$a->program_startdate}.
';
$string['notification_deallocation_subject'] = 'Notificação de desinscrição da trilha';
$string['notification_deallocation_body'] = 'Olá, {$a->user_fullname},

você foi desinscrito da trilha "{$a->program_fullname}".
';
$string['source_cohort'] = 'Inscrição automática da série';
$string['source_cohort_allownew'] = 'Permitir inscrição de série';
$string['source_cohort_allownew_desc'] = 'Permitir a adição de novas fontes de _cohort auto allocation_ aos trilhas';
$string['source_manual'] = 'Inscrição manual';
$string['source_manual_allocateusers'] = 'Inscrever usuários';
$string['source_manual_csvfile'] = 'Arquivo CSV';
$string['source_manual_hasheaders'] = 'A primeira linha é cabeçalho';
$string['source_manual_potusersmatching'] = 'Candidatos de inscrição correspondentes';
$string['source_manual_potusers'] = 'Candidatos de inscrição';
$string['source_manual_result_assigned'] = '{$a} usuários foram atribuídos aa trilha.';
$string['source_manual_result_errors'] = '{$a} erros detectados ao atribuir trilhas.';
$string['source_manual_result_skipped'] = '{$a} os usuários já foram atribuídos aa trilha.';
$string['source_manual_uploadusers'] = 'Carregar inscrições';
$string['source_manual_usercolumn'] = 'Coluna de identificação do usuário';
$string['source_manual_usermapping'] = 'Mapeamento de usuário via';
$string['source_manual_userupload_allocated'] = 'Inscrito a \'{$a}\'';
$string['source_manual_userupload_alreadyallocated'] = 'Já inscrito a \'{$a}\'';
$string['source_manual_userupload_invalidprogram'] = 'Não é possível alocar a \'{$a}\'';
$string['source_selfallocation'] = 'Autoinscrição';
$string['source_selfallocation_allocate'] = 'Inscrever-se';
$string['source_selfallocation_allownew'] = 'Permitir autoinscrição';
$string['source_selfallocation_allownew_desc'] = 'Permitir a adição de novas fontes de _self allocation_ aos trilhas';
$string['source_selfallocation_allowsignup'] = 'Permitir novas inscrições';
$string['source_selfallocation_confirm'] = 'Confirme se você deseja se inscrever na trilha.';
$string['source_selfallocation_enable'] = 'Habilitar inscrição';
$string['source_selfallocation_key'] = 'Chave de inscrição';
$string['source_selfallocation_keyrequired'] = 'A chave de inscrição é obrigatória';
$string['source_selfallocation_maxusers'] = 'Máximo de usuários';
$string['source_selfallocation_maxusersreached'] = 'Número máximo de usuários já inscritos';
$string['source_selfallocation_maxusers_status'] = 'Usuários {$a->count}/{$a->max}';
$string['source_selfallocation_notification_allocation_subject'] = 'Notificação de inscrição da trilha';
$string['source_selfallocation_notification_allocation_body'] = 'Olá, {$a->user_fullname},

Você se inscreveu para a trilha "{$a->program_fullname}", a data de início é {$a->program_startdate}.
';
$string['source_selfallocation_signupallowed'] = 'Inscrições são permitidas';
$string['source_selfallocation_signupnotallowed'] = 'Inscrições não são permitidas';
$string['set'] = 'Conjunto do curso';
$string['settings'] = 'Configurações da trilha';
$string['scheduling'] = 'Agendamento';
$string['taballocation'] = 'Configurações da inscrição';
$string['tabcontent'] = 'Conteúdo';
$string['tabgeneral'] = 'Geral';
$string['tabusers'] = 'Usuários';
$string['tabvisibility'] = 'Configurações de visibilidade';
$string['tagarea_program'] = 'Trilhas';
$string['taskcertificate'] = 'Certificado das trilhas emitindo cron';
$string['taskcron'] = 'Trilha plug-in cron';
$string['unlinkeditems'] = 'Itens não vinculados';
$string['updateprogram'] = 'Atualizar trilha';
$string['updateallocation'] = 'Atualizar inscrição';
$string['updateallocations'] = 'Atualizar inscrições';
$string['updateset'] = 'Atualizar conjunto';
$string['updatescheduling'] = 'Atualizar agendamento';
$string['updatesource'] = 'Atualizar {$a}';
$string['progress'] = 'Progresso';
$string['notyetcompleted'] = 'Não completo';