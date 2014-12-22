<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<a name="maincontent"></a>

<?php if ($this->_rootref['S_EDIT']) {  ?>


	<script type="text/javascript">
	// <![CDATA[
		var active_pmask = '0';
		var active_fmask = '0';
		var active_cat = '0';

		var id = '000';

		var role_options = new Array();

		<?php if ($this->_rootref['S_ROLE_JS_ARRAY']) {  ?>

			<?php echo (isset($this->_rootref['S_ROLE_JS_ARRAY'])) ? $this->_rootref['S_ROLE_JS_ARRAY'] : ''; ?>

		<?php } ?>

	// ]]>
	</script>

	<script type="text/javascript" src="style/permissions.js"></script>

	<a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">&laquo; <?php echo ((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a>

	<h1><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_EXPLAIN'])) ? $this->_rootref['L_EXPLAIN'] : ((isset($user->lang['EXPLAIN'])) ? $user->lang['EXPLAIN'] : '{ EXPLAIN }')); ?></p>

	<br />
	<a href="#acl">&raquo; <?php echo ((isset($this->_rootref['L_SET_ROLE_PERMISSIONS'])) ? $this->_rootref['L_SET_ROLE_PERMISSIONS'] : ((isset($user->lang['SET_ROLE_PERMISSIONS'])) ? $user->lang['SET_ROLE_PERMISSIONS'] : '{ SET_ROLE_PERMISSIONS }')); ?></a>

	<form id="acp_roles" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

	<fieldset>
		<legend><?php echo ((isset($this->_rootref['L_ROLE_DETAILS'])) ? $this->_rootref['L_ROLE_DETAILS'] : ((isset($user->lang['ROLE_DETAILS'])) ? $user->lang['ROLE_DETAILS'] : '{ ROLE_DETAILS }')); ?></legend>
	<dl>
		<dt><label for="role_name"><?php echo ((isset($this->_rootref['L_ROLE_NAME'])) ? $this->_rootref['L_ROLE_NAME'] : ((isset($user->lang['ROLE_NAME'])) ? $user->lang['ROLE_NAME'] : '{ ROLE_NAME }')); ?>:</label></dt>
		<dd><input name="role_name" type="text" id="role_name" value="<?php echo (isset($this->_rootref['ROLE_NAME'])) ? $this->_rootref['ROLE_NAME'] : ''; ?>" maxlength="255" /></dd>
	</dl>
	<dl>
		<dt><label for="role_description"><?php echo ((isset($this->_rootref['L_ROLE_DESCRIPTION'])) ? $this->_rootref['L_ROLE_DESCRIPTION'] : ((isset($user->lang['ROLE_DESCRIPTION'])) ? $user->lang['ROLE_DESCRIPTION'] : '{ ROLE_DESCRIPTION }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_ROLE_DESCRIPTION_EXPLAIN'])) ? $this->_rootref['L_ROLE_DESCRIPTION_EXPLAIN'] : ((isset($user->lang['ROLE_DESCRIPTION_EXPLAIN'])) ? $user->lang['ROLE_DESCRIPTION_EXPLAIN'] : '{ ROLE_DESCRIPTION_EXPLAIN }')); ?></span></dt>
		<dd><textarea id="role_description" name="role_description" rows="3" cols="45"><?php echo (isset($this->_rootref['ROLE_DESCRIPTION'])) ? $this->_rootref['ROLE_DESCRIPTION'] : ''; ?></textarea></dd>
	</dl>

	<p class="quick">
		<input type="submit" class="button1" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</p>
	</fieldset>

	<?php if ($this->_rootref['S_DISPLAY_ROLE_MASK']) {  ?>


		<h1><?php echo ((isset($this->_rootref['L_ROLE_ASSIGNED_TO'])) ? $this->_rootref['L_ROLE_ASSIGNED_TO'] : ((isset($user->lang['ROLE_ASSIGNED_TO'])) ? $user->lang['ROLE_ASSIGNED_TO'] : '{ ROLE_ASSIGNED_TO }')); ?></h1>

		<?php $this->_tpl_include('permission_roles_mask.html'); } ?>


	<p>

	<a name="acl"></a>

	<a href="#maincontent">&raquo; <?php echo ((isset($this->_rootref['L_BACK_TO_TOP'])) ? $this->_rootref['L_BACK_TO_TOP'] : ((isset($user->lang['BACK_TO_TOP'])) ? $user->lang['BACK_TO_TOP'] : '{ BACK_TO_TOP }')); ?></a><br />
	<br /><br />

	</p>

	<h1><?php echo ((isset($this->_rootref['L_ACL_TYPE'])) ? $this->_rootref['L_ACL_TYPE'] : ((isset($user->lang['ACL_TYPE'])) ? $user->lang['ACL_TYPE'] : '{ ACL_TYPE }')); ?></h1>

	<fieldset class="perm nolegend">

		<div id="advanced00">
			<div class="permissions-category">
				<ul>
				<?php $_auth_count = (isset($this->_tpldata['auth'])) ? sizeof($this->_tpldata['auth']) : 0;if ($_auth_count) {for ($_auth_i = 0; $_auth_i < $_auth_count; ++$_auth_i){$_auth_val = &$this->_tpldata['auth'][$_auth_i]; if ($_auth_val['S_YES']) {  ?>

						<li class="permissions-preset-yes<?php if ($_auth_val['S_FIRST_ROW']) {  ?> activetab<?php } ?>" id="tab00<?php echo $_auth_val['S_ROW_COUNT']; ?>">
					<?php } else if ($_auth_val['S_NEVER']) {  ?>

						<li class="permissions-preset-never<?php if ($_auth_val['S_FIRST_ROW']) {  ?> activetab<?php } ?>" id="tab00<?php echo $_auth_val['S_ROW_COUNT']; ?>">
					<?php } else if ($_auth_val['S_NO']) {  ?>

						<li class="permissions-preset-no<?php if ($_auth_val['S_FIRST_ROW']) {  ?> activetab<?php } ?>" id="tab00<?php echo $_auth_val['S_ROW_COUNT']; ?>">
					<?php } else { ?>

						<li class="permissions-preset-custom<?php if ($_auth_val['S_FIRST_ROW']) {  ?> activetab<?php } ?>" id="tab00<?php echo $_auth_val['S_ROW_COUNT']; ?>">
					<?php } ?>

						<a href="#" onclick="swap_options('0','0','<?php echo $_auth_val['S_ROW_COUNT']; ?>'); return false;"><span class="tabbg"><span class="colour"></span><?php echo $_auth_val['CAT_NAME']; ?></span></a></li>	
				<?php }} ?>

				</ul>
			</div>
			<?php $_auth_count = (isset($this->_tpldata['auth'])) ? sizeof($this->_tpldata['auth']) : 0;if ($_auth_count) {for ($_auth_i = 0; $_auth_i < $_auth_count; ++$_auth_i){$_auth_val = &$this->_tpldata['auth'][$_auth_i]; ?>

			<div class="permissions-panel" id="options00<?php echo $_auth_val['S_ROW_COUNT']; ?>"<?php if ($_auth_val['S_FIRST_ROW']) {  } else { ?> style="display: none;"<?php } ?>>
				<span class="corners-top"><span></span></span>
				<div class="tablewrap">
					<table id="table00<?php echo $_auth_val['S_ROW_COUNT']; ?>" cellspacing="1">
					<colgroup>
						<col class="permissions-name" />
						<col class="permissions-yes" />
						<col class="permissions-no" />
						<col class="permissions-never" />
					</colgroup>
					<thead>
					<tr>
						<th class="name" scope="col"><strong><?php echo ((isset($this->_rootref['L_ACL_SETTING'])) ? $this->_rootref['L_ACL_SETTING'] : ((isset($user->lang['ACL_SETTING'])) ? $user->lang['ACL_SETTING'] : '{ ACL_SETTING }')); ?></strong></th>
						<th class="value permissions-yes" scope="col"><a href="#" onclick="mark_options('options00<?php echo $_auth_val['S_ROW_COUNT']; ?>', 'y'); set_colours('00<?php echo $_auth_val['S_ROW_COUNT']; ?>', false, 'yes'); return false;"><?php echo ((isset($this->_rootref['L_ACL_YES'])) ? $this->_rootref['L_ACL_YES'] : ((isset($user->lang['ACL_YES'])) ? $user->lang['ACL_YES'] : '{ ACL_YES }')); ?></a></th>
						<th class="value permissions-no" scope="col"><a href="#" onclick="mark_options('options00<?php echo $_auth_val['S_ROW_COUNT']; ?>', 'u'); set_colours('00<?php echo $_auth_val['S_ROW_COUNT']; ?>', false, 'no'); return false;"><?php echo ((isset($this->_rootref['L_ACL_NO'])) ? $this->_rootref['L_ACL_NO'] : ((isset($user->lang['ACL_NO'])) ? $user->lang['ACL_NO'] : '{ ACL_NO }')); ?></a></th>
						<th class="value permissions-never" scope="col"><a href="#" onclick="mark_options('options00<?php echo $_auth_val['S_ROW_COUNT']; ?>', 'n'); set_colours('00<?php echo $_auth_val['S_ROW_COUNT']; ?>', false, 'never'); return false;"><?php echo ((isset($this->_rootref['L_ACL_NEVER'])) ? $this->_rootref['L_ACL_NEVER'] : ((isset($user->lang['ACL_NEVER'])) ? $user->lang['ACL_NEVER'] : '{ ACL_NEVER }')); ?></a></th>
					</tr>
					</thead>
					<tbody>
					<?php $_mask_count = (isset($_auth_val['mask'])) ? sizeof($_auth_val['mask']) : 0;if ($_mask_count) {for ($_mask_i = 0; $_mask_i < $_mask_count; ++$_mask_i){$_mask_val = &$_auth_val['mask'][$_mask_i]; if (!($_mask_val['S_ROW_COUNT'] & 1)  ) {  ?><tr class="row4"><?php } else { ?><tr class="row3"><?php } ?>

						<th class="permissions-name<?php if (!($_mask_val['S_ROW_COUNT'] & 1)  ) {  ?> row4<?php } else { ?> row3<?php } ?>"><?php echo $_mask_val['PERMISSION']; ?></th>
							
						<td class="permissions-yes"><label for="setting_<?php echo $_mask_val['FIELD_NAME']; ?>_y"><input onchange="set_colours('00<?php echo $_auth_val['S_ROW_COUNT']; ?>', false)" id="setting_<?php echo $_mask_val['FIELD_NAME']; ?>_y" name="setting[<?php echo $_mask_val['FIELD_NAME']; ?>]" class="radio" type="radio"<?php if ($_mask_val['S_YES']) {  ?> checked="checked"<?php } ?> value="1" /></label></td>
						<td class="permissions-no"><label for="setting_<?php echo $_mask_val['FIELD_NAME']; ?>_u"><input onchange="set_colours('00<?php echo $_auth_val['S_ROW_COUNT']; ?>', false)" id="setting_<?php echo $_mask_val['FIELD_NAME']; ?>_u" name="setting[<?php echo $_mask_val['FIELD_NAME']; ?>]" class="radio" type="radio"<?php if ($_mask_val['S_NO']) {  ?> checked="checked"<?php } ?> value="-1" /></label></td>
						<td class="permissions-never"><label for="setting_<?php echo $_mask_val['FIELD_NAME']; ?>_n"><input onchange="set_colours('00<?php echo $_auth_val['S_ROW_COUNT']; ?>', false)" id="setting_<?php echo $_mask_val['FIELD_NAME']; ?>_n" name="setting[<?php echo $_mask_val['FIELD_NAME']; ?>]" class="radio" type="radio"<?php if ($_mask_val['S_NEVER']) {  ?> checked="checked"<?php } ?> value="0" /></label></td>
					</tr>
					<?php }} ?>

					</tbody>
					</table>
				</div>
				<span class="corners-bottom"><span></span></span>
			</div>
			<?php }} ?>

		</div>

	</fieldset>

	<fieldset class="quick">
		<input type="submit" class="button1" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>
	</form>

	<a href="#maincontent">&raquo; <?php echo ((isset($this->_rootref['L_BACK_TO_TOP'])) ? $this->_rootref['L_BACK_TO_TOP'] : ((isset($user->lang['BACK_TO_TOP'])) ? $user->lang['BACK_TO_TOP'] : '{ BACK_TO_TOP }')); ?></a><br />
	<br />

<?php } else { ?>


	<h1><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_EXPLAIN'])) ? $this->_rootref['L_EXPLAIN'] : ((isset($user->lang['EXPLAIN'])) ? $user->lang['EXPLAIN'] : '{ EXPLAIN }')); ?></p>

	<form id="acp_roles" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

	<table cellspacing="1">
		<col class="col2" /><col class="col2" /><col class="col1" /><col class="col2" /><col class="col2" />
	<thead>
	<tr>
		<th><?php echo ((isset($this->_rootref['L_ROLE_NAME'])) ? $this->_rootref['L_ROLE_NAME'] : ((isset($user->lang['ROLE_NAME'])) ? $user->lang['ROLE_NAME'] : '{ ROLE_NAME }')); ?></th>
		<th colspan="2"><?php echo ((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php $_roles_count = (isset($this->_tpldata['roles'])) ? sizeof($this->_tpldata['roles']) : 0;if ($_roles_count) {for ($_roles_i = 0; $_roles_i < $_roles_count; ++$_roles_i){$_roles_val = &$this->_tpldata['roles'][$_roles_i]; ?>

	<tr>
		<td style="vertical-align: top;"><strong><?php echo $_roles_val['ROLE_NAME']; ?></strong>
			<?php if ($_roles_val['ROLE_DESCRIPTION']) {  ?><br /><span><?php echo $_roles_val['ROLE_DESCRIPTION']; ?></span><?php } ?>

		</td>
		<td style="width: 30%; text-align: center; vertical-align: top; white-space: nowrap;"><?php if ($_roles_val['U_DISPLAY_ITEMS']) {  ?><a href="<?php echo $_roles_val['U_DISPLAY_ITEMS']; ?>"><?php echo ((isset($this->_rootref['L_VIEW_ASSIGNED_ITEMS'])) ? $this->_rootref['L_VIEW_ASSIGNED_ITEMS'] : ((isset($user->lang['VIEW_ASSIGNED_ITEMS'])) ? $user->lang['VIEW_ASSIGNED_ITEMS'] : '{ VIEW_ASSIGNED_ITEMS }')); ?></a><?php } else { echo ((isset($this->_rootref['L_VIEW_ASSIGNED_ITEMS'])) ? $this->_rootref['L_VIEW_ASSIGNED_ITEMS'] : ((isset($user->lang['VIEW_ASSIGNED_ITEMS'])) ? $user->lang['VIEW_ASSIGNED_ITEMS'] : '{ VIEW_ASSIGNED_ITEMS }')); } ?></td>
		<td style="width: 80px; text-align: right; vertical-align: top; white-space: nowrap;">
			<?php if ($_roles_val['S_FIRST_ROW'] && ! $_roles_val['S_LAST_ROW']) {  ?>

				<?php echo (isset($this->_rootref['ICON_MOVE_UP_DISABLED'])) ? $this->_rootref['ICON_MOVE_UP_DISABLED'] : ''; ?>

				<a href="<?php echo $_roles_val['U_MOVE_DOWN']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_DOWN'])) ? $this->_rootref['ICON_MOVE_DOWN'] : ''; ?></a>
			<?php } else if (! $_roles_val['S_FIRST_ROW'] && ! $_roles_val['S_LAST_ROW']) {  ?>

				<a href="<?php echo $_roles_val['U_MOVE_UP']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_UP'])) ? $this->_rootref['ICON_MOVE_UP'] : ''; ?></a> 
				<a href="<?php echo $_roles_val['U_MOVE_DOWN']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_DOWN'])) ? $this->_rootref['ICON_MOVE_DOWN'] : ''; ?></a> 
			<?php } else if ($_roles_val['S_LAST_ROW'] && ! $_roles_val['S_FIRST_ROW']) {  ?>

				<a href="<?php echo $_roles_val['U_MOVE_UP']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_UP'])) ? $this->_rootref['ICON_MOVE_UP'] : ''; ?></a>	
				<?php echo (isset($this->_rootref['ICON_MOVE_DOWN_DISABLED'])) ? $this->_rootref['ICON_MOVE_DOWN_DISABLED'] : ''; ?>

			<?php } else { ?>

				<?php echo (isset($this->_rootref['ICON_MOVE_UP_DISABLED'])) ? $this->_rootref['ICON_MOVE_UP_DISABLED'] : ''; ?>

				<?php echo (isset($this->_rootref['ICON_MOVE_DOWN_DISABLED'])) ? $this->_rootref['ICON_MOVE_DOWN_DISABLED'] : ''; ?>

			<?php } ?>	
			<a href="<?php echo $_roles_val['U_EDIT']; ?>" title="<?php echo ((isset($this->_rootref['L_EDIT_ROLE'])) ? $this->_rootref['L_EDIT_ROLE'] : ((isset($user->lang['EDIT_ROLE'])) ? $user->lang['EDIT_ROLE'] : '{ EDIT_ROLE }')); ?>"><?php echo (isset($this->_rootref['ICON_EDIT'])) ? $this->_rootref['ICON_EDIT'] : ''; ?></a> 
			<a href="<?php echo $_roles_val['U_REMOVE']; ?>" title="<?php echo ((isset($this->_rootref['L_REMOVE_ROLE'])) ? $this->_rootref['L_REMOVE_ROLE'] : ((isset($user->lang['REMOVE_ROLE'])) ? $user->lang['REMOVE_ROLE'] : '{ REMOVE_ROLE }')); ?>"><?php echo (isset($this->_rootref['ICON_DELETE'])) ? $this->_rootref['ICON_DELETE'] : ''; ?></a>
		</td>
	</tr>
	<?php }} ?>

	</tbody>
	</table>

	<fieldset class="quick">
		<?php echo ((isset($this->_rootref['L_CREATE_ROLE'])) ? $this->_rootref['L_CREATE_ROLE'] : ((isset($user->lang['CREATE_ROLE'])) ? $user->lang['CREATE_ROLE'] : '{ CREATE_ROLE }')); ?>: <input type="text" name="role_name" value="" maxlength="255" /><?php if ($this->_rootref['S_ROLE_OPTIONS']) {  ?> <select name="options_from"><option value="0" selected="selected"><?php echo ((isset($this->_rootref['L_CREATE_ROLE_FROM'])) ? $this->_rootref['L_CREATE_ROLE_FROM'] : ((isset($user->lang['CREATE_ROLE_FROM'])) ? $user->lang['CREATE_ROLE_FROM'] : '{ CREATE_ROLE_FROM }')); ?></option><?php echo (isset($this->_rootref['S_ROLE_OPTIONS'])) ? $this->_rootref['S_ROLE_OPTIONS'] : ''; ?></select><?php } ?> <input class="button2" type="submit" name="add" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" /><br />
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>
	</form>

	<?php if ($this->_rootref['S_DISPLAY_ROLE_MASK']) {  ?>


		<a name="assigned_to"></a>

		<h1><?php echo ((isset($this->_rootref['L_ROLE_ASSIGNED_TO'])) ? $this->_rootref['L_ROLE_ASSIGNED_TO'] : ((isset($user->lang['ROLE_ASSIGNED_TO'])) ? $user->lang['ROLE_ASSIGNED_TO'] : '{ ROLE_ASSIGNED_TO }')); ?></h1>

		<?php $this->_tpl_include('permission_roles_mask.html'); } } $this->_tpl_include('overall_footer.html'); ?>