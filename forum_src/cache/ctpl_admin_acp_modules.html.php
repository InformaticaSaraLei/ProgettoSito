<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<a name="maincontent"></a>

<?php if ($this->_rootref['S_EDIT_MODULE']) {  ?>


	<script type="text/javascript">
	// <![CDATA[
		function display_options(value)
		{
			if (value == 'category')
			{
				dE('modoptions', -1);
			}
			else
			{
				dE('modoptions', 1);
			}
		}

		function display_modes(value)
		{
			// Find the old select tag
			var item = document.getElementById('module_mode');

			// Create the new select tag
			var new_node = document.createElement('select');
			new_node.setAttribute('id', 'module_mode');
			new_node.setAttribute('name', 'module_mode');

			// Substitute it for the old one
			item.parentNode.replaceChild(new_node, item);

			// Reset the variable
			item = document.getElementById('module_mode');

			var j = 0;
<?php $_m_names_count = (isset($this->_tpldata['m_names'])) ? sizeof($this->_tpldata['m_names']) : 0;if ($_m_names_count) {for ($_m_names_i = 0; $_m_names_i < $_m_names_count; ++$_m_names_i){$_m_names_val = &$this->_tpldata['m_names'][$_m_names_i]; ?>

		
			if (value == '<?php echo $_m_names_val['A_NAME']; ?>')
			{
	<?php $_modes_count = (isset($_m_names_val['modes'])) ? sizeof($_m_names_val['modes']) : 0;if ($_modes_count) {for ($_modes_i = 0; $_modes_i < $_modes_count; ++$_modes_i){$_modes_val = &$_m_names_val['modes'][$_modes_i]; ?>

				item.options[j] = new Option('<?php echo $_modes_val['A_VALUE']; ?>');
				item.options[j].value = '<?php echo $_modes_val['A_OPTION']; ?>';
				j++;
	<?php }} ?>

			}
<?php }} ?>


			// select first item
			item.options[0].selected = true;
		}

	// ]]>
	</script>

	<a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">&laquo; <?php echo ((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a>

	<h1><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?> :: <?php echo (isset($this->_rootref['MODULENAME'])) ? $this->_rootref['MODULENAME'] : ''; ?></h1>

	<p><?php echo ((isset($this->_rootref['L_EDIT_MODULE_EXPLAIN'])) ? $this->_rootref['L_EDIT_MODULE_EXPLAIN'] : ((isset($user->lang['EDIT_MODULE_EXPLAIN'])) ? $user->lang['EDIT_MODULE_EXPLAIN'] : '{ EDIT_MODULE_EXPLAIN }')); ?></p>

	<?php if ($this->_rootref['S_ERROR']) {  ?>

		<div class="errorbox">
			<h3><?php echo ((isset($this->_rootref['L_WARNING'])) ? $this->_rootref['L_WARNING'] : ((isset($user->lang['WARNING'])) ? $user->lang['WARNING'] : '{ WARNING }')); ?></h3>
			<p><?php echo (isset($this->_rootref['ERROR_MSG'])) ? $this->_rootref['ERROR_MSG'] : ''; ?></p>
		</div>
	<?php } ?>


	<form id="moduleedit" method="post" action="<?php echo (isset($this->_rootref['U_EDIT_ACTION'])) ? $this->_rootref['U_EDIT_ACTION'] : ''; ?>">

	<fieldset>
		<legend><?php echo ((isset($this->_rootref['L_GENERAL_OPTIONS'])) ? $this->_rootref['L_GENERAL_OPTIONS'] : ((isset($user->lang['GENERAL_OPTIONS'])) ? $user->lang['GENERAL_OPTIONS'] : '{ GENERAL_OPTIONS }')); ?></legend>
	<dl>
		<dt><label for="module_langname"><?php echo ((isset($this->_rootref['L_MODULE_LANGNAME'])) ? $this->_rootref['L_MODULE_LANGNAME'] : ((isset($user->lang['MODULE_LANGNAME'])) ? $user->lang['MODULE_LANGNAME'] : '{ MODULE_LANGNAME }')); ?>:</label><br />
		<span><?php echo ((isset($this->_rootref['L_MODULE_LANGNAME_EXPLAIN'])) ? $this->_rootref['L_MODULE_LANGNAME_EXPLAIN'] : ((isset($user->lang['MODULE_LANGNAME_EXPLAIN'])) ? $user->lang['MODULE_LANGNAME_EXPLAIN'] : '{ MODULE_LANGNAME_EXPLAIN }')); ?></span></dt>
		<dd><input name="module_langname" type="text" class="text medium" id="module_langname" value="<?php echo (isset($this->_rootref['MODULE_LANGNAME'])) ? $this->_rootref['MODULE_LANGNAME'] : ''; ?>" /></dd>
	</dl>
	<dl>
		<dt><label for="module_type"><?php echo ((isset($this->_rootref['L_MODULE_TYPE'])) ? $this->_rootref['L_MODULE_TYPE'] : ((isset($user->lang['MODULE_TYPE'])) ? $user->lang['MODULE_TYPE'] : '{ MODULE_TYPE }')); ?>:</label></dt>
		<dd><select name="module_type" id="module_type" onchange="display_options(this.value);"><option value="category"<?php if ($this->_rootref['S_IS_CAT']) {  ?> selected="selected"<?php } ?>><?php echo ((isset($this->_rootref['L_CATEGORY'])) ? $this->_rootref['L_CATEGORY'] : ((isset($user->lang['CATEGORY'])) ? $user->lang['CATEGORY'] : '{ CATEGORY }')); ?></option><option value="module"<?php if (! $this->_rootref['S_IS_CAT']) {  ?> selected="selected"<?php } ?>><?php echo ((isset($this->_rootref['L_MODULE'])) ? $this->_rootref['L_MODULE'] : ((isset($user->lang['MODULE'])) ? $user->lang['MODULE'] : '{ MODULE }')); ?></option></select></dd>
	</dl>
	<dl>
		<dt><label for="parent_id"><?php echo ((isset($this->_rootref['L_PARENT'])) ? $this->_rootref['L_PARENT'] : ((isset($user->lang['PARENT'])) ? $user->lang['PARENT'] : '{ PARENT }')); ?>:</label></dt>
		<dd><select name="module_parent_id" id="parent_id"><?php echo (isset($this->_rootref['S_CAT_OPTIONS'])) ? $this->_rootref['S_CAT_OPTIONS'] : ''; ?></select></dd>
	</dl>
	<hr />
	<dl>
		<dt><label for="module_enabled"><?php echo ((isset($this->_rootref['L_MODULE_ENABLED'])) ? $this->_rootref['L_MODULE_ENABLED'] : ((isset($user->lang['MODULE_ENABLED'])) ? $user->lang['MODULE_ENABLED'] : '{ MODULE_ENABLED }')); ?>:</label></dt>
		<dd><label><input type="radio" class="radio" name="module_enabled" id="module_enabled" value="1"<?php if ($this->_rootref['MODULE_ENABLED']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></label>
			<label><input type="radio" class="radio" name="module_enabled" value="0"<?php if (! $this->_rootref['MODULE_ENABLED']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></label></dd>
	</dl>
	<div id="modoptions"<?php if ($this->_rootref['S_IS_CAT']) {  ?> style="display: none;"<?php } ?>>
		<dl>
			<dt><label for="module_display"><?php echo ((isset($this->_rootref['L_MODULE_DISPLAYED'])) ? $this->_rootref['L_MODULE_DISPLAYED'] : ((isset($user->lang['MODULE_DISPLAYED'])) ? $user->lang['MODULE_DISPLAYED'] : '{ MODULE_DISPLAYED }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_MODULE_DISPLAYED_EXPLAIN'])) ? $this->_rootref['L_MODULE_DISPLAYED_EXPLAIN'] : ((isset($user->lang['MODULE_DISPLAYED_EXPLAIN'])) ? $user->lang['MODULE_DISPLAYED_EXPLAIN'] : '{ MODULE_DISPLAYED_EXPLAIN }')); ?></span></dt>
			<dd><label><input type="radio" class="radio" name="module_display" id="module_display" value="1"<?php if ($this->_rootref['MODULE_DISPLAY']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></label>
				<label><input type="radio" class="radio" name="module_display" value="0"<?php if (! $this->_rootref['MODULE_DISPLAY']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></label></dd>
		</dl>
		<dl>
			<dt><label for="module_basename"><?php echo ((isset($this->_rootref['L_CHOOSE_MODULE'])) ? $this->_rootref['L_CHOOSE_MODULE'] : ((isset($user->lang['CHOOSE_MODULE'])) ? $user->lang['CHOOSE_MODULE'] : '{ CHOOSE_MODULE }')); ?>:</label><br />
			<span><?php echo ((isset($this->_rootref['L_CHOOSE_MODULE_EXPLAIN'])) ? $this->_rootref['L_CHOOSE_MODULE_EXPLAIN'] : ((isset($user->lang['CHOOSE_MODULE_EXPLAIN'])) ? $user->lang['CHOOSE_MODULE_EXPLAIN'] : '{ CHOOSE_MODULE_EXPLAIN }')); ?></span></dt>
			<dd><select name="module_basename" id="module_basename" onchange="display_modes(this.value);"><?php echo (isset($this->_rootref['S_MODULE_NAMES'])) ? $this->_rootref['S_MODULE_NAMES'] : ''; ?></select></dd>
		</dl>
		<dl>
			<dt><label for="module_mode"><?php echo ((isset($this->_rootref['L_CHOOSE_MODE'])) ? $this->_rootref['L_CHOOSE_MODE'] : ((isset($user->lang['CHOOSE_MODE'])) ? $user->lang['CHOOSE_MODE'] : '{ CHOOSE_MODE }')); ?>:</label><br />
			<span><?php echo ((isset($this->_rootref['L_CHOOSE_MODE_EXPLAIN'])) ? $this->_rootref['L_CHOOSE_MODE_EXPLAIN'] : ((isset($user->lang['CHOOSE_MODE_EXPLAIN'])) ? $user->lang['CHOOSE_MODE_EXPLAIN'] : '{ CHOOSE_MODE_EXPLAIN }')); ?></span></dt>
			<dd><select name="module_mode" id="module_mode"><?php echo (isset($this->_rootref['S_MODULE_MODES'])) ? $this->_rootref['S_MODULE_MODES'] : ''; ?></select></dd>
		</dl>
	</div>

	<p class="submit-buttons">
		<input type="hidden" name="action" value="<?php echo (isset($this->_rootref['ACTION'])) ? $this->_rootref['ACTION'] : ''; ?>" />
		<input type="hidden" name="m" value="<?php echo (isset($this->_rootref['MODULE_ID'])) ? $this->_rootref['MODULE_ID'] : ''; ?>" />
		
		<input class="button1" type="submit" id="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />&nbsp;
		<input class="button2" type="reset" id="reset" name="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" />
	</p>
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>
	</form>

<?php } else { ?>


	<h1><?php echo ((isset($this->_rootref['L_ACP_MODULE_MANAGEMENT'])) ? $this->_rootref['L_ACP_MODULE_MANAGEMENT'] : ((isset($user->lang['ACP_MODULE_MANAGEMENT'])) ? $user->lang['ACP_MODULE_MANAGEMENT'] : '{ ACP_MODULE_MANAGEMENT }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_ACP_MODULE_MANAGEMENT_EXPLAIN'])) ? $this->_rootref['L_ACP_MODULE_MANAGEMENT_EXPLAIN'] : ((isset($user->lang['ACP_MODULE_MANAGEMENT_EXPLAIN'])) ? $user->lang['ACP_MODULE_MANAGEMENT_EXPLAIN'] : '{ ACP_MODULE_MANAGEMENT_EXPLAIN }')); ?></p>

	<?php if ($this->_rootref['S_ERROR']) {  ?>

		<div class="errorbox">
			<h3><?php echo ((isset($this->_rootref['L_WARNING'])) ? $this->_rootref['L_WARNING'] : ((isset($user->lang['WARNING'])) ? $user->lang['WARNING'] : '{ WARNING }')); ?></h3>
			<p><?php echo (isset($this->_rootref['ERROR_MSG'])) ? $this->_rootref['ERROR_MSG'] : ''; ?></p>
		</div>
	<?php } ?>


	<table cellspacing="1">
	<tbody>
	<tr>
		<td class="row3"><?php echo (isset($this->_rootref['NAVIGATION'])) ? $this->_rootref['NAVIGATION'] : ''; if ($this->_rootref['S_NO_MODULES']) {  ?> [<a href="<?php echo (isset($this->_rootref['U_EDIT'])) ? $this->_rootref['U_EDIT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_EDIT'])) ? $this->_rootref['L_EDIT'] : ((isset($user->lang['EDIT'])) ? $user->lang['EDIT'] : '{ EDIT }')); ?></a> | <a href="<?php echo (isset($this->_rootref['U_DELETE'])) ? $this->_rootref['U_DELETE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_DELETE'])) ? $this->_rootref['L_DELETE'] : ((isset($user->lang['DELETE'])) ? $user->lang['DELETE'] : '{ DELETE }')); ?></a> | <?php if ($this->_rootref['MODULE_ENABLED']) {  ?><a href="<?php echo (isset($this->_rootref['U_DISABLE'])) ? $this->_rootref['U_DISABLE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_DISABLE'])) ? $this->_rootref['L_DISABLE'] : ((isset($user->lang['DISABLE'])) ? $user->lang['DISABLE'] : '{ DISABLE }')); ?></a><?php } else { ?><a href="<?php echo (isset($this->_rootref['U_ENABLE'])) ? $this->_rootref['U_ENABLE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_ENABLE'])) ? $this->_rootref['L_ENABLE'] : ((isset($user->lang['ENABLE'])) ? $user->lang['ENABLE'] : '{ ENABLE }')); ?></a><?php } ?>]<?php } ?></td>
	</tr>
	</tbody>
	</table>

	<?php if (sizeof($this->_tpldata['modules'])) {  ?>

		<table cellspacing="1">
			<col class="row1" /><col class="row1" /><col class="row2" /><col class="row2" />
		<tbody>
		<?php $_modules_count = (isset($this->_tpldata['modules'])) ? sizeof($this->_tpldata['modules']) : 0;if ($_modules_count) {for ($_modules_i = 0; $_modules_i < $_modules_count; ++$_modules_i){$_modules_val = &$this->_tpldata['modules'][$_modules_i]; ?>

			<tr>
				<td style="width: 5%; text-align: center;"><?php echo $_modules_val['MODULE_IMAGE']; ?></td>
				<td><a href="<?php echo $_modules_val['U_MODULE']; ?>"><?php echo $_modules_val['MODULE_TITLE']; ?></a><?php if (! $_modules_val['MODULE_DISPLAYED']) {  ?> <span class="small">[<?php echo ((isset($this->_rootref['L_HIDDEN_MODULE'])) ? $this->_rootref['L_HIDDEN_MODULE'] : ((isset($user->lang['HIDDEN_MODULE'])) ? $user->lang['HIDDEN_MODULE'] : '{ HIDDEN_MODULE }')); ?>]</span><?php } ?></td>
				<td style="width: 15%; white-space: nowrap; text-align: center; vertical-align: middle;">&nbsp;<?php if ($_modules_val['MODULE_ENABLED']) {  ?><a href="<?php echo $_modules_val['U_DISABLE']; ?>"><?php echo ((isset($this->_rootref['L_DISABLE'])) ? $this->_rootref['L_DISABLE'] : ((isset($user->lang['DISABLE'])) ? $user->lang['DISABLE'] : '{ DISABLE }')); ?></a><?php } else { ?><a href="<?php echo $_modules_val['U_ENABLE']; ?>"><?php echo ((isset($this->_rootref['L_ENABLE'])) ? $this->_rootref['L_ENABLE'] : ((isset($user->lang['ENABLE'])) ? $user->lang['ENABLE'] : '{ ENABLE }')); ?></a><?php } ?>&nbsp;</td>
				<td style="width:90px; white-space: nowrap; text-align: right; vertical-align: middle;">
					<?php if ($_modules_val['S_FIRST_ROW'] && ! $_modules_val['S_LAST_ROW']) {  ?>

						<?php echo (isset($this->_rootref['ICON_MOVE_UP_DISABLED'])) ? $this->_rootref['ICON_MOVE_UP_DISABLED'] : ''; ?>

						<a href="<?php echo $_modules_val['U_MOVE_DOWN']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_DOWN'])) ? $this->_rootref['ICON_MOVE_DOWN'] : ''; ?></a>
					<?php } else if (! $_modules_val['S_FIRST_ROW'] && ! $_modules_val['S_LAST_ROW']) {  ?>

						<a href="<?php echo $_modules_val['U_MOVE_UP']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_UP'])) ? $this->_rootref['ICON_MOVE_UP'] : ''; ?></a> 
						<a href="<?php echo $_modules_val['U_MOVE_DOWN']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_DOWN'])) ? $this->_rootref['ICON_MOVE_DOWN'] : ''; ?></a> 
					<?php } else if ($_modules_val['S_LAST_ROW'] && ! $_modules_val['S_FIRST_ROW']) {  ?>

						<a href="<?php echo $_modules_val['U_MOVE_UP']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_UP'])) ? $this->_rootref['ICON_MOVE_UP'] : ''; ?></a>	
						<?php echo (isset($this->_rootref['ICON_MOVE_DOWN_DISABLED'])) ? $this->_rootref['ICON_MOVE_DOWN_DISABLED'] : ''; ?>

					<?php } else { ?>

						<?php echo (isset($this->_rootref['ICON_MOVE_UP_DISABLED'])) ? $this->_rootref['ICON_MOVE_UP_DISABLED'] : ''; ?>

						<?php echo (isset($this->_rootref['ICON_MOVE_DOWN_DISABLED'])) ? $this->_rootref['ICON_MOVE_DOWN_DISABLED'] : ''; ?>

					<?php } ?>

					<a href="<?php echo $_modules_val['U_EDIT']; ?>"><?php echo (isset($this->_rootref['ICON_EDIT'])) ? $this->_rootref['ICON_EDIT'] : ''; ?></a> 
					<a href="<?php echo $_modules_val['U_DELETE']; ?>"><?php echo (isset($this->_rootref['ICON_DELETE'])) ? $this->_rootref['ICON_DELETE'] : ''; ?></a>
				</td>
			</tr>
		<?php }} ?>

		</tbody>
		</table>
	<?php } ?>


	<div class="clearfix">&nbsp;</div>

	<form id="quick" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

	<fieldset class="quick" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">
		<input type="hidden" name="action" value="quickadd" />

		<select name="quick_install"><?php echo (isset($this->_rootref['S_INSTALL_OPTIONS'])) ? $this->_rootref['S_INSTALL_OPTIONS'] : ''; ?></select>
		<input class="button2" name="quickadd" type="submit" value="<?php echo ((isset($this->_rootref['L_ADD_MODULE'])) ? $this->_rootref['L_ADD_MODULE'] : ((isset($user->lang['ADD_MODULE'])) ? $user->lang['ADD_MODULE'] : '{ ADD_MODULE }')); ?>" />
	</fieldset>
	
	</form>

	<form id="module" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

	<fieldset class="quick" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>;">
		<input type="hidden" name="action" value="add" />
		<input type="hidden" name="module_parent_id" value="<?php echo (isset($this->_rootref['PARENT_ID'])) ? $this->_rootref['PARENT_ID'] : ''; ?>" />

		<input type="text" name="module_langname" maxlength="255" /> 
		<input class="button2" name="addmodule" type="submit" value="<?php echo ((isset($this->_rootref['L_CREATE_MODULE'])) ? $this->_rootref['L_CREATE_MODULE'] : ((isset($user->lang['CREATE_MODULE'])) ? $user->lang['CREATE_MODULE'] : '{ CREATE_MODULE }')); ?>" />
	</fieldset>

	</form>

	<div class="clearfix">&nbsp;</div><br style="clear: both;" />
	
	<form id="mselect" method="post" action="<?php echo (isset($this->_rootref['U_SEL_ACTION'])) ? $this->_rootref['U_SEL_ACTION'] : ''; ?>">
	<fieldset class="quick">
		<?php echo ((isset($this->_rootref['L_SELECT_MODULE'])) ? $this->_rootref['L_SELECT_MODULE'] : ((isset($user->lang['SELECT_MODULE'])) ? $user->lang['SELECT_MODULE'] : '{ SELECT_MODULE }')); ?>: <select name="parent_id" onchange="if(this.options[this.selectedIndex].value != -1){ this.form.submit(); }"><?php echo (isset($this->_rootref['MODULE_BOX'])) ? $this->_rootref['MODULE_BOX'] : ''; ?></select> 

		<input class="button2" type="submit" value="<?php echo ((isset($this->_rootref['L_GO'])) ? $this->_rootref['L_GO'] : ((isset($user->lang['GO'])) ? $user->lang['GO'] : '{ GO }')); ?>" />
	</fieldset>
	</form>

<?php } $this->_tpl_include('overall_footer.html'); ?>