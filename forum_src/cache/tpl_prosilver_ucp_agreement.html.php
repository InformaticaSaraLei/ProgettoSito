<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); if ($this->_rootref['S_SHOW_COPPA'] || $this->_rootref['S_REGISTRATION']) {  if ($this->_rootref['S_LANG_OPTIONS']) {  ?>

<script type="text/javascript">
// <![CDATA[
	/**
	* Change language
	*/
	function change_language(lang_iso)
	{
		document.forms['register'].change_lang.value = lang_iso;
		document.forms['register'].submit();
	}

// ]]>
</script>

	<form method="post" action="<?php echo (isset($this->_rootref['S_UCP_ACTION'])) ? $this->_rootref['S_UCP_ACTION'] : ''; ?>" id="register">
		<p class="rightside">
			<label for="lang"><?php echo ((isset($this->_rootref['L_LANGUAGE'])) ? $this->_rootref['L_LANGUAGE'] : ((isset($user->lang['LANGUAGE'])) ? $user->lang['LANGUAGE'] : '{ LANGUAGE }')); ?>:</label><select name="lang" id="lang" onchange="change_language(this.value); return false;" title="<?php echo ((isset($this->_rootref['L_LANGUAGE'])) ? $this->_rootref['L_LANGUAGE'] : ((isset($user->lang['LANGUAGE'])) ? $user->lang['LANGUAGE'] : '{ LANGUAGE }')); ?>"><?php echo (isset($this->_rootref['S_LANG_OPTIONS'])) ? $this->_rootref['S_LANG_OPTIONS'] : ''; ?></select>
			<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

		</p>
	</form>

	<div class="clear"></div>

<?php } ?>


	<form method="post" action="<?php echo (isset($this->_rootref['S_UCP_ACTION'])) ? $this->_rootref['S_UCP_ACTION'] : ''; ?>" id="agreement">

	<div class="panel">
		<div class="inner"><span class="corners-top"><span></span></span>
		<div class="content">
			<h2><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?> - <?php echo ((isset($this->_rootref['L_REGISTRATION'])) ? $this->_rootref['L_REGISTRATION'] : ((isset($user->lang['REGISTRATION'])) ? $user->lang['REGISTRATION'] : '{ REGISTRATION }')); ?></h2>
			<p><?php if ($this->_rootref['S_SHOW_COPPA']) {  echo ((isset($this->_rootref['L_COPPA_BIRTHDAY'])) ? $this->_rootref['L_COPPA_BIRTHDAY'] : ((isset($user->lang['COPPA_BIRTHDAY'])) ? $user->lang['COPPA_BIRTHDAY'] : '{ COPPA_BIRTHDAY }')); } else { echo ((isset($this->_rootref['L_TERMS_OF_USE'])) ? $this->_rootref['L_TERMS_OF_USE'] : ((isset($user->lang['TERMS_OF_USE'])) ? $user->lang['TERMS_OF_USE'] : '{ TERMS_OF_USE }')); } ?></p>
		</div>
		<span class="corners-bottom"><span></span></span></div>
	</div>

	<div class="panel">
		<div class="inner"><span class="corners-top"><span></span></span>
		<fieldset class="submit-buttons">
			<?php if ($this->_rootref['S_SHOW_COPPA']) {  ?>

			<strong><a href="<?php echo (isset($this->_rootref['U_COPPA_NO'])) ? $this->_rootref['U_COPPA_NO'] : ''; ?>" class="button1"><?php echo ((isset($this->_rootref['L_COPPA_NO'])) ? $this->_rootref['L_COPPA_NO'] : ((isset($user->lang['COPPA_NO'])) ? $user->lang['COPPA_NO'] : '{ COPPA_NO }')); ?></a></strong>&nbsp; <a href="<?php echo (isset($this->_rootref['U_COPPA_YES'])) ? $this->_rootref['U_COPPA_YES'] : ''; ?>" class="button2"><?php echo ((isset($this->_rootref['L_COPPA_YES'])) ? $this->_rootref['L_COPPA_YES'] : ((isset($user->lang['COPPA_YES'])) ? $user->lang['COPPA_YES'] : '{ COPPA_YES }')); ?></a>
			<?php } else { ?>

			<input type="submit" name="agreed" id="agreed" value="<?php echo ((isset($this->_rootref['L_AGREE'])) ? $this->_rootref['L_AGREE'] : ((isset($user->lang['AGREE'])) ? $user->lang['AGREE'] : '{ AGREE }')); ?>" class="button1" />&nbsp;
			<input type="submit" name="not_agreed" value="<?php echo ((isset($this->_rootref['L_NOT_AGREE'])) ? $this->_rootref['L_NOT_AGREE'] : ((isset($user->lang['NOT_AGREE'])) ? $user->lang['NOT_AGREE'] : '{ NOT_AGREE }')); ?>" class="button2" />
			<?php } ?>

			<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

			<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

		</fieldset>
		<span class="corners-bottom"><span></span></span></div>
	</div>
	</form>

<?php } else if ($this->_rootref['S_AGREEMENT']) {  ?>


	<div class="panel">
		<div class="inner"><span class="corners-top"><span></span></span>
		<div class="content">
			<h2><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?> - <?php echo (isset($this->_rootref['AGREEMENT_TITLE'])) ? $this->_rootref['AGREEMENT_TITLE'] : ''; ?></h2>
			<p><?php echo (isset($this->_rootref['AGREEMENT_TEXT'])) ? $this->_rootref['AGREEMENT_TEXT'] : ''; ?></p>
			<hr class="dashed" />
			<p><a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>" class="button2"><?php echo ((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a></p>
		</div>
		<span class="corners-bottom"><span></span></span></div>
	</div>

<?php } $this->_tpl_include('overall_footer.html'); ?>