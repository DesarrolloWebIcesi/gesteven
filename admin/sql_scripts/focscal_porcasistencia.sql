CREATE DEFINER=`o_eventos`@`starscream.icesi.edu.co` FUNCTION `focscal_porcasistencia`(pidconferencia int, pidasistente varchar(100)) RETURNS double
    DETERMINISTIC
BEGIN
	declare vtiempo_total double(10,3) default 0;
  declare vtiempo_asistido double(10,3) default 0;
  declare vporc_asistencia double(10,3) default 0;
  
  select sum(time_to_sec(TIMEDIFF(p.end_time, p.start_time))) into vtiempo_total
  from  papers p
  where p.sched_conf_id=pidconferencia;
SELECT 
       sum(
          time_to_sec(
             date_format(ifnull(
                  CASE
                      WHEN rp1.fecha_hora_transaccion > p.end_time
                      THEN
                         p.end_time
                      ELSE
                         CASE
                         WHEN rp1.fecha_hora_transaccion < p.start_time
                         THEN
                          p.start_time
                         ELSE
                          rp1.fecha_hora_transaccion
                         END
                  END, p.end_time),
                         '%H:%i:%s'))
          - time_to_sec(
               date_format(
                  (CASE
                      WHEN rp.fecha_hora_transaccion < p.start_time
                      THEN
                        p.start_time
                      ELSE                         
                        CASE
                         WHEN rp.fecha_hora_transaccion > p.end_time
                         THEN
                          p.end_time
                         ELSE
                          rp.fecha_hora_transaccion
                         END
                   END),
                  '%H:%i:%s')))
          tiempo into vtiempo_asistido
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
  
  set vporc_asistencia=(vtiempo_asistido/vtiempo_total);
  
	RETURN vporc_asistencia;
END