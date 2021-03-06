<?php return array (
  'topic' => 
  array (
    0 => 
    array (
      'attributes' => 
      array (
        'id' => 'conference/topic/000027',
        'locale' => 'en_US',
        'title' => 'Create New User',
        'toc' => 'conference/toc/000003',
        'key' => 'conference.users.createNewUser',
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
      'value' => '<p>The Conference Manager can create new users and assign them roles specific to a hosted conference, and optionally to a scheduled conference.</p>',
    ),
    1 => 
    array (
      'attributes' => 
      array (
        'title' => 'Creating Users within a Hosted Conference',
      ),
      'value' => '<p>It is possible to create new users regardless of whether there is a current scheduled conference. The Conference Manager can click the Create New User link under the Users heading, and fill out the subsequent form.</p>
		<p>Mandatory fields include First Name; Last Name; User Name; Password/Repeat Password; and Email. The Conference Manager can opt to have the system generate a random password; can send the user a welcome email with their registration information; and can additionally require that the user change their password when first logging in.</p>
		<p>Please note that with this method Conference Managers can only register users with no assigned role, or as Conference Managers themselves -- to create a user with a role specific to a scheduled Conference, follow the method below.</p>',
    ),
    2 => 
    array (
      'attributes' => 
      array (
        'title' => 'Creating Users within a Scheduled Conference',
      ),
      'value' => '<p>If a scheduled conference has been created by the Conference Manager, users can be created and given roles specific to that scheduled conference, ie. Director; Track Director; Author; Reviewer; and Reader. To do so, the Conference Manager can click the Roles link under the scheduled conference heading in question; click the Create New User link; and then fill out the subsequent form, making sure to choose any applicable roles.</p>
		<p>The Conference Manager can also click the specific role title from underneath the scheduled conference heading in question, and create a new user who will be automatically enrolled with that role.</p>',
    ),
  ),
); ?>