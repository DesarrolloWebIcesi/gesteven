<?php /* Smarty version 2.6.26, created on 2013-10-31 14:03:32
         compiled from paper/accessDenied.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_unsafe_html', 'paper/accessDenied.tpl', 17, false),array('modifier', 'escape', 'paper/accessDenied.tpl', 18, false),array('function', 'translate', 'paper/accessDenied.tpl', 21, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "schedConf.presentations.short"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<div id="accessDenied">
<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
</h3>
<div><em><?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getAuthorString())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</em></div>
<br />

<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reader.accessDenied"), $this);?>
</p>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>