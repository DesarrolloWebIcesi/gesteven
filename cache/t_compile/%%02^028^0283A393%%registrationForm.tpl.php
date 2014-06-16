<?php /* Smarty version 2.6.26, created on 2014-01-28 00:19:04
         compiled from registration/registrationForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'registration/registrationForm.tpl', 24, false),array('function', 'fieldLabel', 'registration/registrationForm.tpl', 43, false),array('function', 'translate', 'registration/registrationForm.tpl', 45, false),array('function', 'html_select_date', 'registration/registrationForm.tpl', 114, false),array('modifier', 'escape', 'registration/registrationForm.tpl', 26, false),array('modifier', 'count', 'registration/registrationForm.tpl', 61, false),array('block', 'iterate', 'registration/registrationForm.tpl', 52, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageCrumbTitle', ($this->_tpl_vars['registrationTitle'])); ?><?php echo ''; ?><?php if ($this->_tpl_vars['registrationId']): ?><?php echo ''; ?><?php $this->assign('pageTitle', "manager.registration.edit"); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $this->assign('pageTitle', "manager.registration.create"); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php $this->assign('pageId', "manager.registration.registrationForm"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<br/>

<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'updateRegistration'), $this);?>
">
<?php if ($this->_tpl_vars['registrationId']): ?>
<input type="hidden" name="registrationId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['registrationId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<script type="text/javascript">
		<?php echo '
		<!--
			function toggleAllowNotifyPaymentEmail(form) {
				form.notifyPaymentEmail.disabled = !form.notifyPaymentEmail.disabled;
			}
		// -->
		'; ?>

	</script>

<table class="data" width="100%">
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'userId','required' => 'true','key' => "manager.registration.form.userId"), $this);?>
</td>
	<td width="80%" class="value" id="userId">
		<?php echo ((is_array($_tmp=$this->_tpl_vars['user']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
&nbsp;&nbsp;<a href="<?php if ($this->_tpl_vars['registrationId']): ?><?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'selectRegistrant','registrationId' => $this->_tpl_vars['registrationId']), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'selectRegistrant'), $this);?>
<?php endif; ?>" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.select"), $this);?>
</a>
		<input type="hidden" name="userId" value="<?php echo $this->_tpl_vars['user']->getId(); ?>
"/>
	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'typeId','required' => 'true','key' => "manager.registration.form.typeId"), $this);?>
</td>
	<td class="value"><select name="typeId" id="typeId" class="selectMenu">
		<?php $this->_tag_stack[] = array('iterate', array('from' => 'registrationTypes','item' => 'registrationType')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
		<option value="<?php echo $this->_tpl_vars['registrationType']->getTypeId(); ?>
"<?php if ($this->_tpl_vars['typeId'] == $this->_tpl_vars['registrationType']->getTypeId()): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['registrationType']->getSummaryString())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</option>
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> 
	</select></td>
</tr>
<?php $_from = $this->_tpl_vars['registrationOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['registrationOptions'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['registrationOptions']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['registrationOption']):
        $this->_foreach['registrationOptions']['iteration']++;
?>
<?php $this->assign('optionId', $this->_tpl_vars['registrationOption']->getOptionId()); ?>
<tr valign="top">
	<?php if (($this->_foreach['registrationOptions']['iteration'] <= 1)): ?>
		<td rowspan="<?php echo count($this->_tpl_vars['registrationOptions']); ?>
" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.registration.options"), $this);?>
</td>
	<?php endif; ?>
	<td class="value">
	<input id="registrationOptions-<?php echo ((is_array($_tmp=$this->_tpl_vars['optionId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" <?php if ($this->_tpl_vars['registrationOptionIds'] && in_array ( $this->_tpl_vars['optionId'] , $this->_tpl_vars['registrationOptionIds'] )): ?>checked="checked" <?php endif; ?>type="checkbox" name="registrationOptionIds[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['optionId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]"/> <label for="registrationOptions-<?php echo ((is_array($_tmp=$this->_tpl_vars['optionId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"><?php echo $this->_tpl_vars['registrationOption']->getRegistrationOptionName(); ?>
</label>	
	</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'membership','key' => "manager.registration.form.membership"), $this);?>
</td>
	<td class="value">
		<input type="text" name="membership" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['membership'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" id="membership" size="40" maxlength="40" class="textField" />
		<br />
		<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registration.form.membershipInstructions"), $this);?>
</span>
	</td>
</tr>
<tr valign="top">
	<td>&nbsp;</td>
	<td class="value">
		<table width="100%">
			<tr valign="top">
				<td width="5%"><input type="checkbox" name="notifyEmail" id="notifyEmail" value="1"<?php if ($this->_tpl_vars['notifyEmail']): ?> checked="checked"<?php endif; ?> /></td>
				<td width="95%"><label for="notifyEmail"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registration.form.notifyEmail"), $this);?>
</label></td>
			</tr>
		</table>
	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'domain','key' => "manager.registration.form.domain"), $this);?>
</td>
	<td class="value">
		<input type="text" name="domain" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="40" id="domain" maxlength="255" class="textField" />
		<br />
		<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registration.form.domainInstructions"), $this);?>
</span>
	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'ipRange','key' => "manager.registration.form.ipRange"), $this);?>
</td>
	<td class="value">
		<input type="text" id="ipRange" name="ipRange" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ipRange'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="40" maxlength="255" class="textField" />
		<br />
		<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registration.form.ipRangeInstructions"), $this);?>
</span>
	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'specialRequests','key' => "manager.registration.form.specialRequests"), $this);?>
</td>
	<td class="value">
		<textarea id="specialRequests" name="specialRequests" cols="40" rows="5" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['specialRequests'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea>
		<br />
		<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registration.form.specialRequestsInstructions"), $this);?>
</span>
	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'paid','key' => "manager.registration.form.payment"), $this);?>
</td>
	<td class="value">
		<input type="checkbox" id="paid" name="paid" value="1" <?php if ($this->_tpl_vars['datePaid']): ?>checked="checked"<?php endif; ?> onclick="toggleAllowNotifyPaymentEmail(this.form)"/>&nbsp;&nbsp;<?php echo smarty_function_html_select_date(array('prefix' => 'datePaid','time' => $this->_tpl_vars['datePaid'],'all_extra' => "class=\"selectMenu\"",'start_year' => $this->_tpl_vars['yearOffsetPast'],'end_year' => $this->_tpl_vars['yearOffsetFuture']), $this);?>

		<br />
		<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registration.form.payment.description"), $this);?>
</span>
	</td>
</tr>
<tr valign="top">
	<td>&nbsp;</td>
	<td class="value">
		<table width="100%">
			<tr valign="top">
				<td width="5%"><input type="checkbox" name="notifyPaymentEmail" id="notifyPaymentEmail" value="1"<?php if ($this->_tpl_vars['notifyPaymentEmail']): ?> checked="checked"<?php endif; ?> <?php if (! $this->_tpl_vars['datePaid']): ?> disabled="true"<?php endif; ?>/></td>
				<td width="95%"><label for="notifyPaymentEmail"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registration.form.notifyPaymentEmail"), $this);?>
</label></td>
			</tr>
		</table>
	</td>
</tr>
</table>

<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <?php if (! $this->_tpl_vars['registrationId']): ?><input type="submit" name="createAnother" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registration.form.saveAndCreateAnother"), $this);?>
" class="button" /> <?php endif; ?><input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'registrations'), $this);?>
'" /></p>

</form>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>