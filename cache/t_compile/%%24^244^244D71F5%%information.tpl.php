<?php /* Smarty version 2.6.26, created on 2013-10-31 12:52:18
         compiled from information/information.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'information/information.tpl', 16, false),array('modifier', 'nl2br', 'information/information.tpl', 17, false),)), $this); ?>
<?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php if (! empty ( $this->_tpl_vars['conferenceContent'] )): ?>
	<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['conferenceTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</h2>
	<p><?php echo ((is_array($_tmp=$this->_tpl_vars['conferenceContent'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['schedConfContent'] )): ?>
	<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['schedConfTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</h2>
	<p><?php echo ((is_array($_tmp=$this->_tpl_vars['schedConfContent'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>