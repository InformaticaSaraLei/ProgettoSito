<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<a name="maincontent"></a>

<h1><?php echo ((isset($this->_rootref['L_ACP_JABBER_SETTINGS'])) ? $this->_rootref['L_ACP_JABBER_SETTINGS'] : ((isset($user->lang['ACP_JABBER_SETTINGS'])) ? $user->lang['ACP_JABBER_SETTINGS'] : '{ ACP_JABBER_SETTINGS }')); ?></h1>

<p><?php echo ((isset($this->_rootref['L_ACP_JABBER_SETTINGS_EXPLAIN'])) ? $this->_rootref['L_ACP_JABBER_SETTINGS_EXPLAIN'] : ((isset($user->lang['ACP_JABBER_SETTINGS_EXPLAIN'])) ? $user->lang['ACP_JABBER_SETTINGS_EXPLAIN'] : '{ ACP_JABBER_SETTINGS_EXPLAIN }')); ?></p>

<?php if ($this->_rootref['S_WARNING']) {  ?>

	<div class="errorbox">
		<h3><?php echo ((isset($this->_rootref['L_WARNING'])) ? $this->_rootref['L_WARNING'] : ((isset($user->lang['WARNING'])) ? $user->lang['WARNING'] : '{ WARNING }')); ?></h3>
		<p><?php echo (isset($this->_rootref['WARNING_MSG'])) ? $this->_rootref['WARNING_MSG'] : ''; ?></p>
	</div>
<?php } ?>


<form id="acp_jabber" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

<fieldset>
	<legend><?php echo ((isset($this->_rootref['L_ACP_JABBER_SETTINGS'])) ? $this->_rootref['L_ACP_JABBER_SETTINGS'] : ((isset($user->lang['ACP_JABBER_SETTINGS'])) ? $user->lang['ACP_JABBER_SETTINGS'] : '{ ACP_JABBER_SETTINGS }')); ?></legend>
<?php if ($this->_rootref['S_GTALK_NOTE']) {  ?>

	<p><?php echo ((isset($this->_rootref['L_JAB_GTALK_NOTE'])) ? $this->_rootref['L_JAB_GTALK_NOTE'] : ((isset($user->lang['JAB_GTALK_NOTE'])) ? $user->lang['JAB_GTALK_NOTE'] : '{ JAB_GTALK_NOTE }')); ?></p>
<?php } ?>

<dl>
	<dt><label for="jab_enable"><?php echo ((isset($this->_rootref['L_JAB_ENABLE'])) ? $this->_rootref['L_JAB_ENABLE'] : ((isset($user->lang['JAB_ENABLE'])) ? $user->lang['JAB_ENABLE'] : '{ JAB_ENABLE }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_JAB_ENABLE_EXPLAIN'])) ? $this->_rootref['L_JAB_ENABLE_EXPLAIN'] : ((isset($user->lang['JAB_ENABLE_EXPLAIN'])) ? $user->lang['JAB_ENABLE_EXPLAIN'] : '{ JAB_ENABLE_EXPLAIN }')); ?></span></dt>
	<dd><label><input type="radio" class="radio" id="jab_enable" name="jab_enable" value="1"<?php if ($this->_rootref['JAB_ENABLE']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_ENABLED'])) ? $this->_rootref['L_ENABLED'] : ((isset($user->lang['ENABLED'])) ? $user->lang['ENABLED'] : '{ ENABLED }')); ?></label>
		<label><input type="radio" class="radio" name="jab_enable" value="0"<?php if (! $this->_rootref['JAB_ENABLE']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_DISABLED'])) ? $this->_rootref['L_DISABLED'] : ((isset($user->lang['DISABLED'])) ? $user->lang['DISABLED'] : '{ DISABLED }')); ?></label></dd>
</dl>
<dl>
	<dt><label for="jab_host"><?php echo ((isset($this->_rootref['L_JAB_SERVER'])) ? $this->_rootref['L_JAB_SERVER'] : ((isset($user->lang['JAB_SERVER'])) ? $user->lang['JAB_SERVER'] : '{ JAB_SERVER }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_JAB_SERVER_EXPLAIN'])) ? $this->_rootref['L_JAB_SERVER_EXPLAIN'] : ((isset($user->lang['JAB_SERVER_EXPLAIN'])) ? $user->lang['JAB_SERVER_EXPLAIN'] : '{ JAB_SERVER_EXPLAIN }')); ?></span></dt>
	<dd><input type="text" id="jab_host" name="jab_host" value="<?php echo (isset($this->_rootref['JAB_HOST'])) ? $this->_rootref['JAB_HOST'] : ''; ?>" /></dd>
</dl>
<dl>
	<dt><label for="jab_port"><?php echo ((isset($this->_rootref['L_JAB_PORT'])) ? $this->_rootref['L_JAB_PORT'] : ((isset($user->lang['JAB_PORT'])) ? $user->lang['JAB_PORT'] : '{ JAB_PORT }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_JAB_PORT_EXPLAIN'])) ? $this->_rootref['L_JAB_PORT_EXPLAIN'] : ((isset($user->lang['JAB_PORT_EXPLAIN'])) ? $user->lang['JAB_PORT_EXPLAIN'] : '{ JAB_PORT_EXPLAIN }')); ?></span></dt>
	<dd><input type="text" id="jab_port" name="jab_port" value="<?php echo (isset($this->_rootref['JAB_PORT'])) ? $this->_rootref['JAB_PORT'] : ''; ?>" maxlength="5" size="5" /></dd>
</dl>
<dl>
	<dt><label for="jab_username"><?php echo ((isset($this->_rootref['L_JAB_USERNAME'])) ? $this->_rootref['L_JAB_USERNAME'] : ((isset($user->lang['JAB_USERNAME'])) ? $user->lang['JAB_USERNAME'] : '{ JAB_USERNAME }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_JAB_USERNAME_EXPLAIN'])) ? $this->_rootref['L_JAB_USERNAME_EXPLAIN'] : ((isset($user->lang['JAB_USERNAME_EXPLAIN'])) ? $user->lang['JAB_USERNAME_EXPLAIN'] : '{ JAB_USERNAME_EXPLAIN }')); ?></span></dt>
	<dd><input type="text" id="jab_username" name="jab_username" value="<?php echo (isset($this->_rootref['JAB_USERNAME'])) ? $this->_rootref['JAB_USERNAME'] : ''; ?>" /></dd>
</dl>
<dl>
	<dt><label for="jab_password"><?php echo ((isset($this->_rootref['L_JAB_PASSWORD'])) ? $this->_rootref['L_JAB_PASSWORD'] : ((isset($user->lang['JAB_PASSWORD'])) ? $user->lang['JAB_PASSWORD'] : '{ JAB_PASSWORD }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_JAB_PASSWORD_EXPLAIN'])) ? $this->_rootref['L_JAB_PASSWORD_EXPLAIN'] : ((isset($user->lang['JAB_PASSWORD_EXPLAIN'])) ? $user->lang['JAB_PASSWORD_EXPLAIN'] : '{ JAB_PASSWORD_EXPLAIN }')); ?></span></dt>
	<dd><input type="password" id="jab_password" name="jab_password" value="<?php echo (isset($this->_rootref['JAB_PASSWORD'])) ? $this->_rootref['JAB_PASSWORD'] : ''; ?>" /></dd>
</dl>
<?php if ($this->_rootref['S_CAN_USE_SSL']) {  ?>

<dl>
	<dt><label for="jab_use_ssl"><?php echo ((isset($this->_rootref['L_JAB_USE_SSL'])) ? $this->_rootref['L_JAB_USE_SSL'] : ((isset($user->lang['JAB_USE_SSL'])) ? $user->lang['JAB_USE_SSL'] : '{ JAB_USE_SSL }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_JAB_USE_SSL_EXPLAIN'])) ? $this->_rootref['L_JAB_USE_SSL_EXPLAIN'] : ((isset($user->lang['JAB_USE_SSL_EXPLAIN'])) ? $user->lang['JAB_USE_SSL_EXPLAIN'] : '{ JAB_USE_SSL_EXPLAIN }')); ?></span></dt>
	<dd><label><input type="radio" class="radio" id="jab_use_ssl" name="jab_use_ssl" value="1"<?php if ($this->_rootref['JAB_USE_SSL']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></label>
		<label><input type="radio" class="radio" name="jab_use_ssl" value="0"<?php if (! $this->_rootref['JAB_USE_SSL']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></label></dd>
</dl>
<?php } ?>

<dl>
	<dt><label for="jab_package_size"><?php echo ((isset($this->_rootref['L_JAB_PACKAGE_SIZE'])) ? $this->_rootref['L_JAB_PACKAGE_SIZE'] : ((isset($user->lang['JAB_PACKAGE_SIZE'])) ? $user->lang['JAB_PACKAGE_SIZE'] : '{ JAB_PACKAGE_SIZE }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_JAB_PACKAGE_SIZE_EXPLAIN'])) ? $this->_rootref['L_JAB_PACKAGE_SIZE_EXPLAIN'] : ((isset($user->lang['JAB_PACKAGE_SIZE_EXPLAIN'])) ? $user->lang['JAB_PACKAGE_SIZE_EXPLAIN'] : '{ JAB_PACKAGE_SIZE_EXPLAIN }')); ?></span></dt>
	<dd><input type="text" id="jab_package_size" name="jab_package_size" value="<?php echo (isset($this->_rootref['JAB_PACKAGE_SIZE'])) ? $this->_rootref['JAB_PACKAGE_SIZE'] : ''; ?>" maxlength="5" size="5" /></dd>
</dl>

</fieldset>

<fieldset class="submit-buttons">
	<input class="button1" type="submit" id="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />&nbsp;
	<input class="button2" type="reset" id="reset" name="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" />
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

</fieldset>
</form>

<?php $this->_tpl_include('overall_footer.html'); ?>