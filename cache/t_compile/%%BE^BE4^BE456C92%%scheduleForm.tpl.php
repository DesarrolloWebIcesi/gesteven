<?php /* Smarty version 2.6.26, created on 2013-11-01 10:49:15
         compiled from manager/scheduler/scheduleForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'manager/scheduler/scheduleForm.tpl', 110, false),array('function', 'translate', 'manager/scheduler/scheduleForm.tpl', 121, false),array('function', 'fieldLabel', 'manager/scheduler/scheduleForm.tpl', 158, false),array('function', 'html_select_date', 'manager/scheduler/scheduleForm.tpl', 200, false),array('function', 'html_select_time', 'manager/scheduler/scheduleForm.tpl', 205, false),array('modifier', 'escape', 'manager/scheduler/scheduleForm.tpl', 129, false),array('modifier', 'truncate', 'manager/scheduler/scheduleForm.tpl', 130, false),array('modifier', 'concat', 'manager/scheduler/scheduleForm.tpl', 158, false),array('modifier', 'date_format', 'manager/scheduler/scheduleForm.tpl', 188, false),array('modifier', 'default', 'manager/scheduler/scheduleForm.tpl', 200, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "manager.scheduler.schedule"); ?><?php echo ''; ?><?php $this->assign('pageId', "manager.scheduler.schedule.scheduleForm"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<script type="text/javascript">
<!--
<?php echo '

// Used to update the actions list when the location of a presentation is
// changed or the corresponding checkbox is toggled. Room ID 0 indicates that
// a room has not been chosen for the presentation.
function changeLocation(paperId) {
	var checkVarName = "paper" + paperId + "RoomExists";
	var isChecked = eval("document.schedule." + checkVarName + ".checked");

	var roomIdVarName = "paper" + paperId + "Room";
	var roomId = eval("document.schedule." + roomIdVarName + ".value");

	if (!isChecked) {
		roomId = 0;
	}

	document.schedule.changes.value += "\\n" + paperId + " location " + roomId;
}

function checkScheduled(paperId) {
	var isChecked = eval("document.schedule.paper" + paperId + "DateExists.checked");
	if (!isChecked) {
		eval("document.schedule.paper" + paperId + "DateExists.checked = true;");
		changeDate(paperId);
	}
}

// Used to update the actions list when the date of a paper is changed
// or the corresponding checkbox is toggled. A date of 0 indicates that a
// date has not been chosen for the presentation.
function changeDate(paperId) {
	var checkVarName = "paper" + paperId + "DateExists";
	var isChecked = eval("document.schedule." + checkVarName + ".checked");

	var datePrefixName = "document.schedule.paper" + paperId + "Date";
	var paperMonth = eval(datePrefixName + "Month.value");
	var paperDay = eval(datePrefixName + "Day.value");
	var paperYear = eval(datePrefixName + "Year.value");

	var paperDate;

	if (isChecked) {
		paperDate = paperMonth + "-" + paperDay + "-" + paperYear;
	} else {
		paperDate = "0";
	}

	document.schedule.changes.value += "\\n" + paperId + " date " + paperDate;
}

// Used to update the actions list when the time block of a paper is changed
// or the corresponding checkbox is toggled. A time block ID of 0 indicates that
// a time block has not been chosen for the presentation.
function changeTimeBlock(paperId) {
	var checkVarName = "paper" + paperId + "TimeBlockExists";
	var isChecked = eval("document.schedule." + checkVarName + ".checked");

	var timeBlockIdVarName = "paper" + paperId + "TimeBlock";
	var timeBlockId = eval("document.schedule." + timeBlockIdVarName + ".value");

	if (!isChecked) {
		timeBlockId = 0;
	}

	document.schedule.changes.value += "\\n" + paperId + " timeBlock " + timeBlockId;
}

// Used to update the actions list when the start or end time of a paper is
// changed.
function changeTime(paperId) {
	var timePrefixName = "document.schedule.paper" + paperId + "StartTime";
	var paperHour = eval(timePrefixName + "Hour.value");
	var paperMinute = eval(timePrefixName + "Minute.value");
	var paperMeridian = eval(timePrefixName + "Meridian.value");

	var paperTime = paperHour + ":" + paperMinute + \' \' + paperMeridian;
	document.schedule.changes.value += "\\n" + paperId + " startTime" + " " + paperTime;

	var timePrefixName = "document.schedule.paper" + paperId + "EndTime";
	var paperHour = eval(timePrefixName + "Hour.value");
	var paperMinute = eval(timePrefixName + "Minute.value");
	var paperMeridian = eval(timePrefixName + "Meridian.value");

	var paperTime = paperHour + ":" + paperMinute + \' \' + paperMeridian;

	document.schedule.changes.value += "\\n" + paperId + " endTime" + " " + paperTime;
}

// Used to sort the display by a certain piece of data
function sortBy(sortName) {
	document.schedule.sort.value = sortName;
	document.schedule.action = "'; ?>
<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'schedule'), $this);?>
<?php echo '";
	document.schedule.submit();
}

'; ?>

// -->
</script>

<?php $this->assign('enableTimeBlocks', $this->_tpl_vars['currentSchedConf']->getSetting('enableTimeBlocks')); ?>
<?php if ($this->_tpl_vars['enableTimeBlocks']): ?>
	<ul class="menu">
		<li class="current"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'schedule'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.schedule"), $this);?>
</a></li>
		<li><a onclick="return (document.schedule.changes.value == ''?true:confirm('Are you sure you wish to leave the Scheduler? You will lose any changes you have made.'))" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'timeBlocks'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.timeBlocks"), $this);?>
</a></li>
	</ul>
<?php endif; ?>
<br/>

<form name="schedule" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveSchedule'), $this);?>
">
<input name="changes" type="hidden" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['changes'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<input name="sort" type="hidden" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sort'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20) : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 20)))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="publishedPapers">

<table width="100%" class="listing">
	<tr>
		<td colspan="5" class="headseparator">&nbsp;</td>
	</tr>
	<tr valign="top" class="heading">
		<td width="5%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.id"), $this);?>
</td>
		<td width="49%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.title"), $this);?>
</td>
		<td colspan="3" width="46%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.schedule"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="5" class="headseparator">&nbsp;</td>
	</tr>
	<?php $_from = $this->_tpl_vars['publishedPapers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['publishedPapers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['publishedPapers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['publishedPaper']):
        $this->_foreach['publishedPapers']['iteration']++;
?>
	<?php $this->assign('startTime', $this->_tpl_vars['publishedPaper']->getStartTime()); ?>
	<?php $this->assign('endTime', $this->_tpl_vars['publishedPaper']->getEndTime()); ?>
	<tr valign="top">
		<td rowspan="<?php if ($this->_tpl_vars['enableTimeBlocks']): ?>2<?php else: ?>4<?php endif; ?>"><?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
		<td rowspan="<?php if ($this->_tpl_vars['enableTimeBlocks']): ?>2<?php else: ?>4<?php endif; ?>">
			<input name="paperIds[]" type="hidden" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
			<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getLocalizedTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getTrackTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
)<br />
			<em><?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getAuthorString())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</em>
		</td>
		<td width="4%"><input id="paper<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
RoomExists" type="checkbox" <?php if ($this->_tpl_vars['publishedPaper']->getRoomId()): ?>checked="checked" <?php endif; ?>name="paper<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
RoomExists" onchange="changeLocation(<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
);" /></td>
		<td width="9%"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => ((is_array($_tmp='paper')) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'RoomExists') : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'RoomExists')),'key' => "manager.scheduler.location"), $this);?>
</td>
		<td width="33%">
			<select id="paper<?php echo $this->_tpl_vars['publishedPaper']->getId(); ?>
Room" name="paper<?php echo $this->_tpl_vars['publishedPaper']->getId(); ?>
Room" onchange="document.schedule.paper<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
RoomExists.checked = true; changeLocation(<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
);" class="selectMenu">
				<?php $_from = $this->_tpl_vars['buildingsAndRooms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['buildingId'] => $this->_tpl_vars['buildingEntry']):
?>
					<option disabled="disabled" value=""><?php echo $this->_tpl_vars['buildingEntry']['building']->getBuildingAbbrev(); ?>
</option>
					<?php $_from = $this->_tpl_vars['buildingEntry']['rooms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['roomId'] => $this->_tpl_vars['room']):
?>
						<option <?php if ($this->_tpl_vars['publishedPaper']->getRoomId() == $this->_tpl_vars['roomId']): ?>selected="selected" <?php endif; ?>value="<?php echo ((is_array($_tmp=$this->_tpl_vars['roomId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
">&nbsp;&#187;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['room']->getRoomAbbrev())) ? $this->_run_mod_handler('truncate', true, $_tmp, 15, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 15, "...")); ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				<?php endforeach; endif; unset($_from); ?>
			</select>
		</td>
	</tr>
<?php if ($this->_tpl_vars['enableTimeBlocks']): ?>
	<tr>
		<td><input type="checkbox" <?php if ($this->_tpl_vars['startTime']): ?>checked="checked" <?php endif; ?>id="paper<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
TimeBlockExists" name="paper<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
TimeBlockExists" onchange="changeTimeBlock(<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
);" /></td>
		<td><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => ((is_array($_tmp='paper')) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'TimeBlockExists') : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'TimeBlockExists')),'key' => "common.date"), $this);?>
</td>
		<td>
						<?php $this->assign('timeBlockFound', 0); ?>
			<?php $_from = $this->_tpl_vars['timeBlocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['timeBlock']):
?>
				<?php if ($this->_tpl_vars['timeBlock']->getStartTime() == $this->_tpl_vars['startTime'] && $this->_tpl_vars['timeBlock']->getEndTime() == $this->_tpl_vars['endTime']): ?>
					<?php $this->assign('timeBlockFound', 1); ?>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>

			<select <?php if ($this->_tpl_vars['startTime'] && ! $this->_tpl_vars['timeBlockFound']): ?>disabled="disabled" <?php endif; ?> id="paper<?php echo $this->_tpl_vars['publishedPaper']->getId(); ?>
TimeBlock" name="paper<?php echo $this->_tpl_vars['publishedPaper']->getId(); ?>
TimeBlock" onchange="document.schedule.paper<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
TimeBlockExists.checked = true; changeTimeBlock(<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
);" class="selectMenu">
				<?php if ($this->_tpl_vars['startTime'] && ! $this->_tpl_vars['timeBlockFound']): ?>
										<option><?php echo ((is_array($_tmp=$this->_tpl_vars['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['datetimeFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['datetimeFormatShort'])); ?>
 &mdash; <?php echo ((is_array($_tmp=$this->_tpl_vars['endTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['timeFormat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['timeFormat'])); ?>
</option>
				<?php endif; ?>
				<?php $_from = $this->_tpl_vars['timeBlocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['timeBlock']):
?>
					<option <?php if ($this->_tpl_vars['timeBlock']->getStartTime() == $this->_tpl_vars['startTime'] && $this->_tpl_vars['timeBlock']->getEndTime() == $this->_tpl_vars['endTime']): ?>selected="selected" <?php endif; ?>value="<?php echo ((is_array($_tmp=$this->_tpl_vars['timeBlock']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['timeBlock']->getStartTime())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['datetimeFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['datetimeFormatShort'])); ?>
 &mdash; <?php echo ((is_array($_tmp=$this->_tpl_vars['timeBlock']->getEndTime())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['timeFormat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['timeFormat'])); ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select>
		</td>
	</tr>
<?php else: ?>	<tr>
		<td><input type="checkbox" <?php if ($this->_tpl_vars['startTime']): ?>checked="checked" <?php endif; ?>id="paper<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
DateExists" name="paper<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
DateExists" onchange="changeDate(<?php echo ((is_array($_tmp=$this->_tpl_vars['publishedPaper']->getId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
);" /></td>
		<td><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => ((is_array($_tmp='paper')) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'DateExists') : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'DateExists')),'key' => "common.date"), $this);?>
</td>
		<td><?php echo smarty_function_html_select_date(array('prefix' => ((is_array($_tmp='paper')) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'Date') : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'Date')),'all_extra' => ((is_array($_tmp="class=\"selectMenu\" onchange=\"checkScheduled(")) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), "); changeDate(", $this->_tpl_vars['publishedPaper']->getId(), ");\"") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), "); changeDate(", $this->_tpl_vars['publishedPaper']->getId(), ");\"")),'time' => ((is_array($_tmp=@$this->_tpl_vars['startTime'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['defaultStartTime']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['defaultStartTime'])),'start_year' => $this->_tpl_vars['firstYear'],'end_year' => $this->_tpl_vars['lastYear']), $this);?>
</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => ((is_array($_tmp='paper')) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'StartTime') : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'StartTime')),'key' => "manager.scheduler.startTime"), $this);?>
</td>
		<td id="<?php echo ((is_array($_tmp='paper')) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'StartTime') : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'StartTime')); ?>
"><?php echo smarty_function_html_select_time(array('prefix' => ((is_array($_tmp='paper')) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'StartTime') : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'StartTime')),'all_extra' => ((is_array($_tmp="class=\"selectMenu\" onchange=\"checkScheduled(")) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), "); changeTime(", $this->_tpl_vars['publishedPaper']->getId(), ");\"") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), "); changeTime(", $this->_tpl_vars['publishedPaper']->getId(), ");\"")),'display_seconds' => false,'display_meridian' => true,'use_24_hours' => false,'time' => ((is_array($_tmp=@$this->_tpl_vars['startTime'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['defaultStartTime']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['defaultStartTime']))), $this);?>
</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => ((is_array($_tmp='paper')) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'EndTime') : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'EndTime')),'key' => "manager.scheduler.endTime"), $this);?>
</td>
		<td id="<?php echo ((is_array($_tmp='paper')) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'EndTime') : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'EndTime')); ?>
">
			<?php echo smarty_function_html_select_time(array('prefix' => ((is_array($_tmp='paper')) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'EndTime') : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), 'EndTime')),'all_extra' => ((is_array($_tmp="class=\"selectMenu\" onchange=\"checkScheduled(")) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['publishedPaper']->getId(), "); changeTime(", $this->_tpl_vars['publishedPaper']->getId(), ");\"") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['publishedPaper']->getId(), "); changeTime(", $this->_tpl_vars['publishedPaper']->getId(), ");\"")),'display_seconds' => false,'display_meridian' => true,'use_24_hours' => false,'time' => ((is_array($_tmp=@$this->_tpl_vars['endTime'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['defaultStartTime']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['defaultStartTime']))), $this);?>

		</td>
	</tr>
<?php endif; ?>	<tr>
		<td colspan="5" class="<?php if (($this->_foreach['publishedPapers']['iteration'] == $this->_foreach['publishedPapers']['total'])): ?>end<?php endif; ?>separator">&nbsp;</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<?php if (empty ( $this->_tpl_vars['publishedPapers'] )): ?>
	<tr>
		<td colspan="5" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="5" class="endseparator">&nbsp;</td>
	</tr>
	<?php endif; ?>
</table>
</div>
<p>
	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.sortBy"), $this);?>

	<a href="javascript:sortBy('startTime');"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.startTime"), $this);?>
</a>&nbsp;|
	<a href="javascript:sortBy('author');"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.author"), $this);?>
</a>&nbsp;|
	<a href="javascript:sortBy('room');"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.location"), $this);?>
</a>&nbsp;|
	<a href="javascript:sortBy('track');"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "track.track"), $this);?>
</a>&nbsp;|
	<a href="javascript:sortBy('title');"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "paper.title"), $this);?>
</a>
</p>

<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'scheduler'), $this);?>
'" /></p>

</form>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>