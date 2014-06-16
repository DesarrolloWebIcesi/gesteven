<?php /* Smarty version 2.6.26, created on 2013-10-31 17:38:12
         compiled from /home/sicesi/eventos/lib/pkp/templates/notification/rss.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/home/sicesi/eventos/lib/pkp/templates/notification/rss.tpl', 12, false),array('modifier', 'replace', '/home/sicesi/eventos/lib/pkp/templates/notification/rss.tpl', 23, false),array('modifier', 'strip', '/home/sicesi/eventos/lib/pkp/templates/notification/rss.tpl', 23, false),array('modifier', 'date_format', '/home/sicesi/eventos/lib/pkp/templates/notification/rss.tpl', 35, false),array('function', 'translate', '/home/sicesi/eventos/lib/pkp/templates/notification/rss.tpl', 21, false),array('function', 'url', '/home/sicesi/eventos/lib/pkp/templates/notification/rss.tpl', 27, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="<?php echo ((is_array($_tmp=$this->_tpl_vars['defaultCharset'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"<?php echo '?>'; ?>

<rdf:RDF
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns="http://purl.org/rss/1.0/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:prism="http://prismstandard.org/namespaces/1.2/basic/">

	<channel rdf:about="<?php echo $this->_tpl_vars['baseUrl']; ?>
">
		<title><?php echo $this->_tpl_vars['siteTitle']; ?>
 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "notification.notifications"), $this);?>
</title>
		<link><?php echo $this->_tpl_vars['selfUrl']; ?>
</link>
		<language><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['locale'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', '-') : smarty_modifier_replace($_tmp, '_', '-')))) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'html')); ?>
</language>
		<items>
			<?php $_from = $this->_tpl_vars['notifications']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['notification']):
?>
			<rdf:Seq>
				<rdf:li rdf:resource="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'notification'), $this);?>
"/>
			</rdf:Seq>
			<?php endforeach; endif; unset($_from); ?>
		</items>
	</channel>

	<?php $_from = $this->_tpl_vars['notifications']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['notification']):
?>
	<item rdf:about="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'notification'), $this);?>
">
		<title><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "notification.notification"), $this);?>
 : <?php echo ((is_array($_tmp=$this->_tpl_vars['notification']->getDateCreated())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%a, %d %b %Y %T %z") : smarty_modifier_date_format($_tmp, "%a, %d %b %Y %T %z")); ?>
</title>
		<link>
			<?php if ($this->_tpl_vars['notification']->getLocation() != null): ?>
				<?php echo $this->_tpl_vars['notification']->getLocation(); ?>

			<?php else: ?>
				<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'notification'), $this);?>

			<?php endif; ?>
		</link>
		<description>
			<?php if ($this->_tpl_vars['notification']->getIsLocalized()): ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['notification']->getContents(),'param' => $this->_tpl_vars['notification']->getParam()), $this);?>

			<?php else: ?>
				<?php echo $this->_tpl_vars['notification']->getContents(); ?>

			<?php endif; ?>
		</description>
		<dc:creator><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['siteTitle'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'html')); ?>
</dc:creator>
		<dc:date><?php echo ((is_array($_tmp=$this->_tpl_vars['notification']->getDateCreated())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</dc:date>
	</item>
	<?php endforeach; endif; unset($_from); ?>

</rdf:RDF>