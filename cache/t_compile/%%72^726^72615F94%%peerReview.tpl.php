<?php /* Smarty version 2.6.26, created on 2014-02-09 16:45:05
         compiled from trackDirector/submission/peerReview.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'trackDirector/submission/peerReview.tpl', 12, false),array('function', 'url', 'trackDirector/submission/peerReview.tpl', 18, false),array('function', 'icon', 'trackDirector/submission/peerReview.tpl', 19, false),array('function', 'get_help_id', 'trackDirector/submission/peerReview.tpl', 64, false),array('function', 'html_options_translate', 'trackDirector/submission/peerReview.tpl', 339, false),array('modifier', 'assign', 'trackDirector/submission/peerReview.tpl', 18, false),array('modifier', 'escape', 'trackDirector/submission/peerReview.tpl', 19, false),array('modifier', 'strip_unsafe_html', 'trackDirector/submission/peerReview.tpl', 24, false),array('modifier', 'concat', 'trackDirector/submission/peerReview.tpl', 35, false),array('modifier', 'to_array', 'trackDirector/submission/peerReview.tpl', 36, false),array('modifier', 'strip_tags', 'trackDirector/submission/peerReview.tpl', 36, false),array('modifier', 'date_format', 'trackDirector/submission/peerReview.tpl', 64, false),array('modifier', 'count', 'trackDirector/submission/peerReview.tpl', 85, false),array('modifier', 'ord', 'trackDirector/submission/peerReview.tpl', 146, false),array('modifier', 'chr', 'trackDirector/submission/peerReview.tpl', 156, false),)), $this); ?>
<div id="submission">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.submission"), $this);?>
</h3>

<table width="100%" class="data">
	<tr>
		<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.authors"), $this);?>
</td>
		<td width="80%">
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'email','redirectUrl' => $this->_tpl_vars['currentUrl'],'to' => $this->_tpl_vars['submission']->getAuthorEmails(),'subject' => $this->_tpl_vars['submission']->getLocalizedTitle(),'paperId' => $this->_tpl_vars['submission']->getPaperId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

			<?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getAuthorString())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
 <?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['url']), $this);?>

		</td>
	</tr>
	<tr>
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.title"), $this);?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "track.track"), $this);?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getTrackTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.director"), $this);?>
</td>
		<td>
			<?php $this->assign('editAssignments', $this->_tpl_vars['submission']->getEditAssignments()); ?>
			<?php $_from = $this->_tpl_vars['editAssignments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['editAssignment']):
?>
				<?php $this->assign('emailString', ((is_array($_tmp=$this->_tpl_vars['editAssignment']->getDirectorFullName())) ? $this->_run_mod_handler('concat', true, $_tmp, " <", $this->_tpl_vars['editAssignment']->getDirectorEmail(), ">") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, " <", $this->_tpl_vars['editAssignment']->getDirectorEmail(), ">"))); ?>
				<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'email','redirectUrl' => $this->_tpl_vars['currentUrl'],'to' => ((is_array($_tmp=$this->_tpl_vars['emailString'])) ? $this->_run_mod_handler('to_array', true, $_tmp) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp)),'subject' => ((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)),'paperId' => $this->_tpl_vars['submission']->getPaperId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

				<?php echo ((is_array($_tmp=$this->_tpl_vars['editAssignment']->getDirectorFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
 <?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['url']), $this);?>

				<br/>
			<?php endforeach; else: ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.noneAssigned"), $this);?>

			<?php endif; unset($_from); ?>
		</td>
	</tr>

	<?php if ($this->_tpl_vars['reviewingAbstractOnly']): ?>
				<tr valign="top">
			<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.abstract"), $this);?>
</td>
			<td width="80%" class="value">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedAbstract())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>

			</td>
		</tr>
	<?php else: ?>
				<tr valign="top">
			<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.reviewVersion"), $this);?>
</td>
			<?php if ($this->_tpl_vars['reviewFile']): ?>
				<td width="80%" class="value">
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewFile']->getFileId(), $this->_tpl_vars['reviewFile']->getRevision()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewFile']->getFileId(), $this->_tpl_vars['reviewFile']->getRevision()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>&nbsp;&nbsp;
					<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewFile']->getDateModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>
<!-- &nbsp;&nbsp;&nbsp;&nbsp;<a class="action" href="javascript:openHelp('<?php echo $this->_plugins['function']['get_help_id'][0][0]->smartyGetHelpId(array('key' => "editorial.trackDirectorsRole.review.blindPeerReview",'url' => 'true'), $this);?>
')"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.paper.ensuringBlindReview"), $this);?>
</a> -->
				</td>
			<?php else: ?>
				<td width="80%" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>
</td>
			<?php endif; ?>
		</tr>
		<?php if (! $this->_tpl_vars['isStageDisabled']): ?>
		<tr valign="top">
			<td colspan="2">
				<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'uploadReviewVersion'), $this);?>
" enctype="multipart/form-data">
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.uploadReviewVersion"), $this);?>

					<input type="hidden" name="paperId" value="<?php echo $this->_tpl_vars['submission']->getPaperId(); ?>
" />
					<input type="file" name="upload" class="uploadField" />
					<input type="submit" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.upload"), $this);?>
" class="button" />
				</form>
			</td>
		</tr>
		<?php endif; ?>
		<?php $_from = $this->_tpl_vars['suppFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['suppFile']):
?>
			<tr valign="top">
				<?php if (! $this->_tpl_vars['notFirstSuppFile']): ?>
					<td class="label" rowspan="<?php echo count($this->_tpl_vars['suppFiles']); ?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.suppFilesAbbrev"), $this);?>
</td>
						<?php $this->assign('notFirstSuppFile', 1); ?>
				<?php endif; ?>
				<td width="80%" class="value nowrap">
					<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setSuppFileVisibility'), $this);?>
">
						<input type="hidden" name="paperId" value="<?php echo $this->_tpl_vars['submission']->getPaperId(); ?>
" />
						<input type="hidden" name="fileId" value="<?php echo $this->_tpl_vars['suppFile']->getId(); ?>
" />
						<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['suppFile']->getFileId(), $this->_tpl_vars['suppFile']->getRevision()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['suppFile']->getFileId(), $this->_tpl_vars['suppFile']->getRevision()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['suppFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>&nbsp;&nbsp;
						<?php echo ((is_array($_tmp=$this->_tpl_vars['suppFile']->getDateModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

						<label for="show"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.showSuppFile"), $this);?>
</label>
						<input type="checkbox" <?php if (! $this->_tpl_vars['mayEditPaper']): ?>disabled="disabled" <?php endif; ?>name="show" id="show" value="1"<?php if ($this->_tpl_vars['suppFile']->getShowReviewers() == 1): ?> checked="checked"<?php endif; ?>/>
						<input type="submit" <?php if (! $this->_tpl_vars['mayEditPaper']): ?>disabled="disabled" <?php endif; ?>name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.record"), $this);?>
" class="button" />
					</form>
				</td>
			</tr>
		<?php endforeach; else: ?>
			<tr valign="top">
				<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.suppFilesAbbrev"), $this);?>
</td>
				<td class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>
</td>
			</tr>
		<?php endif; unset($_from); ?>
	<?php endif; ?>
</table>

<div class="separator"></div>
</div>

<div id="peerReview">

<?php if (( $this->_tpl_vars['stage'] == REVIEW_STAGE_PRESENTATION && $this->_tpl_vars['submission']->getCurrentStage() != REVIEW_STAGE_PRESENTATION )): ?>
	<?php $this->assign('isStageDisabled', true); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['isStageDisabled']): ?>
	<table class="data" width="100%">
		<tr valign="middle">
			<td><h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.peerReview"), $this);?>
</h3></td>
		</tr>
		<tr>
			<td><span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.stageDisabled"), $this);?>
</span></td>
		</tr>
	</table>
<?php else: ?>
	<table class="data" width="100%">
		<tr valign="middle">
			<td width="30%">
				<?php if ($this->_tpl_vars['submission']->getReviewMode() == @REVIEW_MODE_BOTH_SIMULTANEOUS): ?>
					<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.review"), $this);?>
</h3>
				<?php elseif ($this->_tpl_vars['stage'] == REVIEW_STAGE_ABSTRACT): ?>
					<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.abstractReview"), $this);?>
</h3>
				<?php else: ?>					<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.paperReview"), $this);?>
</h3>
				<?php endif; ?>
			</td>
			<td width="70%" class="nowrap">
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'selectReviewer','path' => $this->_tpl_vars['submission']->getPaperId()), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.selectReviewer"), $this);?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionRegrets','path' => $this->_tpl_vars['submission']->getPaperId()), $this);?>
" class="action"><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "trackDirector.regrets.link"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp));?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
	</table>

	<?php $this->assign('start', ((is_array($_tmp='A')) ? $this->_run_mod_handler('ord', true, $_tmp) : ord($_tmp))); ?>
	<?php $_from = $this->_tpl_vars['reviewAssignments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reviewKey'] => $this->_tpl_vars['reviewAssignment']):
?>
	<?php $this->assign('reviewId', $this->_tpl_vars['reviewAssignment']->getId()); ?>

	<?php if (! $this->_tpl_vars['reviewAssignment']->getCancelled()): ?>
		<?php $this->assign('reviewIndex', $this->_tpl_vars['reviewIndexes'][$this->_tpl_vars['reviewId']]); ?>
		<div class="separator"></div>

		<table class="data" width="100%">
		<tr>
			<td width="20%"><h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.reviewer"), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['reviewIndex']+$this->_tpl_vars['start'])) ? $this->_run_mod_handler('chr', true, $_tmp) : chr($_tmp)); ?>
</h4></td>
			<td width="34%"><h4><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewAssignment']->getReviewerFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</h4></td>
			<td width="46%">
					<?php if (! $this->_tpl_vars['reviewAssignment']->getDateNotified()): ?>
						<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'clearReview','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewAssignment']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewAssignment']->getId()))), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.clearReview"), $this);?>
</a>
					<?php elseif ($this->_tpl_vars['reviewAssignment']->getDeclined() || ! $this->_tpl_vars['reviewAssignment']->getDateCompleted()): ?>
						<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'cancelReview','paperId' => $this->_tpl_vars['submission']->getPaperId(),'reviewId' => $this->_tpl_vars['reviewAssignment']->getId()), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.cancelReview"), $this);?>
</a>
					<?php endif; ?>
			</td>
		</tr>
		</table>

		<table width="100%" class="data">
		<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.reviewForm"), $this);?>
</td>
		<td>
		<?php if ($this->_tpl_vars['reviewAssignment']->getReviewFormId()): ?>
			<?php $this->assign('reviewFormId', $this->_tpl_vars['reviewAssignment']->getReviewFormId()); ?>
			<?php echo $this->_tpl_vars['reviewFormTitles'][$this->_tpl_vars['reviewFormId']]; ?>

		<?php else: ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.reviewForms.noneChosen"), $this);?>

		<?php endif; ?>
		<?php if (! $this->_tpl_vars['reviewAssignment']->getDateCompleted()): ?>
			&nbsp;&nbsp;&nbsp;&nbsp;<a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'selectReviewForm','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewAssignment']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewAssignment']->getId()))), $this);?>
"<?php if ($this->_tpl_vars['reviewFormResponses'][$this->_tpl_vars['reviewId']]): ?> onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.paper.confirmChangeReviewForm"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.paper.selectReviewForm"), $this);?>
</a><?php if ($this->_tpl_vars['reviewAssignment']->getReviewFormId()): ?>&nbsp;&nbsp;&nbsp;&nbsp;<a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'clearReviewForm','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewAssignment']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewAssignment']->getId()))), $this);?>
"<?php if ($this->_tpl_vars['reviewFormResponses'][$this->_tpl_vars['reviewId']]): ?> onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.paper.confirmChangeReviewForm"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.paper.clearReviewForm"), $this);?>
</a><?php endif; ?>
		<?php endif; ?>
		</td>
	</tr>
		<tr valign="top">
			<td class="label" width="20%">&nbsp;</td>
			<td width="80%">
				<table width="100%" class="info">
					<tr>
						<td class="heading" width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.request"), $this);?>
</td>
						<td class="heading" width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.underway"), $this);?>
</td>
						<td class="heading" width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.due"), $this);?>
</td>
						<td class="heading" width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.acknowledge"), $this);?>
</td>
					</tr>
					<tr valign="top">
						<td>
							<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'notifyReviewer','reviewId' => $this->_tpl_vars['reviewAssignment']->getId(),'paperId' => $this->_tpl_vars['submission']->getPaperId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'reviewUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'reviewUrl'));?>

							<?php if (! $this->_tpl_vars['allowRecommendation']): ?>
								<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['reviewUrl'],'disabled' => 'true'), $this);?>

							<?php elseif ($this->_tpl_vars['reviewAssignment']->getDateNotified()): ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewAssignment']->getDateNotified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

								<?php if (! $this->_tpl_vars['reviewAssignment']->getDateCompleted()): ?>
									<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['reviewUrl']), $this);?>

								<?php endif; ?>
							<?php else: ?>
								<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['reviewUrl']), $this);?>

							<?php endif; ?>
						</td>
						<td>
							<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'acknowledgeReviewerUnderway','reviewId' => $this->_tpl_vars['reviewAssignment']->getId(),'paperId' => $this->_tpl_vars['submission']->getPaperId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'acknowledgeReviewerUnderwayUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'acknowledgeReviewerUnderwayUrl'));?>

							<?php if ($this->_tpl_vars['reviewAssignment']->getDateConfirmed()): ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewAssignment']->getDateConfirmed())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

								<?php if (! $this->_tpl_vars['reviewAssignment']->getDateCompleted()): ?>
									<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['acknowledgeReviewerUnderwayUrl']), $this);?>

								<?php else: ?>
									<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','disabled' => 'disabled','url' => $this->_tpl_vars['acknowledgeReviewerUnderwayUrl']), $this);?>

								<?php endif; ?>
							<?php else: ?>
								<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','disabled' => 'disabled','url' => $this->_tpl_vars['acknowledgeReviewerUnderwayUrl']), $this);?>

							<?php endif; ?>
						</td>
						<td>
							<?php if ($this->_tpl_vars['reviewAssignment']->getDeclined()): ?>
								<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "trackDirector.regrets"), $this);?>

							<?php else: ?>
								<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setDueDate','path' => ((is_array($_tmp=$this->_tpl_vars['reviewAssignment']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewAssignment']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewAssignment']->getId()))), $this);?>
"><?php if ($this->_tpl_vars['reviewAssignment']->getDateDue()): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewAssignment']->getDateDue())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>
<?php else: ?>&mdash;<?php endif; ?></a>
							<?php endif; ?>
						</td>
						<td>
							<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'thankReviewer','reviewId' => $this->_tpl_vars['reviewAssignment']->getId(),'paperId' => $this->_tpl_vars['submission']->getPaperId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'thankUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'thankUrl'));?>

							<?php if ($this->_tpl_vars['reviewAssignment']->getDateAcknowledged()): ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewAssignment']->getDateAcknowledged())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

							<?php elseif ($this->_tpl_vars['reviewAssignment']->getDateCompleted()): ?>
								<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['thankUrl']), $this);?>

							<?php else: ?>
								<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','disabled' => 'disabled','url' => $this->_tpl_vars['thankUrl']), $this);?>

							<?php endif; ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<?php if ($this->_tpl_vars['reviewAssignment']->getDateConfirmed() && ! $this->_tpl_vars['reviewAssignment']->getDeclined()): ?>
			<tr valign="top">
				<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.paper.recommendation"), $this);?>
</td>
				<td>
					<?php if ($this->_tpl_vars['reviewAssignment']->getRecommendation() !== null && $this->_tpl_vars['reviewAssignment']->getRecommendation() !== ''): ?>
						<?php $this->assign('recommendation', $this->_tpl_vars['reviewAssignment']->getRecommendation()); ?>
						<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['reviewerRecommendationOptions'][$this->_tpl_vars['recommendation']]), $this);?>

						&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewAssignment']->getDateCompleted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

					<?php else: ?>
						<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>
&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'remindReviewer','paperId' => $this->_tpl_vars['submission']->getPaperId(),'reviewId' => $this->_tpl_vars['reviewAssignment']->getId()), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.paper.sendReminder"), $this);?>
</a>
						<?php if ($this->_tpl_vars['reviewAssignment']->getDateReminded()): ?>
							&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewAssignment']->getDateReminded())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

							<?php if ($this->_tpl_vars['reviewAssignment']->getReminderWasAutomatic()): ?>
								&nbsp;&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.paper.automatic"), $this);?>

							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				</td>
			</tr>
			<tr valign="top">
				<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.review"), $this);?>
</td>
				<td>
					<?php if ($this->_tpl_vars['reviewAssignment']->getMostRecentPeerReviewComment()): ?>
						<?php $this->assign('comment', $this->_tpl_vars['reviewAssignment']->getMostRecentPeerReviewComment()); ?>
						<a href="javascript:openComments('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewPeerReviewComments','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewAssignment']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewAssignment']->getId())),'anchor' => $this->_tpl_vars['comment']->getId()), $this);?>
');" class="icon"><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'letter'), $this);?>
</a>&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['comment']->getDatePosted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

					<?php else: ?>
						<a href="javascript:openComments('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewPeerReviewComments','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewAssignment']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewAssignment']->getId()))), $this);?>
');" class="icon"><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'letter'), $this);?>
</a>&nbsp;&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.comments.noComments"), $this);?>

					<?php endif; ?>
				</td>
			</tr>
			<?php if ($this->_tpl_vars['reviewFormResponses'][$this->_tpl_vars['reviewId']]): ?>
			<tr valign="top">
				<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.reviewFormResponse"), $this);?>
</td>
				<td>
					<a href="javascript:openComments('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewReviewFormResponse','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewAssignment']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewAssignment']->getId()))), $this);?>
');" class="icon"><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'letter'), $this);?>
</a>
				</td>
			</tr>
			<?php endif; ?>
			<tr valign="top">
				<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.paper.uploadedFile"), $this);?>
</td>
				<td>
					<table width="100%" class="data">
						<?php $_from = $this->_tpl_vars['reviewAssignment']->getReviewerFileRevisions(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['reviewerFile']):
?>
						<tr valign="top">
							<td valign="middle">
								<form name="authorView<?php echo $this->_tpl_vars['reviewAssignment']->getId(); ?>
" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'makeReviewerFileViewable'), $this);?>
">
									<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewerFile']->getFileId(), $this->_tpl_vars['reviewerFile']->getRevision()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewerFile']->getFileId(), $this->_tpl_vars['reviewerFile']->getRevision()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewerFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewerFile']->getDateModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

									<input type="hidden" name="reviewId" value="<?php echo $this->_tpl_vars['reviewAssignment']->getId(); ?>
" />
									<input type="hidden" name="paperId" value="<?php echo $this->_tpl_vars['submission']->getPaperId(); ?>
" />
									<input type="hidden" name="fileId" value="<?php echo $this->_tpl_vars['reviewerFile']->getFileId(); ?>
" />
									<input type="hidden" name="revision" value="<?php echo $this->_tpl_vars['reviewerFile']->getRevision(); ?>
" />
									<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.showAuthor"), $this);?>
 <input type="checkbox" name="viewable" value="1"<?php if ($this->_tpl_vars['reviewerFile']->getViewable()): ?> checked="checked"<?php endif; ?> />
									<input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.record"), $this);?>
" class="button" />
								</form>
							</td>
						</tr>
						<?php endforeach; else: ?>
						<tr valign="top">
							<td><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>
</td>
						</tr>
						<?php endif; unset($_from); ?>
					</table>
				</td>
			</tr>
		<?php endif; ?>

		<?php if (( ( $this->_tpl_vars['reviewAssignment']->getRecommendation() === null || $this->_tpl_vars['reviewAssignment']->getRecommendation() === '' ) || ! $this->_tpl_vars['reviewAssignment']->getDateConfirmed() ) && $this->_tpl_vars['reviewAssignment']->getDateNotified() && ! $this->_tpl_vars['reviewAssignment']->getDeclined()): ?>
			<tr valign="top">
				<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.paper.directorToEnter"), $this);?>
</td>
				<td>
					<?php if (! $this->_tpl_vars['reviewAssignment']->getDateConfirmed()): ?>
						<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'confirmReviewForReviewer','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewAssignment']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewAssignment']->getId())),'accept' => 1), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.paper.canDoReview"), $this);?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'confirmReviewForReviewer','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewAssignment']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewAssignment']->getId())),'accept' => 0), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.paper.cannotDoReview"), $this);?>
</a><br />
					<?php endif; ?>
					<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'uploadReviewForReviewer'), $this);?>
" enctype="multipart/form-data">
						<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.uploadReviewForReviewer"), $this);?>

						<input type="hidden" name="paperId" value="<?php echo $this->_tpl_vars['submission']->getPaperId(); ?>
" />
						<input type="hidden" name="reviewId" value="<?php echo $this->_tpl_vars['reviewAssignment']->getId(); ?>
"/>
						<input type="file" name="upload" class="uploadField" />
						<input type="submit" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.upload"), $this);?>
" class="button" />
					</form>
					<?php if ($this->_tpl_vars['reviewAssignment']->getDateConfirmed() && ! $this->_tpl_vars['reviewAssignment']->getDeclined()): ?>
						<a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'enterReviewerRecommendation','paperId' => $this->_tpl_vars['submission']->getPaperId(),'reviewId' => $this->_tpl_vars['reviewAssignment']->getId()), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.recommendation"), $this);?>
</a>
					<?php endif; ?>
				</td>
			</tr>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['reviewAssignment']->getDateNotified() && ! $this->_tpl_vars['reviewAssignment']->getDeclined() && $this->_tpl_vars['rateReviewerOnQuality']): ?>
			<tr valign="top">
				<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.rateReviewer"), $this);?>
</td>
				<td>
					<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'rateReviewer'), $this);?>
">
					<input type="hidden" name="reviewId" value="<?php echo $this->_tpl_vars['reviewAssignment']->getId(); ?>
" />
					<input type="hidden" name="paperId" value="<?php echo $this->_tpl_vars['submission']->getPaperId(); ?>
" />
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "director.paper.quality"), $this);?>
&nbsp;
					<select name="quality" size="1" class="selectMenu">
						<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['reviewerRatingOptions'],'selected' => $this->_tpl_vars['reviewAssignment']->getQuality()), $this);?>

					</select>&nbsp;&nbsp;
					<input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.record"), $this);?>
" class="button" />
					<?php if ($this->_tpl_vars['reviewAssignment']->getDateRated()): ?>
						&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewAssignment']->getDateRated())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

					<?php endif; ?>
				</form>
				</td>
			</tr>
		<?php endif; ?>
	</table>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</div>