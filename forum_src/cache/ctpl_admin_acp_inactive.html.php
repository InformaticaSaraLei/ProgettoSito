<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<a name="maincontent"></a>

<h2><?php echo ((isset($this->_rootref['L_INACTIVE_USERS'])) ? $this->_rootref['L_INACTIVE_USERS'] : ((isset($user->lang['INACTIVE_USERS'])) ? $user->lang['INACTIVE_USERS'] : '{ INACTIVE_USERS }')); ?></h2>

<p><?php echo ((isset($this->_rootref['L_INACTIVE_USERS_EXPLAIN'])) ? $this->_rootref['L_INACTIVE_USERS_EXPLAIN'] : ((isset($user->lang['INACTIVE_USERS_EXPLAIN'])) ? $user->lang['INACTIVE_USERS_EXPLAIN'] : '{ INACTIVE_USERS_EXPLAIN }')); ?></p>

<form id="inactive" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

<div class="clearfix"></div>

<?php if ($this->_rootref['PAGINATION']) {  ?>

<div class="pagination">
	<a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['S_ON_PAGE'])) ? $this->_rootref['S_ON_PAGE'] : ''; ?></a> &bull; <span><?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; ?></span>
</div>
<?php } ?>


<table cellspacing="1">
<thead>
<tr>
	<th><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?></th>
	<th><?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?></th>
	<th><?php echo ((isset($this->_rootref['L_INACTIVE_DATE'])) ? $this->_rootref['L_INACTIVE_DATE'] : ((isset($user->lang['INACTIVE_DATE'])) ? $user->lang['INACTIVE_DATE'] : '{ INACTIVE_DATE }')); ?></th>
	<th><?php echo ((isset($this->_rootref['L_LAST_VISIT'])) ? $this->_rootref['L_LAST_VISIT'] : ((isset($user->lang['LAST_VISIT'])) ? $user->lang['LAST_VISIT'] : '{ LAST_VISIT }')); ?></th>
	<th><?php echo ((isset($this->_rootref['L_INACTIVE_REASON'])) ? $this->_rootref['L_INACTIVE_REASON'] : ((isset($user->lang['INACTIVE_REASON'])) ? $user->lang['INACTIVE_REASON'] : '{ INACTIVE_REASON }')); ?></th>
	<th><?php echo ((isset($this->_rootref['L_MARK'])) ? $this->_rootref['L_MARK'] : ((isset($user->lang['MARK'])) ? $user->lang['MARK'] : '{ MARK }')); ?></th>
</tr>
</thead>
<tbody>
<?php $_inactive_count = (isset($this->_tpldata['inactive'])) ? sizeof($this->_tpldata['inactive']) : 0;if ($_inactive_count) {for ($_inactive_i = 0; $_inactive_i < $_inactive_count; ++$_inactive_i){$_inactive_val = &$this->_tpldata['inactive'][$_inactive_i]; if (!($_inactive_val['S_ROW_COUNT'] & 1)  ) {  ?><tr class="row1"><?php } else { ?><tr class="row2"><?php } ?>


		<td style="vertical-align: top;">
			<?php echo $_inactive_val['USERNAME_FULL']; ?>

			<?php if ($_inactive_val['POSTS']) {  ?><br /><?php echo ((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?>: <strong><?php echo $_inactive_val['POSTS']; ?></strong> [<a href="<?php echo $_inactive_val['U_SEARCH_USER']; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_USER_POSTS'])) ? $this->_rootref['L_SEARCH_USER_POSTS'] : ((isset($user->lang['SEARCH_USER_POSTS'])) ? $user->lang['SEARCH_USER_POSTS'] : '{ SEARCH_USER_POSTS }')); ?></a>]<?php } ?>

		</td>
		<td style="vertical-align: top;"><?php echo $_inactive_val['JOINED']; ?></td>
		<td style="vertical-align: top;"><?php echo $_inactive_val['INACTIVE_DATE']; ?></td>
		<td style="vertical-align: top;"><?php echo $_inactive_val['LAST_VISIT']; ?></td>
		<td style="vertical-align: top;">
			<?php echo $_inactive_val['REASON']; ?>

			<?php if ($_inactive_val['REMINDED']) {  ?><br /><?php echo $_inactive_val['REMINDED_EXPLAIN']; } ?>

		</td>
		<td>&nbsp;<input type="checkbox" class="radio" name="mark[]" value="<?php echo $_inactive_val['USER_ID']; ?>" />&nbsp;</td>
	</tr>
<?php }} else { ?>

	<tr>
		<td colspan="6" style="text-align: center;"><?php echo ((isset($this->_rootref['L_NO_INACTIVE_USERS'])) ? $this->_rootref['L_NO_INACTIVE_USERS'] : ((isset($user->lang['NO_INACTIVE_USERS'])) ? $user->lang['NO_INACTIVE_USERS'] : '{ NO_INACTIVE_USERS }')); ?></td>
	</tr>
<?php } ?>

</tbody>
</table>

<fieldset class="display-options">
	<?php echo ((isset($this->_rootref['L_DISPLAY_LOG'])) ? $this->_rootref['L_DISPLAY_LOG'] : ((isset($user->lang['DISPLAY_LOG'])) ? $user->lang['DISPLAY_LOG'] : '{ DISPLAY_LOG }')); ?>: &nbsp;<?php echo (isset($this->_rootref['S_LIMIT_DAYS'])) ? $this->_rootref['S_LIMIT_DAYS'] : ''; ?>&nbsp;<?php echo ((isset($this->_rootref['L_SORT_BY'])) ? $this->_rootref['L_SORT_BY'] : ((isset($user->lang['SORT_BY'])) ? $user->lang['SORT_BY'] : '{ SORT_BY }')); ?>: <?php echo (isset($this->_rootref['S_SORT_KEY'])) ? $this->_rootref['S_SORT_KEY'] : ''; ?> <?php echo (isset($this->_rootref['S_SORT_DIR'])) ? $this->_rootref['S_SORT_DIR'] : ''; if ($this->_rootref['PAGINATION']) {  ?>&nbsp;Users per page: <input class="inputbox autowidth" type="text" name="users_per_page" id="users_per_page" size="3" value="<?php echo (isset($this->_rootref['USERS_PER_PAGE'])) ? $this->_rootref['USERS_PER_PAGE'] : ''; ?>" /><?php } ?>

	<input class="button2" type="submit" value="<?php echo ((isset($this->_rootref['L_GO'])) ? $this->_rootref['L_GO'] : ((isset($user->lang['GO'])) ? $user->lang['GO'] : '{ GO }')); ?>" name="sort" />
</fieldset>

<hr />

<?php if ($this->_rootref['PAGINATION']) {  ?>

	<div class="pagination">
		<a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['S_ON_PAGE'])) ? $this->_rootref['S_ON_PAGE'] : ''; ?></a> &bull; <span><?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; ?></span>
	</div>
<?php } ?>


<fieldset class="quick">
	<select name="action"><?php echo (isset($this->_rootref['S_INACTIVE_OPTIONS'])) ? $this->_rootref['S_INACTIVE_OPTIONS'] : ''; ?></select>
	<input class="button2" type="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />
	<p class="small"><a href="#" onclick="marklist('inactive', 'mark', true); return false;"><?php echo ((isset($this->_rootref['L_MARK_ALL'])) ? $this->_rootref['L_MARK_ALL'] : ((isset($user->lang['MARK_ALL'])) ? $user->lang['MARK_ALL'] : '{ MARK_ALL }')); ?></a> &bull; <a href="#" onclick="marklist('inactive', 'mark', false); return false;"><?php echo ((isset($this->_rootref['L_UNMARK_ALL'])) ? $this->_rootref['L_UNMARK_ALL'] : ((isset($user->lang['UNMARK_ALL'])) ? $user->lang['UNMARK_ALL'] : '{ UNMARK_ALL }')); ?></a></p>
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

</fieldset>

</form>

<?php $this->_tpl_include('overall_footer.html'); ?>