<?php /* Smarty version 2.6.26, created on 2013-11-01 10:46:51
         compiled from file:/home/sicesi/eventos/plugins/importexport/native/paperContext.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'file:/home/sicesi/eventos/plugins/importexport/native/paperContext.tpl', 16, false),array('function', 'plugin_url', 'file:/home/sicesi/eventos/plugins/importexport/native/paperContext.tpl', 18, false),array('function', 'html_options', 'file:/home/sicesi/eventos/plugins/importexport/native/paperContext.tpl', 22, false),array('modifier', 'escape', 'file:/home/sicesi/eventos/plugins/importexport/native/paperContext.tpl', 19, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "plugins.importexport.native.import.papers"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.importexport.native.import.papers.description"), $this);?>
</p>

<form action="<?php echo $this->_plugins['function']['plugin_url'][0][0]->smartyPluginUrl(array('path' => 'import'), $this);?>
" method="post">
<input type="hidden" name="temporaryFileId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['temporaryFileId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>

<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "track.track"), $this);?>
&nbsp;&nbsp;
<select name="trackId" id="trackId" size="1" class="selectMenu"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['trackOptions'],'selected' => $this->_tpl_vars['trackId']), $this);?>
</select>

<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.import"), $this);?>
" class="button defaultButton"/></p>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>