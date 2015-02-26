<?php /* Smarty version 2.6.26, created on 2013-10-31 15:38:52
         compiled from search/schedConfIndex.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'search/schedConfIndex.tpl', 20, false),array('modifier', 'escape', 'search/schedConfIndex.tpl', 20, false),array('modifier', 'nl2br', 'search/schedConfIndex.tpl', 23, false),array('modifier', 'date_format', 'search/schedConfIndex.tpl', 31, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "search.titleIndex"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<br />

<?php $_from = $this->_tpl_vars['conferenceIndex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['conferenceId'] => $this->_tpl_vars['conference']):
?>
	<div id="conference">
	<h3><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('conference' => $this->_tpl_vars['conference']->getPath(),'page' => 'index'), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['conference']->getConferenceTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></h3>
	<?php $this->assign('description', $this->_tpl_vars['conference']->getLocalizedSetting('description')); ?>
	<?php if (! empty ( $this->_tpl_vars['description'] )): ?>
		<p><?php echo ((is_array($_tmp=$this->_tpl_vars['description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['schedConfIndex'][$this->_tpl_vars['conferenceId']] )): ?>
		<ul>
			<?php $_from = $this->_tpl_vars['schedConfIndex'][$this->_tpl_vars['conferenceId']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['schedConf']):
?>
				<?php $this->assign('introduction', $this->_tpl_vars['schedConf']->getLocalizedSetting('introduction')); ?>
				<li>
					<h4><?php echo ((is_array($_tmp=$this->_tpl_vars['schedConf']->getSchedConfTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</h4>
					<?php if ($this->_tpl_vars['schedConf']->getSetting('startDate')): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['schedConf']->getSetting('startDate'))) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
 &ndash; <?php echo ((is_array($_tmp=$this->_tpl_vars['schedConf']->getSetting('endDate'))) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
<?php endif; ?>
					<?php if (! empty ( $this->_tpl_vars['introduction'] )): ?>
						<p><?php echo ((is_array($_tmp=$this->_tpl_vars['introduction'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
					<?php endif; ?>
				</li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	<?php endif; ?>
	</div>
<?php endforeach; endif; unset($_from); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>