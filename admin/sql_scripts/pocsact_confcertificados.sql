CREATE DEFINER=`o_eventos`@`starscream.icesi.edu.co` PROCEDURE `pocsact_confcertificados`(pid_conferencia int, pimagen varchar(100), pmensaje text, pmargen int, pincluirid varchar(1))
BEGIN
declare vexiste_conf int default 0;
  
  select count('X') into vexiste_conf
  from sched_conf_settings
  where setting_name='imagen_certificado'
  and sched_conf_id=pid_conferencia;
  
  if(vexiste_conf>0)then
    
    update sched_conf_settings
    set setting_value=pimagen
    where setting_name='imagen_certificado'
    and sched_conf_id=pid_conferencia;
    
    update sched_conf_settings
    set setting_value=pmensaje
    where setting_name='mensaje_certificado'
    and sched_conf_id=pid_conferencia;
    
    update sched_conf_settings
    set setting_value=pmargen
    where setting_name='margen_certificado'
    and sched_conf_id=pid_conferencia;

update sched_conf_settings
    set setting_value=pincluirid
    where setting_name='incluir_id_certificado'
    and sched_conf_id=pid_conferencia;
  else
    
    insert into sched_conf_settings
    (sched_conf_id,setting_name,setting_value)
    values
    (pid_conferencia,'imagen_certificado',pimagen),
    (pid_conferencia,'mensaje_certificado',pmensaje),
    (pid_conferencia,'margen_certificado',pmargen),
(pid_conferencia,'incluir_id_certificado',pincluirid);
  end if;  
END