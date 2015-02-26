CREATE DEFINER=`o_eventos`@`starscream.icesi.edu.co` PROCEDURE `pocsact_confcamposinsc`(pid_conferencia int, plugares text, pcampos text,pvalorescampos text, porganizaciones text)
BEGIN
	declare vexiste_conf int default 0;
  declare vconference_id int default 0;
  
  select sc.conference_id into vconference_id
  from sched_confs sc
  where sc.sched_conf_id = pid_conferencia;
  
  select count('X') into vexiste_conf
  from conference_settings cs
  where cs.setting_name = 'lugares'
  and cs.conference_id=vconference_id;
  
  if(vexiste_conf>0)then
    
    update conference_settings
    set setting_value=plugares
    where setting_name='lugares'
    and conference_id=vconference_id;
    
    update conference_settings
    set setting_value=pcampos
    where setting_name='campos'
    and conference_id=vconference_id;
    
    update conference_settings
    set setting_value=pvalorescampos
    where setting_name='valores_campos'
    and conference_id=vconference_id;
    
    update conference_settings
    set setting_value=porganizaciones
    where setting_name='listado_organizaciones'
    and conference_id=vconference_id;
  else
    
    insert into conference_settings
    (conference_id,setting_name,setting_value)
    values
    (vconference_id,'lugares',plugares),
    (vconference_id,'campos',pcampos),
    (vconference_id,'valores_campos',pvalorescampos),
    (vconference_id,'listado_organizaciones',porganizaciones);
  end if;  
END