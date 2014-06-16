<?php /* Smarty version 2.6.26, created on 2013-10-31 15:42:51
         compiled from paper/googlescholar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'paper/googlescholar.tpl', 12, false),array('modifier', 'escape', 'paper/googlescholar.tpl', 12, false),array('modifier', 'date_format', 'paper/googlescholar.tpl', 20, false),array('modifier', 'to_array', 'paper/googlescholar.tpl', 24, false),array('function', 'url', 'paper/googlescholar.tpl', 21, false),)), $this); ?>
	<meta name="gs_meta_revision" content="1.1" />
	<meta name="citation_conference_title" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currentSchedConf']->getFullTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php $_from = $this->_tpl_vars['paper']->getAuthors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['authors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['authors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['author']):
        $this->_foreach['authors']['iteration']++;
?>
	<meta name="citation_author" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getFirstName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php if ($this->_tpl_vars['author']->getMiddleName() != ""): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getMiddleName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getLastName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php if ($this->_tpl_vars['author']->getAffiliation() != ""): ?>
	<meta name="citation_author_institution" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['author']->getAffiliation())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
	<meta name="citation_title" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['paper']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
	<meta name="citation_date" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getDatePublished())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
"/>
	<meta name="citation_abstract_html_url" content="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'paper','op' => 'view','path' => $this->_tpl_vars['paper']->getBestPaperId($this->_tpl_vars['currentConference'])), $this);?>
"/>
<?php $_from = $this->_tpl_vars['paper']->getGalleys(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dc_galley']):
?>
<?php if ($this->_tpl_vars['dc_galley']->getFileType() == "application/pdf"): ?>
	<meta name="citation_pdf_url" content="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'paper','op' => 'download','path' => ((is_array($_tmp=$this->_tpl_vars['paper']->getBestPaperId($this->_tpl_vars['currentConference']))) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['dc_galley']->getGalleyId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['dc_galley']->getGalleyId()))), $this);?>
"/>
<?php else: ?>
	<meta name="citation_fulltext_html_url" content="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'paper','op' => 'view','path' => ((is_array($_tmp=$this->_tpl_vars['paper']->getBestPaperId($this->_tpl_vars['currentConference']))) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['dc_galley']->getGalleyId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['dc_galley']->getGalleyId()))), $this);?>
"/>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>