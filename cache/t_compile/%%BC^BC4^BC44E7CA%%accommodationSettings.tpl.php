<?php /* Smarty version 2.6.26, created on 2014-03-10 09:09:18
         compiled from manager/accommodationSettings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'manager/accommodationSettings.tpl', 18, false),array('function', 'translate', 'manager/accommodationSettings.tpl', 20, false),array('function', 'fieldLabel', 'manager/accommodationSettings.tpl', 28, false),array('function', 'form_language_chooser', 'manager/accommodationSettings.tpl', 31, false),array('modifier', 'assign', 'manager/accommodationSettings.tpl', 30, false),array('modifier', 'escape', 'manager/accommodationSettings.tpl', 40, false),array('modifier', 'date_format', 'manager/accommodationSettings.tpl', 45, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "schedConf.accommodation"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form name="accommodationForm" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveAccommodationSettings'), $this);?>
" enctype="multipart/form-data">

<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.accommodation.form.description"), $this);?>
</p>
<div id="accommodationFiles">
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.accommodation.form.accommodationFiles"), $this);?>
</h4>
<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.accommodation.form.accommodationFiles.description"), $this);?>
</p>

<table class="data" width="100%">
<?php if (count ( $this->_tpl_vars['formLocales'] ) > 1): ?>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'formLocale','key' => "form.formLanguage"), $this);?>
</td>
		<td width="80%" class="value">
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'accommodation','escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'accommodationFormUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'accommodationFormUrl'));?>

			<?php echo $this->_plugins['function']['form_language_chooser'][0][0]->smartyFormLanguageChooser(array('form' => 'accommodationForm','url' => $this->_tpl_vars['accommodationFormUrl']), $this);?>

			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.formLanguage.description"), $this);?>
</span>
		</td>
	</tr>
<?php endif; ?>

<?php $_from = $this->_tpl_vars['accommodationFiles'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['accommodationFileKey'] => $this->_tpl_vars['accommodationFile']):
?>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "accommodationFileTitle-".($this->_tpl_vars['accommodationFileKey']),'key' => "common.title",'suppressId' => 'true'), $this);?>
</td>
	<td width="80%" class="value" id="<?php echo "accommodationFileTitle-".($this->_tpl_vars['accommodationFileKey']); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['accommodationFile']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "accommodationFile-".($this->_tpl_vars['accommodationFileKey']),'key' => "common.file"), $this);?>
</td>
	<td class="value" id="<?php echo "accommodationFile-".($this->_tpl_vars['accommodationFileKey']); ?>
">
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.fileName"), $this);?>
: <a href="<?php echo $this->_tpl_vars['publicSchedConfFilesDir']; ?>
/<?php echo $this->_tpl_vars['accommodationFile']['uploadName']; ?>
" target="_new" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['accommodationFile']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a> <?php echo ((is_array($_tmp=$this->_tpl_vars['accommodationFile']['dateUploaded'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['datetimeFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['datetimeFormatShort'])); ?>
 <input type="submit" name="deleteAccommodationFile-<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['accommodationFileKey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.delete"), $this);?>
" class="button" />
	</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'accommodationFileTitle','key' => "common.title"), $this);?>
</td>
	<td width="80%" class="value"><input type="text" id="accommodationFileTitle" name="accommodationFileTitle" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['accommodationFileTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="40" maxlength="120" class="textField" /></td>
</tr>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'accommodationFile','key' => "common.file"), $this);?>
</td>
	<td width="80%">
		<input type="file" id="accommodationFile" name="accommodationFile" class="uploadField" /> <input type="submit" name="uploadAccommodationFile" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.upload"), $this);?>
" class="button" />
	</td>
</tr>

</table>
</div>
<div id="accommodationText">
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.accommodation.form.accommodationText"), $this);?>
</h4>
<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.accommodation.form.accommodationText.description"), $this);?>
</p>

<textarea name="accommodationDescription[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="accommodationDescription" rows="5" cols="60" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['accommodationDescription'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea>

<div class="separator"></div>

<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'manager'), $this);?>
'" /></p>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>
</div>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>