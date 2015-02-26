<?php /* Smarty version 2.6.26, created on 2013-11-11 06:30:16
         compiled from schedConf/program.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'schedConf/program.tpl', 12, false),array('modifier', 'assign', 'schedConf/program.tpl', 12, false),array('modifier', 'escape', 'schedConf/program.tpl', 20, false),array('modifier', 'nl2br', 'schedConf/program.tpl', 28, false),)), $this); ?>
<?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.program.title"), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'pageTitleTranslated') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'pageTitleTranslated'));?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php if ($this->_tpl_vars['programFile']): ?>
	<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.program.programFileInstructions"), $this);?>
</span>
	<div>
		<a class="file" href="<?php echo $this->_tpl_vars['publicSchedConfFilesDir']; ?>
/<?php echo $this->_tpl_vars['programFile']['uploadName']; ?>
" target="_blank">
			<?php if ($this->_tpl_vars['programFileTitle']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['programFileTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>

			<?php else: ?><?php echo $this->_tpl_vars['programFile']['name']; ?>
<?php endif; ?></a>
	</div>

<div class="separator"></div>
<?php endif; ?>


<div><?php echo ((is_array($_tmp=$this->_tpl_vars['program'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>