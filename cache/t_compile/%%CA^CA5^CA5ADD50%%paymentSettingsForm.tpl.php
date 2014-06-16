<?php /* Smarty version 2.6.26, created on 2014-01-26 18:05:31
         compiled from manager/paymentSettingsForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'manager/paymentSettingsForm.tpl', 23, false),array('function', 'translate', 'manager/paymentSettingsForm.tpl', 33, false),array('function', 'call_hook', 'manager/paymentSettingsForm.tpl', 48, false),array('modifier', 'escape', 'manager/paymentSettingsForm.tpl', 23, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "manager.payment.paymentSettings"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
<!--
<?php echo '
$(document).ready(function() {
	$(\'.paymentOption\').click(function() {
		$("#paymentSettingsForm").attr("action","'; ?>
<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'paymentSettings','escape' => false), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript'));?>
<?php echo '");
		$("#paymentSettingsForm").submit();
	});
});
'; ?>

// -->
</script>

<form method="post" id="paymentSettingsForm" name="paymentSettingsForm" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'savePaymentSettings'), $this);?>
">

<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.payment.form.description"), $this);?>
</p>


<table width="100%" class="data">
	<tr valign="top">
		<td class="data" colspan="2">
			<?php $this->assign('pluginIndex', 1); ?>
			<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.payment.form.method"), $this);?>
</h4>
			<?php $_from = $this->_tpl_vars['paymentMethodPlugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plugin']):
?>
				&nbsp;<input type="radio" class="paymentOption" name="paymentMethodPluginName" id="paymentMethodPluginName-<?php echo ((is_array($_tmp=$this->_tpl_vars['pluginIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']->getName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" <?php if ($this->_tpl_vars['paymentMethodPluginName'] == $this->_tpl_vars['plugin']->getName()): ?>checked="checked" <?php endif; ?>/>&nbsp;<label for="paymentMethodPluginName-<?php echo ((is_array($_tmp=$this->_tpl_vars['pluginIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</label><br/>
				<p><?php echo $this->_tpl_vars['plugin']->getDescription(); ?>
</p>
				<?php $this->assign('pluginIndex', $this->_tpl_vars['pluginIndex']+1); ?>
			<?php endforeach; endif; unset($_from); ?>
		</td>
	</tr>
	<?php echo $this->_plugins['function']['call_hook'][0][0]->smartyCallHook(array('name' => "Template::Manager::Payment::displayPaymentSettingsForm",'plugin' => $this->_tpl_vars['paymentMethodPluginName']), $this);?>

</table>

<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'manager'), $this);?>
'" /></p>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>

</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>