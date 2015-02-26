<?php /* Smarty version 2.6.26, created on 2014-01-26 18:05:14
         compiled from registration/registrationOptionForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'registration/registrationOptionForm.tpl', 22, false),array('function', 'url', 'registration/registrationOptionForm.tpl', 27, false),array('function', 'fieldLabel', 'registration/registrationOptionForm.tpl', 36, false),array('function', 'form_language_chooser', 'registration/registrationOptionForm.tpl', 41, false),array('function', 'html_select_date', 'registration/registrationOptionForm.tpl', 70, false),array('modifier', 'escape', 'registration/registrationOptionForm.tpl', 29, false),array('modifier', 'assign', 'registration/registrationOptionForm.tpl', 38, false),)), $this); ?>
<?php if ($this->_tpl_vars['optionId']): ?>
<?php $this->assign('pageTitle', "manager.registrationOptions.edit"); ?>
<?php else: ?>
<?php $this->assign('pageTitle', "manager.registrationOptions.create"); ?>
<?php endif; ?>
<?php $this->assign('pageId', "manager.registrationOptions.registrationOptionForm"); ?>
<?php $this->assign('pageCrumbTitle', $this->_tpl_vars['registrationOptionTitle']); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['registrationOptionCreated']): ?>
<br/>
<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationOptions.registrationOptionCreatedSuccessfully"), $this);?>
<br />
<?php endif; ?>

<br/>

<form name="registrationOption" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'updateRegistrationOption'), $this);?>
">
<?php if ($this->_tpl_vars['optionId']): ?>
<input type="hidden" name="optionId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['optionId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table class="data" width="100%">
<?php if (count ( $this->_tpl_vars['formLocales'] ) > 1): ?>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'formLocale','key' => "form.formLanguage"), $this);?>
</td>
		<td width="80%" class="value">
			<?php if ($this->_tpl_vars['optionId']): ?><?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editRegistrationOption','path' => $this->_tpl_vars['optionId'],'escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'registrationOptionUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'registrationOptionUrl'));?>

			<?php else: ?><?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'createRegistrationOption','escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'registrationOptionUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'registrationOptionUrl'));?>

			<?php endif; ?>
			<?php echo $this->_plugins['function']['form_language_chooser'][0][0]->smartyFormLanguageChooser(array('form' => 'registrationOption','url' => $this->_tpl_vars['registrationOptionUrl']), $this);?>

			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.formLanguage.description"), $this);?>
</span>

		</td>
	</tr>
<?php endif; ?>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'name','required' => 'true','key' => "manager.registrationOptions.form.optionName"), $this);?>
</td>
	<td width="80%" class="value"><input type="text" name="name[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['name'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="35" maxlength="80" id="name" class="textField" /></td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'description','key' => "manager.registrationOptions.form.description"), $this);?>
</td>
	<td class="value"><textarea name="description[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="description" cols="40" rows="4" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['description'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationOptions.cost"), $this);?>
</td>
	<td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationOptions.costSetInRegistrationType"), $this);?>
</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'code','key' => "manager.registrationOptions.form.code"), $this);?>
</td>
	<td class="value">
		<input type="text" name="code" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['code'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="15" maxlength="20" id="code" class="textField" />
		<br />
		<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationOptions.form.code.instructions"), $this);?>
</span>
	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'openDate','required' => 'true','key' => "manager.registrationOptions.form.openDate"), $this);?>
</td>
	<td class="value" id="openDate">
		<?php echo smarty_function_html_select_date(array('prefix' => 'openDate','time' => $this->_tpl_vars['openDate'],'all_extra' => "class=\"selectMenu\"",'start_year' => "+0",'end_year' => $this->_tpl_vars['dateExtentFuture']), $this);?>

	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'closeDate','required' => 'true','key' => "manager.registrationOptions.form.closeDate"), $this);?>
</td>
	<td class="value" id="closeDate">
		<?php echo smarty_function_html_select_date(array('prefix' => 'closeDate','time' => $this->_tpl_vars['closeDate'],'all_extra' => "class=\"selectMenu\"",'start_year' => "+0",'end_year' => $this->_tpl_vars['dateExtentFuture']), $this);?>

		<input type="hidden" name="closeDateHour" value="23" />
		<input type="hidden" name="closeDateMinute" value="59" />
		<input type="hidden" name="closeDateSecond" value="59" />
	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.options"), $this);?>
</td>
	<td class="value">
		<input type="checkbox" name="notPublic" id="notPublic" value="1"<?php if ($this->_tpl_vars['notPublic']): ?> checked="checked"<?php endif; ?> />
		<label for="notPublic"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationOptions.form.notPublic"), $this);?>
</label>
	</td>
</tr>
</table>
<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <?php if (! $this->_tpl_vars['optionId']): ?><input type="submit" name="createAnother" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationOptions.form.saveAndCreateAnotherOption"), $this);?>
" class="button" /> <?php endif; ?><input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'registrationOptions'), $this);?>
'" /></p>
</form>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>