<?php return array (
  'topic' => 
  array (
    0 => 
    array (
      'attributes' => 
      array (
        'id' => 'site/topic/000003',
        'locale' => 'en_US',
        'title' => 'Administrative Functions',
        'toc' => 'site/toc/000000',
        'key' => 'site.administrativeFunctions',
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
      'value' => '<p>Several administrative functions are available in the site administration area. These functions should generally be used with caution, as improper use could lead to unexpected results.</p>',
    ),
    1 => 
    array (
      'attributes' => 
      array (
        'title' => 'System Information',
      ),
      'value' => '<p>General information about the server environment and OCS version history (including past upgrades). A web-based interface to modify the OCS configuration file is also provided.</p>',
    ),
    2 => 
    array (
      'attributes' => 
      array (
        'title' => 'Expire User Sessions',
      ),
      'value' => '<p>Clears all active user sessions in the system, requiring any user that is currently logged in to sign in to the system again.</p>',
    ),
    3 => 
    array (
      'attributes' => 
      array (
        'title' => 'Clear Data Caches',
      ),
      'value' => '<p>Clears all cached data. This function may be useful to force data to be reloaded after customizations have been made.</p>',
    ),
    4 => 
    array (
      'attributes' => 
      array (
        'title' => 'Clear Template Cache',
      ),
      'value' => '<p>Clears all cached versions of HTML templates. This function may be useful to force templates to be reloaded after customizations have been made.</p>',
    ),
    5 => 
    array (
      'attributes' => 
      array (
        'title' => 'Merge Users',
      ),
      'value' => '<p>The Merge Users feature allows the Site Administrator to merge two user accounts into a single account, transferring submissions, assignments and numerous other records from one account to the other and effectively deleting the first.</p>
		<p>Unlike the Merge Users feature available to a Conference Manager, which is limited to merging user accounts for a particular conference, the Merge Users feature under Site Administration allows the Site Administrator to merge any two user accounts, even across different conferences.</p>
		<p>The following items are transferred:</p>
			<ul>
				<li>Article authorship</li>
				<li>Public comments on articles</li>
				<li>Article notes</li>
				<li>Director assignments and decisions</li>
				<li>Review assignments</li>
				<li>Article email and event log entries</li>
				<li>Reviewer access keys</li>
				<li>Roles</li>
				<li>Registrations (please see below)</li>
			</ul>
		<p>The following items are <strong>not</strong> transferred:</p>
			<ul>
				<li>Sessions</li>
				<li>Notification status (i.e. whether the user has signed up to receive notifications about conference news)</li>
				<li>Editorial team memberships</li>
				<li>Track Director status on tracks</li>
				<li>User profile information (e.g. first name, last name, etc.)</li>
			</ul>
		<p>This feature should be used with caution, as it is not reversible and involves the transfer of records from one user to another.</p>
		<p>For registrations, the second user\'s registration is transferred to the first user only if is valid and if the first user does not already have a valid registration for a given scheduled conference.</p>',
    ),
  ),
); ?>