<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<a name="maincontent"></a>

<h1><?php echo ((isset($this->_rootref['L_ACP_MASS_EMAIL'])) ? $this->_rootref['L_ACP_MASS_EMAIL'] : ((isset($user->lang['ACP_MASS_EMAIL'])) ? $user->lang['ACP_MASS_EMAIL'] : '{ ACP_MASS_EMAIL }')); ?></h1>

<p><?php echo ((isset($this->_rootref['L_ACP_MASS_EMAIL_EXPLAIN'])) ? $this->_rootref['L_ACP_MASS_EMAIL_EXPLAIN'] : ((isset($user->lang['ACP_MASS_EMAIL_EXPLAIN'])) ? $user->lang['ACP_MASS_EMAIL_EXPLAIN'] : '{ ACP_MASS_EMAIL_EXPLAIN }')); ?></p>

<?php if ($this->_rootref['S_WARNING']) {  ?>

	<div class="errorbox">
		<h3><?php echo ((isset($this->_rootref['L_WARNING'])) ? $this->_rootref['L_WARNING'] : ((isset($user->lang['WARNING'])) ? $user->lang['WARNING'] : '{ WARNING }')); ?></h3>
		<p><?php echo (isset($this->_rootref['WARNING_MSG'])) ? $this->_rootref['WARNING_MSG'] : ''; ?></p>
	</div>
<?php } ?>


<form id="acp_email" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

<fieldset>
	<legend><?php echo ((isset($this->_rootref['L_COMPOSE'])) ? $this->_rootref['L_COMPOSE'] : ((isset($user->lang['COMPOSE'])) ? $user->lang['COMPOSE'] : '{ COMPOSE }')); ?></legend>
<dl>
	<dt><label for="group"><?php echo ((isset($this->_rootref['L_SEND_TO_GROUP'])) ? $this->_rootref['L_SEND_TO_GROUP'] : ((isset($user->lang['SEND_TO_GROUP'])) ? $user->lang['SEND_TO_GROUP'] : '{ SEND_TO_GROUP }')); ?>:</label></dt>
	<dd><select id="group" name="g"><?php echo (isset($this->_rootref['S_GROUP_OPTIONS'])) ? $this->_rootref['S_GROUP_OPTIONS'] : ''; ?></select></dd>
</dl>
<dl>
	<dt><label for="usernames"><?php echo ((isset($this->_rootref['L_SEND_TO_USERS'])) ? $this->_rootref['L_SEND_TO_USERS'] : ((isset($user->lang['SEND_TO_USERS'])) ? $user->lang['SEND_TO_USERS'] : '{ SEND_TO_USERS }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_SEND_TO_USERS_EXPLAIN'])) ? $this->_rootref['L_SEND_TO_USERS_EXPLAIN'] : ((isset($user->lang['SEND_TO_USERS_EXPLAIN'])) ? $user->lang['SEND_TO_USERS_EXPLAIN'] : '{ SEND_TO_USERS_EXPLAIN }')); ?></span></dt>
	<dd><textarea name="usernames" id="usernames" rows="5" cols="40"><?php echo (isset($this->_rootref['USERNAMES'])) ? $this->_rootref['USERNAMES'] : ''; ?></textarea></dd>
	<dd>[ <a href="<?php echo (isset($this->_rootref['U_FIND_USERNAME'])) ? $this->_rootref['U_FIND_USERNAME'] : ''; ?>" onclick="find_username(this.href); return false;"><?php echo ((isset($this->_rootref['L_FIND_USERNAME'])) ? $this->_rootref['L_FIND_USERNAME'] : ((isset($user->lang['FIND_USERNAME'])) ? $user->lang['FIND_USERNAME'] : '{ FIND_USERNAME }')); ?></a> ]</dd>
</dl>
<dl>
	<dt><label for="subject"><?php echo ((isset($this->_rootref['L_SUBJECT'])) ? $this->_rootref['L_SUBJECT'] : ((isset($user->lang['SUBJECT'])) ? $user->lang['SUBJECT'] : '{ SUBJECT }')); ?>:</label></dt>
	<dd><input name="subject" type="text" id="subject" value="<?php echo (isset($this->_rootref['SUBJECT'])) ? $this->_rootref['SUBJECT'] : ''; ?>" /></dd>
</dl>
<dl>
	<dt><label for="message"><?php echo ((isset($this->_rootref['L_MASS_MESSAGE'])) ? $this->_rootref['L_MASS_MESSAGE'] : ((isset($user->lang['MASS_MESSAGE'])) ? $user->lang['MASS_MESSAGE'] : '{ MASS_MESSAGE }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_MASS_MESSAGE_EXPLAIN'])) ? $this->_rootref['L_MASS_MESSAGE_EXPLAIN'] : ((isset($user->lang['MASS_MESSAGE_EXPLAIN'])) ? $user->lang['MASS_MESSAGE_EXPLAIN'] : '{ MASS_MESSAGE_EXPLAIN }')); ?></span></dt>
	<dd><textarea id="message" name="message" rows="10" cols="60"><?php echo (isset($this->_rootref['MESSAGE'])) ? $this->_rootref['MESSAGE'] : ''; ?></textarea></dd>
</dl>
<dl>
	<dt><label for="priority"><?php echo ((isset($this->_rootref['L_MAIL_PRIORITY'])) ? $this->_rootref['L_MAIL_PRIORITY'] : ((isset($user->lang['MAIL_PRIORITY'])) ? $user->lang['MAIL_PRIORITY'] : '{ MAIL_PRIORITY }')); ?>:</label></dt>
	<dd><select id="priority" name="mail_priority_flag"><?php echo (isset($this->_rootref['S_PRIORITY_OPTIONS'])) ? $this->_rootref['S_PRIORITY_OPTIONS'] : ''; ?></select></dd>
</dl>
<dl>
	<dt><label for="banned"><?php echo ((isset($this->_rootref['L_MAIL_BANNED'])) ? $this->_rootref['L_MAIL_BANNED'] : ((isset($user->lang['MAIL_BANNED'])) ? $user->lang['MAIL_BANNED'] : '{ MAIL_BANNED }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_MAIL_BANNED_EXPLAIN'])) ? $this->_rootref['L_MAIL_BANNED_EXPLAIN'] : ((isset($user->lang['MAIL_BANNED_EXPLAIN'])) ? $user->lang['MAIL_BANNED_EXPLAIN'] : '{ MAIL_BANNED_EXPLAIN }')); ?></span></dt>
	<dd><input id="banned" name="mail_banned_flag" type="checkbox" class="radio" /></dd>
</dl>
<dl>
	<dt><label for="send"><?php echo ((isset($this->_rootref['L_SEND_IMMEDIATELY'])) ? $this->_rootref['L_SEND_IMMEDIATELY'] : ((isset($user->lang['SEND_IMMEDIATELY'])) ? $user->lang['SEND_IMMEDIATELY'] : '{ SEND_IMMEDIATELY }')); ?>:</label></dt>
	<dd><input id="send" type="checkbox" class="radio" name="send_immediately" checked="checked" /></dd>
</dl>

<p class="submit-buttons">
	<input class="button1" type="submit" id="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SEND_EMAIL'])) ? $this->_rootref['L_SEND_EMAIL'] : ((isset($user->lang['SEND_EMAIL'])) ? $user->lang['SEND_EMAIL'] : '{ SEND_EMAIL }')); ?>" />&nbsp;
	<input class="button2" type="reset" id="reset" name="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" />
</p>
<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

</fieldset>
</form>

<?php $this->_tpl_include('overall_footer.html'); ?>