CREATE DEFINER=`o_eventos`@`starscream.icesi.edu.co` FUNCTION `focscal_merecertificado`(pidconferencia int, pidasistente varchar(100)) RETURNS int(11)
    DETERMINISTIC
BEGIN
  declare vconf_asistido int default 0;
  declare vconf_asistidoh int default 0;
  declare vconf_min int default 0;
  declare vconf_tipocal text default 'npres';
  
  declare vmerece int default 0;
  
  select focsbus_confsetting (pidconferencia,'calculo_certificado')into vconf_tipocal
  from dual;
  
  if (vconf_tipocal='porc')then
    
    SELECT 
       sum(
          time_to_sec(
             date_format(ifnull(rp1.fecha_hora_transaccion, p.end_time),
                         '%H:%i:%s'))
          - time_to_sec(
               date_format(
                  (CASE
                      WHEN rp.fecha_hora_transaccion < p.start_time
                      THEN
                         p.start_time
                      ELSE
                         rp.fecha_hora_transaccion
                   END),
                  '%H:%i:%s')))
          tiempo into vconf_asistidoh
    FROM papers p
       JOIN registros_papers rp
          ON p.paper_id = rp.paper_id
       LEFT JOIN registros_papers rp1
          ON     rp.paper_id = rp1.paper_id
             AND rp.username = rp1.username
             AND rp1.tipo_transaccion = 'S'
    WHERE     p.sched_conf_id = pidconferencia
       AND rp.tipo_transaccion = 'E'
       AND rp.username = pidasistente
    GROUP BY rp.username;
    
    select setting_value into vconf_min
    from sched_conf_settings
    where setting_name='porc_asistencia'
    and sched_conf_id=pidconferencia;
    
    if(vconf_asistidoh >= (vconf_min*60*60))then
      set vmerece=1;
    end if;
    
  else
	  
    select count(p.paper_id) into vconf_asistido
    from papers p, registros_papers rp, users u
    where rp.paper_id=p.paper_id
    and rp.username=u.username
    and rp.tipo_transaccion='E'
    and p.sched_conf_id=pidconferencia
    and u.username=pidasistente;
    
    select setting_value into vconf_min
    from sched_conf_settings
    where setting_name='num_presentaciones'
    and sched_conf_id=pidconferencia;
    
    if(vconf_asistido>= vconf_min)then
      set vmerece=1;
    end if;
  end if;
	
  RETURN vmerece;
END