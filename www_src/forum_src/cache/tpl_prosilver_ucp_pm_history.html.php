<?php if (!defined('IN_PHPBB')) exit; ?><h3 id="review">
	<span class="right-box"><a href="#review" onclick="viewableArea(getElementById('topicreview'), true); var rev_text = getElementById('review').getElementsByTagName('a').item(0).firstChild; if (rev_text.data == '<?php echo ((isset($this->_rootref['LA_EXPAND_VIEW'])) ? $this->_rootref['LA_EXPAND_VIEW'] : ((isset($this->_rootref['L_EXPAND_VIEW'])) ? addslashes($this->_rootref['L_EXPAND_VIEW']) : ((isset($user->lang['EXPAND_VIEW'])) ? addslashes($user->lang['EXPAND_VIEW']) : '{ EXPAND_VIEW }'))); ?>'){rev_text.data = '<?php echo ((isset($this->_rootref['LA_COLLAPSE_VIEW'])) ? $this->_rootref['LA_COLLAPSE_VIEW'] : ((isset($this->_rootref['L_COLLAPSE_VIEW'])) ? addslashes($this->_rootref['L_COLLAPSE_VIEW']) : ((isset($user->lang['COLLAPSE_VIEW'])) ? addslashes($user->lang['COLLAPSE_VIEW']) : '{ COLLAPSE_VIEW }'))); ?>'; } else if (rev_text.data == '<?php echo ((isset($this->_rootref['LA_COLLAPSE_VIEW'])) ? $this->_rootref['LA_COLLAPSE_VIEW'] : ((isset($this->_rootref['L_COLLAPSE_VIEW'])) ? addslashes($this->_rootref['L_COLLAPSE_VIEW']) : ((isset($user->lang['COLLAPSE_VIEW'])) ? addslashes($user->lang['COLLAPSE_VIEW']) : '{ COLLAPSE_VIEW }'))); ?>'){rev_text.data = '<?php echo ((isset($this->_rootref['LA_EXPAND_VIEW'])) ? $this->_rootref['LA_EXPAND_VIEW'] : ((isset($this->_rootref['L_EXPAND_VIEW'])) ? addslashes($this->_rootref['L_EXPAND_VIEW']) : ((isset($user->lang['EXPAND_VIEW'])) ? addslashes($user->lang['EXPAND_VIEW']) : '{ EXPAND_VIEW }'))); ?>'};"><?php echo ((isset($this->_rootref['L_EXPAND_VIEW'])) ? $this->_rootref['L_EXPAND_VIEW'] : ((isset($user->lang['EXPAND_VIEW'])) ? $user->lang['EXPAND_VIEW'] : '{ EXPAND_VIEW }')); ?></a></span>
	<?php echo ((isset($this->_rootref['L_MESSAGE_HISTORY'])) ? $this->_rootref['L_MESSAGE_HISTORY'] : ((isset($user->lang['MESSAGE_HISTORY'])) ? $user->lang['MESSAGE_HISTORY'] : '{ MESSAGE_HISTORY }')); ?>:
</h3>

<div id="topicreview">
	<script type="text/javascript">
	// <![CDATA[
		bbcodeEnabled = <?php echo (isset($this->_rootref['S_BBCODE_ALLOWED'])) ? $this->_rootref['S_BBCODE_ALLOWED'] : ''; ?>;
	// ]]>
	</script>
	<?php $_history_row_count = (isset($this->_tpldata['history_row'])) ? sizeof($this->_tpldata['history_row']) : 0;if ($_history_row_count) {for ($_history_row_i = 0; $_history_row_i < $_history_row_count; ++$_history_row_i){$_history_row_val = &$this->_tpldata['history_row'][$_history_row_i]; ?>

	<div class="post <?php if (!($_history_row_val['S_ROW_COUNT'] & 1)  ) {  ?>bg1<?php } else { ?>bg2<?php } ?>">
		<div class="inner"><span class="corners-top"><span></span></span>

		<div class="postbody" id="pr<?php echo $_history_row_val['MSG_ID']; ?>">
			<?php if ($_history_row_val['U_QUOTE'] || $_history_row_val['MESSAGE_AUTHOR_QUOTE']) {  ?>

			<ul class="profile-icons">
				<li class="quote-icon"><a <?php if ($_history_row_val['U_QUOTE']) {  ?>href="<?php echo $_history_row_val['U_QUOTE']; ?>"<?php } else { ?>href="#postingbox" onclick="addquote(<?php echo $_history_row_val['MSG_ID']; ?>, '<?php echo $_history_row_val['MESSAGE_AUTHOR_QUOTE']; ?>', '<?php echo ((isset($this->_rootref['LA_WROTE'])) ? $this->_rootref['LA_WROTE'] : ((isset($this->_rootref['L_WROTE'])) ? addslashes($this->_rootref['L_WROTE']) : ((isset($user->lang['WROTE'])) ? addslashes($user->lang['WROTE']) : '{ WROTE }'))); ?>');"<?php } ?> title="<?php echo ((isset($this->_rootref['L_QUOTE'])) ? $this->_rootref['L_QUOTE'] : ((isset($user->lang['QUOTE'])) ? $user->lang['QUOTE'] : '{ QUOTE }')); ?> <?php echo $_history_row_val['MESSAGE_AUTHOR']; ?>"><span><?php echo ((isset($this->_rootref['L_QUOTE'])) ? $this->_rootref['L_QUOTE'] : ((isset($user->lang['QUOTE'])) ? $user->lang['QUOTE'] : '{ QUOTE }')); ?> <?php echo $_history_row_val['MESSAGE_AUTHOR']; ?></span></a></li>
			</ul>
			<?php } ?>


			<h3><a href="<?php echo $_history_row_val['U_VIEW_MESSAGE']; ?>" <?php if ($_history_row_val['S_CURRENT_MSG']) {  ?>class="current"<?php } ?>><?php echo $_history_row_val['SUBJECT']; ?></a></h3>
			<p class="author"><?php echo $_history_row_val['MINI_POST_IMG']; ?> <?php echo ((isset($this->_rootref['L_SENT_AT'])) ? $this->_rootref['L_SENT_AT'] : ((isset($user->lang['SENT_AT'])) ? $user->lang['SENT_AT'] : '{ SENT_AT }')); ?>: <strong><?php echo $_history_row_val['SENT_DATE']; ?></strong><br />
				<?php echo ((isset($this->_rootref['L_MESSAGE_BY_AUTHOR'])) ? $this->_rootref['L_MESSAGE_BY_AUTHOR'] : ((isset($user->lang['MESSAGE_BY_AUTHOR'])) ? $user->lang['MESSAGE_BY_AUTHOR'] : '{ MESSAGE_BY_AUTHOR }')); ?> <?php echo $_history_row_val['MESSAGE_AUTHOR_FULL']; ?></p>
			<div class="content"><?php if ($_history_row_val['MESSAGE']) {  echo $_history_row_val['MESSAGE']; } else { ?><span class="error"><?php echo ((isset($this->_rootref['L_MESSAGE_REMOVED_FROM_OUTBOX'])) ? $this->_rootref['L_MESSAGE_REMOVED_FROM_OUTBOX'] : ((isset($user->lang['MESSAGE_REMOVED_FROM_OUTBOX'])) ? $user->lang['MESSAGE_REMOVED_FROM_OUTBOX'] : '{ MESSAGE_REMOVED_FROM_OUTBOX }')); ?></span><?php } ?></div>
			<div id="message_<?php echo $_history_row_val['MSG_ID']; ?>" style="display: none;"><?php echo $_history_row_val['DECODED_MESSAGE']; ?></div>
		</div>

		<span class="corners-bottom"><span></span></span></div>
	</div>
	<?php }} ?>

</div>

<hr />
<p><a href="#cp-main" class="top2"><?php echo ((isset($this->_rootref['L_BACK_TO_TOP'])) ? $this->_rootref['L_BACK_TO_TOP'] : ((isset($user->lang['BACK_TO_TOP'])) ? $user->lang['BACK_TO_TOP'] : '{ BACK_TO_TOP }')); ?></a></p>