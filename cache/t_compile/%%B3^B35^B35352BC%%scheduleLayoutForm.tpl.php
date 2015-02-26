<?php /* Smarty version 2.6.26, created on 2014-02-24 11:36:41
         compiled from manager/scheduler/scheduleLayoutForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'manager/scheduler/scheduleLayoutForm.tpl', 18, false),array('function', 'translate', 'manager/scheduler/scheduleLayoutForm.tpl', 21, false),array('function', 'fieldLabel', 'manager/scheduler/scheduleLayoutForm.tpl', 27, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "manager.scheduler.layout"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<div id="scheduleLayoutForm">

<form name="scheduleLayout" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveScheduleLayout'), $this);?>
">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.layout.mergeSchedules"), $this);?>
</h4>
<table class="data" width="100%">
	<tr valign="top">
		<td width="5%" align="left">
			<input type="checkbox" id="mergeSchedules" name="mergeSchedules" value="1"<?php if ($this->_tpl_vars['mergeSchedules']): ?> checked="checked"<?php endif; ?> />
		</td>
		<td><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'mergeSchedules','key' => "manager.scheduler.layout.mergeSchedulesDescription"), $this);?>
</td>
	</tr>
	<tr valign="top">
		<td align="left">
			<input type="checkbox" id="showEndTime" name="showEndTime" value="1"<?php if ($this->_tpl_vars['showEndTime']): ?> checked="checked"<?php endif; ?> />
		</td>
		<td><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'showEndTime','key' => "manager.scheduler.layout.showEndTime"), $this);?>
</td>
	</tr>
	<tr valign="top">
		<td align="left">
			<input type="checkbox" id="showAuthors" name="showAuthors" value="1"<?php if ($this->_tpl_vars['showAuthors']): ?> checked="checked"<?php endif; ?> />
		</td>
		<td><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'showAuthors','key' => "manager.scheduler.layout.showAuthors"), $this);?>
</td>
	</tr>
	<tr valign="top">
		<td align="left">
			<input type="checkbox" id="hideNav" name="hideNav" value="1"<?php if ($this->_tpl_vars['hideNav']): ?> checked="checked"<?php endif; ?> />
		</td>
		<td><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'hideNav','key' => "manager.scheduler.layout.hideNav"), $this);?>
</td>
	</tr>
	<tr valign="top">
		<td align="left">
			<input type="checkbox" id="hideLocations" name="hideLocations" value="1"<?php if ($this->_tpl_vars['hideLocations']): ?> checked="checked"<?php endif; ?> />
		</td>
		<td><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'hideLocations','key' => "manager.scheduler.layout.hideLocations"), $this);?>
</td>
	</tr>
</table>

<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.layout.style"), $this);?>
</h4>

<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.layout.style.description"), $this);?>
</p>

<table class="data" width="100%">
	<tr valign="top">
		<td width="5%" align="left">
			<input type="radio" name="layoutType" id="layoutType-compact" value="<?php echo @SCHEDULE_LAYOUT_COMPACT; ?>
" <?php if ($this->_tpl_vars['layoutType'] == @SCHEDULE_LAYOUT_COMPACT): ?> checked="checked"<?php endif; ?> />
		</td>
		<td><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "layoutType-compact",'key' => "manager.scheduler.layout.style.compact"), $this);?>
</td>
	</tr>
	<tr valign="top">
		<td align="left">
			<input type="radio" name="layoutType" id="layoutType-expanded" value="<?php echo @SCHEDULE_LAYOUT_EXPANDED; ?>
" <?php if ($this->_tpl_vars['layoutType'] == @SCHEDULE_LAYOUT_EXPANDED): ?> checked="checked"<?php endif; ?> />
		</td>
		<td><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "layoutType-expanded",'key' => "manager.scheduler.layout.style.expanded"), $this);?>
</td>
	</tr>
</table>

<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'scheduler'), $this);?>
'" /></p>

</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>