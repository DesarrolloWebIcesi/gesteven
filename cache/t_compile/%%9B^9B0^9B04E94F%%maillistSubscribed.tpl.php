<?php /* Smarty version 2.6.26, created on 2013-11-14 12:17:42
         compiled from notification/maillistSubscribed.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'notification/maillistSubscribed.tpl', 17, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "notification.mailList"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php if ($this->_tpl_vars['status'] == 'subscribeError'): ?>
	<ul>
		<li><span class="formError"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "notification.subscribeError"), $this);?>
</span></li>
	<ul>
<?php elseif ($this->_tpl_vars['status'] == 'subscribeSuccess'): ?>
	<ul>
		<li><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "notification.subscribeSuccess"), $this);?>
</li>
	</ul>
<?php elseif ($this->_tpl_vars['status'] == 'confirmError'): ?>
	<ul>
		<li><span class="formError"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "notification.confirmError"), $this);?>
</span></li>
	<ul>
<?php elseif ($this->_tpl_vars['status'] == 'confirmSuccess'): ?>
	<ul>
		<li><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "notification.confirmSuccess"), $this);?>
</li>
	</ul>
<?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>