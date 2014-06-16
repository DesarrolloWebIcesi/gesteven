<?php /* Smarty version 2.6.26, created on 2014-01-26 18:05:39
         compiled from file:/home/sicesi/eventos/plugins/paymethod/paypal/templates/settingsForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'file:/home/sicesi/eventos/plugins/paymethod/paypal/templates/settingsForm.tpl', 11, false),array('function', 'fieldLabel', 'file:/home/sicesi/eventos/plugins/paymethod/paypal/templates/settingsForm.tpl', 14, false),array('modifier', 'escape', 'file:/home/sicesi/eventos/plugins/paymethod/paypal/templates/settingsForm.tpl', 16, false),)), $this); ?>
	<tr>
		<td colspan="2"><h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.paymethod.paypal.settings"), $this);?>
</td>
	</tr>
	<tr valign="top">
		<td class="label" width="20%"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'paypalurl','required' => 'true','key' => "plugins.paymethod.paypal.settings.paypalurl"), $this);?>
</td>
		<td class="value" width="80%">
			<input type="text" class="textField" name="paypalurl" id="paypalurl" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['paypalurl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" /><br/>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.paymethod.paypal.settings.paypalurl.description"), $this);?>
<br/>
			&nbsp;
		</td>
	</tr>
	<tr valign="top">
		<td class="label" width="20%"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'selleraccount','required' => 'true','key' => "plugins.paymethod.paypal.settings.selleraccount"), $this);?>
</td>
		<td class="value" width="80%">
			<input type="text" class="textField" name="selleraccount" id="selleraccount" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['selleraccount'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" /><br/>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.paymethod.paypal.settings.selleraccount.description"), $this);?>

		</td>
	</tr>
	<?php if (! $this->_tpl_vars['isCurlInstalled']): ?>
		<tr>
			<td colspan="2">
				<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.paymethod.paypal.settings.curlNotInstalled"), $this);?>
</span>
			</td>
		</tr>
	<?php endif; ?>