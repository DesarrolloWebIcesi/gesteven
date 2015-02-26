<?php return array (
  'plugins.importexport.users.displayName' => 'Plugin de importar exportar Usuarios en XML',
  'plugins.importexport.users.description' => 'Importar y exportar usuarios',
  'plugins.importexport.users.cliUsage' => 'Uso: {$scriptName} {$pluginName} [command] ...
Commands:
	import [xmlFileName] [sched_conf_path] [optional flags]
	export [xmlFileName] [sched_conf_path]
	export [xmlFileName] [sched_conf_path] [role_path1] [role_path2] ...

Indicadores Opcionales:
	continue_on_error: Si se especifica, no para de importar usuarios aunque suceda un error.

	send_notify: Si se especifica, manda emails de notificación con el usuario y contraseña a toods los usuarios importados.

Ejemplos:
	Importar usuarios en miConferenciaProgramada desde miConferenciaProgramada.xml, con la opción de continuar en caso de error:
	{$scriptName} {$pluginName} import miConferenciaProgramada.xml miConferenciaProgramada continue_on_error

	Exportar todos los usuarios de miConferenciaProgramada:
	{$scriptName} {$pluginName} export miConferenciaProgramada.xml miConferenciaProgramada

	Exportar todos los usuarios registrados como revisores, únicamente con su rol de revisor:
	{$scriptName} {$pluginName} export miConferenciaProgramada.xml miConferenciaProgramada reviewer',
  'plugins.importexport.users.import.importUsers' => 'Importar Usuarios',
  'plugins.importexport.users.import.instructions' => 'Seleccione un fichero de datos XML que contenga información de usuarios para importar en esta conferencia programada. Mira la ayuda de la conferencia programada para más detalles sobre el formato de este archivo.<br /><br />Observa que si el fichero importado contiene nombres de usuario o emails que ya existen en el sistema, la información de usuario para esos usuarios no será importada y todos los nuevos roles que deban ser creados se asignarán a estos usuarios existentes.',
  'plugins.importexport.users.import.failedToImportUser' => 'Ha fallado importando el usuario',
  'plugins.importexport.users.import.failedToImportRole' => 'Ha fallado asignando el usuario a ese rol',
  'plugins.importexport.users.import.dataFile' => 'Fichero de datos de usuario',
  'plugins.importexport.users.import.sendNotify' => 'Mandar un email de notificación a cada usuario importado con el nombre de usuario y contraseña.',
  'plugins.importexport.users.import.continueOnError' => 'Continuar importando otros usuarios si sucede un error.',
  'plugins.importexport.users.import.noFileError' => 'No se ha subido fichero!',
  'plugins.importexport.users.import.usersWereImported' => 'Los siguientes usuarios fueron correctamente importados en el sistema',
  'plugins.importexport.users.import.errorsOccurred' => 'Sucedieron errores durante la importación',
  'plugins.importexport.users.import.confirmUsers' => 'Confirmar que esos son los usuarios que desearías importar en el sistema',
  'plugins.importexport.users.import.warning' => 'Advertencia',
  'plugins.importexport.users.import.encryptionMismatch' => 'No se puede usar usuarios con un hash de tipo {$importHash}; OCS está configurado para usar {$ocsHash}. Si continuas, necesitarás resetear las contraseñas de los usuarios importados.',
  'plugins.importexport.users.unknownSchedConf' => 'Se especificó una ruta desconocida "{$schedConfPath}" para la conferencia.',
  'plugins.importexport.users.export.exportUsers' => 'Exportar Usuarios',
  'plugins.importexport.users.export.exportByRole' => 'Exportar por Rol',
  'plugins.importexport.users.export.exportAllUsers' => 'Export Todo',
  'plugins.importexport.users.export.errorsOccurred' => 'Sucedieron errores durante la exportación',
  'plugins.importexport.users.export.couldNotWriteFile' => 'No se puede escribir en el fichero "{$fileName}".',
); ?>