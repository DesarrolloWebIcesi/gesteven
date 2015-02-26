<?php /* Smarty version 2.6.26, created on 2013-11-01 18:53:22
         compiled from registration/selectRegistrationType.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'registration/selectRegistrationType.tpl', 14, false),array('function', 'translate', 'registration/selectRegistrationType.tpl', 21, false),array('function', 'mailto', 'registration/selectRegistrationType.tpl', 85, false),array('block', 'iterate', 'registration/selectRegistrationType.tpl', 28, false),array('modifier', 'escape', 'registration/selectRegistrationType.tpl', 33, false),array('modifier', 'string_format', 'registration/selectRegistrationType.tpl', 39, false),array('modifier', 'date_format', 'registration/selectRegistrationType.tpl', 40, false),array('modifier', 'nl2br', 'registration/selectRegistrationType.tpl', 55, false),)), $this); ?>
<?php $this->assign('pageTitle', "schedConf.registration"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'registration'), $this);?>
" method="post">
<div id="registrationType">
<table class="listing" width="100%">
	<tr>
		<td colspan="2" class="headseparator">&nbsp;</td>
	</tr>
	<tr valign="top" class="heading">
		<td width="60%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.registration.type"), $this);?>
</td>
		<td width="60%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.registration.cost"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="2" class="headseparator">&nbsp;</td>
	</tr>
	<?php $this->assign('isFirstRegistrationType', true); ?>
	<?php $this->_tag_stack[] = array('iterate', array('from' => 'registrationTypes','item' => 'registrationType')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<?php $this->assign('typeId', $this->_tpl_vars['registrationType']->getTypeId()); ?>
	<?php if ($this->_tpl_vars['registrationType']->getPublic()): ?>
		<tr valign="top">
			<td class="label">
				<strong><?php echo ((is_array($_tmp=$this->_tpl_vars['registrationType']->getRegistrationTypeName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</strong>
			</td>
			<td class="data">
				<?php if (strtotime ( $this->_tpl_vars['registrationType']->getOpeningDate() ) < time ( ) && strtotime ( $this->_tpl_vars['registrationType']->getClosingDate() ) > time ( )): ?>
					<?php $this->assign('registrationMethodAvailable', 1); ?>
					<input id="registrationType-<?php echo ((is_array($_tmp=$this->_tpl_vars['typeId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" type="radio" <?php if ($this->_tpl_vars['isFirstRegistrationType']): ?>checked="checked" <?php endif; ?>name="registrationTypeId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['typeId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
					<label for="registrationType-<?php echo ((is_array($_tmp=$this->_tpl_vars['typeId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"> <?php echo ((is_array($_tmp=$this->_tpl_vars['registrationType']->getCost())) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['registrationType']->getCurrencyCodeAlpha())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</label>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.registration.typeCloses",'closingDate' => ((is_array($_tmp=$this->_tpl_vars['registrationType']->getClosingDate())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort']))), $this);?>

					<?php $this->assign('isFirstRegistrationType', false); ?>
				<?php elseif (strtotime ( $this->_tpl_vars['registrationType']->getOpeningDate() ) > time ( )): ?>
					<input type="radio" name="registrationTypeId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['typeId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" disabled="disabled" />
					<?php echo ((is_array($_tmp=$this->_tpl_vars['registrationType']->getCost())) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['registrationType']->getCurrencyCodeAlpha())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>

					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.registration.typeFuture",'openingDate' => ((is_array($_tmp=$this->_tpl_vars['registrationType']->getOpeningDate())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort']))), $this);?>

				<?php else: ?>
					<input type="radio" name="registrationTypeId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['typeId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" disabled="disabled" />
					<?php echo ((is_array($_tmp=$this->_tpl_vars['registrationType']->getCost())) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['registrationType']->getCurrencyCodeAlpha())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>

					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.registration.typeClosed",'closingDate' => ((is_array($_tmp=$this->_tpl_vars['registrationType']->getClosingDate())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort']))), $this);?>

				<?php endif; ?>
			</td>
		</tr>
		<?php if ($this->_tpl_vars['registrationType']->getRegistrationTypeDescription()): ?>
			<tr valign="top">
				<td colspan="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['registrationType']->getRegistrationTypeDescription())) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
			</tr>
		<?php endif; ?>
		<tr valign="top">
			<td colspan="2">&nbsp;</td>
		</tr>
	<?php endif; ?>
	<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
	<?php if ($this->_tpl_vars['registrationTypes']->wasEmpty()): ?>
		<tr>
			<td colspan="2" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.registrationTypes.noneAvailable"), $this);?>
</td>
		</tr>
	<?php endif; ?>
	<tr>
		<td colspan="2" class="endseparator">&nbsp;</td>
	</tr>
</table>
</div>
<?php if ($this->_tpl_vars['currentSchedConf']->getSetting('registrationName')): ?>

<div id="registrationContact">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.registrationPolicies.registrationContact"), $this);?>
</h3>

<table class="data" width="100%">
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.name"), $this);?>
</td>
		<td width="80%" class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['currentSchedConf']->getSetting('registrationName'))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
	</tr>
	<?php if ($this->_tpl_vars['currentSchedConf']->getSetting('registrationEmail')): ?><tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.email"), $this);?>
</td>
		<td class="value"><?php echo smarty_function_mailto(array('address' => ((is_array($_tmp=$this->_tpl_vars['currentSchedConf']->getSetting('registrationEmail'))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)),'encode' => 'hex'), $this);?>
</td>
	</tr><?php endif; ?>
	<?php if ($this->_tpl_vars['currentSchedConf']->getSetting('registrationPhone')): ?><tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.phone"), $this);?>
</td>
		<td class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['currentSchedConf']->getSetting('registrationPhone'))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
	</tr><?php endif; ?>
	<?php if ($this->_tpl_vars['currentSchedConf']->getSetting('registrationFax')): ?><tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.fax"), $this);?>
</td>
		<td class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['currentSchedConf']->getSetting('registrationFax'))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
	</tr><?php endif; ?>
	<?php if ($this->_tpl_vars['currentSchedConf']->getSetting('registrationMailingAddress')): ?><tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.mailingAddress"), $this);?>
</td>
		<td class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['currentSchedConf']->getSetting('registrationMailingAddress'))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
	</tr><?php endif; ?>
</table>
</div>
<?php endif; ?>
<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.registration.register"), $this);?>
" <?php if (! $this->_tpl_vars['registrationMethodAvailable']): ?>disabled="disabled" class="button" <?php else: ?>class="button defaultButton" <?php endif; ?>/></p>

</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>