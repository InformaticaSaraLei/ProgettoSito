<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<a name="maincontent"></a>

<?php if ($this->_rootref['S_EDIT']) {  ?>


	<a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">&laquo; <?php echo ((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a>

	<h1><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_EXPLAIN'])) ? $this->_rootref['L_EXPLAIN'] : ((isset($user->lang['EXPLAIN'])) ? $user->lang['EXPLAIN'] : '{ EXPLAIN }')); ?></p>

	<?php if ($this->_rootref['ERROR_MSG']) {  ?>

		<div class="errorbox">
			<h3><?php echo ((isset($this->_rootref['L_WARNING'])) ? $this->_rootref['L_WARNING'] : ((isset($user->lang['WARNING'])) ? $user->lang['WARNING'] : '{ WARNING }')); ?></h3>
			<p><?php echo (isset($this->_rootref['ERROR_MSG'])) ? $this->_rootref['ERROR_MSG'] : ''; ?></p>
		</div>
	<?php } ?>


	<form id="add_profile_field" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

	<?php if ($this->_rootref['S_STEP_ONE']) {  ?>


		<fieldset>
			<legend><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></legend>
		<dl>
			<dt><label><?php echo ((isset($this->_rootref['L_FIELD_TYPE'])) ? $this->_rootref['L_FIELD_TYPE'] : ((isset($user->lang['FIELD_TYPE'])) ? $user->lang['FIELD_TYPE'] : '{ FIELD_TYPE }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_FIELD_TYPE_EXPLAIN'])) ? $this->_rootref['L_FIELD_TYPE_EXPLAIN'] : ((isset($user->lang['FIELD_TYPE_EXPLAIN'])) ? $user->lang['FIELD_TYPE_EXPLAIN'] : '{ FIELD_TYPE_EXPLAIN }')); ?></span></dt>
			<dd><strong><?php echo (isset($this->_rootref['FIELD_TYPE'])) ? $this->_rootref['FIELD_TYPE'] : ''; ?></strong></dd>
		</dl>
		<?php if ($this->_rootref['S_EDIT_MODE']) {  ?>

		<dl>
			<dt><label><?php echo ((isset($this->_rootref['L_FIELD_IDENT'])) ? $this->_rootref['L_FIELD_IDENT'] : ((isset($user->lang['FIELD_IDENT'])) ? $user->lang['FIELD_IDENT'] : '{ FIELD_IDENT }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_FIELD_IDENT_EXPLAIN'])) ? $this->_rootref['L_FIELD_IDENT_EXPLAIN'] : ((isset($user->lang['FIELD_IDENT_EXPLAIN'])) ? $user->lang['FIELD_IDENT_EXPLAIN'] : '{ FIELD_IDENT_EXPLAIN }')); ?></span></dt>
			<dd><input type="hidden" name="field_ident" value="<?php echo (isset($this->_rootref['FIELD_IDENT'])) ? $this->_rootref['FIELD_IDENT'] : ''; ?>" /><strong><?php echo (isset($this->_rootref['FIELD_IDENT'])) ? $this->_rootref['FIELD_IDENT'] : ''; ?></strong></dd>
		</dl>
		<?php } else { ?>

		<dl>
			<dt><label for="field_ident"><?php echo ((isset($this->_rootref['L_FIELD_IDENT'])) ? $this->_rootref['L_FIELD_IDENT'] : ((isset($user->lang['FIELD_IDENT'])) ? $user->lang['FIELD_IDENT'] : '{ FIELD_IDENT }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_FIELD_IDENT_EXPLAIN'])) ? $this->_rootref['L_FIELD_IDENT_EXPLAIN'] : ((isset($user->lang['FIELD_IDENT_EXPLAIN'])) ? $user->lang['FIELD_IDENT_EXPLAIN'] : '{ FIELD_IDENT_EXPLAIN }')); ?></span></dt>
			<dd><input class="text medium" type="text" id="field_ident" name="field_ident" value="<?php echo (isset($this->_rootref['FIELD_IDENT'])) ? $this->_rootref['FIELD_IDENT'] : ''; ?>" /></dd>
		</dl>
		<?php } ?>

		<dl>
			<dt><label for="field_no_view"><?php echo ((isset($this->_rootref['L_DISPLAY_PROFILE_FIELD'])) ? $this->_rootref['L_DISPLAY_PROFILE_FIELD'] : ((isset($user->lang['DISPLAY_PROFILE_FIELD'])) ? $user->lang['DISPLAY_PROFILE_FIELD'] : '{ DISPLAY_PROFILE_FIELD }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_DISPLAY_PROFILE_FIELD_EXPLAIN'])) ? $this->_rootref['L_DISPLAY_PROFILE_FIELD_EXPLAIN'] : ((isset($user->lang['DISPLAY_PROFILE_FIELD_EXPLAIN'])) ? $user->lang['DISPLAY_PROFILE_FIELD_EXPLAIN'] : '{ DISPLAY_PROFILE_FIELD_EXPLAIN }')); ?></span></dt>
			<dd><label><input type="radio" class="radio" id="field_no_view" name="field_no_view" value="0"<?php if (! $this->_rootref['S_FIELD_NO_VIEW']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></label>
				<label><input type="radio" class="radio" name="field_no_view" value="1"<?php if ($this->_rootref['S_FIELD_NO_VIEW']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></label></dd>
		</dl>
		</fieldset>

		<fieldset>
			<legend><?php echo ((isset($this->_rootref['L_VISIBILITY_OPTION'])) ? $this->_rootref['L_VISIBILITY_OPTION'] : ((isset($user->lang['VISIBILITY_OPTION'])) ? $user->lang['VISIBILITY_OPTION'] : '{ VISIBILITY_OPTION }')); ?></legend>
		<dl>
			<dt><label for="field_show_profile"><?php echo ((isset($this->_rootref['L_DISPLAY_AT_PROFILE'])) ? $this->_rootref['L_DISPLAY_AT_PROFILE'] : ((isset($user->lang['DISPLAY_AT_PROFILE'])) ? $user->lang['DISPLAY_AT_PROFILE'] : '{ DISPLAY_AT_PROFILE }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_DISPLAY_AT_PROFILE_EXPLAIN'])) ? $this->_rootref['L_DISPLAY_AT_PROFILE_EXPLAIN'] : ((isset($user->lang['DISPLAY_AT_PROFILE_EXPLAIN'])) ? $user->lang['DISPLAY_AT_PROFILE_EXPLAIN'] : '{ DISPLAY_AT_PROFILE_EXPLAIN }')); ?></span></dt>
			<dd><input type="checkbox" class="radio" id="field_show_profile" name="field_show_profile" value="1"<?php if ($this->_rootref['S_SHOW_PROFILE']) {  ?> checked="checked"<?php } ?> /></dd>
		</dl>
		<dl>
			<dt><label for="field_show_on_reg"><?php echo ((isset($this->_rootref['L_DISPLAY_AT_REGISTER'])) ? $this->_rootref['L_DISPLAY_AT_REGISTER'] : ((isset($user->lang['DISPLAY_AT_REGISTER'])) ? $user->lang['DISPLAY_AT_REGISTER'] : '{ DISPLAY_AT_REGISTER }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_DISPLAY_AT_REGISTER_EXPLAIN'])) ? $this->_rootref['L_DISPLAY_AT_REGISTER_EXPLAIN'] : ((isset($user->lang['DISPLAY_AT_REGISTER_EXPLAIN'])) ? $user->lang['DISPLAY_AT_REGISTER_EXPLAIN'] : '{ DISPLAY_AT_REGISTER_EXPLAIN }')); ?></span></dt>
			<dd><input type="checkbox" class="radio" id="field_show_on_reg" name="field_show_on_reg" value="1"<?php if ($this->_rootref['S_SHOW_ON_REG']) {  ?> checked="checked"<?php } ?> /></dd>
		</dl>
		<dl>
			<dt><label for="field_show_on_vt"><?php echo ((isset($this->_rootref['L_DISPLAY_ON_VT'])) ? $this->_rootref['L_DISPLAY_ON_VT'] : ((isset($user->lang['DISPLAY_ON_VT'])) ? $user->lang['DISPLAY_ON_VT'] : '{ DISPLAY_ON_VT }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_DISPLAY_ON_VT_EXPLAIN'])) ? $this->_rootref['L_DISPLAY_ON_VT_EXPLAIN'] : ((isset($user->lang['DISPLAY_ON_VT_EXPLAIN'])) ? $user->lang['DISPLAY_ON_VT_EXPLAIN'] : '{ DISPLAY_ON_VT_EXPLAIN }')); ?></span></dt>
			<dd><input type="checkbox" class="radio" id="field_show_on_vt" name="field_show_on_vt" value="1"<?php if ($this->_rootref['S_SHOW_ON_VT']) {  ?> checked="checked"<?php } ?> /></dd>
		</dl>
		<dl>
			<dt><label for="field_required"><?php echo ((isset($this->_rootref['L_REQUIRED_FIELD'])) ? $this->_rootref['L_REQUIRED_FIELD'] : ((isset($user->lang['REQUIRED_FIELD'])) ? $user->lang['REQUIRED_FIELD'] : '{ REQUIRED_FIELD }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_REQUIRED_FIELD_EXPLAIN'])) ? $this->_rootref['L_REQUIRED_FIELD_EXPLAIN'] : ((isset($user->lang['REQUIRED_FIELD_EXPLAIN'])) ? $user->lang['REQUIRED_FIELD_EXPLAIN'] : '{ REQUIRED_FIELD_EXPLAIN }')); ?></span></dt>
			<dd><input type="checkbox" class="radio" id="field_required" name="field_required" value="1"<?php if ($this->_rootref['S_FIELD_REQUIRED']) {  ?> checked="checked"<?php } ?> /></dd>
		</dl>
		<dl>
			<dt><label for="field_show_novalue"><?php echo ((isset($this->_rootref['L_SHOW_NOVALUE_FIELD'])) ? $this->_rootref['L_SHOW_NOVALUE_FIELD'] : ((isset($user->lang['SHOW_NOVALUE_FIELD'])) ? $user->lang['SHOW_NOVALUE_FIELD'] : '{ SHOW_NOVALUE_FIELD }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_SHOW_NOVALUE_FIELD_EXPLAIN'])) ? $this->_rootref['L_SHOW_NOVALUE_FIELD_EXPLAIN'] : ((isset($user->lang['SHOW_NOVALUE_FIELD_EXPLAIN'])) ? $user->lang['SHOW_NOVALUE_FIELD_EXPLAIN'] : '{ SHOW_NOVALUE_FIELD_EXPLAIN }')); ?></span></dt>
			<dd><input type="checkbox" class="radio" id="field_show_novalue" name="field_show_novalue" value="1"<?php if ($this->_rootref['S_FIELD_SHOW_NOVALUE']) {  ?> checked="checked"<?php } ?> /></dd>
		</dl>
		<dl>
			<dt><label for="field_hide"><?php echo ((isset($this->_rootref['L_HIDE_PROFILE_FIELD'])) ? $this->_rootref['L_HIDE_PROFILE_FIELD'] : ((isset($user->lang['HIDE_PROFILE_FIELD'])) ? $user->lang['HIDE_PROFILE_FIELD'] : '{ HIDE_PROFILE_FIELD }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_HIDE_PROFILE_FIELD_EXPLAIN'])) ? $this->_rootref['L_HIDE_PROFILE_FIELD_EXPLAIN'] : ((isset($user->lang['HIDE_PROFILE_FIELD_EXPLAIN'])) ? $user->lang['HIDE_PROFILE_FIELD_EXPLAIN'] : '{ HIDE_PROFILE_FIELD_EXPLAIN }')); ?></span></dt>
			<dd><input type="checkbox" class="radio" id="field_hide" name="field_hide" value="1"<?php if ($this->_rootref['S_FIELD_HIDE']) {  ?> checked="checked"<?php } ?> /></dd>
		</dl>
		</fieldset>

		<?php if ($this->_rootref['S_EDIT_MODE']) {  ?>

			<fieldset class="quick">
				<input class="button1" type="submit" name="save" value="<?php echo ((isset($this->_rootref['L_SAVE'])) ? $this->_rootref['L_SAVE'] : ((isset($user->lang['SAVE'])) ? $user->lang['SAVE'] : '{ SAVE }')); ?>" />
			</fieldset>
		<?php } ?>


		<fieldset>
			<legend><?php echo ((isset($this->_rootref['L_LANG_SPECIFIC'])) ? $this->_rootref['L_LANG_SPECIFIC'] : ((isset($user->lang['LANG_SPECIFIC'])) ? $user->lang['LANG_SPECIFIC'] : '{ LANG_SPECIFIC }')); ?></legend>
		<dl>
			<dt><label for="lang_name"><?php echo ((isset($this->_rootref['L_USER_FIELD_NAME'])) ? $this->_rootref['L_USER_FIELD_NAME'] : ((isset($user->lang['USER_FIELD_NAME'])) ? $user->lang['USER_FIELD_NAME'] : '{ USER_FIELD_NAME }')); ?>:</label></dt>
			<dd><input class="text medium" type="text" id="lang_name" name="lang_name" value="<?php echo (isset($this->_rootref['LANG_NAME'])) ? $this->_rootref['LANG_NAME'] : ''; ?>" /></dd>
		</dl>
		<dl>
			<dt><label for="lang_explain"><?php echo ((isset($this->_rootref['L_FIELD_DESCRIPTION'])) ? $this->_rootref['L_FIELD_DESCRIPTION'] : ((isset($user->lang['FIELD_DESCRIPTION'])) ? $user->lang['FIELD_DESCRIPTION'] : '{ FIELD_DESCRIPTION }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_FIELD_DESCRIPTION_EXPLAIN'])) ? $this->_rootref['L_FIELD_DESCRIPTION_EXPLAIN'] : ((isset($user->lang['FIELD_DESCRIPTION_EXPLAIN'])) ? $user->lang['FIELD_DESCRIPTION_EXPLAIN'] : '{ FIELD_DESCRIPTION_EXPLAIN }')); ?></span></dt>
			<dd><textarea id="lang_explain" name="lang_explain" rows="3" cols="80"><?php echo (isset($this->_rootref['LANG_EXPLAIN'])) ? $this->_rootref['LANG_EXPLAIN'] : ''; ?></textarea></dd>
		</dl>
		<?php if ($this->_rootref['S_TEXT'] || $this->_rootref['S_STRING']) {  ?>

			<dl>
				<dt><label for="lang_default_value"><?php echo ((isset($this->_rootref['L_DEFAULT_VALUE'])) ? $this->_rootref['L_DEFAULT_VALUE'] : ((isset($user->lang['DEFAULT_VALUE'])) ? $user->lang['DEFAULT_VALUE'] : '{ DEFAULT_VALUE }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_DEFAULT_VALUE_EXPLAIN'])) ? $this->_rootref['L_DEFAULT_VALUE_EXPLAIN'] : ((isset($user->lang['DEFAULT_VALUE_EXPLAIN'])) ? $user->lang['DEFAULT_VALUE_EXPLAIN'] : '{ DEFAULT_VALUE_EXPLAIN }')); ?></span></dt>
				<dd><?php if ($this->_rootref['S_STRING']) {  ?><input class="text medium" type="text" id="lang_default_value" name="lang_default_value" value="<?php echo (isset($this->_rootref['LANG_DEFAULT_VALUE'])) ? $this->_rootref['LANG_DEFAULT_VALUE'] : ''; ?>" /><?php } else { ?><textarea id="lang_default_value" name="lang_default_value" rows="5" cols="80"><?php echo (isset($this->_rootref['LANG_DEFAULT_VALUE'])) ? $this->_rootref['LANG_DEFAULT_VALUE'] : ''; ?></textarea><?php } ?></dd>
			</dl>
		<?php } if ($this->_rootref['S_BOOL'] || $this->_rootref['S_DROPDOWN']) {  ?>

			<dl>
				<dt><label for="lang_options"><?php echo ((isset($this->_rootref['L_ENTRIES'])) ? $this->_rootref['L_ENTRIES'] : ((isset($user->lang['ENTRIES'])) ? $user->lang['ENTRIES'] : '{ ENTRIES }')); ?>:</label>
					<?php if ($this->_rootref['S_EDIT_MODE'] && $this->_rootref['S_DROPDOWN']) {  ?>

						<br /><span><?php echo ((isset($this->_rootref['L_EDIT_DROPDOWN_LANG_EXPLAIN'])) ? $this->_rootref['L_EDIT_DROPDOWN_LANG_EXPLAIN'] : ((isset($user->lang['EDIT_DROPDOWN_LANG_EXPLAIN'])) ? $user->lang['EDIT_DROPDOWN_LANG_EXPLAIN'] : '{ EDIT_DROPDOWN_LANG_EXPLAIN }')); ?></span>
					<?php } else { ?>

						<br /><span><?php echo ((isset($this->_rootref['L_LANG_OPTIONS_EXPLAIN'])) ? $this->_rootref['L_LANG_OPTIONS_EXPLAIN'] : ((isset($user->lang['LANG_OPTIONS_EXPLAIN'])) ? $user->lang['LANG_OPTIONS_EXPLAIN'] : '{ LANG_OPTIONS_EXPLAIN }')); ?></span>
					<?php } ?>

				</dt>
			<?php if ($this->_rootref['S_DROPDOWN']) {  ?>

				<dd><textarea id="lang_options" name="lang_options" rows="5" cols="80"><?php echo (isset($this->_rootref['LANG_OPTIONS'])) ? $this->_rootref['LANG_OPTIONS'] : ''; ?></textarea></dd>
			<?php } else { ?>

				<dd><input class="medium" id="lang_options" name="lang_options[0]" value="<?php echo (isset($this->_rootref['FIRST_LANG_OPTION'])) ? $this->_rootref['FIRST_LANG_OPTION'] : ''; ?>" /> <?php echo ((isset($this->_rootref['L_FIRST_OPTION'])) ? $this->_rootref['L_FIRST_OPTION'] : ((isset($user->lang['FIRST_OPTION'])) ? $user->lang['FIRST_OPTION'] : '{ FIRST_OPTION }')); ?></dd>
				<dd><input class="medium" name="lang_options[1]" value="<?php echo (isset($this->_rootref['SECOND_LANG_OPTION'])) ? $this->_rootref['SECOND_LANG_OPTION'] : ''; ?>" /> <?php echo ((isset($this->_rootref['L_SECOND_OPTION'])) ? $this->_rootref['L_SECOND_OPTION'] : ((isset($user->lang['SECOND_OPTION'])) ? $user->lang['SECOND_OPTION'] : '{ SECOND_OPTION }')); ?></dd>
			<?php } ?>

			</dl>
		<?php } ?>

		</fieldset>

		<fieldset class="quick">
			<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

			<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

			<input class="button1" type="submit" name="next" value="<?php echo ((isset($this->_rootref['L_PROFILE_TYPE_OPTIONS'])) ? $this->_rootref['L_PROFILE_TYPE_OPTIONS'] : ((isset($user->lang['PROFILE_TYPE_OPTIONS'])) ? $user->lang['PROFILE_TYPE_OPTIONS'] : '{ PROFILE_TYPE_OPTIONS }')); ?>" />
		</fieldset>

	<?php } else if ($this->_rootref['S_STEP_TWO']) {  ?>


		<fieldset>
			<legend><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></legend>
		<?php $_option_count = (isset($this->_tpldata['option'])) ? sizeof($this->_tpldata['option']) : 0;if ($_option_count) {for ($_option_i = 0; $_option_i < $_option_count; ++$_option_i){$_option_val = &$this->_tpldata['option'][$_option_i]; ?>

			<dl>
				<dt><label><?php echo $_option_val['TITLE']; ?>:</label><?php if ($_option_val['EXPLAIN']) {  ?><br /><span><?php echo $_option_val['EXPLAIN']; ?></span><?php } ?></dt>
				<dd><?php echo $_option_val['FIELD']; ?></dd>
			</dl>
		<?php }} ?>

		</fieldset>

		<fieldset class="quick" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>;">
			<input class="button1" type="submit" name="prev" value="<?php echo ((isset($this->_rootref['L_PROFILE_BASIC_OPTIONS'])) ? $this->_rootref['L_PROFILE_BASIC_OPTIONS'] : ((isset($user->lang['PROFILE_BASIC_OPTIONS'])) ? $user->lang['PROFILE_BASIC_OPTIONS'] : '{ PROFILE_BASIC_OPTIONS }')); ?>" />
		</fieldset>

		<fieldset class="quick" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">
			<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

			<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

			<input class="button1" type="submit" name="next" value="<?php echo ((isset($this->_rootref['L_NEXT_STEP'])) ? $this->_rootref['L_NEXT_STEP'] : ((isset($user->lang['NEXT_STEP'])) ? $user->lang['NEXT_STEP'] : '{ NEXT_STEP }')); ?>" />
		</fieldset>

	<?php } else if ($this->_rootref['S_STEP_THREE']) {  $_options_count = (isset($this->_tpldata['options'])) ? sizeof($this->_tpldata['options']) : 0;if ($_options_count) {for ($_options_i = 0; $_options_i < $_options_count; ++$_options_i){$_options_val = &$this->_tpldata['options'][$_options_i]; ?>

			<fieldset>
				<legend><?php echo $_options_val['LANGUAGE']; ?></legend>
			<?php $_field_count = (isset($_options_val['field'])) ? sizeof($_options_val['field']) : 0;if ($_field_count) {for ($_field_i = 0; $_field_i < $_field_count; ++$_field_i){$_field_val = &$_options_val['field'][$_field_i]; ?>

				<dl>
					<dt><label><?php echo $_field_val['L_TITLE']; ?>:</label><?php if ($_field_val['L_EXPLAIN']) {  ?><br /><span><?php echo $_field_val['L_EXPLAIN']; ?></span><?php } ?></dt>
					<?php echo $_field_val['FIELD']; ?>

				</dl>
			<?php }} ?>

			</fieldset>
		<?php }} ?>


		<fieldset class="quick" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>;">
			<input class="button1" type="submit" name="prev" value="<?php echo ((isset($this->_rootref['L_PROFILE_TYPE_OPTIONS'])) ? $this->_rootref['L_PROFILE_TYPE_OPTIONS'] : ((isset($user->lang['PROFILE_TYPE_OPTIONS'])) ? $user->lang['PROFILE_TYPE_OPTIONS'] : '{ PROFILE_TYPE_OPTIONS }')); ?>" />
		</fieldset>

		<fieldset class="quick" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">
			<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

			<input class="button1" type="submit" name="save" value="<?php echo ((isset($this->_rootref['L_SAVE'])) ? $this->_rootref['L_SAVE'] : ((isset($user->lang['SAVE'])) ? $user->lang['SAVE'] : '{ SAVE }')); ?>" />
			<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

		</fieldset>

	<?php } ?>


	</form>

<?php } else { ?>


	<h1><?php echo ((isset($this->_rootref['L_ACP_CUSTOM_PROFILE_FIELDS'])) ? $this->_rootref['L_ACP_CUSTOM_PROFILE_FIELDS'] : ((isset($user->lang['ACP_CUSTOM_PROFILE_FIELDS'])) ? $user->lang['ACP_CUSTOM_PROFILE_FIELDS'] : '{ ACP_CUSTOM_PROFILE_FIELDS }')); ?></h1>

	<?php if ($this->_rootref['S_NEED_EDIT']) {  ?>

		<div class="errorbox">
			<h3><?php echo ((isset($this->_rootref['L_WARNING'])) ? $this->_rootref['L_WARNING'] : ((isset($user->lang['WARNING'])) ? $user->lang['WARNING'] : '{ WARNING }')); ?></h3>
			<p><?php echo ((isset($this->_rootref['L_CUSTOM_FIELDS_NOT_TRANSLATED'])) ? $this->_rootref['L_CUSTOM_FIELDS_NOT_TRANSLATED'] : ((isset($user->lang['CUSTOM_FIELDS_NOT_TRANSLATED'])) ? $user->lang['CUSTOM_FIELDS_NOT_TRANSLATED'] : '{ CUSTOM_FIELDS_NOT_TRANSLATED }')); ?></p>
		</div>
	<?php } ?>


	<table cellspacing="1">
	<thead>
	<tr>
		<th><?php echo ((isset($this->_rootref['L_FIELD_IDENT'])) ? $this->_rootref['L_FIELD_IDENT'] : ((isset($user->lang['FIELD_IDENT'])) ? $user->lang['FIELD_IDENT'] : '{ FIELD_IDENT }')); ?></th>
		<th><?php echo ((isset($this->_rootref['L_FIELD_TYPE'])) ? $this->_rootref['L_FIELD_TYPE'] : ((isset($user->lang['FIELD_TYPE'])) ? $user->lang['FIELD_TYPE'] : '{ FIELD_TYPE }')); ?></th>
		<th colspan="2"><?php echo ((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php $_fields_count = (isset($this->_tpldata['fields'])) ? sizeof($this->_tpldata['fields']) : 0;if ($_fields_count) {for ($_fields_i = 0; $_fields_i < $_fields_count; ++$_fields_i){$_fields_val = &$this->_tpldata['fields'][$_fields_i]; if (!($_fields_val['S_ROW_COUNT'] & 1)  ) {  ?><tr class="row1"><?php } else { ?><tr class="row2"><?php } ?>


		<td><?php echo $_fields_val['FIELD_IDENT']; ?></td>
		<td><?php echo $_fields_val['FIELD_TYPE']; ?></td>
		<td style="text-align: center;"><a href="<?php echo $_fields_val['U_ACTIVATE_DEACTIVATE']; ?>"><?php echo $_fields_val['L_ACTIVATE_DEACTIVATE']; ?></a><?php if ($_fields_val['S_NEED_EDIT']) {  ?> | <a href="<?php echo $_fields_val['U_TRANSLATE']; ?>" style="color: red;"><?php echo ((isset($this->_rootref['L_TRANSLATE'])) ? $this->_rootref['L_TRANSLATE'] : ((isset($user->lang['TRANSLATE'])) ? $user->lang['TRANSLATE'] : '{ TRANSLATE }')); ?></a><?php } ?></td>

		<td style="width: 80px; text-align: right; white-space: nowrap;">
			<?php if ($_fields_val['S_FIRST_ROW'] && ! $_fields_val['S_LAST_ROW']) {  ?>

				<?php echo (isset($this->_rootref['ICON_MOVE_UP_DISABLED'])) ? $this->_rootref['ICON_MOVE_UP_DISABLED'] : ''; ?>

				<a href="<?php echo $_fields_val['U_MOVE_DOWN']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_DOWN'])) ? $this->_rootref['ICON_MOVE_DOWN'] : ''; ?></a>
			<?php } else if (! $_fields_val['S_FIRST_ROW'] && ! $_fields_val['S_LAST_ROW']) {  ?>

				<a href="<?php echo $_fields_val['U_MOVE_UP']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_UP'])) ? $this->_rootref['ICON_MOVE_UP'] : ''; ?></a>
				<a href="<?php echo $_fields_val['U_MOVE_DOWN']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_DOWN'])) ? $this->_rootref['ICON_MOVE_DOWN'] : ''; ?></a>
			<?php } else if ($_fields_val['S_LAST_ROW'] && ! $_fields_val['S_FIRST_ROW']) {  ?>

				<a href="<?php echo $_fields_val['U_MOVE_UP']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_UP'])) ? $this->_rootref['ICON_MOVE_UP'] : ''; ?></a>
				<?php echo (isset($this->_rootref['ICON_MOVE_DOWN_DISABLED'])) ? $this->_rootref['ICON_MOVE_DOWN_DISABLED'] : ''; ?>

			<?php } if (! $_fields_val['S_NEED_EDIT']) {  ?>

				<a href="<?php echo $_fields_val['U_EDIT']; ?>"><?php echo (isset($this->_rootref['ICON_EDIT'])) ? $this->_rootref['ICON_EDIT'] : ''; ?></a>
			<?php } else { ?>

				<?php echo (isset($this->_rootref['ICON_EDIT_DISABLED'])) ? $this->_rootref['ICON_EDIT_DISABLED'] : ''; ?>

			<?php } ?>

			<a href="<?php echo $_fields_val['U_DELETE']; ?>"><?php echo (isset($this->_rootref['ICON_DELETE'])) ? $this->_rootref['ICON_DELETE'] : ''; ?></a>
		</td>

	</tr>
	<?php }} else { ?>

	<tr class="row3">
		<td colspan="4"><?php echo ((isset($this->_rootref['L_ACP_NO_ITEMS'])) ? $this->_rootref['L_ACP_NO_ITEMS'] : ((isset($user->lang['ACP_NO_ITEMS'])) ? $user->lang['ACP_NO_ITEMS'] : '{ ACP_NO_ITEMS }')); ?></td>
	</tr>
	<?php } ?>

	</tbody>
	</table>

	<form id="profile_fields" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

	<fieldset class="quick">
		<input class="text small" type="text" name="field_ident" /> <select name="field_type"><?php echo (isset($this->_rootref['S_TYPE_OPTIONS'])) ? $this->_rootref['S_TYPE_OPTIONS'] : ''; ?></select>
		<input class="button1" type="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_CREATE_NEW_FIELD'])) ? $this->_rootref['L_CREATE_NEW_FIELD'] : ((isset($user->lang['CREATE_NEW_FIELD'])) ? $user->lang['CREATE_NEW_FIELD'] : '{ CREATE_NEW_FIELD }')); ?>" />
		<input type="hidden" name="create" value="1" />
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>
	</form>

<?php } $this->_tpl_include('overall_footer.html'); ?>