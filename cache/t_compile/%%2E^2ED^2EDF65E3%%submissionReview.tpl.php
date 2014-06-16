<?php /* Smarty version 2.6.26, created on 2014-02-09 17:11:38
         compiled from author/submissionReview.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'author/submissionReview.tpl', 14, false),array('function', 'url', 'author/submissionReview.tpl', 26, false),array('modifier', 'assign', 'author/submissionReview.tpl', 14, false),array('modifier', 'to_array', 'author/submissionReview.tpl', 28, false),)), $this); ?>
<?php echo ''; ?><?php if ($this->_tpl_vars['submission']->getReviewMode() == REVIEW_MODE_BOTH_SIMULTANEOUS): ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "submission.review"); ?><?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.page.review",'id' => $this->_tpl_vars['submission']->getPaperId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'pageTitleTranslated') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'pageTitleTranslated'));?><?php echo ''; ?><?php elseif ($this->_tpl_vars['stage'] == REVIEW_STAGE_ABSTRACT): ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "submission.abstractReview"); ?><?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.page.abstractReview",'id' => $this->_tpl_vars['submission']->getPaperId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'pageTitleTranslated') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'pageTitleTranslated'));?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "submission.paperReview"); ?><?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.page.paperReview",'id' => $this->_tpl_vars['submission']->getPaperId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'pageTitleTranslated') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'pageTitleTranslated'));?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<ul class="menu">
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submission','path' => $this->_tpl_vars['submission']->getPaperId()), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.summary"), $this);?>
</a></li>
	<?php if ($this->_tpl_vars['submission']->getReviewMode() == REVIEW_MODE_BOTH_SEQUENTIAL): ?>
		<li <?php if ($this->_tpl_vars['stage'] == REVIEW_STAGE_ABSTRACT): ?>class="current"<?php endif; ?>><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionReview','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, @REVIEW_STAGE_ABSTRACT) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, @REVIEW_STAGE_ABSTRACT))), $this);?>
">
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.abstractReview"), $this);?>
</a>
		</li>
		<li <?php if ($this->_tpl_vars['stage'] == REVIEW_STAGE_PRESENTATION): ?>class="current"<?php endif; ?>><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionReview','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, @REVIEW_STAGE_PRESENTATION) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, @REVIEW_STAGE_PRESENTATION))), $this);?>
">
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.paperReview"), $this);?>
</a>
		</li>
	<?php else: ?>
		<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionReview','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getPaperId())) ? $this->_run_mod_handler('to_array', true, $_tmp, @REVIEW_STAGE_ABSTRACT) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, @REVIEW_STAGE_ABSTRACT))), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.review"), $this);?>
</a></li>
	<?php endif; ?>
</ul>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "author/submission/summary.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="separator"></div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "author/submission/peerReview.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="separator"></div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "author/submission/directorDecision.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>