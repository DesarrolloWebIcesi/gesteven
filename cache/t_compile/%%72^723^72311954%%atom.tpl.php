<?php /* Smarty version 2.6.26, created on 2013-10-31 17:29:40
         compiled from /home/sicesi/eventos/lib/pkp/templates/notification/atom.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/home/sicesi/eventos/lib/pkp/templates/notification/atom.tpl', 12, false),array('modifier', 'date_format', '/home/sicesi/eventos/lib/pkp/templates/notification/atom.tpl', 25, false),array('modifier', 'regex_replace', '/home/sicesi/eventos/lib/pkp/templates/notification/atom.tpl', 40, false),array('function', 'translate', '/home/sicesi/eventos/lib/pkp/templates/notification/atom.tpl', 16, false),array('function', 'url', '/home/sicesi/eventos/lib/pkp/templates/notification/atom.tpl', 29, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="<?php echo ((is_array($_tmp=$this->_tpl_vars['defaultCharset'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"<?php echo '?>'; ?>

<feed xmlns="http://www.w3.org/2005/Atom">
	<id><?php echo $this->_tpl_vars['selfUrl']; ?>
</id>
	<title><?php echo $this->_tpl_vars['siteTitle']; ?>
 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "notification.notifications"), $this);?>
</title>

	<link rel="self" type="application/atom+xml" href="<?php echo $this->_tpl_vars['selfUrl']; ?>
" />

	<generator uri="http://pkp.sfu.ca/ojs/" version="<?php echo ((is_array($_tmp=$this->_tpl_vars['version'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['appName']), $this);?>
</generator>

<?php $_from = $this->_tpl_vars['notifications']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['notification']):
?>
	<entry>
		<id><?php echo $this->_tpl_vars['notification']->getId(); ?>
</id>
		<title><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "notification.notification"), $this);?>
 : <?php echo ((is_array($_tmp=$this->_tpl_vars['notification']->getDateCreated())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%a, %d %b %Y %T %z") : smarty_modifier_date_format($_tmp, "%a, %d %b %Y %T %z")); ?>
</title>
		<?php if ($this->_tpl_vars['notification']->getLocation() != null): ?>
			<link rel="alternate" href="<?php echo $this->_tpl_vars['notification']->getLocation(); ?>
" />
		<?php else: ?>
			<link rel="alternate" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'notification'), $this);?>
" />
		<?php endif; ?>

		<summary type="html" xml:base="<?php if ($this->_tpl_vars['notification']->getLocation() != null): ?><?php echo $this->_tpl_vars['notification']->getLocation(); ?>
<?php else: ?><?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'notification'), $this);?>
<?php endif; ?>">
			<?php if ($this->_tpl_vars['notification']->getIsLocalized()): ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['notification']->getContents(),'param' => $this->_tpl_vars['notification']->getParam()), $this);?>

			<?php else: ?>
				<?php echo $this->_tpl_vars['notification']->getContents(); ?>

			<?php endif; ?>
		</summary>

		<published><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['notification']->getDateCreated())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%dT%T%z") : smarty_modifier_date_format($_tmp, "%Y-%m-%dT%T%z")))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/00$/", ":00") : smarty_modifier_regex_replace($_tmp, "/00$/", ":00")); ?>
</published>
	</entry>
<?php endforeach; endif; unset($_from); ?>
</feed>

