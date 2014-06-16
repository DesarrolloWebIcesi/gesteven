<?php /* Smarty version 2.6.26, created on 2013-10-31 20:06:52
         compiled from search/titleIndex.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'search/titleIndex.tpl', 26, false),array('modifier', 'strip_unsafe_html', 'search/titleIndex.tpl', 43, false),array('modifier', 'to_array', 'search/titleIndex.tpl', 49, false),array('function', 'translate', 'search/titleIndex.tpl', 28, false),array('function', 'url', 'search/titleIndex.tpl', 41, false),array('function', 'page_info', 'search/titleIndex.tpl', 70, false),array('function', 'page_links', 'search/titleIndex.tpl', 71, false),array('block', 'iterate', 'search/titleIndex.tpl', 34, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "search.titleIndex"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<br />

<?php if ($this->_tpl_vars['currentConference']): ?>
	<?php $this->assign('numCols', 3); ?>
<?php else: ?>
	<?php $this->assign('numCols', 4); ?>
<?php endif; ?>

<div id="results">
<table width="100%" class="listing">
<tr><td colspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['numCols'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" class="headseparator">&nbsp;</td></tr>
<tr class="heading" valign="bottom">
	<?php if (! $this->_tpl_vars['currentConference']): ?><td width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "conference.conference"), $this);?>
</td><?php endif; ?>
	<td width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.schedConf"), $this);?>
</td>
	<td width="<?php if (! $this->_tpl_vars['currentConference']): ?>60%<?php else: ?>80%<?php endif; ?>" colspan="2"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.title"), $this);?>
</td>
</tr>
<tr><td colspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['numCols'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" class="headseparator">&nbsp;</td></tr>

<?php $this->_tag_stack[] = array('iterate', array('from' => 'results','item' => 'result')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php $this->assign('publishedPaper', $this->_tpl_vars['result']['publishedPaper']); ?>
<?php $this->assign('paper', $this->_tpl_vars['result']['paper']); ?>
<?php $this->assign('track', $this->_tpl_vars['result']['track']); ?>
<?php $this->assign('schedConf', $this->_tpl_vars['result']['schedConf']); ?>
<?php $this->assign('conference', $this->_tpl_vars['result']['conference']); ?>
<tr valign="top">
	<?php if (! $this->_tpl_vars['currentConference']): ?><td><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('conference' => $this->_tpl_vars['conference']->getPath(),'schedConf' => 'index'), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['conference']->getConferenceTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></td><?php endif; ?>
	<td><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('conference' => $this->_tpl_vars['conference']->getPath(),'schedConf' => $this->_tpl_vars['schedConf']->getPath(),'page' => 'schedConf'), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['schedConf']->getSchedConfTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></td>
	<td width="35%"><?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
</td>
	<td width="25%" align="right">
			<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('conference' => $this->_tpl_vars['conference']->getPath(),'schedConf' => $this->_tpl_vars['schedConf']->getPath(),'page' => 'paper','op' => 'view','path' => $this->_tpl_vars['publishedPaper']->getBestPaperId($this->_tpl_vars['conference'])), $this);?>
" class="file"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.abstract"), $this);?>
</a>
		<?php if ($this->_tpl_vars['schedConfPaperPermissions'][$this->_tpl_vars['schedConfId']]): ?>
		<?php $_from = $this->_tpl_vars['publishedPaper']->getLocalizedGalleys(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['galleyList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['galleyList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['galley']):
        $this->_foreach['galleyList']['iteration']++;
?>
			&nbsp;
			<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('conference' => $this->_tpl_vars['conference']->getPath(),'schedConf' => $this->_tpl_vars['schedConf']->getPath(),'page' => 'paper','op' => 'view','path' => ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getBestPaperId($this->_tpl_vars['conference']))) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['galley']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['galley']->getId()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['galley']->getGalleyLabel())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>
		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	</td>
</tr>
<tr>
	<td colspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['numCols'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" style="padding-left: 30px;font-style: italic;">
		<?php $_from = $this->_tpl_vars['paper']->getAuthors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['authorList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['authorList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['author']):
        $this->_foreach['authorList']['iteration']++;
?>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php if (! ($this->_foreach['authorList']['iteration'] == $this->_foreach['authorList']['total'])): ?>,<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</td>
</tr>
<tr><td colspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['numCols'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" class="<?php if ($this->_tpl_vars['results']->eof()): ?>end<?php endif; ?>separator">&nbsp;</td></tr>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php if ($this->_tpl_vars['results']->wasEmpty()): ?>
<tr>
<td colspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['numCols'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.noResults"), $this);?>
</td>
</tr>
<tr><td colspan="<?php echo ((is_array($_tmp=$this->_tpl_vars['numCols'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" class="endseparator">&nbsp;</td></tr>
<?php else: ?>
	<tr>
		<td <?php if (! $this->_tpl_vars['currentConference']): ?>colspan="2" <?php endif; ?>align="left"><?php echo $this->_plugins['function']['page_info'][0][0]->smartyPageInfo(array('iterator' => $this->_tpl_vars['results']), $this);?>
</td>
		<td colspan="2" align="right"><?php echo $this->_plugins['function']['page_links'][0][0]->smartyPageLinks(array('anchor' => 'results','iterator' => $this->_tpl_vars['results'],'name' => 'search'), $this);?>
</td>
	</tr>
<?php endif; ?>
</table>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>