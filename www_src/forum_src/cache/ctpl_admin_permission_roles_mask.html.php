<?php if (!defined('IN_PHPBB')) exit; $_role_mask_count = (isset($this->_tpldata['role_mask'])) ? sizeof($this->_tpldata['role_mask']) : 0;if ($_role_mask_count) {for ($_role_mask_i = 0; $_role_mask_i < $_role_mask_count; ++$_role_mask_i){$_role_mask_val = &$this->_tpldata['role_mask'][$_role_mask_i]; ?>


	<table cellspacing="1">
		<caption><?php if ($_role_mask_val['FORUM_ID']) {  echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?>: <?php } echo $_role_mask_val['NAME']; ?></caption>
	<tbody>
	<tr>
		<th><?php echo ((isset($this->_rootref['L_USERS'])) ? $this->_rootref['L_USERS'] : ((isset($user->lang['USERS'])) ? $user->lang['USERS'] : '{ USERS }')); ?></th>
	</tr>
	<tr>
		<td class="row1">
			<?php $_users_count = (isset($_role_mask_val['users'])) ? sizeof($_role_mask_val['users']) : 0;if ($_users_count) {for ($_users_i = 0; $_users_i < $_users_count; ++$_users_i){$_users_val = &$_role_mask_val['users'][$_users_i]; ?>

				<a href="<?php echo $_users_val['U_PROFILE']; ?>"><?php echo $_users_val['USERNAME']; ?></a><?php if (! $_users_val['S_LAST_ROW']) {  ?> :: <?php } }} else { ?>

				<?php echo ((isset($this->_rootref['L_USERS_NOT_ASSIGNED'])) ? $this->_rootref['L_USERS_NOT_ASSIGNED'] : ((isset($user->lang['USERS_NOT_ASSIGNED'])) ? $user->lang['USERS_NOT_ASSIGNED'] : '{ USERS_NOT_ASSIGNED }')); ?>

			<?php } ?>

		</td>
	</tr>
	<tr>
		<th><?php echo ((isset($this->_rootref['L_GROUPS'])) ? $this->_rootref['L_GROUPS'] : ((isset($user->lang['GROUPS'])) ? $user->lang['GROUPS'] : '{ GROUPS }')); ?></th>
	</tr>
	<tr>
		<td class="row2">
			<?php $_groups_count = (isset($_role_mask_val['groups'])) ? sizeof($_role_mask_val['groups']) : 0;if ($_groups_count) {for ($_groups_i = 0; $_groups_i < $_groups_count; ++$_groups_i){$_groups_val = &$_role_mask_val['groups'][$_groups_i]; ?>

				<a href="<?php echo $_groups_val['U_PROFILE']; ?>"><?php echo $_groups_val['GROUP_NAME']; ?></a><?php if (! $_groups_val['S_LAST_ROW']) {  ?> :: <?php } }} else { ?>

				<?php echo ((isset($this->_rootref['L_GROUPS_NOT_ASSIGNED'])) ? $this->_rootref['L_GROUPS_NOT_ASSIGNED'] : ((isset($user->lang['GROUPS_NOT_ASSIGNED'])) ? $user->lang['GROUPS_NOT_ASSIGNED'] : '{ GROUPS_NOT_ASSIGNED }')); ?>

			<?php } ?>

		</td>
	</tr>
	</tbody>
	</table>

<?php }} else { ?>

	
	<p><?php echo ((isset($this->_rootref['L_ROLE_NOT_ASSIGNED'])) ? $this->_rootref['L_ROLE_NOT_ASSIGNED'] : ((isset($user->lang['ROLE_NOT_ASSIGNED'])) ? $user->lang['ROLE_NOT_ASSIGNED'] : '{ ROLE_NOT_ASSIGNED }')); ?></p>

<?php } ?>