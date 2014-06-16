<?php /* Smarty version 2.6.26, created on 2014-02-09 17:16:13
         compiled from paper/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'paper/view.tpl', 19, false),array('modifier', 'assign', 'paper/view.tpl', 35, false),array('modifier', 'to_array', 'paper/view.tpl', 38, false),array('function', 'url', 'paper/view.tpl', 35, false),array('function', 'translate', 'paper/view.tpl', 54, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo ((is_array($_tmp=$this->_tpl_vars['defaultCharset'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
	<title><?php echo ((is_array($_tmp=$this->_tpl_vars['paper']->getFirstAuthor(true))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</title>

	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseUrl']; ?>
/lib/pkp/styles/common.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseUrl']; ?>
/styles/common.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseUrl']; ?>
/styles/paperView.css" type="text/css" />

	<?php $_from = $this->_tpl_vars['stylesheets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cssUrl']):
?>
		<link rel="stylesheet" href="<?php echo $this->_tpl_vars['cssUrl']; ?>
" type="text/css" />
	<?php endforeach; endif; unset($_from); ?>

	<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseUrl']; ?>
/lib/pkp/js/general.js"></script>
	<?php echo $this->_tpl_vars['additionalHeadData']; ?>

</head>
<frameset cols="*,180" style="border: 0;">
	<?php if (! $this->_tpl_vars['galley']): ?>
		<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewPaper','path' => $this->_tpl_vars['paperId']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'paperUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'paperUrl'));?>

		<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewRST','path' => $this->_tpl_vars['paperId']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'rstUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'rstUrl'));?>

	<?php else: ?>
		<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewRST','path' => ((is_array($_tmp=$this->_tpl_vars['paperId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['galleyId']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['galleyId']))), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'rstUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'rstUrl'));?>

		<?php if ($this->_tpl_vars['galley']->isHtmlGalley()): ?>
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewPaper','path' => ((is_array($_tmp=$this->_tpl_vars['paperId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['galleyId']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['galleyId']))), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'paperUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'paperUrl'));?>

		<?php elseif ($this->_tpl_vars['galley']->isPdfGalley()): ?>
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewPDFInterstitial','path' => ((is_array($_tmp=$this->_tpl_vars['paperId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['galleyId']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['galleyId']))), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'paperUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'paperUrl'));?>

		<?php else: ?>
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewDownloadInterstitial','path' => ((is_array($_tmp=$this->_tpl_vars['paperId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['galleyId']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['galleyId']))), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'paperUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'paperUrl'));?>

		<?php endif; ?>
	<?php endif; ?>
	<frame src="<?php echo $this->_tpl_vars['paperUrl']; ?>
" frameborder="0"/>
	<frame src="<?php echo $this->_tpl_vars['rstUrl']; ?>
" noresize="noresize" frameborder="0" scrolling="auto" />
<noframes>
<body>
	<table width="100%">
		<tr>
			<td align="center">
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.error.framesRequired",'url' => $this->_tpl_vars['paperUrl']), $this);?>

			</td>
		</tr>
	</table>
</body>
</noframes>
</frameset>
</html>