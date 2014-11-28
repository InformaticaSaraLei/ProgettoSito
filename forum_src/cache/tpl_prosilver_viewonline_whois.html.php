<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('simple_header.html'); ?>


<h2><?php echo ((isset($this->_rootref['L_WHOIS'])) ? $this->_rootref['L_WHOIS'] : ((isset($user->lang['WHOIS'])) ? $user->lang['WHOIS'] : '{ WHOIS }')); ?></h2>

<div class="panel">
	<div class="inner"><span class="corners-top"><span></span></span>

	<div class="postbody"><div class="content">
		<pre><?php echo (isset($this->_rootref['WHOIS'])) ? $this->_rootref['WHOIS'] : ''; ?></pre>
	</div></div>

	<span class="corners-bottom"><span></span></span></div>
</div>
<a  href="#" onclick="window.close(); return false;"><?php echo ((isset($this->_rootref['L_CLOSE_WINDOW'])) ? $this->_rootref['L_CLOSE_WINDOW'] : ((isset($user->lang['CLOSE_WINDOW'])) ? $user->lang['CLOSE_WINDOW'] : '{ CLOSE_WINDOW }')); ?></a>

<?php $this->_tpl_include('simple_footer.html'); ?>