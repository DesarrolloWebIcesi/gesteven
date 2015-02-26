<?php /* Smarty version 2.6.26, created on 2013-10-31 17:42:17
         compiled from about/contact.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'about/contact.tpl', 18, false),array('function', 'mailto', 'about/contact.tpl', 46, false),array('modifier', 'nl2br', 'about/contact.tpl', 19, false),array('modifier', 'escape', 'about/contact.tpl', 28, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "about.conferenceContact"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>

<div id="confContact">
<?php if (! empty ( $this->_tpl_vars['conferenceSettings']['mailingAddress'] )): ?>
<div id="mailingAddress">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.mailingAddress"), $this);?>
</h3>
<p><?php echo ((is_array($_tmp=$this->_tpl_vars['conferenceSettings']['mailingAddress'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
</div>
<?php endif; ?>

<?php if (! ( empty ( $this->_tpl_vars['conferenceSettings']['contactTitle'] ) && empty ( $this->_tpl_vars['conferenceSettings']['contactAffiliation'] ) && empty ( $this->_tpl_vars['conferenceSettings']['contactAffiliation'] ) && empty ( $this->_tpl_vars['conferenceSettings']['contactMailingAddress'] ) && empty ( $this->_tpl_vars['conferenceSettings']['contactPhone'] ) && empty ( $this->_tpl_vars['conferenceSettings']['contactFax'] ) && empty ( $this->_tpl_vars['conferenceSettings']['contactEmail'] ) )): ?>
<div id="principalContact">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.principalContact"), $this);?>
</h3>
<p>
	<?php if (! empty ( $this->_tpl_vars['conferenceSettings']['contactName'] )): ?>
		<strong><?php echo ((is_array($_tmp=$this->_tpl_vars['conferenceSettings']['contactName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</strong><br />
	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['conferenceSettings']['contactTitle'] )): ?>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['conferenceSettings']['contactTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br />
	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['conferenceSettings']['contactAffiliation'][$this->_tpl_vars['currentLocale']] )): ?>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['conferenceSettings']['contactAffiliation'][$this->_tpl_vars['currentLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br />
	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['conferenceSettings']['contactMailingAddress'] )): ?>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['conferenceSettings']['contactMailingAddress'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br />
	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['conferenceSettings']['contactPhone'] )): ?>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.phone"), $this);?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['conferenceSettings']['contactPhone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br />
	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['conferenceSettings']['contactFax'] )): ?>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.fax"), $this);?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['conferenceSettings']['contactFax'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br />
	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['conferenceSettings']['contactEmail'] )): ?>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.email"), $this);?>
: <?php echo smarty_function_mailto(array('address' => ((is_array($_tmp=$this->_tpl_vars['conferenceSettings']['contactEmail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)),'encode' => 'hex'), $this);?>
<br />
	<?php endif; ?>
</p>
</div>
<?php endif; ?>

<?php if (! ( empty ( $this->_tpl_vars['conferenceSettings']['supportName'] ) && empty ( $this->_tpl_vars['conferenceSettings']['supportPhone'] ) && empty ( $this->_tpl_vars['conferenceSettings']['supportEmail'] ) )): ?>
<div id="supportContact">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.supportContact"), $this);?>
</h3>
<p>
	<?php if (! empty ( $this->_tpl_vars['conferenceSettings']['supportName'] )): ?>
		<strong><?php echo ((is_array($_tmp=$this->_tpl_vars['conferenceSettings']['supportName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</strong><br />
	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['conferenceSettings']['supportPhone'] )): ?>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.phone"), $this);?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['conferenceSettings']['supportPhone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br />
	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['conferenceSettings']['supportEmail'] )): ?>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.email"), $this);?>
: <?php echo smarty_function_mailto(array('address' => ((is_array($_tmp=$this->_tpl_vars['conferenceSettings']['supportEmail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)),'encode' => 'hex'), $this);?>
<br />
	<?php endif; ?>
</p>
</div>
<?php endif; ?>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>