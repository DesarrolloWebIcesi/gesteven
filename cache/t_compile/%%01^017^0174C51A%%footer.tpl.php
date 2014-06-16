<?php /* Smarty version 2.6.26, created on 2013-10-31 15:42:51
         compiled from paper/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'call_hook', 'paper/footer.tpl', 11, false),array('function', 'url', 'paper/footer.tpl', 40, false),array('modifier', 'to_array', 'paper/footer.tpl', 40, false),)), $this); ?>
<?php echo $this->_plugins['function']['call_hook'][0][0]->smartyCallHook(array('name' => "Templates::Paper::Footer::PageFooter"), $this);?>

</div>

</div>
</div>
</div>

<?php if ($this->_tpl_vars['defineTermsContextId']): ?>
<script type="text/javascript">
<?php echo '
<!--
	// Open "Define Terms" context when double-clicking any text
	function openSearchTermWindow(url) {
		var term;
		if (window.getSelection) {
			term = window.getSelection();
		} else if (document.getSelection) {
			term = document.getSelection();
		} else if(document.selection && document.selection.createRange && document.selection.type.toLowerCase() == \'text\') {
			var range = document.selection.createRange();
			term = range.text;
		}
		if (url.indexOf(\'?\') > -1) openRTWindowWithToolbar(url + \'&defineTerm=\' + term);
		else openRTWindowWithToolbar(url + \'?defineTerm=\' + term);
	}

	if(document.captureEvents) {
		document.captureEvents(Event.DBLCLICK);
	}
	document.ondblclick = new Function("openSearchTermWindow(\''; ?>
<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'rt','op' => 'context','path' => ((is_array($_tmp=$this->_tpl_vars['paperId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['galleyId'], $this->_tpl_vars['defineTermsContextId']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['galleyId'], $this->_tpl_vars['defineTermsContextId']))), $this);?>
<?php echo '\')");
// -->
'; ?>

</script>
<?php endif; ?>

</body>
</html>