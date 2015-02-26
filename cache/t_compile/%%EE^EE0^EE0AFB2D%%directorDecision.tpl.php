<?php /* Smarty version 2.6.26, created on 2014-02-09 16:45:05
         compiled from trackDirector/submission/directorDecision.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'trackDirector/submission/directorDecision.tpl', 12, false),array('function', 'url', 'trackDirector/submission/directorDecision.tpl', 18, false),array('function', 'html_options_translate', 'trackDirector/submission/directorDecision.tpl', 22, false),array('function', 'icon', 'trackDirector/submission/directorDecision.tpl', 45, false),array('modifier', 'escape', 'trackDirector/submission/directorDecision.tpl', 24, false),array('modifier', 'date_format', 'trackDirector/submission/directorDecision.tpl', 35, false),array('modifier', 'assign', 'trackDirector/submission/directorDecision.tpl', 44, false),array('modifier', 'to_array', 'trackDirector/submission/directorDecision.tpl', 82, false),array('modifier', 'count', 'trackDirector/submission/directorDecision.tpl', 91, false),)), $this); ?>
<div id="directorDecision">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.directorDecision"), $this);?>
</h3>

<table width="100%" class="data">
<tr valign="top">
	<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.selectDecision"), $this);?>
</td>
	<td width="80%" class="value" colspan="2">
		<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'recordDecision','path' => $this->_tpl_vars['stage']), $this);?>
">
			<input type="hidden" name="paperId" value="<?php echo $this->_tpl_vars['submission']->getPaperId(); ?>
" />
			<select name="decision" size="1" class="selectMenu"<?php if (! $this->_tpl_vars['allowRecommendation']): ?> disabled="disabled"<?php endif; ?>>
				<?php $this->assign('availableDirectorDecisionOptions', $this->_tpl_vars['submission']->getDirectorDecisionOptions($this->_tpl_vars['currentSchedConf'],$this->_tpl_vars['stage'])); ?>
				<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['availableDirectorDecisionOptions'],'selected' => $this->_tpl_vars['lastDecision']), $this);?>

			</select>
			<input type="submit" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.submissionReview.confirmDecision"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.recordDecision"), $this);?>
" <?php if (! $this->_tpl_vars['allowRecommendation']): ?>disabled="disabled"<?php endif; ?> class="button" />
			<?php if (! $this->_tpl_vars['allowRecommendation'] && $this->_tpl_vars['isCurrent']): ?><br /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.cannotRecord"), $this);?>
<?php endif; ?>
		</form>
	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.decision"), $this);?>
</td>
	<td class="value" colspan="2">
		<?php $_from = $this->_tpl_vars['directorDecisions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['decisionKey'] => $this->_tpl_vars['directorDecision']):
?>
			<?php if ($this->_tpl_vars['decisionKey'] != 0): ?> | <?php endif; ?>
			<?php $this->assign('decision', $this->_tpl_vars['directorDecision']['decision']); ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['directorDecisionOptions'][$this->_tpl_vars['decision']]), $this);?>
&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['directorDecision']['dateDecided'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

		<?php endforeach; else: ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>

		<?php endif; unset($_from); ?>
	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.notifyAuthor"), $this);?>
</td>
	<td class="value" colspan="2">
		<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'emailDirectorDecisionComment','paperId' => $this->_tpl_vars['submission']->getPaperId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'notifyAuthorUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'notifyAuthorUrl'));?>

		<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['notifyAuthorUrl']), $this);?>

		&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.directorAuthorRecord"), $this);?>

		<?php if ($this->_tpl_vars['submission']->getMostRecentDirectorDecisionComment()): ?>
			<?php $this->assign('comment', $this->_tpl_vars['submission']->getMostRecentDirectorDecisionComment()); ?>
			<a href="javascript:openComments('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewDirectorDecisionComments','path' => $this->_tpl_vars['submission']->getPaperId(),'anchor' => $this->_tpl_vars['comment']->getId()), $this);?>
');" class="icon"><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'comment'), $this);?>
</a>&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['comment']->getDatePosted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

		<?php else: ?>
			<a href="javascript:openComments('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewDirectorDecisionComments','path' => $this->_tpl_vars['submission']->getPaperId()), $this);?>
');" class="icon"><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'comment'), $this);?>
</a><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.noComments"), $this);?>

		<?php endif; ?>
		<?php if ($this->_tpl_vars['lastDecision'] == SUBMISSION_DIRECTOR_DECISION_DECLINE): ?>
			<br />
			<?php if ($this->_tpl_vars['submission']->getStatus() == STATUS_ARCHIVED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.archived"), $this);?>
<?php else: ?><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'archiveSubmission','path' => $this->_tpl_vars['submission']->getPaperId()), $this);?>
" onclick="return window.confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.submissionReview.confirmToArchive"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.sendToArchive"), $this);?>
</a><?php endif; ?>
			<?php if ($this->_tpl_vars['submission']->getDateToArchive()): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateToArchive())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>
<?php endif; ?>
		<?php endif; ?>
	</td>
</tr>
</table>
</div>
<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'directorReview','path' => $this->_tpl_vars['stage']), $this);?>
" enctype="multipart/form-data">
<input type="hidden" name="paperId" value="<?php echo $this->_tpl_vars['submission']->getPaperId(); ?>
" />
<?php $this->assign('authorFiles', $this->_tpl_vars['submission']->getAuthorFileRevisions($this->_tpl_vars['stage'])); ?>
<?php $this->assign('directorFiles', $this->_tpl_vars['submission']->getDirectorFileRevisions($this->_tpl_vars['stage'])); ?>
<?php $this->assign('reviewFile', $this->_tpl_vars['submission']->getReviewFile()); ?>
<?php $this->assign('authorRevisionExists', false); ?>
<?php $this->assign('directorRevisionExists', false); ?>
<?php $this->assign('sendableVersionExists', false); ?>

<?php if (! $this->_tpl_vars['reviewingAbstractOnly']): ?>
	<table class="data" width="100%">
		<?php if ($this->_tpl_vars['reviewFile']): ?>
			<tr valign="top">
				<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.reviewVersion"), $this);?>
</td>
				<td width="50%" colspan="2" class="value">
					<?php if ($this->_tpl_vars['lastDecision'] == SUBMISSION_DIRECTOR_DECISION_ACCEPT): ?>
						<input type="radio" name="directorDecisionFile" value="<?php echo $this->_tpl_vars['reviewFile']->getFileId(); ?>
,<?php echo $this->_tpl_vars['reviewFile']->getRevision(); ?>
" />
						<?php $this->assign('sendableVersionExists', true); ?>
					<?php endif; ?>
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewFile']->getFileId(), $this->_tpl_vars['reviewFile']->getRevision()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewFile']->getFileId(), $this->_tpl_vars['reviewFile']->getRevision()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>&nbsp;&nbsp;
					<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewFile']->getDateModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

				</td>
			</tr>
		<?php endif; ?>
		<?php $_from = $this->_tpl_vars['authorFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['authorFile']):
?>
			<tr valign="top">
				<?php if (! $this->_tpl_vars['authorRevisionExists']): ?>
					<?php $this->assign('authorRevisionExists', true); ?>
					<td width="20%" rowspan="<?php echo count($this->_tpl_vars['authorFiles']); ?>
" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.authorVersion"), $this);?>
</td>
				<?php endif; ?>
				<td width="80%" class="value" colspan="2">
					<?php if ($this->_tpl_vars['lastDecision'] == SUBMISSION_DIRECTOR_DECISION_ACCEPT): ?>
						<input type="radio" name="directorDecisionFile" value="<?php echo $this->_tpl_vars['authorFile']->getFileId(); ?>
,<?php echo $this->_tpl_vars['authorFile']->getRevision(); ?>
" />
						<?php $this->assign('sendableVersionExists', true); ?>
					<?php endif; ?>
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['authorFile']->getFileId(), $this->_tpl_vars['authorFile']->getRevision()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['authorFile']->getFileId(), $this->_tpl_vars['authorFile']->getRevision()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['authorFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>&nbsp;&nbsp;
						<?php echo ((is_array($_tmp=$this->_tpl_vars['authorFile']->getDateModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

				</td>
			</tr>
		<?php endforeach; else: ?>
			<tr valign="top">
				<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.authorVersion"), $this);?>
</td>
				<td width="80%" colspan="2" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>
</td>
			</tr>
		<?php endif; unset($_from); ?>
		<?php $_from = $this->_tpl_vars['directorFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['directorFile']):
?>
			<tr valign="top">
				<?php if (! $this->_tpl_vars['directorRevisionExists']): ?>
					<?php $this->assign('directorRevisionExists', true); ?>
					<td width="20%" rowspan="<?php echo count($this->_tpl_vars['directorFiles']); ?>
" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.directorVersion"), $this);?>
</td>
				<?php endif; ?>
				<td width="50%" class="value">
					<?php if ($this->_tpl_vars['lastDecision'] == SUBMISSION_DIRECTOR_DECISION_ACCEPT): ?>
						<input type="radio" name="directorDecisionFile" value="<?php echo $this->_tpl_vars['directorFile']->getFileId(); ?>
,<?php echo $this->_tpl_vars['directorFile']->getRevision(); ?>
" />
						<?php $this->assign('sendableVersionExists', true); ?>
					<?php endif; ?>
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['directorFile']->getFileId(), $this->_tpl_vars['directorFile']->getRevision()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['directorFile']->getFileId(), $this->_tpl_vars['directorFile']->getRevision()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['directorFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>&nbsp;&nbsp;
					<?php echo ((is_array($_tmp=$this->_tpl_vars['directorFile']->getDateModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

				</td>
				<td width="30%" class="value"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'deletePaperFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['directorFile']->getFileId(), $this->_tpl_vars['directorFile']->getRevision()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['directorFile']->getFileId(), $this->_tpl_vars['directorFile']->getRevision()))), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.delete"), $this);?>
</a></td>
			</tr>
		<?php endforeach; else: ?>
			<tr valign="top">
				<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.directorVersion"), $this);?>
</td>
				<td width="80%" colspan="3" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>
</td>
			</tr>
		<?php endif; unset($_from); ?>
	</table>

	<?php if ($this->_tpl_vars['isCurrent']): ?>
	<div>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.uploadDirectorVersion"), $this);?>

		<input type="file" name="upload" class="uploadField" />
		<input type="submit" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.upload"), $this);?>
" class="button" />
	</div>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['sendableVersionExists']): ?>
		<table class="data" width="100%">
			<tr valign="top">
				<td width="20%">&nbsp;</td>
				<td width="80%">
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.moveToLayout"), $this);?>

					<input type="submit" name="setEditingFile" onclick="return window.confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.submissionReview.confirmToLayout"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.send"), $this);?>
" class="button" />
					<?php if ($this->_tpl_vars['submission']->getDateToPresentations()): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateToPresentations())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>
<?php endif; ?>
					<?php if (! $this->_tpl_vars['submission']->getGalleys()): ?>
						<br />
						<input type="checkbox" checked="checked" name="createGalley" value="1" />
						<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.createGalley"), $this);?>

					<?php endif; ?>
				</td>
			</tr>
		</table>

	<?php endif; ?>
<?php endif; ?>
</form>

<?php if ($this->_tpl_vars['isFinalReview']): ?>

	<div class="separator"></div>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "trackDirector/submission/complete.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div class="separator"></div>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "trackDirector/submission/layout.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
