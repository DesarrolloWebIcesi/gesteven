<?php /* Smarty version 2.6.26, created on 2013-10-31 11:47:33
         compiled from search/authorDetails.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'search/authorDetails.tpl', 16, false),array('modifier', 'strip_unsafe_html', 'search/authorDetails.tpl', 30, false),array('modifier', 'to_array', 'search/authorDetails.tpl', 33, false),array('function', 'url', 'search/authorDetails.tpl', 29, false),array('function', 'translate', 'search/authorDetails.tpl', 31, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "search.authorDetails"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>

<div id="authorDetails">
<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['lastName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
, <?php echo ((is_array($_tmp=$this->_tpl_vars['firstName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php if ($this->_tpl_vars['middleName']): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['middleName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?><?php if ($this->_tpl_vars['affiliation']): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['affiliation'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?><?php if ($this->_tpl_vars['country']): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['country'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?></h3>
<ul>
<?php $_from = $this->_tpl_vars['publishedPapers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['paper']):
?>
	<?php $this->assign('schedConfId', $this->_tpl_vars['paper']->getSchedConfId()); ?>
	<?php $this->assign('schedConf', $this->_tpl_vars['schedConfs'][$this->_tpl_vars['schedConfId']]); ?>
	<?php $this->assign('schedConfUnavailable', $this->_tpl_vars['schedConfsUnavailable'][$this->_tpl_vars['schedConfId']]); ?>
	<?php $this->assign('conferenceId', $this->_tpl_vars['schedConf']->getConferenceId()); ?>
	<?php $this->assign('conference', $this->_tpl_vars['conferences'][$this->_tpl_vars['conferenceId']]); ?>
	<?php $this->assign('trackId', $this->_tpl_vars['paper']->getTrackId()); ?>
	<?php $this->assign('track', $this->_tpl_vars['tracks'][$this->_tpl_vars['trackId']]); ?>
	<?php if (! $this->_tpl_vars['schedConfUnavailable']): ?>
	<li>

		<em><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('conference' => $this->_tpl_vars['conference']->getPath(),'schedConf' => $this->_tpl_vars['schedConf']->getPath()), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['schedConf']->getFullTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a> - <?php echo ((is_array($_tmp=$this->_tpl_vars['track']->getLocalizedTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</em><br />
		<?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
<br/>
		<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('conference' => $this->_tpl_vars['conference']->getPath(),'schedConf' => $this->_tpl_vars['schedConf']->getPath(),'page' => 'paper','op' => 'view','path' => $this->_tpl_vars['paper']->getBestPaperId()), $this);?>
" class="file"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.abstract"), $this);?>
</a>
		<?php $_from = $this->_tpl_vars['paper']->getLocalizedGalleys(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['galleyList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['galleyList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['galley']):
        $this->_foreach['galleyList']['iteration']++;
?>
			&nbsp;<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('conference' => $this->_tpl_vars['conference']->getPath(),'schedConf' => $this->_tpl_vars['schedConf']->getPath(),'page' => 'paper','op' => 'view','path' => ((is_array($_tmp=$this->_tpl_vars['paper']->getBestPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['galley']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['galley']->getId()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['galley']->getGalleyLabel())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>
		<?php endforeach; endif; unset($_from); ?>
	</li>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>