<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('mcp_header.html'); ?>


<h2><?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></h2>

<?php if ($this->_rootref['S_SHOW_UNAPPROVED']) {  ?>


	<form id="mcp_queue" method="post" action="<?php echo (isset($this->_rootref['S_MCP_QUEUE_ACTION'])) ? $this->_rootref['S_MCP_QUEUE_ACTION'] : ''; ?>">

	<div class="panel">
		<div class="inner"><span class="corners-top"><span></span></span>

		<h3><?php echo ((isset($this->_rootref['L_LATEST_UNAPPROVED'])) ? $this->_rootref['L_LATEST_UNAPPROVED'] : ((isset($user->lang['LATEST_UNAPPROVED'])) ? $user->lang['LATEST_UNAPPROVED'] : '{ LATEST_UNAPPROVED }')); ?></h3>
		<?php if ($this->_rootref['S_HAS_UNAPPROVED_POSTS']) {  ?><p><?php echo ((isset($this->_rootref['L_UNAPPROVED_TOTAL'])) ? $this->_rootref['L_UNAPPROVED_TOTAL'] : ((isset($user->lang['UNAPPROVED_TOTAL'])) ? $user->lang['UNAPPROVED_TOTAL'] : '{ UNAPPROVED_TOTAL }')); ?></p><?php } if (sizeof($this->_tpldata['unapproved'])) {  ?>

			<ul class="topiclist">
				<li class="header">
					<dl>
						<dt><?php echo ((isset($this->_rootref['L_VIEW_DETAILS'])) ? $this->_rootref['L_VIEW_DETAILS'] : ((isset($user->lang['VIEW_DETAILS'])) ? $user->lang['VIEW_DETAILS'] : '{ VIEW_DETAILS }')); ?></dt>
						<dd class="moderation"><span><?php echo ((isset($this->_rootref['L_TOPIC'])) ? $this->_rootref['L_TOPIC'] : ((isset($user->lang['TOPIC'])) ? $user->lang['TOPIC'] : '{ TOPIC }')); ?> &amp; <?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?></span></dd>
					</dl>
				</li>
			</ul>
			<ul class="topiclist cplist">

			<?php $_unapproved_count = (isset($this->_tpldata['unapproved'])) ? sizeof($this->_tpldata['unapproved']) : 0;if ($_unapproved_count) {for ($_unapproved_i = 0; $_unapproved_i < $_unapproved_count; ++$_unapproved_i){$_unapproved_val = &$this->_tpldata['unapproved'][$_unapproved_i]; ?>

			<li class="row<?php if (($_unapproved_val['S_ROW_COUNT'] & 1)  ) {  ?> bg1<?php } else { ?> bg2<?php } ?>">
				<dl>
					<dt>
						<a href="<?php echo $_unapproved_val['U_POST_DETAILS']; ?>" class="topictitle"><?php echo $_unapproved_val['SUBJECT']; ?></a> <?php echo $_unapproved_val['ATTACH_ICON_IMG']; ?><br />
						<?php echo ((isset($this->_rootref['L_POSTED'])) ? $this->_rootref['L_POSTED'] : ((isset($user->lang['POSTED'])) ? $user->lang['POSTED'] : '{ POSTED }')); ?> <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_unapproved_val['AUTHOR_FULL']; ?> &raquo; <?php echo $_unapproved_val['POST_TIME']; ?>

					</dt>
					<dd class="moderation"><span>
						<?php echo ((isset($this->_rootref['L_TOPIC'])) ? $this->_rootref['L_TOPIC'] : ((isset($user->lang['TOPIC'])) ? $user->lang['TOPIC'] : '{ TOPIC }')); ?>: <a href="<?php echo $_unapproved_val['U_TOPIC']; ?>"><?php echo $_unapproved_val['TOPIC_TITLE']; ?></a> [<a href="<?php echo $_unapproved_val['U_MCP_TOPIC']; ?>"><?php echo ((isset($this->_rootref['L_MODERATE'])) ? $this->_rootref['L_MODERATE'] : ((isset($user->lang['MODERATE'])) ? $user->lang['MODERATE'] : '{ MODERATE }')); ?></a>]<br />
						<?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?>: <?php if ($_unapproved_val['U_FORUM']) {  ?><a href="<?php echo $_unapproved_val['U_FORUM']; ?>"><?php echo $_unapproved_val['FORUM_NAME']; ?></a><?php } else { echo $_unapproved_val['FORUM_NAME']; } if ($_unapproved_val['U_MCP_FORUM']) {  ?> [<a href="<?php echo $_unapproved_val['U_MCP_FORUM']; ?>"><?php echo ((isset($this->_rootref['L_MODERATE'])) ? $this->_rootref['L_MODERATE'] : ((isset($user->lang['MODERATE'])) ? $user->lang['MODERATE'] : '{ MODERATE }')); ?></a>]<?php } ?></span>
					</dd>

			 		<dd class="mark"><input type="checkbox" name="post_id_list[]" value="<?php echo $_unapproved_val['POST_ID']; ?>" /></dd>
				</dl>
			</li>
			<?php }} ?>

			</ul>
		<?php } else { ?>

			<p><?php echo ((isset($this->_rootref['L_UNAPPROVED_POSTS_ZERO_TOTAL'])) ? $this->_rootref['L_UNAPPROVED_POSTS_ZERO_TOTAL'] : ((isset($user->lang['UNAPPROVED_POSTS_ZERO_TOTAL'])) ? $user->lang['UNAPPROVED_POSTS_ZERO_TOTAL'] : '{ UNAPPROVED_POSTS_ZERO_TOTAL }')); ?></p>
		<?php } ?>


		<span class="corners-bottom"><span></span></span></div>
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</div>

	<?php if (sizeof($this->_tpldata['unapproved'])) {  ?>

	<fieldset class="display-actions">
		<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

		<input class="button2" type="submit" name="action[disapprove]" value="<?php echo ((isset($this->_rootref['L_DISAPPROVE'])) ? $this->_rootref['L_DISAPPROVE'] : ((isset($user->lang['DISAPPROVE'])) ? $user->lang['DISAPPROVE'] : '{ DISAPPROVE }')); ?>" />&nbsp;
		<input class="button1" type="submit" name="action[approve]" value="<?php echo ((isset($this->_rootref['L_APPROVE'])) ? $this->_rootref['L_APPROVE'] : ((isset($user->lang['APPROVE'])) ? $user->lang['APPROVE'] : '{ APPROVE }')); ?>" />
		<div><a href="#" onclick="marklist('mcp_queue', 'post_id_list', true); return false;"><?php echo ((isset($this->_rootref['L_MARK_ALL'])) ? $this->_rootref['L_MARK_ALL'] : ((isset($user->lang['MARK_ALL'])) ? $user->lang['MARK_ALL'] : '{ MARK_ALL }')); ?></a> :: <a href="#" onclick="marklist('mcp_queue', 'post_id_list', false); return false;"><?php echo ((isset($this->_rootref['L_UNMARK_ALL'])) ? $this->_rootref['L_UNMARK_ALL'] : ((isset($user->lang['UNMARK_ALL'])) ? $user->lang['UNMARK_ALL'] : '{ UNMARK_ALL }')); ?></a></div>
	</fieldset>
	<?php } ?>

		</form>
<?php } if ($this->_rootref['S_SHOW_REPORTS']) {  ?>

	<div class="panel">
		<div class="inner"><span class="corners-top"><span></span></span>

		<h3><?php echo ((isset($this->_rootref['L_LATEST_REPORTED'])) ? $this->_rootref['L_LATEST_REPORTED'] : ((isset($user->lang['LATEST_REPORTED'])) ? $user->lang['LATEST_REPORTED'] : '{ LATEST_REPORTED }')); ?></h3>
		<?php if ($this->_rootref['S_HAS_REPORTS']) {  ?><p><?php echo ((isset($this->_rootref['L_REPORTS_TOTAL'])) ? $this->_rootref['L_REPORTS_TOTAL'] : ((isset($user->lang['REPORTS_TOTAL'])) ? $user->lang['REPORTS_TOTAL'] : '{ REPORTS_TOTAL }')); ?></p><?php } if (sizeof($this->_tpldata['report'])) {  ?>

			<ul class="topiclist">
				<li class="header">
					<dl>
						<dt><?php echo ((isset($this->_rootref['L_VIEW_DETAILS'])) ? $this->_rootref['L_VIEW_DETAILS'] : ((isset($user->lang['VIEW_DETAILS'])) ? $user->lang['VIEW_DETAILS'] : '{ VIEW_DETAILS }')); ?></dt>
						<dd class="moderation"><span><?php echo ((isset($this->_rootref['L_REPORTER'])) ? $this->_rootref['L_REPORTER'] : ((isset($user->lang['REPORTER'])) ? $user->lang['REPORTER'] : '{ REPORTER }')); ?> &amp; <?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?></span></dd>
					</dl>
				</li>
			</ul>
			<ul class="topiclist cplist">

			<?php $_report_count = (isset($this->_tpldata['report'])) ? sizeof($this->_tpldata['report']) : 0;if ($_report_count) {for ($_report_i = 0; $_report_i < $_report_count; ++$_report_i){$_report_val = &$this->_tpldata['report'][$_report_i]; ?>

			<li class="row<?php if (($_report_val['S_ROW_COUNT'] & 1)  ) {  ?> bg1<?php } else { ?> bg2<?php } ?>">
				<dl>
					<dt>
						<a href="<?php echo $_report_val['U_POST_DETAILS']; ?>#reports" class="topictitle"><?php echo $_report_val['SUBJECT']; ?></a> <?php echo $_report_val['ATTACH_ICON_IMG']; ?><br />
						<span><?php echo ((isset($this->_rootref['L_POSTED'])) ? $this->_rootref['L_POSTED'] : ((isset($user->lang['POSTED'])) ? $user->lang['POSTED'] : '{ POSTED }')); ?> <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_report_val['AUTHOR_FULL']; ?> &raquo; <?php echo $_report_val['POST_TIME']; ?></span>
					</dt>
					<dd class="moderation">
						<span><?php echo ((isset($this->_rootref['L_REPORTED'])) ? $this->_rootref['L_REPORTED'] : ((isset($user->lang['REPORTED'])) ? $user->lang['REPORTED'] : '{ REPORTED }')); ?> <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_report_val['REPORTER_FULL']; ?> <?php echo ((isset($this->_rootref['L_REPORTED_ON_DATE'])) ? $this->_rootref['L_REPORTED_ON_DATE'] : ((isset($user->lang['REPORTED_ON_DATE'])) ? $user->lang['REPORTED_ON_DATE'] : '{ REPORTED_ON_DATE }')); ?> <?php echo $_report_val['REPORT_TIME']; ?><br />
						<?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?>: <a href="<?php echo $_report_val['U_FORUM']; ?>"><?php echo $_report_val['FORUM_NAME']; ?></a></span>
					</dd>
				</dl>
			</li>
			<?php }} ?>

			</ul>
		<?php } else { ?>

			<p><?php echo ((isset($this->_rootref['L_REPORTS_ZERO_TOTAL'])) ? $this->_rootref['L_REPORTS_ZERO_TOTAL'] : ((isset($user->lang['REPORTS_ZERO_TOTAL'])) ? $user->lang['REPORTS_ZERO_TOTAL'] : '{ REPORTS_ZERO_TOTAL }')); ?></p>
		<?php } ?>


		<span class="corners-bottom"><span></span></span></div>
	</div>
<?php } if ($this->_rootref['S_SHOW_PM_REPORTS']) {  ?>

	<div class="panel">
		<div class="inner"><span class="corners-top"><span></span></span>

		<h3><?php echo ((isset($this->_rootref['L_LATEST_REPORTED_PMS'])) ? $this->_rootref['L_LATEST_REPORTED_PMS'] : ((isset($user->lang['LATEST_REPORTED_PMS'])) ? $user->lang['LATEST_REPORTED_PMS'] : '{ LATEST_REPORTED_PMS }')); ?></h3>
		<?php if ($this->_rootref['S_HAS_PM_REPORTS']) {  ?><p><?php echo ((isset($this->_rootref['L_PM_REPORTS_TOTAL'])) ? $this->_rootref['L_PM_REPORTS_TOTAL'] : ((isset($user->lang['PM_REPORTS_TOTAL'])) ? $user->lang['PM_REPORTS_TOTAL'] : '{ PM_REPORTS_TOTAL }')); ?></p><?php } if (sizeof($this->_tpldata['pm_report'])) {  ?>

			<ul class="topiclist">
				<li class="header">
					<dl>
						<dt><?php echo ((isset($this->_rootref['L_VIEW_DETAILS'])) ? $this->_rootref['L_VIEW_DETAILS'] : ((isset($user->lang['VIEW_DETAILS'])) ? $user->lang['VIEW_DETAILS'] : '{ VIEW_DETAILS }')); ?></dt>
						<dd class="moderation"><span><?php echo ((isset($this->_rootref['L_REPORTER'])) ? $this->_rootref['L_REPORTER'] : ((isset($user->lang['REPORTER'])) ? $user->lang['REPORTER'] : '{ REPORTER }')); ?></span></dd>
					</dl>
				</li>
			</ul>
			<ul class="topiclist cplist">

			<?php $_pm_report_count = (isset($this->_tpldata['pm_report'])) ? sizeof($this->_tpldata['pm_report']) : 0;if ($_pm_report_count) {for ($_pm_report_i = 0; $_pm_report_i < $_pm_report_count; ++$_pm_report_i){$_pm_report_val = &$this->_tpldata['pm_report'][$_pm_report_i]; ?>

			<li class="row<?php if (($_pm_report_val['S_ROW_COUNT'] & 1)  ) {  ?> bg1<?php } else { ?> bg2<?php } ?>">
				<dl>
					<dt>
						<a href="<?php echo $_pm_report_val['U_PM_DETAILS']; ?>" class="topictitle"><?php echo $_pm_report_val['PM_SUBJECT']; ?></a> <?php echo $_pm_report_val['ATTACH_ICON_IMG']; ?><br />
						<span><?php echo ((isset($this->_rootref['L_MESSAGE_BY_AUTHOR'])) ? $this->_rootref['L_MESSAGE_BY_AUTHOR'] : ((isset($user->lang['MESSAGE_BY_AUTHOR'])) ? $user->lang['MESSAGE_BY_AUTHOR'] : '{ MESSAGE_BY_AUTHOR }')); ?> <?php echo $_pm_report_val['PM_AUTHOR_FULL']; ?> &raquo; <?php echo $_pm_report_val['PM_TIME']; ?></span><br />
						<span><?php echo ((isset($this->_rootref['L_MESSAGE_TO'])) ? $this->_rootref['L_MESSAGE_TO'] : ((isset($user->lang['MESSAGE_TO'])) ? $user->lang['MESSAGE_TO'] : '{ MESSAGE_TO }')); ?> <?php echo $_pm_report_val['RECIPIENTS']; ?></span>
					</dt>
					<dd class="moderation">
						<span><?php echo ((isset($this->_rootref['L_REPORTED'])) ? $this->_rootref['L_REPORTED'] : ((isset($user->lang['REPORTED'])) ? $user->lang['REPORTED'] : '{ REPORTED }')); ?> <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_pm_report_val['REPORTER_FULL']; ?> <?php echo ((isset($this->_rootref['L_REPORTED_ON_DATE'])) ? $this->_rootref['L_REPORTED_ON_DATE'] : ((isset($user->lang['REPORTED_ON_DATE'])) ? $user->lang['REPORTED_ON_DATE'] : '{ REPORTED_ON_DATE }')); ?> <?php echo $_pm_report_val['REPORT_TIME']; ?></span>
					</dd>
				</dl>
			</li>
			<?php }} ?>

			</ul>
		<?php } else { ?>

			<p><?php echo ((isset($this->_rootref['L_PM_REPORTS_ZERO_TOTAL'])) ? $this->_rootref['L_PM_REPORTS_ZERO_TOTAL'] : ((isset($user->lang['PM_REPORTS_ZERO_TOTAL'])) ? $user->lang['PM_REPORTS_ZERO_TOTAL'] : '{ PM_REPORTS_ZERO_TOTAL }')); ?></p>
		<?php } ?>


		<span class="corners-bottom"><span></span></span></div>
	</div>
<?php } if ($this->_rootref['S_SHOW_LOGS']) {  ?>

	<div class="panel">
		<div class="inner"><span class="corners-top"><span></span></span>

		<h3><?php echo ((isset($this->_rootref['L_LATEST_LOGS'])) ? $this->_rootref['L_LATEST_LOGS'] : ((isset($user->lang['LATEST_LOGS'])) ? $user->lang['LATEST_LOGS'] : '{ LATEST_LOGS }')); ?></h3>

		<table class="table1" cellspacing="0">
		<thead>
		<tr>
			<th class="name"><?php echo ((isset($this->_rootref['L_ACTION'])) ? $this->_rootref['L_ACTION'] : ((isset($user->lang['ACTION'])) ? $user->lang['ACTION'] : '{ ACTION }')); ?></th>
			<th class="name"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?></th>
			<th class="name"><?php echo ((isset($this->_rootref['L_IP'])) ? $this->_rootref['L_IP'] : ((isset($user->lang['IP'])) ? $user->lang['IP'] : '{ IP }')); ?></th>
			<th class="name"><?php echo ((isset($this->_rootref['L_VIEW_TOPIC'])) ? $this->_rootref['L_VIEW_TOPIC'] : ((isset($user->lang['VIEW_TOPIC'])) ? $user->lang['VIEW_TOPIC'] : '{ VIEW_TOPIC }')); ?></th>
			<th class="name"><?php echo ((isset($this->_rootref['L_VIEW_TOPIC_LOGS'])) ? $this->_rootref['L_VIEW_TOPIC_LOGS'] : ((isset($user->lang['VIEW_TOPIC_LOGS'])) ? $user->lang['VIEW_TOPIC_LOGS'] : '{ VIEW_TOPIC_LOGS }')); ?></th>
			<th class="name"><?php echo ((isset($this->_rootref['L_TIME'])) ? $this->_rootref['L_TIME'] : ((isset($user->lang['TIME'])) ? $user->lang['TIME'] : '{ TIME }')); ?></th>
		</tr>
		</thead>
		<tbody>
	<?php $_log_count = (isset($this->_tpldata['log'])) ? sizeof($this->_tpldata['log']) : 0;if ($_log_count) {for ($_log_i = 0; $_log_i < $_log_count; ++$_log_i){$_log_val = &$this->_tpldata['log'][$_log_i]; ?>

		<tr class="<?php if (!($_log_val['S_ROW_COUNT'] & 1)  ) {  ?>bg1<?php } else { ?>bg2<?php } ?>">
			<td><?php echo $_log_val['ACTION']; ?></td>
			<td><span><?php echo $_log_val['USERNAME']; ?></span></td>
			<td><span><?php echo $_log_val['IP']; ?></span></td>
			<td><span><?php if ($_log_val['U_VIEW_TOPIC']) {  ?><a href="<?php echo $_log_val['U_VIEW_TOPIC']; ?>" title="<?php echo ((isset($this->_rootref['L_VIEW_TOPIC'])) ? $this->_rootref['L_VIEW_TOPIC'] : ((isset($user->lang['VIEW_TOPIC'])) ? $user->lang['VIEW_TOPIC'] : '{ VIEW_TOPIC }')); ?>"><?php echo ((isset($this->_rootref['L_VIEW_TOPIC'])) ? $this->_rootref['L_VIEW_TOPIC'] : ((isset($user->lang['VIEW_TOPIC'])) ? $user->lang['VIEW_TOPIC'] : '{ VIEW_TOPIC }')); ?></a><?php } ?>&nbsp;</span></td>
			<td><span><?php if ($_log_val['U_VIEWLOGS']) {  ?><a href="<?php echo $_log_val['U_VIEWLOGS']; ?>"><?php echo ((isset($this->_rootref['L_VIEW_TOPIC_LOGS'])) ? $this->_rootref['L_VIEW_TOPIC_LOGS'] : ((isset($user->lang['VIEW_TOPIC_LOGS'])) ? $user->lang['VIEW_TOPIC_LOGS'] : '{ VIEW_TOPIC_LOGS }')); ?></a><?php } ?>&nbsp;</span></td>
			<td><span><?php echo $_log_val['TIME']; ?></span></td>
		</tr>
	<?php }} else { ?>

		<tr>
			<td colspan="6"><?php echo ((isset($this->_rootref['L_NO_ENTRIES'])) ? $this->_rootref['L_NO_ENTRIES'] : ((isset($user->lang['NO_ENTRIES'])) ? $user->lang['NO_ENTRIES'] : '{ NO_ENTRIES }')); ?></td>
		</tr>
	<?php } ?>

		</tbody>
		</table>

		<span class="corners-bottom"><span></span></span></div>
	</div>
<?php } $this->_tpl_include('mcp_footer.html'); ?>