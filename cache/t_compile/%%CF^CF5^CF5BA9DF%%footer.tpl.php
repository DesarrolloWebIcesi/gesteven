<?php /* Smarty version 2.6.26, created on 2013-10-31 11:42:40
         compiled from core:common/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'core:common/footer.tpl', 11, false),array('function', 'call_hook', 'core:common/footer.tpl', 17, false),array('function', 'get_debug_info', 'core:common/footer.tpl', 22, false),array('modifier', 'date_format', 'core:common/footer.tpl', 25, false),)), $this); ?>
<?php if ($this->_tpl_vars['displayCreativeCommons']): ?>
<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.ccLicense"), $this);?>

<?php endif; ?>
<?php if ($this->_tpl_vars['pageFooter']): ?>
<br /><br />
<?php echo $this->_tpl_vars['pageFooter']; ?>

<?php endif; ?>
<?php echo $this->_plugins['function']['call_hook'][0][0]->smartyCallHook(array('name' => "Templates::Common::Footer::PageFooter"), $this);?>

</div><!-- content -->
</div><!-- main -->
</div><!-- body -->

<?php echo $this->_plugins['function']['get_debug_info'][0][0]->smartyGetDebugInfo(array(), $this);?>

<?php if ($this->_tpl_vars['enableDebugStats']): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['pqpTemplate'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>
<div id="footer_bottom">
<a title="Universidad Icesi" target="_blank" href="http://www.icesi.edu.co">Universidad Icesi</a> Calle 18 No. 122 - 135 Pance - Santiago de Cali | PBX 57(2) 555 2334 Fax 555 1441 <br> Copyright &copy; <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 <a title="Universidad Icesi" href="http://www.icesi.edu.co/">www.icesi.edu.co </a>- <a title="Pol&iacute;tica de privacidad" href="http://www.icesi.edu.co/politica_privacidad.php">Pol&iacute;tica de privacidad</a>
</div>
</div><!-- container -->
</body>
</html>