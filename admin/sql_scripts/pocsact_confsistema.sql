CREATE DEFINER=`o_eventos`@`starscream.icesi.edu.co` PROCEDURE `pocsact_confsistema`(pid_conferencia int,plapso_evento int, plapso_paper int, pcalculo_certificado varchar(20), pporc_asistencia int, pn_papers int)
BEGIN
	declare vexiste_levento int default 0;
  declare vexiste_lpaper int default 0;
  declare vexiste_ccertificado int default 0;
  declare vexiste_pasistencia int default 0;
  declare vexiste_npresentaciones int default 0;
  
  select count('X') into vexiste_levento
  from sched_conf_settings
  where setting_name='lapso_evento'
  and sched_conf_id=pid_conferencia;
  
  select count('X') into vexiste_lpaper
  from sched_conf_settings
  where setting_name='lapso_paper'
  and sched_conf_id=pid_conferencia;
  
  select count('X') into vexiste_ccertificado
  from sched_conf_settings
  where setting_name='calculo_certificado'
  and sched_conf_id=pid_conferencia;
  
  select count('X') into vexiste_pasistencia
  from sched_conf_settings
  where setting_name='porc_asistencia'
  and sched_conf_id=pid_conferencia;
  
  select count('X') into vexiste_npresentaciones
  from sched_conf_settings
  where setting_name='num_presentaciones'
  and sched_conf_id=pid_conferencia;
  
  if((vexiste_levento<=0) and (vexiste_lpaper<=0)
     and (vexiste_ccertificado<=0) and (vexiste_pasistencia<=0)
     and (vexiste_npresentaciones<=0))then
    
    insert into sched_conf_settings
    (sched_conf_id,setting_name,setting_value)
    values
    (pid_conferencia,'lapso_evento',plapso_evento),
    (pid_conferencia,'lapso_paper',plapso_paper),
    (pid_conferencia,'calculo_certificado',pcalculo_certificado),
    (pid_conferencia,'porc_asistencia',pporc_asistencia),
    (pid_conferencia,'num_presentaciones',pn_papers);
  else
    
    if((vexiste_levento<=0))then
      insert into sched_conf_settings
      (sched_conf_id,setting_name,setting_value)
      values
      (pid_conferencia,'lapso_evento',plapso_evento);
    else
      update sched_conf_settings
      set setting_value=plapso_evento
      where setting_name='lapso_evento'
      and sched_conf_id=pid_conferencia;
    end if;
    
    if (vexiste_lpaper<=0)then
      insert into sched_conf_settings
      (sched_conf_id,setting_name,setting_value)
      values      
      (pid_conferencia,'lapso_paper',plapso_paper);
    else
      update sched_conf_settings
      set setting_value=plapso_paper
      where setting_name='lapso_paper'
      and sched_conf_id=pid_conferencia;
    end if;
    
    if (vexiste_ccertificado<=0)then
      insert into sched_conf_settings
      (sched_conf_id,setting_name,setting_value)
      values      
      (pid_conferencia,'calculo_certificado',pcalculo_certificado);
    else
      update sched_conf_settings
      set setting_value=pcalculo_certificado
      where setting_name='calculo_certificado'
      and sched_conf_id=pid_conferencia;
    end if;
    
    if(vexiste_pasistencia<=0)then
      insert into sched_conf_settings
      (sched_conf_id,setting_name,setting_value)
      values      
      (pid_conferencia,'porc_asistencia',pporc_asistencia);
    else
      update sched_conf_settings
      set setting_value=pporc_asistencia
      where setting_name='porc_asistencia'
      and sched_conf_id=pid_conferencia;
    end if;
    
    if (vexiste_npresentaciones<=0)then
      insert into sched_conf_settings
      (sched_conf_id,setting_name,setting_value)
      values      
      (pid_conferencia,'num_presentaciones',pn_papers);
    else
      update sched_conf_settings
      set setting_value=pn_papers
      where setting_name='num_presentaciones'
      and sched_conf_id=pid_conferencia;
    end if;    
  end if;    
END