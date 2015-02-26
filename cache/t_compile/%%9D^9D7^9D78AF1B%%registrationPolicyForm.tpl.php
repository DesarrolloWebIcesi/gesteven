<?php /* Smarty version 2.6.26, created on 2014-01-26 18:41:52
         compiled from registration/registrationPolicyForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'registration/registrationPolicyForm.tpl', 18, false),array('function', 'translate', 'registration/registrationPolicyForm.tpl', 18, false),array('function', 'fieldLabel', 'registration/registrationPolicyForm.tpl', 51, false),array('function', 'form_language_chooser', 'registration/registrationPolicyForm.tpl', 54, false),array('function', 'html_options', 'registration/registrationPolicyForm.tpl', 102, false),array('modifier', 'assign', 'registration/registrationPolicyForm.tpl', 53, false),array('modifier', 'escape', 'registration/registrationPolicyForm.tpl', 60, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "manager.registrationPolicies"); ?><?php echo ''; ?><?php $this->assign('pageId', "manager.registrationPolicies"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<ul class="menu">
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'registration','clearPageContext' => 1), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registration"), $this);?>
</a></li>
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'registrationTypes','clearPageContext' => 1), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationTypes"), $this);?>
</a></li>
	<li class="current"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'registrationPolicies'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies"), $this);?>
</a></li>
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'registrationOptions'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationOptions"), $this);?>
</a></li>
</ul>

<form name="registrationPolicies" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveRegistrationPolicies'), $this);?>
">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<script type="text/javascript">
		<?php echo '
		<!--
			function toggleAllowSetBeforeMonthsReminder(form) {
				form.numMonthsBeforeRegistrationExpiryReminder.disabled = !form.numMonthsBeforeRegistrationExpiryReminder.disabled;
			}
			function toggleAllowSetBeforeWeeksReminder(form) {
				form.numWeeksBeforeRegistrationExpiryReminder.disabled = !form.numWeeksBeforeRegistrationExpiryReminder.disabled;
			}
			function toggleAllowSetAfterMonthsReminder(form) {
				form.numMonthsAfterRegistrationExpiryReminder.disabled = !form.numMonthsAfterRegistrationExpiryReminder.disabled;
			}
			function toggleAllowSetAfterWeeksReminder(form) {
				form.numWeeksAfterRegistrationExpiryReminder.disabled = !form.numWeeksAfterRegistrationExpiryReminder.disabled;
			}
		// -->
		'; ?>

	</script>
<div id="registrationContact">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.registrationContact"), $this);?>
</h3>
<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.registrationContactDescription"), $this);?>
</p>
<table width="100%" class="data">
<?php if (count ( $this->_tpl_vars['formLocales'] ) > 1): ?>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'formLocale','key' => "form.formLanguage"), $this);?>
</td>
		<td width="80%" class="value">
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'registrationPolicies','escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'registrationPoliciesUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'registrationPoliciesUrl'));?>

			<?php echo $this->_plugins['function']['form_language_chooser'][0][0]->smartyFormLanguageChooser(array('form' => 'registrationPolicies','url' => $this->_tpl_vars['registrationPoliciesUrl']), $this);?>

			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.formLanguage.description"), $this);?>
</span>
		</td>
<?php endif; ?>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'registrationName','key' => "user.name"), $this);?>
</td>
		<td width="80%" class="value"><input type="text" name="registrationName" id="registrationName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['registrationName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="30" maxlength="60" class="textField" /></td>
	</tr>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'registrationEmail','key' => "user.email"), $this);?>
</td>
		<td width="80%" class="value"><input type="text" name="registrationEmail" id="registrationEmail" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['registrationEmail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="30" maxlength="90" class="textField" /></td>
	</tr>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'registrationPhone','key' => "user.phone"), $this);?>
</td>
		<td width="80%" class="value"><input type="text" name="registrationPhone" id="registrationPhone" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['registrationPhone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="15" maxlength="24" class="textField" /></td>
	</tr>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'registrationFax','key' => "user.fax"), $this);?>
</td>
		<td width="80%" class="value"><input type="text" name="registrationFax" id="registrationFax" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['registrationFax'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="15" maxlength="24" class="textField" /></td>
	</tr>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'registrationMailingAddress','key' => "common.mailingAddress"), $this);?>
</td>
		<td width="80%" class="value"><textarea name="registrationMailingAddress" id="registrationMailingAddress" rows="6" cols="40" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['registrationMailingAddress'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
	</tr>
</table>
</div>

<div class="separator"></div>

<div id="registrationAdditionalInformationInfo">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.registrationAdditionalInformation"), $this);?>
</h3>
<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.registrationAdditionalInformationDescription"), $this);?>
</p>
<p>
	<textarea name="registrationAdditionalInformation[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="registrationAdditionalInformation" rows="12" cols="60" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['registrationAdditionalInformation'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea>
	<br />
	<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.htmlInstructions"), $this);?>
</span>
</p>
</div>

<div class="separator"></div>

<div id="expiryReminders">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.expiryReminders"), $this);?>
</h3>
<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.expiryRemindersDescription"), $this);?>
</p>

<p>
	<input type="checkbox" name="enableRegistrationExpiryReminderBeforeMonths" id="enableRegistrationExpiryReminderBeforeMonths" value="1" onclick="toggleAllowSetBeforeMonthsReminder(this.form)"<?php if (! $this->_tpl_vars['scheduledTasksEnabled']): ?> disabled="disabled" <?php elseif ($this->_tpl_vars['enableRegistrationExpiryReminderBeforeMonths']): ?> checked="checked"<?php endif; ?> />&nbsp;
	<label for="enableRegistrationExpiryReminderBeforeMonths"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.expiryReminderBeforeMonths1"), $this);?>
</label>
	<select name="numMonthsBeforeRegistrationExpiryReminder" id="numMonthsBeforeRegistrationExpiryReminder" class="selectMenu"<?php if (! $this->_tpl_vars['enableRegistrationExpiryReminderBeforeMonths'] || ! $this->_tpl_vars['scheduledTasksEnabled']): ?> disabled="disabled"<?php endif; ?>><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['validNumMonthsBeforeExpiry'],'selected' => $this->_tpl_vars['numMonthsBeforeRegistrationExpiryReminder']), $this);?>
</select>
	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.expiryReminderBeforeMonths2"), $this);?>

</p>
<p>
	<input type="checkbox" name="enableRegistrationExpiryReminderBeforeWeeks" id="enableRegistrationExpiryReminderBeforeWeeks" value="1" onclick="toggleAllowSetBeforeWeeksReminder(this.form)"<?php if (! $this->_tpl_vars['scheduledTasksEnabled']): ?> disabled="disabled" <?php elseif ($this->_tpl_vars['enableRegistrationExpiryReminderBeforeWeeks']): ?> checked="checked"<?php endif; ?> />&nbsp;
	<label for="enableRegistrationExpiryReminderBeforeWeeks"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.expiryReminderBeforeWeeks1"), $this);?>
</label>
	<select name="numWeeksBeforeRegistrationExpiryReminder" id="numWeeksBeforeRegistrationExpiryReminder" class="selectMenu"<?php if (! $this->_tpl_vars['enableRegistrationExpiryReminderBeforeWeeks'] || ! $this->_tpl_vars['scheduledTasksEnabled']): ?> disabled="disabled"<?php endif; ?>><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['validNumWeeksBeforeExpiry'],'selected' => $this->_tpl_vars['numWeeksBeforeRegistrationExpiryReminder']), $this);?>
</select>
	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.expiryReminderBeforeWeeks2"), $this);?>

</p>
<p>
	<input type="checkbox" name="enableRegistrationExpiryReminderAfterWeeks" id="enableRegistrationExpiryReminderAfterWeeks" value="1" onclick="toggleAllowSetAfterWeeksReminder(this.form)"<?php if (! $this->_tpl_vars['scheduledTasksEnabled']): ?> disabled="disabled" <?php elseif ($this->_tpl_vars['enableRegistrationExpiryReminderAfterWeeks']): ?> checked="checked"<?php endif; ?> />&nbsp;
	<label for="enableRegistrationExpiryReminderAfterWeeks"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.expiryReminderAfterWeeks1"), $this);?>
</label>
	<select name="numWeeksAfterRegistrationExpiryReminder" id="numWeeksAfterRegistrationExpiryReminder" class="selectMenu"<?php if (! $this->_tpl_vars['enableRegistrationExpiryReminderAfterWeeks'] || ! $this->_tpl_vars['scheduledTasksEnabled']): ?> disabled="disabled"<?php endif; ?>><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['validNumWeeksAfterExpiry'],'selected' => $this->_tpl_vars['numWeeksAfterRegistrationExpiryReminder']), $this);?>
</select>
	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.expiryReminderAfterWeeks2"), $this);?>

</p>
<p>
	<input type="checkbox" name="enableRegistrationExpiryReminderAfterMonths" id="enableRegistrationExpiryReminderAfterMonths" value="1" onclick="toggleAllowSetAfterMonthsReminder(this.form)"<?php if (! $this->_tpl_vars['scheduledTasksEnabled']): ?> disabled="disabled" <?php elseif ($this->_tpl_vars['enableRegistrationExpiryReminderAfterMonths']): ?> checked="checked"<?php endif; ?> />&nbsp;
	<label for="enableRegistrationExpiryReminderAfterMonths"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.expiryReminderAfterMonths1"), $this);?>
</label>
	<select name="numMonthsAfterRegistrationExpiryReminder" id="numMonthsAfterRegistrationExpiryReminder" class="selectMenu"<?php if (! $this->_tpl_vars['enableRegistrationExpiryReminderAfterMonths'] || ! $this->_tpl_vars['scheduledTasksEnabled']): ?> disabled="disabled"<?php endif; ?>><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['validNumMonthsAfterExpiry'],'selected' => $this->_tpl_vars['numMonthsAfterRegistrationExpiryReminder']), $this);?>
</select>
	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.expiryReminderAfterMonths2"), $this);?>

</p>

<?php if (! $this->_tpl_vars['scheduledTasksEnabled']): ?>
	<br/>
	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.expiryRemindersDisabled"), $this);?>

<?php endif; ?>
</div>

<div class="separator"></div>

<div id="openAccessOptions">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.openAccessOptions"), $this);?>
</h3>
<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.openAccessOptionsDescription"), $this);?>
</p>

	<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.delayedOpenAccess"), $this);?>
</h4>
	<p>
	<input type="checkbox" name="enableOpenAccessNotification" id="enableOpenAccessNotification" value="1"<?php if (! $this->_tpl_vars['scheduledTasksEnabled']): ?> disabled="disabled" <?php elseif ($this->_tpl_vars['enableOpenAccessNotification']): ?> checked="checked"<?php endif; ?> />&nbsp;
	<label for="enableOpenAccessNotification"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.openAccessNotificationDescription"), $this);?>
</label>
	<?php if (! $this->_tpl_vars['scheduledTasksEnabled']): ?>
		<br/>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.openAccessNotificationDisabled"), $this);?>

	<?php endif; ?>
	</p>

	<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.delayedOpenAccessPolicyDescription"), $this);?>
</p>
	<p>
	<textarea name="delayedOpenAccessPolicy[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="delayedOpenAccessPolicy" rows="12" cols="60" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['delayedOpenAccessPolicy'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea>
	<br />
	<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.htmlInstructions"), $this);?>
</span>
	</p>

	<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.authorSelfArchive"), $this);?>
</h4>
	<p>
	<input type="checkbox" name="enableAuthorSelfArchive" id="enableAuthorSelfArchive" value="1"<?php if ($this->_tpl_vars['enableAuthorSelfArchive']): ?> checked="checked"<?php endif; ?> />&nbsp;
	<label for="enableAuthorSelfArchive"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.authorSelfArchiveDescription"), $this);?>
</label>
	</p>
	<p>
	<textarea name="authorSelfArchivePolicy[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="authorSelfArchivePolicy" rows="12" cols="60" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['authorSelfArchivePolicy'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea>
	<br />
	<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.htmlInstructions"), $this);?>
</span>
	</p>
</div>

<div class="separator"></div>


<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'registrationPolicies'), $this);?>
'" /></p>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>

</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>