<?php /* Smarty version 2.6.26, created on 2014-02-22 16:05:36
         compiled from director/notifyUsers.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'director/notifyUsers.tpl', 21, false),array('modifier', 'assign', 'director/notifyUsers.tpl', 34, false),array('modifier', 'default', 'director/notifyUsers.tpl', 49, false),array('function', 'translate', 'director/notifyUsers.tpl', 30, false),array('function', 'fieldLabel', 'director/notifyUsers.tpl', 100, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "email.compose"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "email.email"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<form method="post" action="<?php echo $this->_tpl_vars['formActionUrl']; ?>
">
<input type="hidden" name="continued" value="1"/>
<?php if ($this->_tpl_vars['hiddenFormParams']): ?>
	<?php $_from = $this->_tpl_vars['hiddenFormParams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['hiddenFormParam']):
?>
		<input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['hiddenFormParam'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_from = $this->_tpl_vars['errorMessages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
	<?php if (! $this->_tpl_vars['notFirstMessage']): ?>
		<?php $this->assign('notFirstMessage', 1); ?>
		<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.errorsOccurred"), $this);?>
</h4>
		<ul class="plain">
	<?php endif; ?>
	<?php if ($this->_tpl_vars['message']['type'] == MAIL_ERROR_INVALID_EMAIL): ?>
		<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "email.invalid",'email' => $this->_tpl_vars['message']['address']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'message') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'message'));?>

		<li><?php echo ((is_array($_tmp=$this->_tpl_vars['message'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</li>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['notFirstMessage']): ?>
	</ul>
	<br/>
<?php endif; ?>

<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "email.recipients"), $this);?>
</h3>
<table id="recipients" class="data" width="100%">
<tr valign="top">
	<td><input type="radio" id="allUsers" name="whichUsers" value="allUsers"/></td>
	<td class="label">
		<label for="allUsers"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.notifyUsers.allUsers",'count' => ((is_array($_tmp=@$this->_tpl_vars['allUsersCount'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
</label>
	</td>
</tr>
<tr valign="top">
	<td><input type="radio" id="allReaders" name="whichUsers" value="allReaders"/></td>
	<td class="label">
		<label for="allReaders"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.notifyUsers.allReaders",'count' => ((is_array($_tmp=@$this->_tpl_vars['allReadersCount'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
</label>
	</td>
</tr>
<tr valign="top">
	<td><input type="radio" id="allAuthors" name="whichUsers" value="allAuthors"/></td>
	<td class="label">
		<label for="allAuthors"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.notifyUsers.allAuthors",'count' => ((is_array($_tmp=@$this->_tpl_vars['allAuthorsCount'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
</label>
	</td>
</tr>
<tr valign="top">
	<td><input type="radio" id="allRegistrants" name="whichUsers" value="allRegistrants"/></td>
	<td class="label">
		<label for="allRegistrants"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.notifyUsers.allRegistrants",'count' => ((is_array($_tmp=@$this->_tpl_vars['allRegistrantsCount'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
</label>
	</td>
</tr>
<tr valign="top">
	<td><input type="radio" id="allPaidRegistrants" name="whichUsers" value="allPaidRegistrants"/></td>
	<td class="label">
		<label for="allPaidRegistrants"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.notifyUsers.allPaidRegistrants",'count' => ((is_array($_tmp=@$this->_tpl_vars['allPaidRegistrantsCount'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
</label>
	</td>
</tr>
<?php if ($this->_tpl_vars['senderEmail']): ?>
	<tr valign="top">
		<td><input type="checkbox" name="bccSender" value="1"<?php if ($this->_tpl_vars['bccSender']): ?> checked<?php endif; ?>/></td>
		<td class="label">
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "email.bccSender",'address' => ((is_array($_tmp=$this->_tpl_vars['senderEmail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp))), $this);?>

		</td>
	</tr>
<?php endif; ?>
<tr valign="top">
	<td><input type="checkbox" name="includeToc" id="includeToc" value="1"/></td>
	<td class="label">
		<label for="includeToc"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.notifyUsers.includeToc"), $this);?>
</label>
	</td>
</tr>
</table>

<br/>

<table id="emailBody" class="data" width="100%">
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "email.from"), $this);?>
</td>
	<td class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['from'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
</tr>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'subject','key' => "email.subject"), $this);?>
</td>
	<td width="80%" class="value"><input type="text" id="subject" name="subject" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['subject'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="60" maxlength="120" class="textField" /></td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'body','key' => "email.body"), $this);?>
</td>
	<td class="value"><textarea name="body" cols="60" rows="15" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['body'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
</tr>
</table>

<p><input name="send" type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "email.send"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="history.go(-1)" /></p>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>