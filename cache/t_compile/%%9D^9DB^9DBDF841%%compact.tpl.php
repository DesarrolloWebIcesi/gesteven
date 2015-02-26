<?php /* Smarty version 2.6.26, created on 2013-11-03 15:44:19
         compiled from schedConf/schedules/compact.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'schedConf/schedules/compact.tpl', 12, false),array('function', 'url', 'schedConf/schedules/compact.tpl', 88, false),array('modifier', 'assign', 'schedConf/schedules/compact.tpl', 12, false),array('modifier', 'escape', 'schedConf/schedules/compact.tpl', 34, false),array('modifier', 'date_format', 'schedConf/schedules/compact.tpl', 67, false),array('modifier', 'count', 'schedConf/schedules/compact.tpl', 94, false),)), $this); ?>
<?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.schedule.title"), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'pageTitleTranslated') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'pageTitleTranslated'));?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php if (! empty ( $this->_tpl_vars['buildingsAndRooms'] )): ?>
		<?php if (! $this->_tpl_vars['hideNav'] && ! $this->_tpl_vars['hideLocations']): ?>
	<ul id="navigation" class="plain">
		<li>&#187; <a href="#locations"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.scheduler.locations"), $this);?>
</a></li>
		<li>&#187; <a href="#schedule"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.schedule"), $this);?>
</a></li>
	</ul>
	<?php endif; ?>

<?php if (! $this->_tpl_vars['hideLocations']): ?>
<div id="locations">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.scheduler.locations"), $this);?>
</h3>

<ul>
<?php $_from = $this->_tpl_vars['buildingsAndRooms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['buildingId'] => $this->_tpl_vars['entry']):
?>
	<li>
		<h4><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['building']->getBuildingName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</h4>
		<?php if ($this->_tpl_vars['entry']['building']->getBuildingDescription() != ''): ?>
			<p><?php echo $this->_tpl_vars['entry']['building']->getBuildingDescription(); ?>
</p>
		<?php endif; ?>
		<?php if (! empty ( $this->_tpl_vars['entry']['rooms'] )): ?>
			<ul>
			<?php $_from = $this->_tpl_vars['entry']['rooms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['room']):
?>
				<li>
					<strong><?php echo $this->_tpl_vars['room']->getRoomName(); ?>
</strong>
					<?php if ($this->_tpl_vars['room']->getRoomDescription() != ''): ?>
						 - <?php echo $this->_tpl_vars['room']->getRoomDescription(); ?>

					<?php endif; ?>
				</li>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		<?php endif; ?>	</li>
<?php endforeach; endif; unset($_from); ?>
</ul>

<div class="separator"></div>
</div>
<?php endif; ?>

<div id="schedule">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "schedConf.schedule"), $this);?>
</h3>

<table class="listing" width="100%">
<?php $this->assign('lastStartTime', 0); ?>
<?php $this->assign('needsTdClose', 0); ?>
<?php $_from = $this->_tpl_vars['itemsByTime']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['startTime'] => $this->_tpl_vars['list']):
?>
	<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<?php $this->assign('endTime', $this->_tpl_vars['item']->getEndTime()); ?>
		<?php if (! $this->_tpl_vars['lastStartTime'] || ((is_array($_tmp=$this->_tpl_vars['lastStartTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])) != ((is_array($_tmp=$this->_tpl_vars['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort']))): ?>
			<?php if ($this->_tpl_vars['needsTdClose']): ?>
				</td>
				<?php $this->assign('needsTdClose', 0); ?>
			<?php endif; ?>
			<tr><td><h5><?php echo ((is_array($_tmp=$this->_tpl_vars['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>
</h5></td></tr>
		<?php endif; ?>
		<?php if (((is_array($_tmp=$this->_tpl_vars['lastStartTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['datetimeFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['datetimeFormatShort'])) != ((is_array($_tmp=$this->_tpl_vars['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['datetimeFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['datetimeFormatShort']))): ?>
			<?php if ($this->_tpl_vars['needsTdClose']): ?>
				</td>
				<?php $this->assign('needsTdClose', 0); ?>
			<?php endif; ?>
			<tr><td width="15%"><?php echo ((is_array($_tmp=$this->_tpl_vars['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['timeFormat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['timeFormat'])); ?>
 <?php if ($this->_tpl_vars['showEndTime']): ?>- <?php echo ((is_array($_tmp=$this->_tpl_vars['endTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['timeFormat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['timeFormat'])); ?>
<?php endif; ?></td>
			<?php $this->assign('needsTdClose', 1); ?>
		<?php endif; ?>
		<?php if (( get_class ( $this->_tpl_vars['item'] ) == 'SpecialEvent' || get_class ( $this->_tpl_vars['item'] ) == 'specialevent' )): ?>
			<td width="85%">
				<strong><?php echo ((is_array($_tmp=$this->_tpl_vars['item']->getSpecialEventName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</strong><?php if ($this->_tpl_vars['item']->getSpecialEventDescription() != ''): ?>:&nbsp;<?php echo $this->_tpl_vars['item']->getSpecialEventDescription(); ?>
<?php endif; ?>
			</td>
		<?php else: ?>
			<td width="85%">
				<?php if ($this->_tpl_vars['showAuthors']): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['item']->getAuthorString())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
, <?php endif; ?><a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'paper','op' => 'view','path' => $this->_tpl_vars['item']->getBestPaperId()), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']->getLocalizedTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>
				<?php $this->assign('roomId', $this->_tpl_vars['item']->getRoomId()); ?>
				<?php if ($this->_tpl_vars['roomId'] && $this->_tpl_vars['allRooms'][$this->_tpl_vars['roomId']]): ?>
					<?php $this->assign('room', $this->_tpl_vars['allRooms'][$this->_tpl_vars['roomId']]); ?>
					<?php $this->assign('buildingId', $this->_tpl_vars['room']->getBuildingId()); ?>
					<?php $this->assign('building', $this->_tpl_vars['buildingsAndRooms'][$this->_tpl_vars['buildingId']]['building']); ?>
					<?php if ($this->_tpl_vars['building'] && count($this->_tpl_vars['buildingsAndRooms']) != 1): ?><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.building"), $this);?>
:&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['building']->getBuildingName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?>
					<br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.room"), $this);?>
:&nbsp;<?php echo $this->_tpl_vars['room']->getRoomName(); ?>

				<?php endif; ?>
			</td>
		<?php endif; ?>
		<?php $this->assign('lastStartTime', $this->_tpl_vars['startTime']); ?>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['needsTdClose']): ?>
	</td>
<?php endif; ?>
</table>
</div>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>