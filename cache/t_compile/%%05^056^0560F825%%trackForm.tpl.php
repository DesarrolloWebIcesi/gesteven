<?php /* Smarty version 2.6.26, created on 2014-01-26 18:03:40
         compiled from manager/tracks/trackForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'manager/tracks/trackForm.tpl', 17, false),array('function', 'translate', 'manager/tracks/trackForm.tpl', 63, false),array('function', 'fieldLabel', 'manager/tracks/trackForm.tpl', 106, false),array('function', 'form_language_chooser', 'manager/tracks/trackForm.tpl', 111, false),array('function', 'html_options', 'manager/tracks/trackForm.tpl', 132, false),array('modifier', 'escape', 'manager/tracks/trackForm.tpl', 19, false),array('modifier', 'assign', 'manager/tracks/trackForm.tpl', 108, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "track.track"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "track.track"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<form name="track" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'updateTrack'), $this);?>
" onsubmit="return saveSelectedDirectors()">
<?php if ($this->_tpl_vars['trackId']): ?>
<input type="hidden" name="trackId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['trackId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<?php endif; ?>
<input type="hidden" name="assignedDirectors" value="" />
<input type="hidden" name="unassignedDirectors" value="" />

<?php echo '
<script type="text/javascript">
<!--
	// Move the currently selected item between two select menus
	function moveSelectItem(currField, newField) {
		var selectedIndex = currField.selectedIndex;
		
		if (selectedIndex == -1) {
			return;
		}
		
		var selectedOption = currField.options[selectedIndex];

		// If "None" exists in new menu, delete it.
		for (var i = 0; i < newField.options.length; i++) {
			if (newField.options[i].disabled) {
				// Delete item from old menu
				for (var j = i + 1; j < newField.options.length; j++) {
					newField.options[j - 1].value = newField.options[j].value;
					newField.options[j - 1].text = newField.options[j].text;
				}
				newField.options.length -= 1;
			}
		}

		// Add item to new menu
		newField.options.length += 1;
		newField.options[newField.options.length - 1] = new Option(selectedOption.text, selectedOption.value);

		// Delete item from old menu
		for (var i = selectedIndex + 1; i < currField.options.length; i++) {
			currField.options[i - 1].value = currField.options[i].value;
			currField.options[i - 1].text = currField.options[i].text;
		}
		currField.options.length -= 1;

		// If no items are left in the current menu, add a "None" item.
		if (currField.options.length == 0) {
			currField.options.length = 1;
			currField.options[0] = new Option(\''; ?>
<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'quote') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'quote'));?>
<?php echo '\', \'\');
			currField.options[0].disabled = true;
		}

		// Update selected item
		else if (currField.options.length > 0) {
			currField.selectedIndex = selectedIndex < (currField.options.length - 1) ? selectedIndex : (currField.options.length - 1);
		}
	}
	
	// Save IDs of selected directors in hidden field
	function saveSelectedDirectors() {
		var assigned = document.track.assigned;
		var assignedIds = \'\';
		for (var i = 0; i < assigned.options.length; i++) {
			if (assignedIds != \'\') {
				assignedIds += \':\';
			}
			assignedIds += assigned.options[i].value;
		}
		document.track.assignedDirectors.value = assignedIds;
		
		var unassigned = document.track.unassigned;
		var unassignedIds = \'\';
		for (var i = 0; i < unassigned.options.length; i++) {
			if (unassignedIds != \'\') {
				unassignedIds += \':\';
			}
			unassignedIds += unassigned.options[i].value;
		}
		document.track.unassignedDirectors.value = unassignedIds;
		
		return true;
	}
// -->
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table class="data" width="100%">
<?php if (count ( $this->_tpl_vars['formLocales'] ) > 1): ?>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'formLocale','key' => "form.formLanguage"), $this);?>
</td>
		<td width="80%" class="value">
			<?php if ($this->_tpl_vars['trackId']): ?><?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editTrack','path' => $this->_tpl_vars['trackId'],'escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'trackFormUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'trackFormUrl'));?>

			<?php else: ?><?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'createTrack','path' => $this->_tpl_vars['trackId']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'trackFormUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'trackFormUrl'));?>

			<?php endif; ?>
			<?php echo $this->_plugins['function']['form_language_chooser'][0][0]->smartyFormLanguageChooser(array('form' => 'track','url' => $this->_tpl_vars['trackFormUrl']), $this);?>

			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.formLanguage.description"), $this);?>
</span>
		</td>
	</tr>
<?php endif; ?>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'title','required' => 'true','key' => "track.title"), $this);?>
</td>
	<td width="80%" class="value"><input type="text" name="title[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['title'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" id="title" size="40" maxlength="120" class="textField" /></td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'abbrev','required' => 'true','key' => "track.abbreviation"), $this);?>
</td>
	<td class="value"><input type="text" name="abbrev[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="abbrev" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['abbrev'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="20" class="textField" />&nbsp;&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "track.abbreviation.example"), $this);?>
</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'policy','key' => "manager.tracks.policy"), $this);?>
</td>
	<td class="value"><textarea name="policy[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" rows="4" cols="40" id="policy" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['policy'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
</tr>
<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'reviewFormId','key' => "submission.reviewForm"), $this);?>
</td>
<td class="value">
	<select name="reviewFormId" size="1" id="reviewFormId" class="selectMenu">
		<option value=""><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.reviewForms.noneChosen"), $this);?>
</option>
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['reviewFormOptions'],'selected' => $this->_tpl_vars['reviewFormId']), $this);?>

	</select>
</td>
<tr valign="top">
	<td rowspan="2" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('suppressId' => 'true','key' => "submission.indexing"), $this);?>
</td>
	<td class="value">
		<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'identifyType','key' => "manager.tracks.identifyType"), $this);?>
 <input type="text" name="identifyType[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="identifyType" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['identifyType'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="60" class="textField" />
		<br />
		<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.tracks.identifyTypeExamples"), $this);?>
</span>
	</td>
</tr>
<tr valign="top">
	<td class="value">
		<input type="checkbox" name="metaNotReviewed" id="metaNotReviewed" value="1" <?php if ($this->_tpl_vars['metaNotReviewed']): ?>checked="checked"<?php endif; ?> />
		<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'metaNotReviewed','key' => "manager.tracks.submissionNotReviewed"), $this);?>

	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('suppressId' => 'true','key' => "submission.restrictions"), $this);?>
</td>
	<td class="value">
		<input type="checkbox" name="directorRestriction" id="directorRestriction" value="1" <?php if ($this->_tpl_vars['directorRestriction']): ?>checked="checked"<?php endif; ?> />
		<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'directorRestriction','key' => "manager.tracks.directorRestriction"), $this);?>

	</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'hideAbout','key' => "navigation.about"), $this);?>
</td>
	<td class="value">
		<input type="checkbox" name="hideAbout" id="hideAbout" value="1" <?php if ($this->_tpl_vars['hideAbout']): ?>checked="checked"<?php endif; ?> />
		<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'hideAbout','key' => "manager.tracks.hideAbout"), $this);?>

	</td>
</tr>
<?php if ($this->_tpl_vars['commentsEnabled']): ?>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'disableComments','key' => "comments.readerComments"), $this);?>
</td>
	<td class="value">
		<input type="checkbox" name="disableComments" id="disableComments" value="1" <?php if ($this->_tpl_vars['disableComments']): ?>checked="checked"<?php endif; ?> />
		<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'disableComments','key' => "manager.tracks.disableComments"), $this);?>

	</td>
</tr>
<?php endif; ?>
<tr valign="top">
	<td rowspan="2" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('key' => "manager.tracks.wordCount"), $this);?>
</td>
	<td class="value">
		<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'wordCount','key' => "manager.tracks.wordCountInstructions"), $this);?>
&nbsp;&nbsp;<input type="text" name="wordCount" id="abbrev" value="<?php echo $this->_tpl_vars['wordCount']; ?>
" size="10" maxlength="20" class="textField" />
	</td>
</tr>
</table>
<div class="separator"></div>

<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.trackDirectors"), $this);?>
</h3>
<p><span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.tracks.trackDirectorInstructions"), $this);?>
</span></p>
<table class="data" width="100%">
<tr valign="top">
	<td width="20%">&nbsp;</td>
	<td><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.tracks.unassigned"), $this);?>
</td>
	<td>&nbsp;</td>
	<td><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.tracks.assigned"), $this);?>
</td>
</tr>
<tr valign="top">
	<td width="20%">&nbsp;</td>
	<td><select name="unassigned" size="15" style="width: 150px" class="selectMenu">
		<?php $_from = $this->_tpl_vars['unassignedDirectors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['director']):
?>
			<option value="<?php echo $this->_tpl_vars['director']->getId(); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['director']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</option>
		<?php endforeach; else: ?>
			<option value="" disabled="disabled"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>
</option>
		<?php endif; unset($_from); ?>
	</select></td>
	<td><input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.tracks.assignDirector"), $this);?>
 &gt;&gt;" onclick="moveSelectItem(this.form.unassigned, this.form.assigned)" class="button" />
		<br /><br />
		<input type="button" value="&lt;&lt; <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.tracks.unassignDirector"), $this);?>
" onclick="moveSelectItem(this.form.assigned, this.form.unassigned)" class="button" /></td>
	<td><select name="assigned" size="15" style="width: 150px" class="selectMenu">
		<?php $_from = $this->_tpl_vars['assignedDirectors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['director']):
?>
			<option value="<?php echo $this->_tpl_vars['director']->getId(); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['director']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</option>
		<?php endforeach; else: ?>
			<option value="" disabled="disabled"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>
</option>
		<?php endif; unset($_from); ?>
	</select></td>
</tr>
</table>

<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'tracks'), $this);?>
'" /></p>

</form>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>