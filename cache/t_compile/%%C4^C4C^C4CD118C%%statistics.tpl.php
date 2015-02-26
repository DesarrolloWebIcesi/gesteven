<?php /* Smarty version 2.6.26, created on 2014-02-09 15:32:16
         compiled from manager/statistics/statistics.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'manager/statistics/statistics.tpl', 14, false),array('function', 'url', 'manager/statistics/statistics.tpl', 18, false),array('function', 'math', 'manager/statistics/statistics.tpl', 55, false),array('modifier', 'default', 'manager/statistics/statistics.tpl', 64, false),)), $this); ?>
<div id="statistics">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics"), $this);?>
</h3>
<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.description"), $this);?>
</p>

<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.selectTracks"), $this);?>
</p>
<form action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveStatisticsTracks'), $this);?>
" method="post">
	<select name="trackIds[]" class="selectMenu" multiple="multiple" size="5">
		<?php $_from = $this->_tpl_vars['tracks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['track']):
?>
			<option <?php if (in_array ( $this->_tpl_vars['track']->getId() , $this->_tpl_vars['trackIds'] )): ?>selected <?php endif; ?>value="<?php echo $this->_tpl_vars['track']->getId(); ?>
"><?php echo $this->_tpl_vars['track']->getLocalizedTitle(); ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
	</select><br/>&nbsp;<br/>
	<input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.record"), $this);?>
" class="button defaultButton"/>
</form>

<br/>

<form action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'savePublicStatisticsList'), $this);?>
" method="post">
<table width="100%" class="data">
	<tr valign="top">
		<td width="30%" class="label"><input type="checkbox" id="statItemsPublished" name="statItemsPublished" <?php if ($this->_tpl_vars['statItemsPublished']): ?>checked <?php endif; ?>/><label for="statItemsPublished"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.itemsPublished"), $this);?>
</label></td>
		<td width="70%" class="value"><?php echo $this->_tpl_vars['paperStatistics']['numPublishedSubmissions']; ?>
</td>
	</tr>
	<tr valign="top">
		<td width="30%" class="label"><input type="checkbox" id="statNumSubmissions" name="statNumSubmissions" <?php if ($this->_tpl_vars['statNumSubmissions']): ?>checked <?php endif; ?>/><label for="statNumSubmissions"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.numSubmissions"), $this);?>
</label></td>
		<td width="70%" class="value"><?php echo $this->_tpl_vars['paperStatistics']['numSubmissions']; ?>
</td>
	</tr>
	<tr valign="top">
		<td width="30%" class="label"><input type="checkbox" id="statPeerReviewed" name="statPeerReviewed" <?php if ($this->_tpl_vars['statPeerReviewed']): ?>checked <?php endif; ?>/><label for="statPeerReviewed"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.peerReviewed"), $this);?>
</label></td>
		<td width="70%" class="value"><?php echo $this->_tpl_vars['limitedPaperStatistics']['numReviewedSubmissions']; ?>
</td>
	</tr>
	<tr valign="top">
		<td width="30%" class="label"><input type="checkbox" id="statCountAccept" name="statCountAccept" <?php if ($this->_tpl_vars['statCountAccept']): ?>checked <?php endif; ?>/>&nbsp;&nbsp;<label for="statCountAccept"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.count.accept"), $this);?>
</label></td>
		<td width="70%" class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.count.value",'count' => $this->_tpl_vars['limitedPaperStatistics']['submissionsAccept'],'percentage' => $this->_tpl_vars['limitedPaperStatistics']['submissionsAcceptPercent']), $this);?>
</td>
	</tr>
	<tr valign="top">
		<td width="30%" class="label"><input type="checkbox" id="statCountDecline" name="statCountDecline" <?php if ($this->_tpl_vars['statCountDecline']): ?>checked <?php endif; ?>/>&nbsp;&nbsp;<label for="statCountDecline"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.count.decline"), $this);?>
</label></td>
		<td width="70%" class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.count.value",'count' => $this->_tpl_vars['limitedPaperStatistics']['submissionsDecline'],'percentage' => $this->_tpl_vars['limitedPaperStatistics']['submissionsDeclinePercent']), $this);?>
</td>
	</tr>
	<tr valign="top">
		<td width="30%" class="label"><input type="checkbox" id="statDaysPerReview" name="statDaysPerReview" <?php if ($this->_tpl_vars['statDaysPerReview']): ?>checked <?php endif; ?>/>&nbsp;&nbsp;<label for="statDaysPerReview"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.daysPerReview"), $this);?>
</label></td>
		<td width="70%" class="value">
			<?php $this->assign('daysPerReview', $this->_tpl_vars['reviewerStatistics']['daysPerReview']); ?>
			<?php echo smarty_function_math(array('equation' => "round(".($this->_tpl_vars['daysPerReview']).")"), $this);?>

		</td>
	</tr>
	<tr valign="top">
		<td width="30%" class="label"><input type="checkbox" id="statRegisteredUsers" name="statRegisteredUsers" <?php if ($this->_tpl_vars['statRegisteredUsers']): ?>checked <?php endif; ?>/><label for="statRegisteredUsers"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.users"), $this);?>
</label></td>
		<td width="70%" class="value"><?php echo $this->_tpl_vars['userStatistics']['totalUsersCount']; ?>
</td>
	</tr>
	<tr valign="top">
		<td width="30%" class="label"><input type="checkbox" id="statRegisteredReaders" name="statRegisteredReaders" <?php if ($this->_tpl_vars['statRegisteredReaders']): ?>checked <?php endif; ?>/><label for="statRegisteredReaders"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.readers"), $this);?>
</label></td>
		<td width="70%" class="value"><?php echo ((is_array($_tmp=@$this->_tpl_vars['userStatistics']['reader'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
</td>
	</tr>

	<tr valign="top">
		<td colspan="2" class="label"><input type="checkbox" id="statRegistrations" name="statRegistrations" <?php if ($this->_tpl_vars['statRegistrations']): ?>checked <?php endif; ?>/><label for="statRegistrations"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.registrations"), $this);?>
</label></td>
	</tr>
	<?php $_from = $this->_tpl_vars['registrationStatistics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['stats']):
?>
	<tr valign="top">
		<td width="30%" class="label">&nbsp;&nbsp;<?php echo $this->_tpl_vars['stats']['name']; ?>
:</td>
		<td width="70%" class="value"><?php echo ((is_array($_tmp=@$this->_tpl_vars['stats']['count'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.note"), $this);?>
</p>

<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.statistics.statistics.makePublic"), $this);?>
<br/>
<input type="submit" class="button defaultButton" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.record"), $this);?>
"/>
</form>
</div>