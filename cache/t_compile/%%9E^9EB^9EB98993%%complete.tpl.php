<?php /* Smarty version 2.6.26, created on 2014-02-09 16:45:05
         compiled from trackDirector/submission/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'trackDirector/submission/complete.tpl', 12, false),array('function', 'url', 'trackDirector/submission/complete.tpl', 14, false),)), $this); ?>
<div id="complete">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.complete"), $this);?>
</h3>

<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'completePaper'), $this);?>
">
	<input type="hidden" name="paperId" value="<?php echo $this->_tpl_vars['submission']->getPaperId(); ?>
" />
	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.complete.description"), $this);?>

	<input name="complete" <?php if ($this->_tpl_vars['submission']->getStatus() == STATUS_PUBLISHED): ?>disabled="disabled" <?php endif; ?>type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.complete"), $this);?>
" class="button" />
	<input name="remove" <?php if ($this->_tpl_vars['submission']->getStatus() != STATUS_PUBLISHED): ?>disabled="disabled" <?php endif; ?>type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.remove"), $this);?>
" class="button" />
</form>
</div>