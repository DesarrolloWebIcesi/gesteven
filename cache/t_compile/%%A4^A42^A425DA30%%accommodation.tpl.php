<?php /* Smarty version 2.6.26, created on 2013-10-31 16:32:25
         compiled from schedConf/accommodation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'schedConf/accommodation.tpl', 12, false),array('modifier', 'assign', 'schedConf/accommodation.tpl', 12, false),array('modifier', 'nl2br', 'schedConf/accommodation.tpl', 16, false),array('modifier', 'default', 'schedConf/accommodation.tpl', 24, false),array('modifier', 'escape', 'schedConf/accommodation.tpl', 24, false),)), $this); ?>
<?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.accommodation.title"), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'pageTitleTranslated') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'pageTitleTranslated'));?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<div id="accomodationDescription"><?php echo ((is_array($_tmp=$this->_tpl_vars['accommodationDescription'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>

<?php if (! empty ( $this->_tpl_vars['accommodationFiles'] )): ?>
	<div class="separator"></div>
<?php endif; ?>
<div id="accommodationFiles">
<?php $_from = $this->_tpl_vars['accommodationFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['accommodationFile']):
?>
	<div>
		<a class="file" href="<?php echo $this->_tpl_vars['publicSchedConfFilesDir']; ?>
/<?php echo $this->_tpl_vars['accommodationFile']['uploadName']; ?>
" target="_blank"><?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['accommodationFile']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['accommodationFile']['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['accommodationFile']['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>
	</div>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>