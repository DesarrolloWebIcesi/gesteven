CREATE DEFINER=`o_eventos`@`starscream.icesi.edu.co` FUNCTION `focsbus_confsetting`(pconfid varchar(100), psetting varchar(100)) RETURNS text CHARSET utf8
    READS SQL DATA
BEGIN
  DECLARE vresultado text DEFAULT '';
  SELECT scs.setting_value INTO vresultado
    FROM sched_conf_settings scs
   WHERE scs.setting_name = psetting
     AND scs.sched_conf_id = pconfid;
  RETURN vresultado;
END

