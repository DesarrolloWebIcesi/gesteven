<?php return array (
  'topic' => 
  array (
    0 => 
    array (
      'attributes' => 
      array (
        'id' => 'conference/topic/000019',
        'locale' => 'en_US',
        'title' => 'Import/Export Data',
        'toc' => 'conference/toc/000002',
        'key' => 'conference.currentConferences.importExport',
      ),
      'value' => '',
    ),
  ),
  'section' => 
  array (
    0 => 
    array (
      'attributes' => 
      array (
      ),
      'value' => '<p>The Import/Export Data feature allows the Conference Manager to inject data into and extract data from OCS.</p>
		<p>Data import/export is implemented using plugins, with each format or type of data being provided by a different plugin. For more information, refer to each plugin\'s documentation, found within OCS\' plugin directory.</p>
		<p>Currently, two Import/Export plugins ship with OCS as documented below. More options for importing and exporting will be developed in future OCS versions.</p>
		<p>Import/export functionality is also available as a command-line tool; see tools/importExport.php for more information.</p>',
    ),
    1 => 
    array (
      'attributes' => 
      array (
        'title' => 'User XML Plugin',
      ),
      'value' => '<p>The User XML Plugin can be used to import and export users. See plugins/importexport/user for more information on this plugin.</p>',
    ),
    2 => 
    array (
      'attributes' => 
      array (
        'title' => 'NLM XML Export Plugin',
      ),
      'value' => '<p>The NLM XML Export Plugin can be used to export conference data in the NLM Meeting Abstracts XML format for indexing. See plugins/importexport/nlm for more information on this plugin.</p>',
    ),
  ),
); ?>