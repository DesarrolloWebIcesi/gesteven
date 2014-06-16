<?php /* Smarty version 2.6.26, created on 2013-10-31 15:42:51
         compiled from paper/paper.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'paper/paper.tpl', 15, false),array('function', 'url', 'paper/paper.tpl', 75, false),array('modifier', 'strip_unsafe_html', 'paper/paper.tpl', 25, false),array('modifier', 'escape', 'paper/paper.tpl', 26, false),array('modifier', 'date_format', 'paper/paper.tpl', 36, false),array('modifier', 'nl2br', 'paper/paper.tpl', 46, false),array('modifier', 'to_array', 'paper/paper.tpl', 75, false),array('modifier', 'assign', 'paper/paper.tpl', 86, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "paper/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="topBar">
		<div id="paperFontSize">
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.fontSize"), $this);?>
:&nbsp;
			<div id="sizer"></div>
		</div>
	</div>
<?php if ($this->_tpl_vars['galley']): ?>
	<?php if ($this->_tpl_vars['galley']->isHTMLGalley()): ?>
		<?php echo $this->_tpl_vars['galley']->getHTMLContents(); ?>

	<?php endif; ?>
<?php else: ?>

	<div id="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
</div>
	<div id="author"><em><?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getAuthorString())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</em></div>
	<br />

	<blockquote>
	<?php if ($this->_tpl_vars['schedConfPostSchedule']): ?>
		<?php if ($this->_tpl_vars['room'] && $this->_tpl_vars['building']): ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.building"), $this);?>
:&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['building']->getBuildingName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br/>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.room"), $this);?>
:&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['room']->getRoomName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br/>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['paper']->getStartTime()): ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.date"), $this);?>
:&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getStartTime())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['datetimeFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['datetimeFormatShort'])); ?>
&nbsp;&ndash;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getEndTime())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['timeFormat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['timeFormat'])); ?>
<br/>
		<?php endif; ?>
	<?php endif; ?>	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.lastModified"), $this);?>
:&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getLastModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>
<br/>
	</blockquote>

	<?php if ($this->_tpl_vars['paper']->getLocalizedAbstract()): ?>
	<div id="abstract">
	<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.abstract"), $this);?>
</h4>
	<br />
	<div><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['paper']->getLocalizedAbstract())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
	<br />
	</div>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['paper']->getLocalizedSubject()): ?>
		<div id="paperSubject">
		<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.subject"), $this);?>
</h4>
		<br />
		<div><?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getLocalizedSubject())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</div>
		<br />
		</div>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['paper']->getCitations()): ?>
		<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.citations"), $this);?>
</h4>
		<br />
		<div><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['paper']->getCitations())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
		<br />
	<?php endif; ?>
	
	<div id="paper">
	<?php if ($this->_tpl_vars['mayViewPaper']): ?>
		<?php $this->assign('galleys', $this->_tpl_vars['paper']->getLocalizedGalleys()); ?>
		<?php if ($this->_tpl_vars['galleys']): ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reader.fullText"), $this);?>

			<?php $this->assign('hasPriorAction', 0); ?>
			<?php $_from = $this->_tpl_vars['galleys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['galleyList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['galleyList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['galley']):
        $this->_foreach['galleyList']['iteration']++;
?>
				<?php if ($this->_tpl_vars['hasPriorAction']): ?>&nbsp;|&nbsp;<?php endif; ?>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'paper','op' => 'view','path' => ((is_array($_tmp=$this->_tpl_vars['paperId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['galley']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['galley']->getId()))), $this);?>
" class="action" target="_parent"><?php echo ((is_array($_tmp=$this->_tpl_vars['galley']->getGalleyLabel())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>
				<?php $this->assign('hasPriorAction', 1); ?>
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	<?php elseif ($this->_tpl_vars['schedConf']->getSetting('delayOpenAccess') && $this->_tpl_vars['schedConf']->getSetting('delayOpenAccessDate') > time ( )): ?>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reader.fullTextRegistrantsOnlyUntil",'date' => ((is_array($_tmp=$this->_tpl_vars['schedConf']->getSetting('delayOpenAccessDate'))) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort']))), $this);?>

	<?php elseif ($this->_tpl_vars['schedConf']->getSetting('postPapers') && $this->_tpl_vars['schedConf']->getSetting('postPapersDate') > time ( )): ?>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reader.fullTextNotPostedYet",'date' => ((is_array($_tmp=$this->_tpl_vars['schedConf']->getSetting('postPapersDate'))) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort']))), $this);?>

	<?php elseif ($this->_tpl_vars['conference']->getSetting('paperAccess') == PAPER_ACCESS_REGISTRATION_REQUIRED): ?>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reader.fullTextRegistrationRequired"), $this);?>

	<?php elseif ($this->_tpl_vars['conference']->getSetting('paperAccess') == PAPER_ACCESS_ACCOUNT_REQUIRED && ! $this->_tpl_vars['isUserLoggedIn']): ?>
		<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'account'), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'accountUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'accountUrl'));?>

		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reader.fullTextAccountRequired",'registerUrl' => $this->_tpl_vars['accountUrl']), $this);?>

	<?php else: ?>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reader.fullTextNotAvailable"), $this);?>

	<?php endif; ?>
	</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "paper/comments.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "paper/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>