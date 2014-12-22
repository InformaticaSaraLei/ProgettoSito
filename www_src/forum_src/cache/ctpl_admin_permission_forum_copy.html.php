<?php if (!defined('IN_PHPBB')) exit;
$this->_tpl_include('overall_header.html'); ?>


    <a name="maincontent"></a>

    <h1><?php echo((isset($this->_rootref['L_ACP_FORUM_PERMISSIONS_COPY'])) ? $this->_rootref['L_ACP_FORUM_PERMISSIONS_COPY'] : ((isset($user->lang['ACP_FORUM_PERMISSIONS_COPY'])) ? $user->lang['ACP_FORUM_PERMISSIONS_COPY'] : '{ ACP_FORUM_PERMISSIONS_COPY }')); ?></h1>

<?php echo((isset($this->_rootref['L_ACP_FORUM_PERMISSIONS_COPY_EXPLAIN'])) ? $this->_rootref['L_ACP_FORUM_PERMISSIONS_COPY_EXPLAIN'] : ((isset($user->lang['ACP_FORUM_PERMISSIONS_COPY_EXPLAIN'])) ? $user->lang['ACP_FORUM_PERMISSIONS_COPY_EXPLAIN'] : '{ ACP_FORUM_PERMISSIONS_COPY_EXPLAIN }')); ?>


    <form id="forum_perm_copy" method="post"
          action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

        <fieldset>
            <legend><?php echo((isset($this->_rootref['L_LOOK_UP_FORUM'])) ? $this->_rootref['L_LOOK_UP_FORUM'] : ((isset($user->lang['LOOK_UP_FORUM'])) ? $user->lang['LOOK_UP_FORUM'] : '{ LOOK_UP_FORUM }')); ?></legend>

            <dl>
                <dt><label
                        for="src_forum"><?php echo((isset($this->_rootref['L_COPY_PERMISSIONS_FROM'])) ? $this->_rootref['L_COPY_PERMISSIONS_FROM'] : ((isset($user->lang['COPY_PERMISSIONS_FROM'])) ? $user->lang['COPY_PERMISSIONS_FROM'] : '{ COPY_PERMISSIONS_FROM }')); ?>
                        :</label><br/><span><?php echo((isset($this->_rootref['L_COPY_PERMISSIONS_FORUM_FROM_EXPLAIN'])) ? $this->_rootref['L_COPY_PERMISSIONS_FORUM_FROM_EXPLAIN'] : ((isset($user->lang['COPY_PERMISSIONS_FORUM_FROM_EXPLAIN'])) ? $user->lang['COPY_PERMISSIONS_FORUM_FROM_EXPLAIN'] : '{ COPY_PERMISSIONS_FORUM_FROM_EXPLAIN }')); ?></span>
                </dt>
                <dd><select id="src_forum" name="src_forum_id">
                        <option
                            value="0"><?php echo((isset($this->_rootref['L_SELECT_FORUM'])) ? $this->_rootref['L_SELECT_FORUM'] : ((isset($user->lang['SELECT_FORUM'])) ? $user->lang['SELECT_FORUM'] : '{ SELECT_FORUM }')); ?></option>
                        <option value="-1">------------------
                        </option><?php echo (isset($this->_rootref['S_FORUM_OPTIONS'])) ? $this->_rootref['S_FORUM_OPTIONS'] : ''; ?>
                    </select></dd>
            </dl>
        </fieldset>

        <fieldset>
            <legend><?php echo((isset($this->_rootref['L_LOOK_UP_FORUM'])) ? $this->_rootref['L_LOOK_UP_FORUM'] : ((isset($user->lang['LOOK_UP_FORUM'])) ? $user->lang['LOOK_UP_FORUM'] : '{ LOOK_UP_FORUM }')); ?></legend>
            <p><?php echo((isset($this->_rootref['L_LOOK_UP_FORUMS_EXPLAIN'])) ? $this->_rootref['L_LOOK_UP_FORUMS_EXPLAIN'] : ((isset($user->lang['LOOK_UP_FORUMS_EXPLAIN'])) ? $user->lang['LOOK_UP_FORUMS_EXPLAIN'] : '{ LOOK_UP_FORUMS_EXPLAIN }')); ?></p>

            <dl>
                <dt><label
                        for="dest_forums"><?php echo((isset($this->_rootref['L_COPY_PERMISSIONS_TO'])) ? $this->_rootref['L_COPY_PERMISSIONS_TO'] : ((isset($user->lang['COPY_PERMISSIONS_TO'])) ? $user->lang['COPY_PERMISSIONS_TO'] : '{ COPY_PERMISSIONS_TO }')); ?>
                        :</label><br/><span><?php echo((isset($this->_rootref['L_COPY_PERMISSIONS_FORUM_TO_EXPLAIN'])) ? $this->_rootref['L_COPY_PERMISSIONS_FORUM_TO_EXPLAIN'] : ((isset($user->lang['COPY_PERMISSIONS_FORUM_TO_EXPLAIN'])) ? $user->lang['COPY_PERMISSIONS_FORUM_TO_EXPLAIN'] : '{ COPY_PERMISSIONS_FORUM_TO_EXPLAIN }')); ?></span>
                </dt>
                <dd><select id="dest_forums" name="dest_forum_ids[]" multiple="multiple"
                            size="10"><?php echo (isset($this->_rootref['S_FORUM_OPTIONS'])) ? $this->_rootref['S_FORUM_OPTIONS'] : ''; ?></select>
                </dd>
            </dl>
        </fieldset>

        <fieldset class="submit-buttons">
            <legend><?php echo((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?></legend>
            <input class="button1" type="submit" id="submit" name="submit"
                   value="<?php echo((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>"/>&nbsp;
            <input class="button2" type="reset" id="reset" name="reset"
                   value="<?php echo((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>"/>
            <?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

            <?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

        </fieldset>

    </form>

<?php $this->_tpl_include('overall_footer.html'); ?>