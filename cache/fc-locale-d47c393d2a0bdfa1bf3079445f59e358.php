<?php return array (
  'plugins.importexport.native.displayName' => 'Plugin XML para Artículos',
  'plugins.importexport.native.description' => 'Importar y exportar artículos',
  'plugins.importexport.native.cliUsage' => 'Uso: {$scriptName} {$pluginName} [command] ...
Comandos:
	import [xmlFileName] [conference_path] [sched_conf_path] [user_name] ...
	export [xmlFileName] [conference_path] [sched_conf_path] papers [paperId1] [paperId2] ...
	export [xmlFileName] [conference_path] [sched_conf_path] paper [paperId]

Se requiere de parámetros adicionales para importar datos como sigue, dependiendo del nodo principal del documento XML.

Si el nodo principal es <paper> o <papers>, se requiere de parámetros adicionales.
Se aceptan los siguientes formatos:

{$scriptName} {$pluginName} import [xmlFileName] [conference_path]
	[sched_conf_path] [user_name] track_id [trackId]

{$scriptName} {$pluginName} import [xmlFileName] [conference_path]
	[sched_conf_path] [user_name] track_name [trackName]

{$scriptName} {$pluginName} import [xmlFileName] [conference_path]
	[sched_conf_path] [user_name] track_abbrev [trackAbbrev]',
  'plugins.importexport.native.export' => 'Exportar Datos',
  'plugins.importexport.native.export.tracks' => 'Exportar Áreas',
  'plugins.importexport.native.export.papers' => 'Exportar Artículos',
  'plugins.importexport.native.selectPaper' => 'Seleccionar Artículo',
  'plugins.importexport.native.import.papers' => 'Importar Artículos',
  'plugins.importexport.native.import.papers.description' => 'El fichero que está importando contiene uno o más artículos. Debe escoger un área para importar los artículos allí ; Si no desea importar todos los artículos al mismo área, puede separarlos en ficheros XML distintos o asignarlos a las distintas áreas una vez importados.',
  'plugins.importexport.native.import' => 'Importar Datos',
  'plugins.importexport.native.import.description' => 'Este plugin soporta la importación de datos. dtd Document Type Definition. Los nodos principales soportados son &lt;artículo&gt; y &lt;articulos&gt;.',
  'plugins.importexport.native.import.error' => 'Error de importación',
  'plugins.importexport.native.import.error.description' => 'Han sucedido uno o más errores durante la importación. Asegúrese de que el fichero a importar cumple la especificación. Los detalles específicos de los errores de la importación se listan a continuación.',
  'plugins.importexport.native.cliError' => 'ERROR:',
  'plugins.importexport.native.error.uploadFailed' => 'La subida ha fallado; asegúrese de que las subidas de archivos están permitidas en su servidor y de que el fichero no es demasiado grande para su configuración de  PHP o de servidor web.',
  'plugins.importexport.native.error.unknownUser' => 'El usuario especificado, "{$userName}", no existe.',
  'plugins.importexport.native.error.unknownConference' => 'La ruta especificada de la conferencia o conferencia programada, "{$conferencePath}" o "{$schedConfPath}" (respectivamente), no existe.',
  'plugins.importexport.native.export.error.couldNotWrite' => 'No se puede escribir al fichero "{$fileName}".',
  'plugins.importexport.native.export.error.trackNotFound' => 'Ningún área corresponde a la especificación "{$trackIdentifier}".',
  'plugins.importexport.native.export.error.paperNotFound' => 'Ningún artículo corresponde al ID de artículo especificado "{$paperId}".',
  'plugins.importexport.native.import.error.unsupportedRoot' => 'Este plugin no soporta el nodo principal proporcionado "{$rootName}". Asegúrese de que el fichero está correctamente formado e intente de nuevo.',
  'plugins.importexport.native.import.error.invalidBooleanValue' => 'Un valor booleano inválido "{$value}" fué especificado. Use "true" o "false".',
  'plugins.importexport.native.import.error.invalidDate' => 'Una fecha inválida "{$value}" fué especificada.',
  'plugins.importexport.native.import.error.unknownEncoding' => 'Los datos fueron embebidos usando un tipo de codificación desconocido "{$type}".',
  'plugins.importexport.native.import.error.couldNotWriteFile' => 'Imposible guardar una copia local de "{$originalName}".',
  'plugins.importexport.native.import.error.illegalUrl' => 'The specified URL "{$url}" was illegal. Web-submitted imports support only http, https, ftp, or ftps methods.',
  'plugins.importexport.native.import.error.unknownSuppFileType' => 'An unknown supplementary file type "{$suppFileType}" was specified.',
  'plugins.importexport.native.import.error.couldNotCopy' => 'A specified URL "{$url}" could not be copied to a local file.',
  'plugins.importexport.native.import.error.paperTitleLocaleUnsupported' => 'An paper title ("{$paperTitle}") was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperAbstractLocaleUnsupported' => 'A paper abstract was provided for the paper "{$paperTitle}" in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.galleyLabelMissing' => 'The paper "{$paperTitle}" in the track "{$trackTitle}" was missing a galley label.',
  'plugins.importexport.native.import.error.suppFileMissing' => 'The paper "{$paperTitle}" in the track "{$trackTitle}" was missing a supplementary file.',
  'plugins.importexport.native.import.error.galleyFileMissing' => 'The paper "{$paperTitle}" in the track "{$trackTitle}" was missing a galley file.',
  'plugins.importexport.native.import.error.trackTitleLocaleUnsupported' => 'A track title ("{$trackTitle}") was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.trackAbbrevLocaleUnsupported' => 'A track abbreviation ("{$trackAbbrev}") was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.trackIdentifyTypeLocaleUnsupported' => 'A track identifying type ("{$trackIdentifyType}") was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.trackPolicyLocaleUnsupported' => 'A track policy ("{$trackPolicy}") was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.trackTitleMismatch' => 'The track title "{$track1Title}" and the track title "{$track2Title}" matched the different existing conference tracks.',
  'plugins.importexport.native.import.error.trackTitleMatch' => 'The track title "{$trackTitle}" matched an existing conference track, but another title of this track doesn\'t match with another title of the existing conference track.',
  'plugins.importexport.native.import.error.trackAbbrevMismatch' => 'The track abbreviation "{$track1Abbrev}" and the track abbreviation "{$track2Abbrev}" matched the different existing conference tracks.',
  'plugins.importexport.native.import.error.trackAbbrevMatch' => 'The track abbreviation "{$trackAbbrev}" matched an existing conference track, but another abbreviation of this track doesn\'t match with another abbreviation of the existing conference track.',
  'plugins.importexport.native.import.error.paperDisciplineLocaleUnsupported' => 'An paper discipline was provided for the paper "{$paperTitle}" in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperTypeLocaleUnsupported' => 'An paper type was provided for the paper "{$paperTitle}" in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperSubjectLocaleUnsupported' => 'An paper subject was provided for the paper "{$paperTitle}" in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperSubjectClassLocaleUnsupported' => 'An paper subject classification was provided for the paper "{$paperTitle}" in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperCoverageGeoLocaleUnsupported' => 'An paper geographical coverage was provided for the paper "{$paperTitle}" in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperCoverageChronLocaleUnsupported' => 'An paper geographical coverage was provided for the paper "{$paperTitle}" in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperCoverageSampleLocaleUnsupported' => 'An paper sample coverage was provided for the paper "{$paperTitle}" in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperSponsorLocaleUnsupported' => 'An paper sponsor was provided for the paper "{$paperTitle}" in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperAuthorCompetingInterestsLocaleUnsupported' => 'An author competing interest was provided for the author "{$authorFullName}" of the paper "{$paperTitle}" in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperAuthorBiographyLocaleUnsupported' => 'An author biography was provided for the author "{$authorFullName}" of the paper "{$paperTitle}" in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.galleyLocaleUnsupported' => 'A galley of the paper "{$paperTitle}" was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperSuppFileTitleLocaleUnsupported' => 'A supplementary file title ("{$suppFileTitle}") of the paper "{$paperTitle}" was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperSuppFileCreatorLocaleUnsupported' => 'A creator of the supplementary file "{$suppFileTitle}" of the paper "{$paperTitle}" was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperSuppFileSubjectLocaleUnsupported' => 'A subject of the supplementary file "{$suppFileTitle}" of the paper "{$paperTitle}" was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperSuppFileTypeOtherLocaleUnsupported' => 'A custom type of the supplementary file "{$suppFileTitle}" of the paper "{$paperTitle}" was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperSuppFileDescriptionLocaleUnsupported' => 'A description of the supplementary file "{$suppFileTitle}" of the paper "{$paperTitle}" was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperSuppFilePublisherLocaleUnsupported' => 'A publisher of the supplementary file "{$suppFileTitle}" of the paper "{$paperTitle}" was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperSuppFileSponsorLocaleUnsupported' => 'A sponsor of the supplementary file "{$suppFileTitle}" of the paper "{$paperTitle}" was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.error.paperSuppFileSourceLocaleUnsupported' => 'A source of the supplementary file "{$suppFileTitle}" of the paper "{$paperTitle}" was provided in a locale ("{$locale}") that this conference does not support.',
  'plugins.importexport.native.import.success' => 'Import Successful',
  'plugins.importexport.native.import.success.description' => 'The import was successful. Successfully-imported items are listed below.',
); ?>