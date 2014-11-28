<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<a name="maincontent"></a>

<?php if ($this->_rootref['S_PRUNED']) {  ?>


	<h1><?php echo ((isset($this->_rootref['L_FORUM_PRUNE'])) ? $this->_rootref['L_FORUM_PRUNE'] : ((isset($user->lang['FORUM_PRUNE'])) ? $user->lang['FORUM_PRUNE'] : '{ FORUM_PRUNE }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_PRUNE_SUCCESS'])) ? $this->_rootref['L_PRUNE_SUCCESS'] : ((isset($user->lang['PRUNE_SUCCESS'])) ? $user->lang['PRUNE_SUCCESS'] : '{ PRUNE_SUCCESS }')); ?></p>

	<table cellspacing="1">
	<thead>
	<tr>
		<th><?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?></th>
		<th><?php echo ((isset($this->_rootref['L_TOPICS_PRUNED'])) ? $this->_rootref['L_TOPICS_PRUNED'] : ((isset($user->lang['TOPICS_PRUNED'])) ? $user->lang['TOPICS_PRUNED'] : '{ TOPICS_PRUNED }')); ?></th>
		<th><?php echo ((isset($this->_rootref['L_POSTS_PRUNED'])) ? $this->_rootref['L_POSTS_PRUNED'] : ((isset($user->lang['POSTS_PRUNED'])) ? $user->lang['POSTS_PRUNED'] : '{ POSTS_PRUNED }')); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php $_pruned_count = (isset($this->_tpldata['pruned'])) ? sizeof($this->_tpldata['pruned']) : 0;if ($_pruned_count) {for ($_pruned_i = 0; $_pruned_i < $_pruned_count; ++$_pruned_i){$_pruned_val = &$this->_tpldata['pruned'][$_pruned_i]; if (!($_pruned_val['S_ROW_COUNT'] & 1)  ) {  ?><tr class="row1"><?php } else { ?><tr class="row2"><?php } ?>

		<td style="text-align: center;"><?php echo $_pruned_val['FORUM_NAME']; ?></td>
		<td style="text-align: center;"><?php echo $_pruned_val['NUM_TOPICS']; ?></td>
		<td style="text-align: center;"><?php echo $_pruned_val['NUM_POSTS']; ?></td>
	</tr>
	<?php }} else { ?>

		<tr>
			<td colspan="3" class="row3" style="text-align: center;"><?php echo ((isset($this->_rootref['L_NO_PRUNE'])) ? $this->_rootref['L_NO_PRUNE'] : ((isset($user->lang['NO_PRUNE'])) ? $user->lang['NO_PRUNE'] : '{ NO_PRUNE }')); ?></td>
		</tr>
	<?php } ?>

	</tbody>
	</table>

<?php } else if ($this->_rootref['S_SELECT_FORUM']) {  ?>


	<h1><?php echo ((isset($this->_rootref['L_ACP_PRUNE_FORUMS'])) ? $this->_rootref['L_ACP_PRUNE_FORUMS'] : ((isset($user->lang['ACP_PRUNE_FORUMS'])) ? $user->lang['ACP_PRUNE_FORUMS'] : '{ ACP_PRUNE_FORUMS }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_ACP_PRUNE_FORUMS_EXPLAIN'])) ? $this->_rootref['L_ACP_PRUNE_FORUMS_EXPLAIN'] : ((isset($user->lang['ACP_PRUNE_FORUMS_EXPLAIN'])) ? $user->lang['ACP_PRUNE_FORUMS_EXPLAIN'] : '{ ACP_PRUNE_FORUMS_EXPLAIN }')); ?></p>

	<form id="acp_prune" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">
	
	<fieldset>
		<legend><?php echo ((isset($this->_rootref['L_SELECT_FORUM'])) ? $this->_rootref['L_SELECT_FORUM'] : ((isset($user->lang['SELECT_FORUM'])) ? $user->lang['SELECT_FORUM'] : '{ SELECT_FORUM }')); ?></legend>
		<p><?php echo ((isset($this->_rootref['L_LOOK_UP_FORUMS_EXPLAIN'])) ? $this->_rootref['L_LOOK_UP_FORUMS_EXPLAIN'] : ((isset($user->lang['LOOK_UP_FORUMS_EXPLAIN'])) ? $user->lang['LOOK_UP_FORUMS_EXPLAIN'] : '{ LOOK_UP_FORUMS_EXPLAIN }')); ?></p>
	<dl>
		<dt><label for="forum"><?php echo ((isset($this->_rootref['L_LOOK_UP_FORUM'])) ? $this->_rootref['L_LOOK_UP_FORUM'] : ((isset($user->lang['LOOK_UP_FORUM'])) ? $user->lang['LOOK_UP_FORUM'] : '{ LOOK_UP_FORUM }')); ?>:</label></dt>
		<dd><select id="forum" name="f[]" multiple="multiple" size="10"><?php echo (isset($this->_rootref['S_FORUM_OPTIONS'])) ? $this->_rootref['S_FORUM_OPTIONS'] : ''; ?></select></dd>
		<dd><label><input type="checkbox" class="radio" name="all_forums" value="1" /> <?php echo ((isset($this->_rootref['L_ALL_FORUMS'])) ? $this->_rootref['L_ALL_FORUMS'] : ((isset($user->lang['ALL_FORUMS'])) ? $user->lang['ALL_FORUMS'] : '{ ALL_FORUMS }')); ?></label></dd>
	</dl>
	
	<p class="quick">
		<input class="button1" type="submit" value="<?php echo ((isset($this->_rootref['L_LOOK_UP_FORUM'])) ? $this->_rootref['L_LOOK_UP_FORUM'] : ((isset($user->lang['LOOK_UP_FORUM'])) ? $user->lang['LOOK_UP_FORUM'] : '{ LOOK_UP_FORUM }')); ?>" />
	</p>
	</fieldset>

	</form>

<?php } else { ?>


	<a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">&laquo; <?php echo ((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a>

	<h1><?php echo ((isset($this->_rootref['L_ACP_PRUNE_FORUMS'])) ? $this->_rootref['L_ACP_PRUNE_FORUMS'] : ((isset($user->lang['ACP_PRUNE_FORUMS'])) ? $user->lang['ACP_PRUNE_FORUMS'] : '{ ACP_PRUNE_FORUMS }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_ACP_PRUNE_FORUMS_EXPLAIN'])) ? $this->_rootref['L_ACP_PRUNE_FORUMS_EXPLAIN'] : ((isset($user->lang['ACP_PRUNE_FORUMS_EXPLAIN'])) ? $user->lang['ACP_PRUNE_FORUMS_EXPLAIN'] : '{ ACP_PRUNE_FORUMS_EXPLAIN }')); ?></p>

	<h2><?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?></h2>

	<p><?php echo ((isset($this->_rootref['L_SELECTED_FORUMS'])) ? $this->_rootref['L_SELECTED_FORUMS'] : ((isset($user->lang['SELECTED_FORUMS'])) ? $user->lang['SELECTED_FORUMS'] : '{ SELECTED_FORUMS }')); ?>: <?php echo (isset($this->_rootref['FORUM_LIST'])) ? $this->_rootref['FORUM_LIST'] : ''; ?></p>

	<form id="acp_prune" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

	<fieldset>
		<legend><?php echo ((isset($this->_rootref['L_FORUM_PRUNE'])) ? $this->_rootref['L_FORUM_PRUNE'] : ((isset($user->lang['FORUM_PRUNE'])) ? $user->lang['FORUM_PRUNE'] : '{ FORUM_PRUNE }')); ?></legend>
	<dl>
		<dt><label for="prune_days"><?php echo ((isset($this->_rootref['L_PRUNE_NOT_POSTED'])) ? $this->_rootref['L_PRUNE_NOT_POSTED'] : ((isset($user->lang['PRUNE_NOT_POSTED'])) ? $user->lang['PRUNE_NOT_POSTED'] : '{ PRUNE_NOT_POSTED }')); ?>:</label></dt>
		<dd><input type="text" id="prune_days" name="prune_days" /></dd>
	</dl>
	<dl>
		<dt><label for="prune_vieweddays"><?php echo ((isset($this->_rootref['L_PRUNE_NOT_VIEWED'])) ? $this->_rootref['L_PRUNE_NOT_VIEWED'] : ((isset($user->lang['PRUNE_NOT_VIEWED'])) ? $user->lang['PRUNE_NOT_VIEWED'] : '{ PRUNE_NOT_VIEWED }')); ?>:</label></dt>
		<dd><input type="text" id="prune_vieweddays" name="prune_vieweddays" /></dd>
	</dl>
	<dl>
		<dt><label for="polls"><?php echo ((isset($this->_rootref['L_PRUNE_OLD_POLLS'])) ? $this->_rootref['L_PRUNE_OLD_POLLS'] : ((isset($user->lang['PRUNE_OLD_POLLS'])) ? $user->lang['PRUNE_OLD_POLLS'] : '{ PRUNE_OLD_POLLS }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_PRUNE_OLD_POLLS_EXPLAIN'])) ? $this->_rootref['L_PRUNE_OLD_POLLS_EXPLAIN'] : ((isset($user->lang['PRUNE_OLD_POLLS_EXPLAIN'])) ? $user->lang['PRUNE_OLD_POLLS_EXPLAIN'] : '{ PRUNE_OLD_POLLS_EXPLAIN }')); ?></span></dt>
		<dd><label><input type="radio" class="radio" name="prune_old_polls" value="1" /> <?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></label>
			<label><input type="radio" class="radio" id="polls" name="prune_old_polls" value="0" checked="checked" /> <?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></label></dd>
	</dl>
	<dl>
		<dt><label for="announce"><?php echo ((isset($this->_rootref['L_PRUNE_ANNOUNCEMENTS'])) ? $this->_rootref['L_PRUNE_ANNOUNCEMENTS'] : ((isset($user->lang['PRUNE_ANNOUNCEMENTS'])) ? $user->lang['PRUNE_ANNOUNCEMENTS'] : '{ PRUNE_ANNOUNCEMENTS }')); ?>:</label></dt>
		<dd><label><input type="radio" class="radio" name="prune_announce" value="1" /> <?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></label>
			<label><input type="radio" class="radio" id="announce" name="prune_announce" value="0" checked="checked" /> <?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></label></dd>
	</dl>
	<dl>
		<dt><label for="sticky"><?php echo ((isset($this->_rootref['L_PRUNE_STICKY'])) ? $this->_rootref['L_PRUNE_STICKY'] : ((isset($user->lang['PRUNE_STICKY'])) ? $user->lang['PRUNE_STICKY'] : '{ PRUNE_STICKY }')); ?>:</label></dt>
		<dd><label><input type="radio" class="radio" name="prune_sticky" value="1" /> <?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></label>
			<label><input type="radio" class="radio" id="sticky" name="prune_sticky" value="0" checked="checked" /> <?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></label></dd>
	</dl>
	
	<p class="quick">
		<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

		<input class="button1" type="submit" id="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />
	</p>
	</fieldset>
	</form>

<?php } $this->_tpl_include('overall_footer.html'); ?>