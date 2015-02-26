--
-- Estructura de tabla para la tabla `actualizacion_tokens`
--

CREATE TABLE IF NOT EXISTS `actualizacion_tokens` (
  `username` varchar(20) NOT NULL COMMENT 'usuario que hizo la solicitud',
  `sched_conf_id` int(11) NOT NULL COMMENT 'evento desde el que hizo la solicitud',
  `token` varchar(50) NOT NULL COMMENT 'token generado para la solicitud',
  `fecha_solicitud` datetime NOT NULL COMMENT 'fecha y hora en que se realizó',
  `usado` int(11) NOT NULL COMMENT 'indica si el token ya ha sido usado o no',
  `fecha_vencimiento` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla para guardar los tokens de actulizacion de datos';