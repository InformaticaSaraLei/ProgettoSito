<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<h2><?php echo (isset($this->_rootref['TOTAL_REGISTERED_USERS_ONLINE'])) ? $this->_rootref['TOTAL_REGISTERED_USERS_ONLINE'] : ''; ?></h2>
<p><?php echo (isset($this->_rootref['TOTAL_GUEST_USERS_ONLINE'])) ? $this->_rootref['TOTAL_GUEST_USERS_ONLINE'] : ''; if ($this->_rootref['S_SWITCH_GUEST_DISPLAY']) {  ?> &bull; <a href="<?php echo (isset($this->_rootref['U_SWITCH_GUEST_DISPLAY'])) ? $this->_rootref['U_SWITCH_GUEST_DISPLAY'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SWITCH_GUEST_DISPLAY'])) ? $this->_rootref['L_SWITCH_GUEST_DISPLAY'] : ((isset($user->lang['SWITCH_GUEST_DISPLAY'])) ? $user->lang['SWITCH_GUEST_DISPLAY'] : '{ SWITCH_GUEST_DISPLAY }')); ?></a><?php } ?></p>

<ul class="linklist">
	<li class="rightside pagination"><?php if ($this->_rootref['PAGINATION']) {  ?><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a> &bull; <span><?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; ?></span><?php } else { echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; } ?></li>
</ul>

<div class="forumbg forumbg-table">
	<div class="inner"><span class="corners-top"><span></span></span>
	
	<table class="table1" cellspacing="1">

	<?php if (sizeof($this->_tpldata['user_row'])) {  ?>

		<thead>
		<tr>
			<th class="name"><a href="<?php echo (isset($this->_rootref['U_SORT_USERNAME'])) ? $this->_rootref['U_SORT_USERNAME'] : ''; ?>"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?></a></th>
			<th class="info"><a href="<?php echo (isset($this->_rootref['U_SORT_LOCATION'])) ? $this->_rootref['U_SORT_LOCATION'] : ''; ?>"><?php echo ((isset($this->_rootref['L_FORUM_LOCATION'])) ? $this->_rootref['L_FORUM_LOCATION'] : ((isset($user->lang['FORUM_LOCATION'])) ? $user->lang['FORUM_LOCATION'] : '{ FORUM_LOCATION }')); ?></a></th>
			<th class="active"><a href="<?php echo (isset($this->_rootref['U_SORT_UPDATED'])) ? $this->_rootref['U_SORT_UPDATED'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LAST_UPDATED'])) ? $this->_rootref['L_LAST_UPDATED'] : ((isset($user->lang['LAST_UPDATED'])) ? $user->lang['LAST_UPDATED'] : '{ LAST_UPDATED }')); ?></a></th>
		</tr>
		</thead>
		<tbody>
		<?php $_user_row_count = (isset($this->_tpldata['user_row'])) ? sizeof($this->_tpldata['user_row']) : 0;if ($_user_row_count) {for ($_user_row_i = 0; $_user_row_i < $_user_row_count; ++$_user_row_i){$_user_row_val = &$this->_tpldata['user_row'][$_user_row_i]; ?>

		<tr class="<?php if (($_user_row_val['S_ROW_COUNT'] & 1)  ) {  ?>bg1<?php } else { ?>bg2<?php } ?>">
			<td><?php echo $_user_row_val['USERNAME_FULL']; if ($_user_row_val['USER_IP']) {  ?> <span style="margin-left: 30px;"><?php echo ((isset($this->_rootref['L_IP'])) ? $this->_rootref['L_IP'] : ((isset($user->lang['IP'])) ? $user->lang['IP'] : '{ IP }')); ?>: <a href="<?php echo $_user_row_val['U_USER_IP']; ?>"><?php echo $_user_row_val['USER_IP']; ?></a> &#187; <a href="<?php echo $_user_row_val['U_WHOIS']; ?>" onclick="popup(this.href, 750, 500); return false;"><?php echo ((isset($this->_rootref['L_WHOIS'])) ? $this->_rootref['L_WHOIS'] : ((isset($user->lang['WHOIS'])) ? $user->lang['WHOIS'] : '{ WHOIS }')); ?></a></span><?php } if ($_user_row_val['USER_BROWSER']) {  ?><br /><?php echo $_user_row_val['USER_BROWSER']; } ?></td>
			<td class="info"><a href="<?php echo $_user_row_val['U_FORUM_LOCATION']; ?>"><?php echo $_user_row_val['FORUM_LOCATION']; ?></a></td>
			<td class="active"><?php echo $_user_row_val['LASTUPDATE']; ?></td>
		</tr>
		<?php }} } else { ?>

		<tbody>
		<tr class="bg1">
			<td colspan="3"><?php echo ((isset($this->_rootref['L_NO_ONLINE_USERS'])) ? $this->_rootref['L_NO_ONLINE_USERS'] : ((isset($user->lang['NO_ONLINE_USERS'])) ? $user->lang['NO_ONLINE_USERS'] : '{ NO_ONLINE_USERS }')); if ($this->_rootref['S_SWITCH_GUEST_DISPLAY']) {  ?> &bull; <a href="<?php echo (isset($this->_rootref['U_SWITCH_GUEST_DISPLAY'])) ? $this->_rootref['U_SWITCH_GUEST_DISPLAY'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SWITCH_GUEST_DISPLAY'])) ? $this->_rootref['L_SWITCH_GUEST_DISPLAY'] : ((isset($user->lang['SWITCH_GUEST_DISPLAY'])) ? $user->lang['SWITCH_GUEST_DISPLAY'] : '{ SWITCH_GUEST_DISPLAY }')); ?></a><?php } ?></td>
		</tr>
	<?php } ?>

	</tbody>
	</table>
	
	<span class="corners-bottom"><span></span></span></div>
</div>

<?php if ($this->_rootref['PREVIOUS_PAGE'] || $this->_rootref['NEXT_PAGE']) {  ?>

<fieldset class="display-options right-box">
	<?php if ($this->_rootref['PREVIOUS_PAGE']) {  ?><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>" class="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a><?php } else { echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); } ?> &bull; <?php if ($this->_rootref['NEXT_PAGE']) {  ?><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>" class="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a><?php } else { echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); } ?>

</fieldset>
<?php } if ($this->_rootref['LEGEND']) {  ?><p><em><?php echo ((isset($this->_rootref['L_LEGEND'])) ? $this->_rootref['L_LEGEND'] : ((isset($user->lang['LEGEND'])) ? $user->lang['LEGEND'] : '{ LEGEND }')); ?>: <?php echo (isset($this->_rootref['LEGEND'])) ? $this->_rootref['LEGEND'] : ''; ?></em></p><?php } ?>


<ul class="linklist">
	<li class="rightside pagination"><?php if ($this->_rootref['PAGINATION']) {  ?><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a> &bull; <span><?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; ?></span><?php } else { echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; } ?></li>
</ul>

<?php $this->_tpl_include('jumpbox.html'); $this->_tpl_include('overall_footer.html'); ?>