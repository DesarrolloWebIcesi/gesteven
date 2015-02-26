<?php /* Smarty version 2.6.26, created on 2013-11-01 10:49:11
         compiled from manager/scheduler/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'manager/scheduler/index.tpl', 16, false),array('function', 'url', 'manager/scheduler/index.tpl', 20, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "manager.scheduler"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.description"), $this);?>
</p>

<div id="timeBlockSettings">
	<?php $this->assign('enableTimeBlocks', $this->_tpl_vars['currentSchedConf']->getSetting('enableTimeBlocks')); ?>
	<form action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveSchedulerSettings'), $this);?>
" method="post">
		<input type="radio" name="enableTimeBlocks" id="enableTimeBlocks-0" value="0" <?php if (! $this->_tpl_vars['enableTimeBlocks']): ?>checked="checked" <?php endif; ?>/>&nbsp;<label for="enableTimeBlocks-0"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.disableTimeBlocks"), $this);?>
</label><br />
		<input type="radio" name="enableTimeBlocks" id="enableTimeBlocks-1" value="1" <?php if ($this->_tpl_vars['enableTimeBlocks']): ?>checked="checked" <?php endif; ?>/>&nbsp;<label for="enableTimeBlocks-1"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.enableTimeBlocks"), $this);?>
</label><br />
		<input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.record"), $this);?>
" class="button defaultButton" />
	</form>
</div>

<div id="roomsAndEvents">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.roomsAndEvents"), $this);?>
</h3>

<ul class="plain">
	<li>&#187; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'buildings','clearPageContext' => 1), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.buildingsAndRooms"), $this);?>
</a></li>
	<li>&#187; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'specialEvents','clearPageContext' => 1), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.specialEvents"), $this);?>
</a></li>
</ul>
</div>
<div id="scheduling">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.scheduling"), $this);?>
</h3>

<ul class="plain">
	<li>&#187; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'schedule'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.schedule"), $this);?>
</a></li>
	<?php if ($this->_tpl_vars['enableTimeBlocks']): ?><li>&#187; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'timeBlocks','clearPageContext' => 1), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.timeBlocks"), $this);?>
</a></li><?php endif; ?>
	<li>&#187; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'scheduleLayout'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.scheduler.layout"), $this);?>
</a></li>
</ul>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>