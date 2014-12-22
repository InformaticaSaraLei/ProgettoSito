<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<a name="maincontent"></a>

<?php if ($this->_rootref['S_EDIT_BOT']) {  ?>


	<a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">&laquo; <?php echo ((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a>

	<h1><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_BOT_EDIT_EXPLAIN'])) ? $this->_rootref['L_BOT_EDIT_EXPLAIN'] : ((isset($user->lang['BOT_EDIT_EXPLAIN'])) ? $user->lang['BOT_EDIT_EXPLAIN'] : '{ BOT_EDIT_EXPLAIN }')); ?></p>

	<?php if ($this->_rootref['S_ERROR']) {  ?>

		<div class="errorbox">
			<h3><?php echo ((isset($this->_rootref['L_WARNING'])) ? $this->_rootref['L_WARNING'] : ((isset($user->lang['WARNING'])) ? $user->lang['WARNING'] : '{ WARNING }')); ?></h3>
			<p><?php echo (isset($this->_rootref['ERROR_MSG'])) ? $this->_rootref['ERROR_MSG'] : ''; ?></p>
		</div>
	<?php } ?>


	<form id="acp_bots" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

	<fieldset>
		<legend><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></legend>
	<dl>
		<dt><label for="bot_name"><?php echo ((isset($this->_rootref['L_BOT_NAME'])) ? $this->_rootref['L_BOT_NAME'] : ((isset($user->lang['BOT_NAME'])) ? $user->lang['BOT_NAME'] : '{ BOT_NAME }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_BOT_NAME_EXPLAIN'])) ? $this->_rootref['L_BOT_NAME_EXPLAIN'] : ((isset($user->lang['BOT_NAME_EXPLAIN'])) ? $user->lang['BOT_NAME_EXPLAIN'] : '{ BOT_NAME_EXPLAIN }')); ?></span></dt>
		<dd><input name="bot_name" type="text" id="bot_name" value="<?php echo (isset($this->_rootref['BOT_NAME'])) ? $this->_rootref['BOT_NAME'] : ''; ?>" maxlength="255" /></dd>
	</dl>
	<dl>
		<dt><label for="bot_style"><?php echo ((isset($this->_rootref['L_BOT_STYLE'])) ? $this->_rootref['L_BOT_STYLE'] : ((isset($user->lang['BOT_STYLE'])) ? $user->lang['BOT_STYLE'] : '{ BOT_STYLE }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_BOT_STYLE_EXPLAIN'])) ? $this->_rootref['L_BOT_STYLE_EXPLAIN'] : ((isset($user->lang['BOT_STYLE_EXPLAIN'])) ? $user->lang['BOT_STYLE_EXPLAIN'] : '{ BOT_STYLE_EXPLAIN }')); ?></span></dt>
		<dd><select id="bot_style" name="bot_style"><?php echo (isset($this->_rootref['S_STYLE_OPTIONS'])) ? $this->_rootref['S_STYLE_OPTIONS'] : ''; ?></select></dd>
	</dl>
	<dl>
		<dt><label for="bot_lang"><?php echo ((isset($this->_rootref['L_BOT_LANG'])) ? $this->_rootref['L_BOT_LANG'] : ((isset($user->lang['BOT_LANG'])) ? $user->lang['BOT_LANG'] : '{ BOT_LANG }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_BOT_LANG_EXPLAIN'])) ? $this->_rootref['L_BOT_LANG_EXPLAIN'] : ((isset($user->lang['BOT_LANG_EXPLAIN'])) ? $user->lang['BOT_LANG_EXPLAIN'] : '{ BOT_LANG_EXPLAIN }')); ?></span></dt>
		<dd><select id="bot_lang" name="bot_lang"><?php echo (isset($this->_rootref['S_LANG_OPTIONS'])) ? $this->_rootref['S_LANG_OPTIONS'] : ''; ?></select></dd>
	</dl>
	<dl>
		<dt><label for="bot_active"><?php echo ((isset($this->_rootref['L_BOT_ACTIVE'])) ? $this->_rootref['L_BOT_ACTIVE'] : ((isset($user->lang['BOT_ACTIVE'])) ? $user->lang['BOT_ACTIVE'] : '{ BOT_ACTIVE }')); ?>:</label></dt>
		<dd><select id="bot_active" name="bot_active"><?php echo (isset($this->_rootref['S_ACTIVE_OPTIONS'])) ? $this->_rootref['S_ACTIVE_OPTIONS'] : ''; ?></select></dd>
	</dl>
	<dl>
		<dt><label for="bot_agent"><?php echo ((isset($this->_rootref['L_BOT_AGENT'])) ? $this->_rootref['L_BOT_AGENT'] : ((isset($user->lang['BOT_AGENT'])) ? $user->lang['BOT_AGENT'] : '{ BOT_AGENT }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_BOT_AGENT_EXPLAIN'])) ? $this->_rootref['L_BOT_AGENT_EXPLAIN'] : ((isset($user->lang['BOT_AGENT_EXPLAIN'])) ? $user->lang['BOT_AGENT_EXPLAIN'] : '{ BOT_AGENT_EXPLAIN }')); ?></span></dt>
		<dd><input name="bot_agent" type="text" id="bot_agent" value="<?php echo (isset($this->_rootref['BOT_AGENT'])) ? $this->_rootref['BOT_AGENT'] : ''; ?>" maxlength="255" /></dd>
	</dl>
	<dl>
		<dt><label for="bot_ip"><?php echo ((isset($this->_rootref['L_BOT_IP'])) ? $this->_rootref['L_BOT_IP'] : ((isset($user->lang['BOT_IP'])) ? $user->lang['BOT_IP'] : '{ BOT_IP }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_BOT_IP_EXPLAIN'])) ? $this->_rootref['L_BOT_IP_EXPLAIN'] : ((isset($user->lang['BOT_IP_EXPLAIN'])) ? $user->lang['BOT_IP_EXPLAIN'] : '{ BOT_IP_EXPLAIN }')); ?></span></dt>
		<dd><input name="bot_ip" type="text" id="bot_ip" value="<?php echo (isset($this->_rootref['BOT_IP'])) ? $this->_rootref['BOT_IP'] : ''; ?>" maxlength="255" /></dd>
	</dl>

	<p class="submit-buttons">
		<input class="button1" type="submit" id="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />&nbsp;
		<input class="button2" type="reset" id="reset" name="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" />
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</p>
	</fieldset>
	</form>

<?php } else { ?>


	<h1><?php echo ((isset($this->_rootref['L_BOTS'])) ? $this->_rootref['L_BOTS'] : ((isset($user->lang['BOTS'])) ? $user->lang['BOTS'] : '{ BOTS }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_BOTS_EXPLAIN'])) ? $this->_rootref['L_BOTS_EXPLAIN'] : ((isset($user->lang['BOTS_EXPLAIN'])) ? $user->lang['BOTS_EXPLAIN'] : '{ BOTS_EXPLAIN }')); ?></p>

	<form id="acp_bots" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

	<table cellspacing="1">
	<thead>
	<tr>
		<th><?php echo ((isset($this->_rootref['L_BOT_NAME'])) ? $this->_rootref['L_BOT_NAME'] : ((isset($user->lang['BOT_NAME'])) ? $user->lang['BOT_NAME'] : '{ BOT_NAME }')); ?></th>
		<th><?php echo ((isset($this->_rootref['L_BOT_LAST_VISIT'])) ? $this->_rootref['L_BOT_LAST_VISIT'] : ((isset($user->lang['BOT_LAST_VISIT'])) ? $user->lang['BOT_LAST_VISIT'] : '{ BOT_LAST_VISIT }')); ?></th>
		<th colspan="3"><?php echo ((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></th>
		<th><?php echo ((isset($this->_rootref['L_MARK'])) ? $this->_rootref['L_MARK'] : ((isset($user->lang['MARK'])) ? $user->lang['MARK'] : '{ MARK }')); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php $_bots_count = (isset($this->_tpldata['bots'])) ? sizeof($this->_tpldata['bots']) : 0;if ($_bots_count) {for ($_bots_i = 0; $_bots_i < $_bots_count; ++$_bots_i){$_bots_val = &$this->_tpldata['bots'][$_bots_i]; if (!($_bots_val['S_ROW_COUNT'] & 1)  ) {  ?><tr class="row1"><?php } else { ?><tr class="row2"><?php } ?>

			<td style="width: 50%;"><?php echo $_bots_val['BOT_NAME']; ?></td>
			<td style="width: 15%; white-space: nowrap;" align="center">&nbsp;<?php echo $_bots_val['LAST_VISIT']; ?>&nbsp;</td>
			<td style="text-align: center;">&nbsp;<a href="<?php echo $_bots_val['U_ACTIVATE_DEACTIVATE']; ?>"><?php echo $_bots_val['L_ACTIVATE_DEACTIVATE']; ?></a>&nbsp;</td>
			<td style="text-align: center;">&nbsp;<a href="<?php echo $_bots_val['U_EDIT']; ?>"><?php echo ((isset($this->_rootref['L_EDIT'])) ? $this->_rootref['L_EDIT'] : ((isset($user->lang['EDIT'])) ? $user->lang['EDIT'] : '{ EDIT }')); ?></a>&nbsp;</td>
			<td style="text-align: center;">&nbsp;<a href="<?php echo $_bots_val['U_DELETE']; ?>"><?php echo ((isset($this->_rootref['L_DELETE'])) ? $this->_rootref['L_DELETE'] : ((isset($user->lang['DELETE'])) ? $user->lang['DELETE'] : '{ DELETE }')); ?></a>&nbsp;</td>
			<td style="text-align: center;"><input type="checkbox" class="radio" name="mark[]" value="<?php echo $_bots_val['BOT_ID']; ?>" /></td>
		</tr>
	<?php }} ?>

	</tbody>
	</table>

	<fieldset class="quick" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>;">
		<input class="button2" name="add" type="submit" value="<?php echo ((isset($this->_rootref['L_BOT_ADD'])) ? $this->_rootref['L_BOT_ADD'] : ((isset($user->lang['BOT_ADD'])) ? $user->lang['BOT_ADD'] : '{ BOT_ADD }')); ?>" />
	</fieldset>

	<fieldset class="quick" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">
		<select name="action"><?php echo (isset($this->_rootref['S_BOT_OPTIONS'])) ? $this->_rootref['S_BOT_OPTIONS'] : ''; ?></select>
		<input class="button2" name="submit" type="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />
		<p class="small"><a href="#" onclick="marklist('acp_bots', 'mark', true);"><?php echo ((isset($this->_rootref['L_MARK_ALL'])) ? $this->_rootref['L_MARK_ALL'] : ((isset($user->lang['MARK_ALL'])) ? $user->lang['MARK_ALL'] : '{ MARK_ALL }')); ?></a> &bull; <a href="#" onclick="marklist('acp_bots', 'mark', false);"><?php echo ((isset($this->_rootref['L_UNMARK_ALL'])) ? $this->_rootref['L_UNMARK_ALL'] : ((isset($user->lang['UNMARK_ALL'])) ? $user->lang['UNMARK_ALL'] : '{ UNMARK_ALL }')); ?></a></p>
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>
	</form>

<?php } $this->_tpl_include('overall_footer.html'); ?>