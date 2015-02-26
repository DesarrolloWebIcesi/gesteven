<?php /* Smarty version 2.6.26, created on 2013-10-31 17:51:03
         compiled from manager/timelineView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'manager/timelineView.tpl', 16, false),array('function', 'fieldLabel', 'manager/timelineView.tpl', 118, false),array('modifier', 'date_format', 'manager/timelineView.tpl', 22, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "manager.timeline.conferenceTimeline"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>

<div id="conferenceTimeline">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.conference"), $this);?>
</h3>

<table width="100%" class="data">
	<tr valign="top">
		<td width="40%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.schedConfStartsOn"), $this);?>
</td>
		<td width="60%" class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['startDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

		</td>
	</tr>
	<tr valign="top">
		<td width="40%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.schedConfEndsOn"), $this);?>
</td>
		<td width="60%" class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['endDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

		</td>
	</tr>
</table>
</div>
<br/>
<div id="websiteTimeline">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.website"), $this);?>
</h3>

<table width="100%" class="data">
	<tr valign="top">
		<td width="40%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.schedConfAppearsOn"), $this);?>
</td>
		<td width="60%" class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['siteStartDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

		</td>
	</tr>
	<tr valign="top">
		<td width="40%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.schedConfArchivedOn"), $this);?>
</td>
		<td width="60%" class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['siteEndDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

		</td>
	</tr>
</table>
</div>
<br/>
<div id="submissionsTimeline">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.submissions"), $this);?>
</h3>

<table width="100%" class="data">
	<tr valign="top">
		<td width="40%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.openRegAuthor"), $this);?>
</td>
		<td width="60%" class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['regAuthorOpenDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

		</td>
	</tr>
	<tr valign="top">
		<td width="40%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.closeRegAuthor"), $this);?>
</td>
		<td width="60%" class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['regAuthorCloseDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

		</td>
	</tr>
	<tr valign="top">
		<td width="40%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.showCFP"), $this);?>
</td>
		<td width="60%" class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['showCFPDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

		</td>
	</tr>
	<tr valign="top">
		<td width="40%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.submissionsOpen"), $this);?>
</td>
		<td width="60%" class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['submissionsOpenDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

		</td>
	</tr>
	<tr valign="top">
		<td width="40%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.submissionsClosed"), $this);?>
</td>
		<td width="60%" class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['submissionsCloseDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

		</td>
	</tr>
</table>
</div>
<br/>
<div id="reviewsTimeline">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.reviews"), $this);?>
</h3>

<table width="100%" class="data">
	<tr valign="top">
		<td width="40%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.openRegReviewer"), $this);?>
</td>
		<td width="60%" class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['regReviewerOpenDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

		</td>
	</tr>
	<tr valign="top">
		<td width="40%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.closeRegReviewer"), $this);?>
</td>
		<td width="60%" class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['regReviewerCloseDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

		</td>
	</tr>
</table>
</div>
<?php if ($this->_tpl_vars['postAbstracts'] || $this->_tpl_vars['postSchedule'] || $this->_tpl_vars['postPapers'] || $this->_tpl_vars['delayOpenAccess'] || $this->_tpl_vars['closeComments']): ?>

<br/>
<div id="websitePosting">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.timeline.websitePosting"), $this);?>
</h3>

<table width="100%" class="data">
	<?php if ($this->_tpl_vars['postAbstracts']): ?>
		<tr valign="top">
			<td width="40%" class="label">
				<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'postAbstracts','key' => "manager.timeline.postAbstracts"), $this);?>

			</td>
			<td width="60%" class="value">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['postAbstractsDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

			</td>
		</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['postSchedule']): ?>
		<tr valign="top">
			<td width="40%" class="label">
				<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'postSchedule','key' => "manager.timeline.postSchedule"), $this);?>

			</td>
			<td width="60%" class="value">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['postScheduleDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

			</td>
		</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['postPapers']): ?>
		<tr valign="top">
			<td width="40%" class="label">
				<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'postPapers','key' => "manager.timeline.postPapers"), $this);?>

			</td>
			<td width="60%" class="value">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['postPapersDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

			</td>
		</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['delayOpenAccess']): ?>
		<tr valign="top">
			<td width="40%" class="label">
				<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'delayOpenAccess','key' => "manager.timeline.delayOpenAccess"), $this);?>

			</td>
			<td width="60%" class="value">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['delayOpenAccessDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

			</td>
		</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['closeComments']): ?>
		<tr valign="top">
			<td width="40%" class="label">
				<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'closeComments','key' => "manager.timeline.closeComments.plain"), $this);?>

			</td>
			<td width="60%" class="value">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['closeCommentsDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>

			</td>
		</tr>
	<?php endif; ?>
</table>
</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>