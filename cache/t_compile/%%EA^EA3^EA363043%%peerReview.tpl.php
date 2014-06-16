<?php /* Smarty version 2.6.26, created on 2014-02-09 17:11:38
         compiled from author/submission/peerReview.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'author/submission/peerReview.tpl', 13, false),array('function', 'url', 'author/submission/peerReview.tpl', 29, false),array('modifier', 'ord', 'author/submission/peerReview.tpl', 15, false),array('modifier', 'to_array', 'author/submission/peerReview.tpl', 29, false),array('modifier', 'escape', 'author/submission/peerReview.tpl', 29, false),array('modifier', 'date_format', 'author/submission/peerReview.tpl', 29, false),array('modifier', 'chr', 'author/submission/peerReview.tpl', 67, false),)), $this); ?>

<div id="peerReview">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.peerReview"), $this);?>
</h3>

<?php $this->assign('start', ((is_array($_tmp='A')) ? $this->_run_mod_handler('ord', true, $_tmp) : ord($_tmp))); ?>
<?php $this->assign('authorFiles', $this->_tpl_vars['submission']->getAuthorFileRevisions($this->_tpl_vars['stage'])); ?>
<?php $this->assign('directorFiles', $this->_tpl_vars['submission']->getDirectorFileRevisions($this->_tpl_vars['stage'])); ?>
<?php $this->assign('viewableFiles', $this->_tpl_vars['authorViewableFilesByStage'][$this->_tpl_vars['stage']]); ?>

<table class="data" width="100%">
	<?php if ($this->_tpl_vars['stage'] == REVIEW_STAGE_PRESENTATION): ?>
		<tr valign="top">
			<td class="label" width="20%">
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.reviewVersion"), $this);?>

			</td>
			<td class="value" width="80%">
				<?php $this->assign('reviewFile', $this->_tpl_vars['reviewFilesByStage'][$this->_tpl_vars['stage']]); ?>
				<?php if ($this->_tpl_vars['reviewFile']): ?>
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewFile']->getFileId(), $this->_tpl_vars['reviewFile']->getRevision()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewFile']->getFileId(), $this->_tpl_vars['reviewFile']->getRevision()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewFile']->getDateModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

				<?php else: ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>

				<?php endif; ?>
			</td>
		</tr>
	<?php endif; ?>
	<tr valign="top">
		<td class="label" width="20%">
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.initiated"), $this);?>

		</td>
		<td class="value" width="80%">
			<?php if ($this->_tpl_vars['reviewEarliestNotificationByStage'][$this->_tpl_vars['stage']]): ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewEarliestNotificationByStage'][$this->_tpl_vars['stage']])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

			<?php else: ?>
				&mdash;
			<?php endif; ?>
		</td>
	</tr>
	<tr valign="top">
		<td class="label" width="20%">
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.lastModified"), $this);?>

		</td>
		<td class="value" width="80%">
			<?php if ($this->_tpl_vars['reviewModifiedByStage'][$this->_tpl_vars['stage']]): ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewModifiedByStage'][$this->_tpl_vars['stage']])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

			<?php else: ?>
				&mdash;
			<?php endif; ?>
		</td>
	</tr>
	<tr valign="top">
		<td class="label" width="20%">
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.uploadedFile"), $this);?>

		</td>
		<td class="value" width="80%">
			<?php $_from = $this->_tpl_vars['viewableFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reviewer'] => $this->_tpl_vars['reviewerFiles']):
?>
				<?php $_from = $this->_tpl_vars['reviewerFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['viewableFile']):
?>
					<?php $this->assign('thisReviewer', ((is_array($_tmp=$this->_tpl_vars['start']+$this->_tpl_vars['reviewer'])) ? $this->_run_mod_handler('chr', true, $_tmp) : chr($_tmp))); ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.reviewer"), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['thisReviewer'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>

					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['viewableFile']->getFileId(), $this->_tpl_vars['viewableFile']->getRevision()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['viewableFile']->getFileId(), $this->_tpl_vars['viewableFile']->getRevision()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['viewableFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['viewableFile']->getDateModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>
<br />
				<?php endforeach; endif; unset($_from); ?>
			<?php endforeach; else: ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>

			<?php endif; unset($_from); ?>
		</td>
	</tr>
	<tr valign="top">
		<td class="label" width="20%">
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.directorVersion"), $this);?>

		</td>
		<td class="value" width="80%">
			<?php $_from = $this->_tpl_vars['directorFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['directorFile']):
?>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['directorFile']->getFileId(), $this->_tpl_vars['directorFile']->getRevision()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['directorFile']->getFileId(), $this->_tpl_vars['directorFile']->getRevision()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['directorFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['directorFile']->getDateModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>
<br />
			<?php endforeach; else: ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>

			<?php endif; unset($_from); ?>
		</td>
	</tr>
	<?php if ($this->_tpl_vars['stage'] == REVIEW_STAGE_PRESENTATION): ?>
		<tr valign="top">
			<td class="label" width="20%">
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.authorVersion"), $this);?>

			</td>
			<td class="value" width="80%">
				<?php $_from = $this->_tpl_vars['authorFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['authorFile']):
?>
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['authorFile']->getFileId(), $this->_tpl_vars['authorFile']->getRevision()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['authorFile']->getFileId(), $this->_tpl_vars['authorFile']->getRevision()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['authorFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['authorFile']->getDateModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>
<br />
				<?php endforeach; else: ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>

				<?php endif; unset($_from); ?>
			</td>
		</tr>
	<?php endif; ?>
</table>
</div>