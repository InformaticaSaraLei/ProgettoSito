<?php if (!defined('IN_PHPBB')) exit;
$this->_tpl_include('mcp_header.html');
if ($this->_rootref['S_MCP_REPORT']) {
    if ($this->_rootref['S_PM']) { ?>

        <h2><?php echo((isset($this->_rootref['L_PM_REPORT_DETAILS'])) ? $this->_rootref['L_PM_REPORT_DETAILS'] : ((isset($user->lang['PM_REPORT_DETAILS'])) ? $user->lang['PM_REPORT_DETAILS'] : '{ PM_REPORT_DETAILS }')); ?></h2>
    <?php } else { ?>

        <h2><?php echo((isset($this->_rootref['L_REPORT_DETAILS'])) ? $this->_rootref['L_REPORT_DETAILS'] : ((isset($user->lang['REPORT_DETAILS'])) ? $user->lang['REPORT_DETAILS'] : '{ REPORT_DETAILS }')); ?></h2>
    <?php } ?>


    <div id="report" class="panel">
        <div class="inner"><span class="corners-top"><span></span></span>

            <div class="postbody">
                <h3><?php echo((isset($this->_rootref['L_REPORT_REASON'])) ? $this->_rootref['L_REPORT_REASON'] : ((isset($user->lang['REPORT_REASON'])) ? $user->lang['REPORT_REASON'] : '{ REPORT_REASON }')); ?>
                    : <?php echo (isset($this->_rootref['REPORT_REASON_TITLE'])) ? $this->_rootref['REPORT_REASON_TITLE'] : ''; ?></h3>

                <p class="author"><?php echo((isset($this->_rootref['L_REPORTED'])) ? $this->_rootref['L_REPORTED'] : ((isset($user->lang['REPORTED'])) ? $user->lang['REPORTED'] : '{ REPORTED }')); ?> <?php echo((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo (isset($this->_rootref['REPORTER_FULL'])) ? $this->_rootref['REPORTER_FULL'] : ''; ?> &laquo; <?php echo (isset($this->_rootref['REPORT_DATE'])) ? $this->_rootref['REPORT_DATE'] : ''; ?></p>
                <?php if (!$this->_rootref['S_POST_REPORTED']) { ?>

                    <p class="rules"><?php echo((isset($this->_rootref['L_REPORT_CLOSED'])) ? $this->_rootref['L_REPORT_CLOSED'] : ((isset($user->lang['REPORT_CLOSED'])) ? $user->lang['REPORT_CLOSED'] : '{ REPORT_CLOSED }')); ?></p>
                <?php } ?>

                <div class="content">
                    <?php if ($this->_rootref['REPORT_TEXT']) { ?>

                        <?php echo (isset($this->_rootref['REPORT_TEXT'])) ? $this->_rootref['REPORT_TEXT'] : ''; ?>

                    <?php } else { ?>

                        <?php echo (isset($this->_rootref['REPORT_REASON_DESCRIPTION'])) ? $this->_rootref['REPORT_REASON_DESCRIPTION'] : ''; ?>

                    <?php } ?>

                </div>
            </div>

            <span class="corners-bottom"><span></span></span></div>
    </div>

    <form method="post" id="mcp_report"
          action="<?php echo (isset($this->_rootref['S_CLOSE_ACTION'])) ? $this->_rootref['S_CLOSE_ACTION'] : ''; ?>">

        <fieldset class="submit-buttons">
            <?php if ($this->_rootref['S_POST_REPORTED']) { ?>

                <input class="button1" type="submit"
                       value="<?php echo((isset($this->_rootref['L_CLOSE_REPORT'])) ? $this->_rootref['L_CLOSE_REPORT'] : ((isset($user->lang['CLOSE_REPORT'])) ? $user->lang['CLOSE_REPORT'] : '{ CLOSE_REPORT }')); ?>"
                       name="action[close]"/> &nbsp;
            <?php } ?>

            <input class="button2" type="submit"
                   value="<?php echo((isset($this->_rootref['L_DELETE_REPORT'])) ? $this->_rootref['L_DELETE_REPORT'] : ((isset($user->lang['DELETE_REPORT'])) ? $user->lang['DELETE_REPORT'] : '{ DELETE_REPORT }')); ?>"
                   name="action[delete]"/>
            <input type="hidden" name="report_id_list[]"
                   value="<?php echo (isset($this->_rootref['REPORT_ID'])) ? $this->_rootref['REPORT_ID'] : ''; ?>"/>
            <?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

        </fieldset>
    </form>

<?php } else { ?>

    <h2><?php echo((isset($this->_rootref['L_POST_DETAILS'])) ? $this->_rootref['L_POST_DETAILS'] : ((isset($user->lang['POST_DETAILS'])) ? $user->lang['POST_DETAILS'] : '{ POST_DETAILS }')); ?></h2>
<?php } ?>


    <div class="panel">
        <div class="inner"><span class="corners-top"><span></span></span>

            <div class="postbody">
                <?php if ($this->_rootref['U_EDIT']) { ?>

                    <ul class="profile-icons">
                        <li class="edit-icon"><a
                                href="<?php echo (isset($this->_rootref['U_EDIT'])) ? $this->_rootref['U_EDIT'] : ''; ?>"
                                title="<?php echo((isset($this->_rootref['L_EDIT_POST'])) ? $this->_rootref['L_EDIT_POST'] : ((isset($user->lang['EDIT_POST'])) ? $user->lang['EDIT_POST'] : '{ EDIT_POST }')); ?>"><span><?php echo((isset($this->_rootref['L_EDIT_POST'])) ? $this->_rootref['L_EDIT_POST'] : ((isset($user->lang['EDIT_POST'])) ? $user->lang['EDIT_POST'] : '{ EDIT_POST }')); ?></span></a>
                        </li>
                    </ul>
                <?php } ?>


                <span class="right-box" id="expand"><a href="#post_details"
                                                       onclick="viewableArea(getElementById('post_details'), true); var rev_text = getElementById('expand').getElementsByTagName('a').item(0).firstChild; if (rev_text.data == '<?php echo((isset($this->_rootref['LA_EXPAND_VIEW'])) ? $this->_rootref['LA_EXPAND_VIEW'] : ((isset($this->_rootref['L_EXPAND_VIEW'])) ? addslashes($this->_rootref['L_EXPAND_VIEW']) : ((isset($user->lang['EXPAND_VIEW'])) ? addslashes($user->lang['EXPAND_VIEW']) : '{ EXPAND_VIEW }'))); ?>'){rev_text.data = '<?php echo((isset($this->_rootref['LA_COLLAPSE_VIEW'])) ? $this->_rootref['LA_COLLAPSE_VIEW'] : ((isset($this->_rootref['L_COLLAPSE_VIEW'])) ? addslashes($this->_rootref['L_COLLAPSE_VIEW']) : ((isset($user->lang['COLLAPSE_VIEW'])) ? addslashes($user->lang['COLLAPSE_VIEW']) : '{ COLLAPSE_VIEW }'))); ?>'; } else if (rev_text.data == '<?php echo((isset($this->_rootref['LA_COLLAPSE_VIEW'])) ? $this->_rootref['LA_COLLAPSE_VIEW'] : ((isset($this->_rootref['L_COLLAPSE_VIEW'])) ? addslashes($this->_rootref['L_COLLAPSE_VIEW']) : ((isset($user->lang['COLLAPSE_VIEW'])) ? addslashes($user->lang['COLLAPSE_VIEW']) : '{ COLLAPSE_VIEW }'))); ?>'){rev_text.data = '<?php echo((isset($this->_rootref['LA_EXPAND_VIEW'])) ? $this->_rootref['LA_EXPAND_VIEW'] : ((isset($this->_rootref['L_EXPAND_VIEW'])) ? addslashes($this->_rootref['L_EXPAND_VIEW']) : ((isset($user->lang['EXPAND_VIEW'])) ? addslashes($user->lang['EXPAND_VIEW']) : '{ EXPAND_VIEW }'))); ?>'}; return false;"><?php echo((isset($this->_rootref['L_EXPAND_VIEW'])) ? $this->_rootref['L_EXPAND_VIEW'] : ((isset($user->lang['EXPAND_VIEW'])) ? $user->lang['EXPAND_VIEW'] : '{ EXPAND_VIEW }')); ?></a></span>

                <h3>
                    <a href="<?php echo (isset($this->_rootref['U_VIEW_POST'])) ? $this->_rootref['U_VIEW_POST'] : ''; ?>"><?php echo (isset($this->_rootref['POST_SUBJECT'])) ? $this->_rootref['POST_SUBJECT'] : ''; ?></a>
                </h3>
                <?php if ($this->_rootref['S_PM']) { ?>

                    <p class="author">
                        <strong><?php echo((isset($this->_rootref['L_SENT_AT'])) ? $this->_rootref['L_SENT_AT'] : ((isset($user->lang['SENT_AT'])) ? $user->lang['SENT_AT'] : '{ SENT_AT }')); ?>
                            :</strong> <?php echo (isset($this->_rootref['POST_DATE'])) ? $this->_rootref['POST_DATE'] : ''; ?>

                        <br/><strong><?php echo((isset($this->_rootref['L_PM_FROM'])) ? $this->_rootref['L_PM_FROM'] : ((isset($user->lang['PM_FROM'])) ? $user->lang['PM_FROM'] : '{ PM_FROM }')); ?>
                            :</strong> <?php echo (isset($this->_rootref['POST_AUTHOR_FULL'])) ? $this->_rootref['POST_AUTHOR_FULL'] : ''; ?>

                        <?php if ($this->_rootref['S_TO_RECIPIENT']) { ?><br/>
                            <strong><?php echo((isset($this->_rootref['L_TO'])) ? $this->_rootref['L_TO'] : ((isset($user->lang['TO'])) ? $user->lang['TO'] : '{ TO }')); ?>
                                :</strong> <?php $_to_recipient_count = (isset($this->_tpldata['to_recipient'])) ? sizeof($this->_tpldata['to_recipient']) : 0;
                            if ($_to_recipient_count) {
                                for ($_to_recipient_i = 0; $_to_recipient_i < $_to_recipient_count; ++$_to_recipient_i) {
                                    $_to_recipient_val = &$this->_tpldata['to_recipient'][$_to_recipient_i];
                                    if ($_to_recipient_val['NAME_FULL']) {
                                        echo $_to_recipient_val['NAME_FULL'];
                                    } else { ?><a href="<?php echo $_to_recipient_val['U_VIEW']; ?>"
                                                  style="color:<?php if ($_to_recipient_val['COLOUR']) {
                                                      echo $_to_recipient_val['COLOUR'];
                                                  } else if ($_to_recipient_val['IS_GROUP']) { ?>#0000FF<?php } ?>;"><?php echo $_to_recipient_val['NAME']; ?></a><?php } ?>&nbsp;<?php }
                            }
                        }
                        if ($this->_rootref['S_BCC_RECIPIENT']) { ?><br/>
                            <strong><?php echo((isset($this->_rootref['L_BCC'])) ? $this->_rootref['L_BCC'] : ((isset($user->lang['BCC'])) ? $user->lang['BCC'] : '{ BCC }')); ?>
                                :</strong> <?php $_bcc_recipient_count = (isset($this->_tpldata['bcc_recipient'])) ? sizeof($this->_tpldata['bcc_recipient']) : 0;
                            if ($_bcc_recipient_count) {
                                for ($_bcc_recipient_i = 0; $_bcc_recipient_i < $_bcc_recipient_count; ++$_bcc_recipient_i) {
                                    $_bcc_recipient_val = &$this->_tpldata['bcc_recipient'][$_bcc_recipient_i];
                                    if ($_bcc_recipient_val['NAME_FULL']) {
                                        echo $_bcc_recipient_val['NAME_FULL'];
                                    } else { ?><a href="<?php echo $_bcc_recipient_val['U_VIEW']; ?>"
                                                  style="color:<?php if ($_bcc_recipient_val['COLOUR']) {
                                                      echo $_bcc_recipient_val['COLOUR'];
                                                  } else if ($_bcc_recipient_val['IS_GROUP']) { ?>#0000FF<?php } ?>;"><?php echo $_bcc_recipient_val['NAME']; ?></a><?php } ?>&nbsp;<?php }
                            }
                        } ?>

                    </p>
                <?php } else { ?>

                    <p class="author"><?php echo (isset($this->_rootref['MINI_POST_IMG'])) ? $this->_rootref['MINI_POST_IMG'] : ''; ?> <?php echo((isset($this->_rootref['L_POSTED'])) ? $this->_rootref['L_POSTED'] : ((isset($user->lang['POSTED'])) ? $user->lang['POSTED'] : '{ POSTED }')); ?> <?php echo((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo (isset($this->_rootref['POST_AUTHOR_FULL'])) ? $this->_rootref['POST_AUTHOR_FULL'] : ''; ?> &raquo; <?php echo (isset($this->_rootref['POST_DATE'])) ? $this->_rootref['POST_DATE'] : ''; ?></p>
                <?php }
                if ($this->_rootref['S_POST_UNAPPROVED']) { ?>

                    <form method="post" id="mcp_approve"
                          action="<?php echo (isset($this->_rootref['U_APPROVE_ACTION'])) ? $this->_rootref['U_APPROVE_ACTION'] : ''; ?>">

                        <p class="rules">
                            <input class="button2" type="submit"
                                   value="<?php echo((isset($this->_rootref['L_DISAPPROVE'])) ? $this->_rootref['L_DISAPPROVE'] : ((isset($user->lang['DISAPPROVE'])) ? $user->lang['DISAPPROVE'] : '{ DISAPPROVE }')); ?>"
                                   name="action[disapprove]"/> &nbsp;
                            <input class="button1" type="submit"
                                   value="<?php echo((isset($this->_rootref['L_APPROVE'])) ? $this->_rootref['L_APPROVE'] : ((isset($user->lang['APPROVE'])) ? $user->lang['APPROVE'] : '{ APPROVE }')); ?>"
                                   name="action[approve]"/>
                            <?php if (!$this->_rootref['S_FIRST_POST']) { ?><input type="hidden" name="mode"
                                                                                   value="unapproved_posts"/><?php } ?>

                            <input type="hidden" name="post_id_list[]"
                                   value="<?php echo (isset($this->_rootref['POST_ID'])) ? $this->_rootref['POST_ID'] : ''; ?>"/>
                            <?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

                        </p>
                    </form>
                <?php }
                if ($this->_rootref['S_MESSAGE_REPORTED']) { ?>

                    <p class="rules">
                        <?php echo (isset($this->_rootref['REPORTED_IMG'])) ? $this->_rootref['REPORTED_IMG'] : ''; ?>
                        <a href="<?php echo (isset($this->_rootref['U_MCP_REPORT'])) ? $this->_rootref['U_MCP_REPORT'] : ''; ?>"><strong><?php echo((isset($this->_rootref['L_MESSAGE_REPORTED'])) ? $this->_rootref['L_MESSAGE_REPORTED'] : ((isset($user->lang['MESSAGE_REPORTED'])) ? $user->lang['MESSAGE_REPORTED'] : '{ MESSAGE_REPORTED }')); ?></strong></a>
                    </p>
                <?php } ?>


                <div class="content" id="post_details">
                    <?php echo (isset($this->_rootref['POST_PREVIEW'])) ? $this->_rootref['POST_PREVIEW'] : ''; ?>

                </div>

                <?php if ($this->_rootref['S_HAS_ATTACHMENTS']) { ?>

                    <dl class="attachbox">
                        <dt><?php echo((isset($this->_rootref['L_ATTACHMENTS'])) ? $this->_rootref['L_ATTACHMENTS'] : ((isset($user->lang['ATTACHMENTS'])) ? $user->lang['ATTACHMENTS'] : '{ ATTACHMENTS }')); ?></dt>
                        <?php $_attachment_count = (isset($this->_tpldata['attachment'])) ? sizeof($this->_tpldata['attachment']) : 0;
                        if ($_attachment_count) {
                            for ($_attachment_i = 0; $_attachment_i < $_attachment_count; ++$_attachment_i) {
                                $_attachment_val = &$this->_tpldata['attachment'][$_attachment_i]; ?>

                                <dd><?php echo $_attachment_val['DISPLAY_ATTACHMENT']; ?></dd>
                            <?php }
                        } ?>

                    </dl>
                <?php }
                if ($this->_rootref['SIGNATURE']) { ?>

                    <div id="sig<?php echo (isset($this->_rootref['POST_ID'])) ? $this->_rootref['POST_ID'] : ''; ?>"
                         class="signature"><?php echo (isset($this->_rootref['SIGNATURE'])) ? $this->_rootref['SIGNATURE'] : ''; ?></div>
                <?php }
                if ($this->_rootref['S_MCP_REPORT'] && $this->_rootref['S_CAN_VIEWIP']) { ?>

                    <hr/>
                    <div><?php if ($this->_rootref['S_PM']) {
                            echo((isset($this->_rootref['L_THIS_PM_IP'])) ? $this->_rootref['L_THIS_PM_IP'] : ((isset($user->lang['THIS_PM_IP'])) ? $user->lang['THIS_PM_IP'] : '{ THIS_PM_IP }'));
                        } else {
                            echo((isset($this->_rootref['L_THIS_POST_IP'])) ? $this->_rootref['L_THIS_POST_IP'] : ((isset($user->lang['THIS_POST_IP'])) ? $user->lang['THIS_POST_IP'] : '{ THIS_POST_IP }'));
                        } ?>: <?php if ($this->_rootref['U_WHOIS']) { ?>

                            <a href="<?php echo (isset($this->_rootref['U_WHOIS'])) ? $this->_rootref['U_WHOIS'] : ''; ?>"><?php if ($this->_rootref['POST_IPADDR']) {
                                    echo (isset($this->_rootref['POST_IPADDR'])) ? $this->_rootref['POST_IPADDR'] : '';
                                } else {
                                    echo (isset($this->_rootref['POST_IP'])) ? $this->_rootref['POST_IP'] : '';
                                } ?></a> (<?php if ($this->_rootref['POST_IPADDR']) {
                                echo (isset($this->_rootref['POST_IP'])) ? $this->_rootref['POST_IP'] : '';
                            } else { ?><a
                                href="<?php echo (isset($this->_rootref['U_LOOKUP_IP'])) ? $this->_rootref['U_LOOKUP_IP'] : ''; ?>"><?php echo((isset($this->_rootref['L_LOOKUP_IP'])) ? $this->_rootref['L_LOOKUP_IP'] : ((isset($user->lang['LOOKUP_IP'])) ? $user->lang['LOOKUP_IP'] : '{ LOOKUP_IP }')); ?></a><?php } ?>)
                        <?php } else {
                            if ($this->_rootref['POST_IPADDR']) {
                                echo (isset($this->_rootref['POST_IPADDR'])) ? $this->_rootref['POST_IPADDR'] : ''; ?> (<?php echo (isset($this->_rootref['POST_IP'])) ? $this->_rootref['POST_IP'] : ''; ?>)<?php } else {
                                echo (isset($this->_rootref['POST_IP'])) ? $this->_rootref['POST_IP'] : '';
                                if ($this->_rootref['U_LOOKUP_IP']) { ?> (<a
                                    href="<?php echo (isset($this->_rootref['U_LOOKUP_IP'])) ? $this->_rootref['U_LOOKUP_IP'] : ''; ?>"><?php echo((isset($this->_rootref['L_LOOKUP_IP'])) ? $this->_rootref['L_LOOKUP_IP'] : ((isset($user->lang['LOOKUP_IP'])) ? $user->lang['LOOKUP_IP'] : '{ LOOKUP_IP }')); ?></a>)<?php }
                            }
                        } ?></div>
                <?php } ?>


            </div>

            <span class="corners-bottom"><span></span></span></div>
    </div>

<?php if ($this->_rootref['S_CAN_LOCK_POST'] || $this->_rootref['S_CAN_DELETE_POST'] || $this->_rootref['S_CAN_CHGPOSTER']) { ?>

    <div class="panel">
        <div class="inner"><span class="corners-top"><span></span></span>

            <h3><?php echo((isset($this->_rootref['L_MOD_OPTIONS'])) ? $this->_rootref['L_MOD_OPTIONS'] : ((isset($user->lang['MOD_OPTIONS'])) ? $user->lang['MOD_OPTIONS'] : '{ MOD_OPTIONS }')); ?></h3>
            <?php if ($this->_rootref['S_CAN_CHGPOSTER']) { ?>

                <form method="post" id="mcp_chgposter"
                      action="<?php echo (isset($this->_rootref['U_POST_ACTION'])) ? $this->_rootref['U_POST_ACTION'] : ''; ?>">

                    <fieldset>
                        <dl>
                            <dt>
                                <label><?php echo((isset($this->_rootref['L_CHANGE_POSTER'])) ? $this->_rootref['L_CHANGE_POSTER'] : ((isset($user->lang['CHANGE_POSTER'])) ? $user->lang['CHANGE_POSTER'] : '{ CHANGE_POSTER }')); ?>
                                    :</label></dt>
                            <?php if ($this->_rootref['S_USER_SELECT']) { ?>
                                <dd><select
                                    name="u"><?php echo (isset($this->_rootref['S_USER_SELECT'])) ? $this->_rootref['S_USER_SELECT'] : ''; ?></select>
                                <input type="submit" class="button2" name="action[chgposter_ip]"
                                       value="<?php echo((isset($this->_rootref['L_CONFIRM'])) ? $this->_rootref['L_CONFIRM'] : ((isset($user->lang['CONFIRM'])) ? $user->lang['CONFIRM'] : '{ CONFIRM }')); ?>"/>
                                </dd><?php } ?>

                            <dd style="margin-top:3px;">
                                <input class="inputbox autowidth" type="text" name="username" value=""/>
                                <input type="submit" class="button2" name="action[chgposter]"
                                       value="<?php echo((isset($this->_rootref['L_CONFIRM'])) ? $this->_rootref['L_CONFIRM'] : ((isset($user->lang['CONFIRM'])) ? $user->lang['CONFIRM'] : '{ CONFIRM }')); ?>"/>
                                <br/>
                                <span>[ <a
                                        href="<?php echo (isset($this->_rootref['U_FIND_USERNAME'])) ? $this->_rootref['U_FIND_USERNAME'] : ''; ?>"
                                        onclick="find_username(this.href); return false;"><?php echo((isset($this->_rootref['L_FIND_USERNAME'])) ? $this->_rootref['L_FIND_USERNAME'] : ((isset($user->lang['FIND_USERNAME'])) ? $user->lang['FIND_USERNAME'] : '{ FIND_USERNAME }')); ?></a> ]</span>
                            </dd>
                        </dl>
                        <?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

                    </fieldset>
                </form>
            <?php }
            if ($this->_rootref['S_CAN_LOCK_POST'] || $this->_rootref['S_CAN_DELETE_POST']) { ?>

                <form method="post" id="mcp"
                      action="<?php echo (isset($this->_rootref['U_MCP_ACTION'])) ? $this->_rootref['U_MCP_ACTION'] : ''; ?>">

                    <fieldset>
                        <dl>
                            <dt>
                                <label><?php echo((isset($this->_rootref['L_MOD_OPTIONS'])) ? $this->_rootref['L_MOD_OPTIONS'] : ((isset($user->lang['MOD_OPTIONS'])) ? $user->lang['MOD_OPTIONS'] : '{ MOD_OPTIONS }')); ?>
                                    :</label></dt>
                            <dd><select name="action">
                                    <?php if ($this->_rootref['S_CAN_LOCK_POST']) {
                                        if ($this->_rootref['S_POST_LOCKED']) { ?>
                                            <option
                                                value="unlock_post"><?php echo((isset($this->_rootref['L_UNLOCK_POST'])) ? $this->_rootref['L_UNLOCK_POST'] : ((isset($user->lang['UNLOCK_POST'])) ? $user->lang['UNLOCK_POST'] : '{ UNLOCK_POST }')); ?>
                                            [<?php echo((isset($this->_rootref['L_UNLOCK_POST_EXPLAIN'])) ? $this->_rootref['L_UNLOCK_POST_EXPLAIN'] : ((isset($user->lang['UNLOCK_POST_EXPLAIN'])) ? $user->lang['UNLOCK_POST_EXPLAIN'] : '{ UNLOCK_POST_EXPLAIN }')); ?>
                                            ]</option><?php } else { ?>
                                            <option
                                                value="lock_post"><?php echo((isset($this->_rootref['L_LOCK_POST'])) ? $this->_rootref['L_LOCK_POST'] : ((isset($user->lang['LOCK_POST'])) ? $user->lang['LOCK_POST'] : '{ LOCK_POST }')); ?>
                                            [<?php echo((isset($this->_rootref['L_LOCK_POST_EXPLAIN'])) ? $this->_rootref['L_LOCK_POST_EXPLAIN'] : ((isset($user->lang['LOCK_POST_EXPLAIN'])) ? $user->lang['LOCK_POST_EXPLAIN'] : '{ LOCK_POST_EXPLAIN }')); ?>
                                            ]</option><?php }
                                    }
                                    if ($this->_rootref['S_CAN_DELETE_POST']) { ?>
                                        <option
                                            value="delete_post"><?php echo((isset($this->_rootref['L_DELETE_POST'])) ? $this->_rootref['L_DELETE_POST'] : ((isset($user->lang['DELETE_POST'])) ? $user->lang['DELETE_POST'] : '{ DELETE_POST }')); ?></option><?php } ?>

                                </select> <input class="button2" type="submit"
                                                 value="<?php echo((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>"/>
                            </dd>
                        </dl>
                        <?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

                    </fieldset>
                </form>
            <?php } ?>


            <span class="corners-bottom"><span></span></span></div>
    </div>
<?php }
if ($this->_rootref['S_MCP_QUEUE'] || $this->_rootref['S_MCP_REPORT'] || $this->_rootref['RETURN_TOPIC']) { ?>

    <div class="panel">
        <div class="inner"><span class="corners-top"><span></span></span>

            <p><?php if ($this->_rootref['S_MCP_QUEUE']) {
                    echo (isset($this->_rootref['RETURN_QUEUE'])) ? $this->_rootref['RETURN_QUEUE'] : ''; ?> | <?php echo (isset($this->_rootref['RETURN_TOPIC_SIMPLE'])) ? $this->_rootref['RETURN_TOPIC_SIMPLE'] : ''; ?> | <?php echo (isset($this->_rootref['RETURN_POST'])) ? $this->_rootref['RETURN_POST'] : '';
                } else if ($this->_rootref['S_MCP_REPORT']) {
                    echo (isset($this->_rootref['RETURN_REPORTS'])) ? $this->_rootref['RETURN_REPORTS'] : '';
                    if (!$this->_rootref['S_PM']) { ?> | <a
                        href="<?php echo (isset($this->_rootref['U_VIEW_POST'])) ? $this->_rootref['U_VIEW_POST'] : ''; ?>"><?php echo((isset($this->_rootref['L_VIEW_POST'])) ? $this->_rootref['L_VIEW_POST'] : ((isset($user->lang['VIEW_POST'])) ? $user->lang['VIEW_POST'] : '{ VIEW_POST }')); ?></a> |
                        <a href="<?php echo (isset($this->_rootref['U_VIEW_TOPIC'])) ? $this->_rootref['U_VIEW_TOPIC'] : ''; ?>"><?php echo((isset($this->_rootref['L_VIEW_TOPIC'])) ? $this->_rootref['L_VIEW_TOPIC'] : ((isset($user->lang['VIEW_TOPIC'])) ? $user->lang['VIEW_TOPIC'] : '{ VIEW_TOPIC }')); ?></a> |
                        <a
                        href="<?php echo (isset($this->_rootref['U_VIEW_FORUM'])) ? $this->_rootref['U_VIEW_FORUM'] : ''; ?>"><?php echo((isset($this->_rootref['L_VIEW_FORUM'])) ? $this->_rootref['L_VIEW_FORUM'] : ((isset($user->lang['VIEW_FORUM'])) ? $user->lang['VIEW_FORUM'] : '{ VIEW_FORUM }')); ?></a><?php }
                } else {
                    echo (isset($this->_rootref['RETURN_TOPIC'])) ? $this->_rootref['RETURN_TOPIC'] : '';
                } ?></p>

            <span class="corners-bottom"><span></span></span></div>
    </div>
<?php }
if ($this->_rootref['S_MCP_QUEUE']) {
} else {
    if ($this->_rootref['S_SHOW_USER_NOTES']) { ?>

        <div class="panel" id="usernotes">
            <div class="inner"><span class="corners-top"><span></span></span>

                <form method="post" id="mcp_notes"
                      action="<?php echo (isset($this->_rootref['U_POST_ACTION'])) ? $this->_rootref['U_POST_ACTION'] : ''; ?>">

                    <?php if ($this->_rootref['S_USER_NOTES']) { ?>

                        <h3><?php echo((isset($this->_rootref['L_FEEDBACK'])) ? $this->_rootref['L_FEEDBACK'] : ((isset($user->lang['FEEDBACK'])) ? $user->lang['FEEDBACK'] : '{ FEEDBACK }')); ?></h3>

                        <?php $_usernotes_count = (isset($this->_tpldata['usernotes'])) ? sizeof($this->_tpldata['usernotes']) : 0;
                        if ($_usernotes_count) {
                            for ($_usernotes_i = 0; $_usernotes_i < $_usernotes_count; ++$_usernotes_i) {
                                $_usernotes_val = &$this->_tpldata['usernotes'][$_usernotes_i]; ?>

                                <span
                                    class="small"><strong><?php echo((isset($this->_rootref['L_REPORTED_BY'])) ? $this->_rootref['L_REPORTED_BY'] : ((isset($user->lang['REPORTED_BY'])) ? $user->lang['REPORTED_BY'] : '{ REPORTED_BY }')); ?>
                                        : <?php echo $_usernotes_val['REPORT_BY']; ?> &laquo; <?php echo $_usernotes_val['REPORT_AT']; ?></strong></span>
                                <?php if ($this->_rootref['S_CLEAR_ALLOWED']) { ?>
                                    <div class="right-box"><input type="checkbox" name="marknote[]"
                                                                  value="<?php echo $_usernotes_val['ID']; ?>"/>
                                    </div><?php } ?>

                                <div class="postbody"><?php echo $_usernotes_val['ACTION']; ?></div>

                                <hr class="dashed"/>
                            <?php }
                        }
                        if ($this->_rootref['S_CLEAR_ALLOWED']) { ?>

                            <fieldset class="submit-buttons">
                                <input class="button2" type="submit" name="action[del_all]"
                                       value="<?php echo((isset($this->_rootref['L_DELETE_ALL'])) ? $this->_rootref['L_DELETE_ALL'] : ((isset($user->lang['DELETE_ALL'])) ? $user->lang['DELETE_ALL'] : '{ DELETE_ALL }')); ?>"/>&nbsp;
                                <input class="button2" type="submit" name="action[del_marked]"
                                       value="<?php echo((isset($this->_rootref['L_DELETE_MARKED'])) ? $this->_rootref['L_DELETE_MARKED'] : ((isset($user->lang['DELETE_MARKED'])) ? $user->lang['DELETE_MARKED'] : '{ DELETE_MARKED }')); ?>"/>
                            </fieldset>
                        <?php }
                    } ?>


                    <h3><?php echo((isset($this->_rootref['L_ADD_FEEDBACK'])) ? $this->_rootref['L_ADD_FEEDBACK'] : ((isset($user->lang['ADD_FEEDBACK'])) ? $user->lang['ADD_FEEDBACK'] : '{ ADD_FEEDBACK }')); ?></h3>

                    <p><?php echo((isset($this->_rootref['L_ADD_FEEDBACK_EXPLAIN'])) ? $this->_rootref['L_ADD_FEEDBACK_EXPLAIN'] : ((isset($user->lang['ADD_FEEDBACK_EXPLAIN'])) ? $user->lang['ADD_FEEDBACK_EXPLAIN'] : '{ ADD_FEEDBACK_EXPLAIN }')); ?></p>

                    <fieldset>
                        <textarea name="usernote" rows="4" cols="76" class="inputbox"></textarea>
                    </fieldset>

                    <fieldset class="submit-buttons">
                        <input class="button1" type="submit" name="action[add_feedback]"
                               value="<?php echo((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>"/>&nbsp;
                        <input class="button2" type="reset"
                               value="<?php echo((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>"/>
                        <?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

                    </fieldset>
                </form>

                <span class="corners-bottom"><span></span></span></div>
        </div>
    <?php }
    if ($this->_rootref['S_SHOW_REPORTS']) { ?>

        <div class="panel" id="reports">
            <div class="inner"><span class="corners-top"><span></span></span>

                <h3><?php echo((isset($this->_rootref['L_MCP_POST_REPORTS'])) ? $this->_rootref['L_MCP_POST_REPORTS'] : ((isset($user->lang['MCP_POST_REPORTS'])) ? $user->lang['MCP_POST_REPORTS'] : '{ MCP_POST_REPORTS }')); ?></h3>

                <?php $_reports_count = (isset($this->_tpldata['reports'])) ? sizeof($this->_tpldata['reports']) : 0;
                if ($_reports_count) {
                    for ($_reports_i = 0; $_reports_i < $_reports_count; ++$_reports_i) {
                        $_reports_val = &$this->_tpldata['reports'][$_reports_i]; ?>

                        <span
                            class="small"><strong><?php echo((isset($this->_rootref['L_REPORTED_BY'])) ? $this->_rootref['L_REPORTED_BY'] : ((isset($user->lang['REPORTED_BY'])) ? $user->lang['REPORTED_BY'] : '{ REPORTED_BY }')); ?>
                                : <?php if ($_reports_val['U_REPORTER']) { ?><a
                                    href="<?php echo $_reports_val['U_REPORTER']; ?>"><?php echo $_reports_val['REPORTER']; ?></a><?php } else {
                                    echo $_reports_val['REPORTER'];
                                } ?> &laquo; <?php echo $_reports_val['REPORT_TIME']; ?></strong></span>
                        <p><em><?php echo $_reports_val['REASON_TITLE']; ?>
                                : <?php echo $_reports_val['REASON_DESC']; ?></em><?php if ($_reports_val['REPORT_TEXT']) { ?>
                                <br/><?php echo $_reports_val['REPORT_TEXT'];
                            } ?></p>
                    <?php }
                } ?>


                <span class="corners-bottom"><span></span></span></div>
        </div>
    <?php }
    if ($this->_rootref['S_CAN_VIEWIP'] && !$this->_rootref['S_MCP_REPORT']) { ?>

        <div class="panel" id="ip">
            <div class="inner"><span class="corners-top"><span></span></span>

                <p><?php echo((isset($this->_rootref['L_THIS_POST_IP'])) ? $this->_rootref['L_THIS_POST_IP'] : ((isset($user->lang['THIS_POST_IP'])) ? $user->lang['THIS_POST_IP'] : '{ THIS_POST_IP }')); ?>
                    : <?php if ($this->_rootref['U_WHOIS']) { ?>

                        <a href="<?php echo (isset($this->_rootref['U_WHOIS'])) ? $this->_rootref['U_WHOIS'] : ''; ?>"><?php if ($this->_rootref['POST_IPADDR']) {
                                echo (isset($this->_rootref['POST_IPADDR'])) ? $this->_rootref['POST_IPADDR'] : '';
                            } else {
                                echo (isset($this->_rootref['POST_IP'])) ? $this->_rootref['POST_IP'] : '';
                            } ?></a> (<?php if ($this->_rootref['POST_IPADDR']) {
                            echo (isset($this->_rootref['POST_IP'])) ? $this->_rootref['POST_IP'] : '';
                        } else { ?><a
                            href="<?php echo (isset($this->_rootref['U_LOOKUP_IP'])) ? $this->_rootref['U_LOOKUP_IP'] : ''; ?>"><?php echo((isset($this->_rootref['L_LOOKUP_IP'])) ? $this->_rootref['L_LOOKUP_IP'] : ((isset($user->lang['LOOKUP_IP'])) ? $user->lang['LOOKUP_IP'] : '{ LOOKUP_IP }')); ?></a><?php } ?>)
                    <?php } else {
                        if ($this->_rootref['POST_IPADDR']) {
                            echo (isset($this->_rootref['POST_IPADDR'])) ? $this->_rootref['POST_IPADDR'] : ''; ?> (<?php echo (isset($this->_rootref['POST_IP'])) ? $this->_rootref['POST_IP'] : ''; ?>)<?php } else {
                            echo (isset($this->_rootref['POST_IP'])) ? $this->_rootref['POST_IP'] : '';
                            if ($this->_rootref['U_LOOKUP_IP']) { ?> (<a
                                href="<?php echo (isset($this->_rootref['U_LOOKUP_IP'])) ? $this->_rootref['U_LOOKUP_IP'] : ''; ?>"><?php echo((isset($this->_rootref['L_LOOKUP_IP'])) ? $this->_rootref['L_LOOKUP_IP'] : ((isset($user->lang['LOOKUP_IP'])) ? $user->lang['LOOKUP_IP'] : '{ LOOKUP_IP }')); ?></a>)<?php }
                        }
                    } ?></p>

                <table class="table1" cellspacing="1">
                    <thead>
                    <tr>
                        <th class="name"><?php echo((isset($this->_rootref['L_OTHER_USERS'])) ? $this->_rootref['L_OTHER_USERS'] : ((isset($user->lang['OTHER_USERS'])) ? $user->lang['OTHER_USERS'] : '{ OTHER_USERS }')); ?></th>
                        <th class="posts"><?php echo((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $_userrow_count = (isset($this->_tpldata['userrow'])) ? sizeof($this->_tpldata['userrow']) : 0;
                    if ($_userrow_count) {
                        for ($_userrow_i = 0; $_userrow_i < $_userrow_count; ++$_userrow_i) {
                            $_userrow_val = &$this->_tpldata['userrow'][$_userrow_i]; ?>

                            <tr class="<?php if (($_userrow_val['S_ROW_COUNT'] & 1)) { ?>bg1<?php } else { ?>bg2<?php } ?>">
                                <td><?php if ($_userrow_val['U_PROFILE']) { ?><a
                                        href="<?php echo $_userrow_val['U_PROFILE']; ?>"><?php echo $_userrow_val['USERNAME']; ?></a><?php } else {
                                        echo $_userrow_val['USERNAME'];
                                    } ?></td>
                                <td class="posts"><a href="<?php echo $_userrow_val['U_SEARCHPOSTS']; ?>"
                                                     title="<?php echo((isset($this->_rootref['L_SEARCH_POSTS_BY'])) ? $this->_rootref['L_SEARCH_POSTS_BY'] : ((isset($user->lang['SEARCH_POSTS_BY'])) ? $user->lang['SEARCH_POSTS_BY'] : '{ SEARCH_POSTS_BY }')); ?> <?php echo $_userrow_val['USERNAME']; ?>"><?php echo $_userrow_val['NUM_POSTS']; ?></a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>

                        <tr>
                            <td colspan="2"><?php echo((isset($this->_rootref['L_NO_MATCHES_FOUND'])) ? $this->_rootref['L_NO_MATCHES_FOUND'] : ((isset($user->lang['NO_MATCHES_FOUND'])) ? $user->lang['NO_MATCHES_FOUND'] : '{ NO_MATCHES_FOUND }')); ?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>

                <table class="table1" cellspacing="1">
                    <thead>
                    <tr>
                        <th class="name"><?php echo((isset($this->_rootref['L_IPS_POSTED_FROM'])) ? $this->_rootref['L_IPS_POSTED_FROM'] : ((isset($user->lang['IPS_POSTED_FROM'])) ? $user->lang['IPS_POSTED_FROM'] : '{ IPS_POSTED_FROM }')); ?></th>
                        <th class="posts"><?php echo((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $_iprow_count = (isset($this->_tpldata['iprow'])) ? sizeof($this->_tpldata['iprow']) : 0;
                    if ($_iprow_count) {
                        for ($_iprow_i = 0; $_iprow_i < $_iprow_count; ++$_iprow_i) {
                            $_iprow_val = &$this->_tpldata['iprow'][$_iprow_i]; ?>

                            <tr class="<?php if (($_iprow_val['S_ROW_COUNT'] & 1)) { ?>bg1<?php } else { ?>bg2<?php } ?>">
                                <td><?php if ($_iprow_val['HOSTNAME']) { ?><a
                                        href="<?php echo $_iprow_val['U_WHOIS']; ?>"><?php echo $_iprow_val['HOSTNAME']; ?></a> (<?php echo $_iprow_val['IP']; ?>)<?php } else { ?>
                                        <a
                                            href="<?php echo $_iprow_val['U_WHOIS']; ?>"><?php echo $_iprow_val['IP']; ?></a> (
                                        <a href="<?php echo $_iprow_val['U_LOOKUP_IP']; ?>"><?php echo((isset($this->_rootref['L_LOOKUP_IP'])) ? $this->_rootref['L_LOOKUP_IP'] : ((isset($user->lang['LOOKUP_IP'])) ? $user->lang['LOOKUP_IP'] : '{ LOOKUP_IP }')); ?></a>)<?php } ?>
                                </td>
                                <td class="posts"><?php echo $_iprow_val['NUM_POSTS']; ?></td>
                            </tr>
                        <?php }
                    } else { ?>

                        <tr>
                            <td colspan="2"><?php echo((isset($this->_rootref['L_NO_MATCHES_FOUND'])) ? $this->_rootref['L_NO_MATCHES_FOUND'] : ((isset($user->lang['NO_MATCHES_FOUND'])) ? $user->lang['NO_MATCHES_FOUND'] : '{ NO_MATCHES_FOUND }')); ?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>

                <p>
                    <a href="<?php echo (isset($this->_rootref['U_LOOKUP_ALL'])) ? $this->_rootref['U_LOOKUP_ALL'] : ''; ?>#ip"><?php echo((isset($this->_rootref['L_LOOKUP_ALL'])) ? $this->_rootref['L_LOOKUP_ALL'] : ((isset($user->lang['LOOKUP_ALL'])) ? $user->lang['LOOKUP_ALL'] : '{ LOOKUP_ALL }')); ?></a>
                </p>

                <span class="corners-bottom"><span></span></span></div>
        </div>
    <?php }
}
if ($this->_rootref['S_TOPIC_REVIEW']) {
    $this->_tpl_include('posting_topic_review.html');
}
$this->_tpl_include('mcp_footer.html'); ?>