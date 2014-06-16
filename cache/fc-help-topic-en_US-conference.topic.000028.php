<?php return array (
  'topic' => 
  array (
    0 => 
    array (
      'attributes' => 
      array (
        'id' => 'conference/topic/000028',
        'locale' => 'en_US',
        'title' => 'Merge Users',
        'toc' => 'conference/toc/000003',
        'key' => 'conference.users.mergeUsers',
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
      'value' => '<p>The Merge Users feature allows the Conference Manager to merge two user accounts into a single account, transferring assignments, submissions, and other items from the first account to the second and deleting the first one. Normally it is for someone who has two user accounts. </p>
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
			<p>This feature should be used with caution, as it is not reversible and involves the transfer of records from one user account to another.</p>
			<p>For registrations, the second user\'s registration is transferred to the first user only if is valid and if the first user does not already have a valid registration for a given scheduled conference.</p>',
    ),
  ),
); ?>