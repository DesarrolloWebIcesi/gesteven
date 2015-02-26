<?php /* Smarty version 2.6.26, created on 2013-11-05 11:18:29
         compiled from registration/registrationTypeForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'registration/registrationTypeForm.tpl', 24, false),array('function', 'url', 'registration/registrationTypeForm.tpl', 29, false),array('function', 'fieldLabel', 'registration/registrationTypeForm.tpl', 38, false),array('function', 'form_language_chooser', 'registration/registrationTypeForm.tpl', 43, false),array('function', 'html_options', 'registration/registrationTypeForm.tpl', 59, false),array('function', 'html_select_date', 'registration/registrationTypeForm.tpl', 96, false),array('modifier', 'escape', 'registration/registrationTypeForm.tpl', 31, false),array('modifier', 'assign', 'registration/registrationTypeForm.tpl', 40, false),array('modifier', 'count', 'registration/registrationTypeForm.tpl', 73, false),)), $this); ?>
<?php echo ''; ?><?php if ($this->_tpl_vars['typeId']): ?><?php echo ''; ?><?php $this->assign('pageTitle', "manager.registrationTypes.edit"); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $this->assign('pageTitle', "manager.registrationTypes.create"); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php $this->assign('pageId', "manager.registrationTypes.registrationTypeForm"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', $this->_tpl_vars['registrationTypeTitle']); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php if ($this->_tpl_vars['registrationTypeCreated']): ?>
<br/>
<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationTypes.registrationTypeCreatedSuccessfully"), $this);?>
<br />
<?php endif; ?>

<br/>

<form name="registrationType" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'updateRegistrationType'), $this);?>
">
<?php if ($this->_tpl_vars['typeId']): ?>
<input type="hidden" name="typeId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['typeId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
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
		<td colspan="2" width="80%" class="value">
			<?php if ($this->_tpl_vars['typeId']): ?><?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editRegistrationType','path' => $this->_tpl_vars['typeId'],'escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'registrationTypeUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'registrationTypeUrl'));?>

			<?php else: ?><?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'createRegistrationType','escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'registrationTypeUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'registrationTypeUrl'));?>

			<?php endif; ?>
			<?php echo $this->_plugins['function']['form_language_chooser'][0][0]->smartyFormLanguageChooser(array('form' => 'registrationType','url' => $this->_tpl_vars['registrationTypeUrl']), $this);?>

			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.formLanguage.description"), $this);?>
</span>

		</td>
	</tr>
<?php endif; ?>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'name','required' => 'true','key' => "manager.registrationTypes.form.typeName"), $this);?>
</td>
	<td width="80%" colspan="2" class="value"><input type="text" name="name[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['name'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="35" maxlength="80" id="name" class="textField" /></td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'description','key' => "manager.registrationTypes.form.description"), $this);?>
</td>
	<td colspan="2" class="value"><textarea name="description[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="description" cols="40" rows="4" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['description'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'currency','required' => 'true','key' => "manager.registrationTypes.form.currency"), $this);?>
</td>
	<td colspan="2"><select name="currency" id="currency" class="selectMenu"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['validCurrencies'],'selected' => $this->_tpl_vars['currency']), $this);?>
</select></td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'cost','required' => 'true','key' => "manager.registrationTypes.form.cost"), $this);?>
</td>
	<td colspan="2" class="value">
		<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationTypes.form.costInstructions"), $this);?>
</span>
		<br />
		<input type="text" name="cost" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cost'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="5" maxlength="10" id="cost" class="textField" />		
	</td>
</tr>

<?php $_from = $this->_tpl_vars['registrationOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['registrationOptions'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['registrationOptions']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['registrationOption']):
        $this->_foreach['registrationOptions']['iteration']++;
?>
	<tr valign="top">
		<?php if (($this->_foreach['registrationOptions']['iteration'] <= 1)): ?>
			<td rowspan="<?php echo count($this->_tpl_vars['registrationOptions']); ?>
" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationOptions.costs"), $this);?>
</td>
		<?php endif; ?>
		<td class="value" width="20%">
			<?php $this->assign('optionId', $this->_tpl_vars['registrationOption']->getOptionId()); ?>
			<label for="optionCost-<?php echo ((is_array($_tmp=$this->_tpl_vars['optionId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['registrationOption']->getRegistrationOptionName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</label>
		</td>
		<td class="value" width="60%">
			<input type="text" name="registrationOptionCosts[<?php echo ((is_array($_tmp=$this->_tpl_vars['optionId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" class="textField" size="5" maxlength="10" id="optionCost-<?php echo ((is_array($_tmp=$this->_tpl_vars['optionId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['registrationOptionCosts'][$this->_tpl_vars['optionId']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
		</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>

<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'code','key' => "manager.registrationTypes.form.code"), $this);?>
</td>
	<td colspan="2" class="value">
		<input type="text" name="code" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['code'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="15" maxlength="20" id="code" class="textField" />
		<br />
		<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationTypes.form.code.instructions"), $this);?>
</span>
	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'openDate','required' => 'true','key' => "manager.registrationTypes.form.openDate"), $this);?>
</td>
	<td colspan="2" class="value" id="openDate">
		<?php echo smarty_function_html_select_date(array('prefix' => 'openDate','time' => $this->_tpl_vars['openDate'],'all_extra' => "class=\"selectMenu\"",'start_year' => "+0",'end_year' => $this->_tpl_vars['dateExtentFuture']), $this);?>

	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'closeDate','required' => 'true','key' => "manager.registrationTypes.form.closeDate"), $this);?>
</td>
	<td colspan="2" class="value" id="closeDate">
		<?php echo smarty_function_html_select_date(array('prefix' => 'closeDate','time' => $this->_tpl_vars['closeDate'],'all_extra' => "class=\"selectMenu\"",'start_year' => "+0",'end_year' => $this->_tpl_vars['dateExtentFuture']), $this);?>

		<input type="hidden" name="closeDateHour" value="23" />
		<input type="hidden" name="closeDateMinute" value="59" />
		<input type="hidden" name="closeDateSecond" value="59" />
	</td>
</tr>
<tr valign="top">
	<td class="label">&nbsp;</td>
	<td colspan="2" class="value">
		<input id="expiryDate" type="checkbox" name="expiryDate" value="1" <?php if ($this->_tpl_vars['expiryDate']): ?>checked="checked" <?php endif; ?> />&nbsp;<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'expiryDate','key' => "manager.registrationTypes.form.expiryDate"), $this);?>

		<?php echo smarty_function_html_select_date(array('prefix' => 'expiryDate','time' => $this->_tpl_vars['expiryDate'],'all_extra' => "class=\"selectMenu\"",'start_year' => "+0",'end_year' => $this->_tpl_vars['dateExtentFuture']), $this);?>

		<input type="hidden" name="expiryDateHour" value="23" />
		<input type="hidden" name="expiryDateMinute" value="59" />
		<input type="hidden" name="expiryDateSecond" value="59" />
	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'access','required' => 'true','key' => "manager.registrationTypes.form.access"), $this);?>
</td>
	<td colspan="2"><select id="access" name="access" class="selectMenu"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['validAccessTypes'],'selected' => $this->_tpl_vars['access']), $this);?>
</select></td>
</tr>
<tr valign="top">
	<td rowspan="3"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.options"), $this);?>
</td>
	<td colspan="2" class="value">
		<input type="checkbox" name="institutional" id="institutional" value="1"<?php if ($this->_tpl_vars['institutional']): ?> checked="checked"<?php endif; ?> />
		<label for="institutional"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationTypes.form.institutional"), $this);?>
</label>
	</td>
</tr>
<tr valign="top">
	<td colspan="2" class="value">
		<input type="checkbox" name="membership" id="membership" value="1"<?php if ($this->_tpl_vars['membership']): ?> checked="checked"<?php endif; ?> />
		<label for="membership"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationTypes.form.membership"), $this);?>
</label>
	</td>
</tr>
<tr valign="top">
	<td colspan="2" class="value">
		<input type="checkbox" name="notPublic" id="notPublic" value="1"<?php if ($this->_tpl_vars['notPublic']): ?> checked="checked"<?php endif; ?> />
		<label for="notPublic"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationTypes.form.notPublic"), $this);?>
</label>
	</td>
</tr>
</table>

<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <?php if (! $this->_tpl_vars['typeId']): ?><input type="submit" name="createAnother" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationTypes.form.saveAndCreateAnotherType"), $this);?>
" class="button" /> <?php endif; ?><input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'registrationTypes'), $this);?>
'" /></p>
</form>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>