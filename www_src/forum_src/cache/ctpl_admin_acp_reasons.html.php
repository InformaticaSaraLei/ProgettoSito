<?php if (!defined('IN_PHPBB')) exit;
$this->_tpl_include('overall_header.html'); ?>


    <a name="maincontent"></a>

<?php if ($this->_rootref['S_EDIT_REASON']) { ?>


    <a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>"
       style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">&laquo; <?php echo((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a>

    <h1><?php echo((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h1>

    <p><?php echo((isset($this->_rootref['L_REASON_EDIT_EXPLAIN'])) ? $this->_rootref['L_REASON_EDIT_EXPLAIN'] : ((isset($user->lang['REASON_EDIT_EXPLAIN'])) ? $user->lang['REASON_EDIT_EXPLAIN'] : '{ REASON_EDIT_EXPLAIN }')); ?></p>

    <?php if ($this->_rootref['S_ERROR']) { ?>

        <div class="errorbox">
            <h3><?php echo((isset($this->_rootref['L_WARNING'])) ? $this->_rootref['L_WARNING'] : ((isset($user->lang['WARNING'])) ? $user->lang['WARNING'] : '{ WARNING }')); ?></h3>

            <p><?php echo (isset($this->_rootref['ERROR_MSG'])) ? $this->_rootref['ERROR_MSG'] : ''; ?></p>
        </div>
    <?php }
    if (!$this->_rootref['S_TRANSLATED']) { ?>

        <h3><?php echo((isset($this->_rootref['L_AVAILABLE_TITLES'])) ? $this->_rootref['L_AVAILABLE_TITLES'] : ((isset($user->lang['AVAILABLE_TITLES'])) ? $user->lang['AVAILABLE_TITLES'] : '{ AVAILABLE_TITLES }')); ?></h3>

        <p><?php echo (isset($this->_rootref['S_AVAILABLE_TITLES'])) ? $this->_rootref['S_AVAILABLE_TITLES'] : ''; ?></p>
    <?php } ?>


    <form id="acp_reasons" method="post"
          action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

        <fieldset>
            <legend><?php echo((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></legend>
            <p><?php if ($this->_rootref['S_TRANSLATED']) {
                    echo((isset($this->_rootref['L_IS_TRANSLATED_EXPLAIN'])) ? $this->_rootref['L_IS_TRANSLATED_EXPLAIN'] : ((isset($user->lang['IS_TRANSLATED_EXPLAIN'])) ? $user->lang['IS_TRANSLATED_EXPLAIN'] : '{ IS_TRANSLATED_EXPLAIN }'));
                } else {
                    echo((isset($this->_rootref['L_IS_NOT_TRANSLATED_EXPLAIN'])) ? $this->_rootref['L_IS_NOT_TRANSLATED_EXPLAIN'] : ((isset($user->lang['IS_NOT_TRANSLATED_EXPLAIN'])) ? $user->lang['IS_NOT_TRANSLATED_EXPLAIN'] : '{ IS_NOT_TRANSLATED_EXPLAIN }'));
                } ?></p>
            <dl>
                <dt><label
                        for="reason_title"><?php echo((isset($this->_rootref['L_REASON_TITLE'])) ? $this->_rootref['L_REASON_TITLE'] : ((isset($user->lang['REASON_TITLE'])) ? $user->lang['REASON_TITLE'] : '{ REASON_TITLE }')); ?>
                        :</label></dt>
                <dd><input name="reason_title" type="text" id="reason_title"
                           value="<?php echo (isset($this->_rootref['REASON_TITLE'])) ? $this->_rootref['REASON_TITLE'] : ''; ?>"
                           maxlength="255"/></dd>
            </dl>
            <?php if ($this->_rootref['S_TRANSLATED']) { ?>

                <dl>
                    <dt><?php echo((isset($this->_rootref['L_REASON_TITLE_TRANSLATED'])) ? $this->_rootref['L_REASON_TITLE_TRANSLATED'] : ((isset($user->lang['REASON_TITLE_TRANSLATED'])) ? $user->lang['REASON_TITLE_TRANSLATED'] : '{ REASON_TITLE_TRANSLATED }')); ?></dt>
                    <dd><?php echo (isset($this->_rootref['TRANSLATED_TITLE'])) ? $this->_rootref['TRANSLATED_TITLE'] : ''; ?></dd>
                </dl>
            <?php } ?>

            <dl>
                <dt><label
                        for="reason_description"><?php echo((isset($this->_rootref['L_REASON_DESCRIPTION'])) ? $this->_rootref['L_REASON_DESCRIPTION'] : ((isset($user->lang['REASON_DESCRIPTION'])) ? $user->lang['REASON_DESCRIPTION'] : '{ REASON_DESCRIPTION }')); ?>
                        :</label></dt>
                <dd><textarea name="reason_description" id="reason_description" rows="8"
                              cols="80"><?php echo (isset($this->_rootref['REASON_DESCRIPTION'])) ? $this->_rootref['REASON_DESCRIPTION'] : ''; ?></textarea>
                </dd>
            </dl>
            <?php if ($this->_rootref['S_TRANSLATED']) { ?>

                <dl>
                    <dt><?php echo((isset($this->_rootref['L_REASON_DESC_TRANSLATED'])) ? $this->_rootref['L_REASON_DESC_TRANSLATED'] : ((isset($user->lang['REASON_DESC_TRANSLATED'])) ? $user->lang['REASON_DESC_TRANSLATED'] : '{ REASON_DESC_TRANSLATED }')); ?></dt>
                    <dd><?php echo (isset($this->_rootref['TRANSLATED_DESCRIPTION'])) ? $this->_rootref['TRANSLATED_DESCRIPTION'] : ''; ?></dd>
                </dl>
            <?php } ?>


            <p class="submit-buttons">
                <input class="button1" type="submit" id="submit" name="submit"
                       value="<?php echo((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>"/>&nbsp;
                <input class="button2" type="reset" id="reset" name="reset"
                       value="<?php echo((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>"/>
                <?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

            </p>
        </fieldset>
    </form>

<?php } else { ?>


    <h1><?php echo((isset($this->_rootref['L_ACP_REASONS'])) ? $this->_rootref['L_ACP_REASONS'] : ((isset($user->lang['ACP_REASONS'])) ? $user->lang['ACP_REASONS'] : '{ ACP_REASONS }')); ?></h1>

    <p><?php echo((isset($this->_rootref['L_ACP_REASONS_EXPLAIN'])) ? $this->_rootref['L_ACP_REASONS_EXPLAIN'] : ((isset($user->lang['ACP_REASONS_EXPLAIN'])) ? $user->lang['ACP_REASONS_EXPLAIN'] : '{ ACP_REASONS_EXPLAIN }')); ?></p>

    <form id="reasons" method="post"
          action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">
        <fieldset class="tabulated">
            <legend><?php echo((isset($this->_rootref['L_ACP_REASONS'])) ? $this->_rootref['L_ACP_REASONS'] : ((isset($user->lang['ACP_REASONS'])) ? $user->lang['ACP_REASONS'] : '{ ACP_REASONS }')); ?></legend>

            <?php if (sizeof($this->_tpldata['reasons'])) { ?>

                <table cellspacing="1">
                    <col class="row1"/>
                    <col class="row1"/>
                    <col class="row2"/>
                    <thead>
                    <tr>
                        <th><?php echo((isset($this->_rootref['L_REASON'])) ? $this->_rootref['L_REASON'] : ((isset($user->lang['REASON'])) ? $user->lang['REASON'] : '{ REASON }')); ?></th>
                        <th><?php echo((isset($this->_rootref['L_USED_IN_REPORTS'])) ? $this->_rootref['L_USED_IN_REPORTS'] : ((isset($user->lang['USED_IN_REPORTS'])) ? $user->lang['USED_IN_REPORTS'] : '{ USED_IN_REPORTS }')); ?></th>
                        <th><?php echo((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $_reasons_count = (isset($this->_tpldata['reasons'])) ? sizeof($this->_tpldata['reasons']) : 0;
                    if ($_reasons_count) {
                        for ($_reasons_i = 0; $_reasons_i < $_reasons_count; ++$_reasons_i) {
                            $_reasons_val = &$this->_tpldata['reasons'][$_reasons_i]; ?>

                            <tr>
                                <td>
                                    <i style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>; font-size: .9em;"><?php if ($_reasons_val['S_TRANSLATED']) {
                                            echo((isset($this->_rootref['L_IS_TRANSLATED'])) ? $this->_rootref['L_IS_TRANSLATED'] : ((isset($user->lang['IS_TRANSLATED'])) ? $user->lang['IS_TRANSLATED'] : '{ IS_TRANSLATED }'));
                                        } else {
                                            echo((isset($this->_rootref['L_IS_NOT_TRANSLATED'])) ? $this->_rootref['L_IS_NOT_TRANSLATED'] : ((isset($user->lang['IS_NOT_TRANSLATED'])) ? $user->lang['IS_NOT_TRANSLATED'] : '{ IS_NOT_TRANSLATED }'));
                                        } ?></i>
                                    <strong><?php echo $_reasons_val['REASON_TITLE'];
                                        if ($_reasons_val['S_OTHER_REASON']) { ?> *<?php } ?></strong>
                                    <br/><span><?php echo $_reasons_val['REASON_DESCRIPTION']; ?></span>
                                </td>
                                <td style="width: 100px;"><?php echo $_reasons_val['REASON_COUNT']; ?></td>
                                <td style="width: 80px; text-align: right; white-space: nowrap;">
                                    <?php if ($_reasons_val['S_FIRST_ROW'] && !$_reasons_val['S_LAST_ROW']) { ?>

                                        <?php echo (isset($this->_rootref['ICON_MOVE_UP_DISABLED'])) ? $this->_rootref['ICON_MOVE_UP_DISABLED'] : ''; ?>

                                        <a href="<?php echo $_reasons_val['U_MOVE_DOWN']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_DOWN'])) ? $this->_rootref['ICON_MOVE_DOWN'] : ''; ?></a>
                                    <?php } else if (!$_reasons_val['S_FIRST_ROW'] && !$_reasons_val['S_LAST_ROW']) { ?>

                                        <a href="<?php echo $_reasons_val['U_MOVE_UP']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_UP'])) ? $this->_rootref['ICON_MOVE_UP'] : ''; ?></a>
                                        <a href="<?php echo $_reasons_val['U_MOVE_DOWN']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_DOWN'])) ? $this->_rootref['ICON_MOVE_DOWN'] : ''; ?></a>
                                    <?php } else if ($_reasons_val['S_LAST_ROW'] && !$_reasons_val['S_FIRST_ROW']) { ?>

                                        <a href="<?php echo $_reasons_val['U_MOVE_UP']; ?>"><?php echo (isset($this->_rootref['ICON_MOVE_UP'])) ? $this->_rootref['ICON_MOVE_UP'] : ''; ?></a>
                                        <?php echo (isset($this->_rootref['ICON_MOVE_DOWN_DISABLED'])) ? $this->_rootref['ICON_MOVE_DOWN_DISABLED'] : ''; ?>

                                    <?php } ?>

                                    <a href="<?php echo $_reasons_val['U_EDIT']; ?>"><?php echo (isset($this->_rootref['ICON_EDIT'])) ? $this->_rootref['ICON_EDIT'] : ''; ?></a>
                                    <?php if ($_reasons_val['U_DELETE']) { ?>

                                        <a href="<?php echo $_reasons_val['U_DELETE']; ?>"><?php echo (isset($this->_rootref['ICON_DELETE'])) ? $this->_rootref['ICON_DELETE'] : ''; ?></a>
                                    <?php } else { ?>

                                        <?php echo (isset($this->_rootref['ICON_DELETE_DISABLED'])) ? $this->_rootref['ICON_DELETE_DISABLED'] : ''; ?>

                                    <?php } ?>

                                </td>
                            </tr>
                        <?php }
                    } ?>

                    </tbody>
                </table>

            <?php } ?>


            <p class="quick">
                <input type="hidden" name="action" value="add"/>

                <input type="text" name="reason_title"/>
                <input class="button2" name="addreason" type="submit"
                       value="<?php echo((isset($this->_rootref['L_ADD_NEW_REASON'])) ? $this->_rootref['L_ADD_NEW_REASON'] : ((isset($user->lang['ADD_NEW_REASON'])) ? $user->lang['ADD_NEW_REASON'] : '{ ADD_NEW_REASON }')); ?>"/>
                <?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

            </p>
        </fieldset>

    </form>

<?php }
$this->_tpl_include('overall_footer.html'); ?>