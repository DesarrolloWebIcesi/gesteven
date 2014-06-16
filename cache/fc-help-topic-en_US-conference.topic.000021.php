<?php return array (
  'topic' => 
  array (
    0 => 
    array (
      'attributes' => 
      array (
        'id' => 'conference/topic/000021',
        'locale' => 'en_US',
        'title' => 'Registration',
        'toc' => 'conference/toc/000002',
        'key' => 'conference.currentConferences.registration',
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
      'value' => '<p>The Conference Manager can use the Registration feature to create different registration types for the scheduled conference. Registrations can be used to restrict access to online material, and in conjunction with the payment plugin can also manage conference attendance and payment.</p>',
    ),
    1 => 
    array (
      'attributes' => 
      array (
        'title' => 'Filling out the Registration Policies',
      ),
      'value' => '<p>The first step in managing the registration process is to define the registration policies. To visit the Registration Types page, the Conference Manager can click the Registrations link on the Conference Site Management page for the conference in question, and then click on the Registration Policies link. </p>
		<p>The Conference Manager should fill out the Registration Manager information, and detailed registration in the accompanying text box. This information will be available from the About the Conference page. The Registration Information box can accept HTML.</p> 
		<p>The Conference Manager can also set the system to send automated registration expiry reminders; however, for this option to be available, the scheduled_tasks option must be enabled in OCS\' config.inc.php file. The emails themselves are available to be edited from the Conference Manager\'s Prepared Emails page.</p>
		<p>If the scheduled conference is using delayed open access (this can be enabled and configured from the Conference Timeline), the Conference Manager can also enable an automated notification email when that date is reached; again, this also requires the scheduled_tasks option to be set in config.inc.php. A more detailed open access policy statement can be added in this page, which will be available from About the Conference. An author self-archiving policy can also be added, if the conference supports this.</p>',
    ),
    2 => 
    array (
      'attributes' => 
      array (
        'title' => 'Managing Registration Types',
      ),
      'value' => '<p>The Conference Manager can define different registration types for the scheduled conference depending on need. Examples would include creating student, staff/faculty, and invited speaker registration types for an academic conference. To create and manage registration types, the Conference Manager can click the Registrations link on the Conference Site Management page for the conference in question, and then click on the Registration Types link.</p>
		<p>Clicking the Create New Registration Type link at the bottom of the page will open a registration type page. The Conference Manager can specify a name and description for the registration type, as well as a cost, a currency, secret code for restricted registrations, registration open and close date, and type of access (online, physical or both). An expiry date for access to online content can be specified, as can the requirement for domain authentication and membership to an organization. Finally, The Conference Manager can set whether this registration is publicly available or not, in case an internal registration type is needed.</p>
		<p>Once registrations have been created, they can be edited, deleted and moved up and down for display purposes from the Registration Types page.</p>',
    ),
    3 => 
    array (
      'attributes' => 
      array (
        'title' => 'Managing Registrants',
      ),
      'value' => '<p>The Conference Manager can add new registrations by clicking the Create New Registration link at the bottom of the page, finding the enrolled user in question, and clicking the Enroll link next to their name. This will bring up a form where the Conference Manager will have to select the registration type; enter the relevant domain name/IP range and membership information, if needed; write any special request items; and mark the payment as received. Registrants can be removed from the main Registrants page by clicking the Delete link next to their name.</p>',
    ),
  ),
); ?>