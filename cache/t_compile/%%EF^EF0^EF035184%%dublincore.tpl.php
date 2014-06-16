<?php /* Smarty version 2.6.26, created on 2013-10-31 15:42:51
         compiled from paper/dublincore.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'String_substr', 'paper/dublincore.tpl', 15, false),array('modifier', 'escape', 'paper/dublincore.tpl', 15, false),array('modifier', 'strip_tags', 'paper/dublincore.tpl', 15, false),array('modifier', 'explode', 'paper/dublincore.tpl', 26, false),array('modifier', 'date_format', 'paper/dublincore.tpl', 30, false),array('function', 'url', 'paper/dublincore.tpl', 48, false),)), $this); ?>
<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />

<?php if ($this->_tpl_vars['paper']->getSponsor(null)): ?><?php $_from = $this->_tpl_vars['paper']->getSponsor(null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['metaLocale'] => $this->_tpl_vars['metaValue']):
?>
	<meta name="DC.Contributor.Sponsor" xml:lang="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['metaLocale'])) ? $this->_run_mod_handler('String_substr', true, $_tmp, 0, 2) : String::substr($_tmp, 0, 2)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['metaValue'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php endforeach; endif; unset($_from); ?><?php endif; ?>
<?php if ($this->_tpl_vars['paper']->getCoverageSample(null)): ?><?php $_from = $this->_tpl_vars['paper']->getCoverageSample(null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['metaLocale'] => $this->_tpl_vars['metaValue']):
?>
	<meta name="DC.Coverage" xml:lang="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['metaLocale'])) ? $this->_run_mod_handler('String_substr', true, $_tmp, 0, 2) : String::substr($_tmp, 0, 2)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['metaValue'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php endforeach; endif; unset($_from); ?><?php endif; ?>
<?php if ($this->_tpl_vars['paper']->getCoverageGeo(null)): ?><?php $_from = $this->_tpl_vars['paper']->getCoverageGeo(null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['metaLocale'] => $this->_tpl_vars['metaValue']):
?>
	<meta name="DC.Coverage.spatial" xml:lang="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['metaLocale'])) ? $this->_run_mod_handler('String_substr', true, $_tmp, 0, 2) : String::substr($_tmp, 0, 2)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['metaValue'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php endforeach; endif; unset($_from); ?><?php endif; ?>
<?php if ($this->_tpl_vars['paper']->getCoverageChron(null)): ?><?php $_from = $this->_tpl_vars['paper']->getCoverageChron(null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['metaLocale'] => $this->_tpl_vars['metaValue']):
?>
	<meta name="DC.Coverage.temporal" xml:lang="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['metaLocale'])) ? $this->_run_mod_handler('String_substr', true, $_tmp, 0, 2) : String::substr($_tmp, 0, 2)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['metaValue'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php endforeach; endif; unset($_from); ?><?php endif; ?>
<?php $_from = ((is_array($_tmp=$this->_tpl_vars['paper']->getAuthorString())) ? $this->_run_mod_handler('explode', true, $_tmp, ", ") : $this->_plugins['modifier']['explode'][0][0]->smartyExplode($_tmp, ", ")); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dc_author']):
?>
	<meta name="DC.Creator.PersonalName" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['dc_author'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['currentSchedConf']->getSetting('delayOpenAccessDate')): ?>
	<meta name="DC.Date.available" scheme="ISO8601" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['currentSchedConf']->getSetting('delayOpenAccessDate'))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
"/>
<?php endif; ?>
	<meta name="DC.Date.created" scheme="ISO8601" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getDatePublished())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
"/>
	<meta name="DC.Date.dateSubmitted" scheme="ISO8601" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
"/>
	<meta name="DC.Date.modified" scheme="ISO8601" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getDateStatusModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
"/>
<?php if ($this->_tpl_vars['paper']->getAbstract(null)): ?><?php $_from = $this->_tpl_vars['paper']->getAbstract(null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['metaLocale'] => $this->_tpl_vars['metaValue']):
?>
	<meta name="DC.Description" xml:lang="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['metaLocale'])) ? $this->_run_mod_handler('String_substr', true, $_tmp, 0, 2) : String::substr($_tmp, 0, 2)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['metaValue'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php endforeach; endif; unset($_from); ?><?php endif; ?>
<?php $_from = $this->_tpl_vars['paper']->getGalleys(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dcGalley']):
?>
	<meta name="DC.Format" scheme="IMT" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['dcGalley']->getFileType())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>		
<?php endforeach; endif; unset($_from); ?>
	<meta name="DC.Identifier" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getBestPaperId($this->_tpl_vars['currentConference']))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php if ($this->_tpl_vars['paper']->getPages()): ?>
	<meta name="DC.Identifier.pageNumber" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getPages())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php endif; ?>
	<meta name="DC.Identifier.URI" content="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'paper','op' => 'view','path' => $this->_tpl_vars['paper']->getBestPaperId($this->_tpl_vars['currentConference'])), $this);?>
"/>
	<meta name="DC.Language" scheme="ISO639-1" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['paper']->getLanguage())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php if ($this->_tpl_vars['currentConference']->getLocalizedSetting('copyrightNotice')): ?>
	<meta name="DC.Rights" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currentConference']->getLocalizedSetting('copyrightNotice'))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php endif; ?>
	<meta name="DC.Source" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currentSchedConf']->getFullTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
	<meta name="DC.Source.URI" content="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => ((is_array($_tmp=((is_array($_tmp='index')) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp))), $this);?>
"/>
<?php if ($this->_tpl_vars['paper']->getSubject(null)): ?><?php $_from = $this->_tpl_vars['paper']->getSubject(null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['metaLocale'] => $this->_tpl_vars['metaValue']):
?>
	<?php $_from = ((is_array($_tmp=$this->_tpl_vars['metaValue'])) ? $this->_run_mod_handler('explode', true, $_tmp, "; ") : $this->_plugins['modifier']['explode'][0][0]->smartyExplode($_tmp, "; ")); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dcSubject']):
?>
		<?php if ($this->_tpl_vars['dcSubject']): ?>
			<meta name="DC.Subject" xml:lang="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['metaLocale'])) ? $this->_run_mod_handler('String_substr', true, $_tmp, 0, 2) : String::substr($_tmp, 0, 2)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['dcSubject'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?><?php endif; ?>
	<meta name="DC.Title" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['paper']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php $_from = $this->_tpl_vars['paper']->getTitle(null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['metaLocale'] => $this->_tpl_vars['alternate']):
?>
	<?php if ($this->_tpl_vars['alternate'] != $this->_tpl_vars['paper']->getLocalizedTitle()): ?>
		<meta name="DC.Title.Alternative" xml:lang="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['metaLocale'])) ? $this->_run_mod_handler('String_substr', true, $_tmp, 0, 2) : String::substr($_tmp, 0, 2)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['alternate'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
	<meta name="DC.Type" content="Text.Proceedings"/>
	<meta name="DC.Type.paperType" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['paper']->getTrackTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>	