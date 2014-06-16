<?php /* Smarty version 2.6.26, created on 2013-10-31 17:30:19
         compiled from /home/sicesi/eventos/lib/pkp/templates/notification/rss2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/home/sicesi/eventos/lib/pkp/templates/notification/rss2.tpl', 12, false),array('modifier', 'replace', '/home/sicesi/eventos/lib/pkp/templates/notification/rss2.tpl', 21, false),array('modifier', 'strip', '/home/sicesi/eventos/lib/pkp/templates/notification/rss2.tpl', 21, false),array('modifier', 'date_format', '/home/sicesi/eventos/lib/pkp/templates/notification/rss2.tpl', 28, false),array('function', 'translate', '/home/sicesi/eventos/lib/pkp/templates/notification/rss2.tpl', 17, false),array('function', 'url', '/home/sicesi/eventos/lib/pkp/templates/notification/rss2.tpl', 33, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="<?php echo ((is_array($_tmp=$this->_tpl_vars['defaultCharset'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"<?php echo '?>'; ?>

<rss version="2.0">
	<channel>
				<title><?php echo $this->_tpl_vars['siteTitle']; ?>
 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "notification.notifications"), $this);?>
</title>
		<link><?php echo $this->_tpl_vars['selfUrl']; ?>
</link>

				<language><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['locale'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', '-') : smarty_modifier_replace($_tmp, '_', '-')))) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'html')); ?>
</language>
		<generator><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['appName']), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['version'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</generator>
		<docs>http://blogs.law.harvard.edu/tech/rss</docs>
		<ttl>60</ttl>

		<?php $_from = $this->_tpl_vars['notifications']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['notification']):
?>
			<item>
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
				<pubDate><?php echo ((is_array($_tmp=$this->_tpl_vars['notification']->getDateCreated())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%a, %d %b %Y %T %z") : smarty_modifier_date_format($_tmp, "%a, %d %b %Y %T %z")); ?>
</pubDate>
			</item>
		<?php endforeach; endif; unset($_from); ?>
	</channel>
</rss>