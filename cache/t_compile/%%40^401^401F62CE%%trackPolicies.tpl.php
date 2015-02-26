<?php /* Smarty version 2.6.26, created on 2013-11-01 11:49:47
         compiled from schedConf/trackPolicies.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'schedConf/trackPolicies.tpl', 15, false),array('function', 'icon', 'schedConf/trackPolicies.tpl', 42, false),array('modifier', 'assign', 'schedConf/trackPolicies.tpl', 15, false),array('modifier', 'escape', 'schedConf/trackPolicies.tpl', 20, false),array('modifier', 'nl2br', 'schedConf/trackPolicies.tpl', 23, false),)), $this); ?>
<?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.trackPolicies.title"), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'pageTitleTranslated') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'pageTitleTranslated'));?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php $_from = $this->_tpl_vars['tracks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trackKey'] => $this->_tpl_vars['track']):
?><?php if (! $this->_tpl_vars['track']->getHideAbout()): ?>
	<div id="track<?php echo ((is_array($_tmp=$this->_tpl_vars['trackKey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
">
	<h4><?php echo $this->_tpl_vars['track']->getLocalizedTitle(); ?>
</h4>
	<?php if (strlen ( $this->_tpl_vars['track']->getLocalizedPolicy() ) > 0): ?>
		<p><?php echo ((is_array($_tmp=$this->_tpl_vars['track']->getLocalizedPolicy())) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
	<?php endif; ?>

	<?php $this->assign('hasDirectors', 0); ?>
	<?php $_from = $this->_tpl_vars['trackDirectors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['trackTrackDirectors']):
?>
		<?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['track']->getId()): ?>
			<?php $_from = $this->_tpl_vars['trackTrackDirectors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trackDirector']):
?>
				<?php if (0 == $this->_tpl_vars['hasDirectors']++): ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.directors"), $this);?>

				<ul class="plain">
				<?php endif; ?>
				<li><?php echo ((is_array($_tmp=$this->_tpl_vars['trackDirector']->getFirstName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['trackDirector']->getLastName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php if (strlen ( $this->_tpl_vars['trackDirector']->getAffiliation() ) > 0): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['trackDirector']->getAffiliation())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?></li>
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php if ($this->_tpl_vars['hasDirectors']): ?></ul><?php endif; ?>

	<table class="plain" width="50%">
		<tr>
			<td width="50%"><?php if (! $this->_tpl_vars['track']->getDirectorRestricted()): ?><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'checked'), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'unchecked'), $this);?>
<?php endif; ?> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.tracks.open"), $this);?>
</td>
			<td width="50%"><?php if ($this->_tpl_vars['track']->getMetaReviewed()): ?><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'checked'), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'unchecked'), $this);?>
<?php endif; ?> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.tracks.peerReviewed"), $this);?>
</td>
		</tr>
	</table>
</div><?php endif; ?><?php endforeach; endif; unset($_from); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>