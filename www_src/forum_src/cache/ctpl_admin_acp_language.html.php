<?php if (!defined('IN_PHPBB')) exit;
$this->_tpl_include('overall_header.html'); ?>


    <a name="maincontent"></a>

<?php if ($this->_rootref['S_SELECT_METHOD']) { ?>


    <a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>"
       style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">&laquo; <?php echo((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a>

    <h1><?php echo((isset($this->_rootref['L_SELECT_DOWNLOAD_FORMAT'])) ? $this->_rootref['L_SELECT_DOWNLOAD_FORMAT'] : ((isset($user->lang['SELECT_DOWNLOAD_FORMAT'])) ? $user->lang['SELECT_DOWNLOAD_FORMAT'] : '{ SELECT_DOWNLOAD_FORMAT }')); ?></h1>

    <form id="selectmethod" method="post"
          action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

        <fieldset>
            <legend><?php echo((isset($this->_rootref['L_DOWNLOAD_AS'])) ? $this->_rootref['L_DOWNLOAD_AS'] : ((isset($user->lang['DOWNLOAD_AS'])) ? $user->lang['DOWNLOAD_AS'] : '{ DOWNLOAD_AS }')); ?></legend>
            <dl>
                <dt><label
                        for="use_method"><?php echo((isset($this->_rootref['L_DOWNLOAD_AS'])) ? $this->_rootref['L_DOWNLOAD_AS'] : ((isset($user->lang['DOWNLOAD_AS'])) ? $user->lang['DOWNLOAD_AS'] : '{ DOWNLOAD_AS }')); ?>
                        :</label></dt>
                <dd><?php echo (isset($this->_rootref['RADIO_BUTTONS'])) ? $this->_rootref['RADIO_BUTTONS'] : ''; ?></dd>
            </dl>

            <p class="quick">
                <input type="submit" class="button2"
                       value="<?php echo((isset($this->_rootref['L_DOWNLOAD'])) ? $this->_rootref['L_DOWNLOAD'] : ((isset($user->lang['DOWNLOAD'])) ? $user->lang['DOWNLOAD'] : '{ DOWNLOAD }')); ?>"
                       name="download"/>
            </p>
        </fieldset>

    </form>

<?php } else if ($this->_rootref['S_DETAILS']) { ?>


    <a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>"
       style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">&laquo; <?php echo((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a>

    <h1><?php echo((isset($this->_rootref['L_LANGUAGE_PACK_DETAILS'])) ? $this->_rootref['L_LANGUAGE_PACK_DETAILS'] : ((isset($user->lang['LANGUAGE_PACK_DETAILS'])) ? $user->lang['LANGUAGE_PACK_DETAILS'] : '{ LANGUAGE_PACK_DETAILS }')); ?></h1>

    <form id="details" method="post"
          action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

        <fieldset>
            <legend><?php echo (isset($this->_rootref['LANG_LOCAL_NAME'])) ? $this->_rootref['LANG_LOCAL_NAME'] : ''; ?></legend>
            <dl>
                <dt><label
                        for="lang_english_name"><?php echo((isset($this->_rootref['L_LANG_ENGLISH_NAME'])) ? $this->_rootref['L_LANG_ENGLISH_NAME'] : ((isset($user->lang['LANG_ENGLISH_NAME'])) ? $user->lang['LANG_ENGLISH_NAME'] : '{ LANG_ENGLISH_NAME }')); ?>
                        :</label></dt>
                <dd><input type="text" id="lang_english_name" name="lang_english_name"
                           value="<?php echo (isset($this->_rootref['LANG_ENGLISH_NAME'])) ? $this->_rootref['LANG_ENGLISH_NAME'] : ''; ?>"
                           maxlength="100"/></dd>
            </dl>
            <dl>
                <dt><label
                        for="lang_local_name"><?php echo((isset($this->_rootref['L_LANG_LOCAL_NAME'])) ? $this->_rootref['L_LANG_LOCAL_NAME'] : ((isset($user->lang['LANG_LOCAL_NAME'])) ? $user->lang['LANG_LOCAL_NAME'] : '{ LANG_LOCAL_NAME }')); ?>
                        :</label></dt>
                <dd><input type="text" id="lang_local_name" name="lang_local_name"
                           value="<?php echo (isset($this->_rootref['LANG_LOCAL_NAME'])) ? $this->_rootref['LANG_LOCAL_NAME'] : ''; ?>"
                           maxlength="255"/></dd>
            </dl>
            <dl>
                <dt>
                    <label><?php echo((isset($this->_rootref['L_LANG_ISO_CODE'])) ? $this->_rootref['L_LANG_ISO_CODE'] : ((isset($user->lang['LANG_ISO_CODE'])) ? $user->lang['LANG_ISO_CODE'] : '{ LANG_ISO_CODE }')); ?>
                        :</label></dt>
                <dd>
                    <strong><?php echo (isset($this->_rootref['LANG_ISO'])) ? $this->_rootref['LANG_ISO'] : ''; ?></strong>
                </dd>
            </dl>
            <dl>
                <dt><label
                        for="lang_author"><?php echo((isset($this->_rootref['L_LANG_AUTHOR'])) ? $this->_rootref['L_LANG_AUTHOR'] : ((isset($user->lang['LANG_AUTHOR'])) ? $user->lang['LANG_AUTHOR'] : '{ LANG_AUTHOR }')); ?>
                        :</label></dt>
                <dd><input type="text" id="lang_author" name="lang_author"
                           value="<?php echo (isset($this->_rootref['LANG_AUTHOR'])) ? $this->_rootref['LANG_AUTHOR'] : ''; ?>"
                           maxlength="255"/></dd>
            </dl>

            <p class="quick" style="margin-top: -15px;">
                <input type="submit" name="update_details" class="button2"
                       value="<?php echo((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>"/>
            </p>
            <?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

        </fieldset>
    </form>

    <br/><br/>

    <?php if ($this->_rootref['S_MISSING_FILES']) { ?>

        <div class="errorbox">
            <h3><?php echo((isset($this->_rootref['L_MISSING_FILES'])) ? $this->_rootref['L_MISSING_FILES'] : ((isset($user->lang['MISSING_FILES'])) ? $user->lang['MISSING_FILES'] : '{ MISSING_FILES }')); ?></h3>

            <p><?php echo (isset($this->_rootref['MISSING_FILES'])) ? $this->_rootref['MISSING_FILES'] : ''; ?></p>
        </div>
        <br/><br/>
    <?php }
    if ($this->_rootref['S_MISSING_VARS']) { ?>

        <h1><?php echo((isset($this->_rootref['L_MISSING_LANG_VARIABLES'])) ? $this->_rootref['L_MISSING_LANG_VARIABLES'] : ((isset($user->lang['MISSING_LANG_VARIABLES'])) ? $user->lang['MISSING_LANG_VARIABLES'] : '{ MISSING_LANG_VARIABLES }')); ?></h1>

        <p><?php echo((isset($this->_rootref['L_MISSING_VARS_EXPLAIN'])) ? $this->_rootref['L_MISSING_VARS_EXPLAIN'] : ((isset($user->lang['MISSING_VARS_EXPLAIN'])) ? $user->lang['MISSING_VARS_EXPLAIN'] : '{ MISSING_VARS_EXPLAIN }')); ?></p>

        <form id="missing" method="post"
              action="<?php echo (isset($this->_rootref['U_MISSING_ACTION'])) ? $this->_rootref['U_MISSING_ACTION'] : ''; ?>">

            <table cellspacing="1">
                <thead>
                <tr>
                    <th><?php echo((isset($this->_rootref['L_LANGUAGE_KEY'])) ? $this->_rootref['L_LANGUAGE_KEY'] : ((isset($user->lang['LANGUAGE_KEY'])) ? $user->lang['LANGUAGE_KEY'] : '{ LANGUAGE_KEY }')); ?></th>
                    <th><?php echo((isset($this->_rootref['L_LANGUAGE_VARIABLE'])) ? $this->_rootref['L_LANGUAGE_VARIABLE'] : ((isset($user->lang['LANGUAGE_VARIABLE'])) ? $user->lang['LANGUAGE_VARIABLE'] : '{ LANGUAGE_VARIABLE }')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $_missing_count = (isset($this->_tpldata['missing'])) ? sizeof($this->_tpldata['missing']) : 0;
                if ($_missing_count) {
                    for ($_missing_i = 0; $_missing_i < $_missing_count; ++$_missing_i) {
                        $_missing_val = &$this->_tpldata['missing'][$_missing_i]; ?>

                        <tr class="row4">
                            <td><strong><?php echo $_missing_val['FILE']; ?></strong></td>
                            <td style="text-align: right;"><input type="submit"
                                                                  name="missing_file[<?php echo $_missing_val['KEY']; ?>]"
                                                                  value="<?php echo((isset($this->_rootref['L_SELECT'])) ? $this->_rootref['L_SELECT'] : ((isset($user->lang['SELECT'])) ? $user->lang['SELECT'] : '{ SELECT }')); ?>"
                                                                  class="button2"/></td>
                        </tr>
                        <?php echo $_missing_val['TPL']; ?>

                    <?php }
                } ?>

                </tbody>
            </table>
            <div><?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?></div>
        </form>

        <br/><br/>
    <?php } ?>


    <a name="entries"></a>

    <h1><?php echo((isset($this->_rootref['L_LANGUAGE_ENTRIES'])) ? $this->_rootref['L_LANGUAGE_ENTRIES'] : ((isset($user->lang['LANGUAGE_ENTRIES'])) ? $user->lang['LANGUAGE_ENTRIES'] : '{ LANGUAGE_ENTRIES }')); ?></h1>

    <p><?php echo((isset($this->_rootref['L_LANGUAGE_ENTRIES_EXPLAIN'])) ? $this->_rootref['L_LANGUAGE_ENTRIES_EXPLAIN'] : ((isset($user->lang['LANGUAGE_ENTRIES_EXPLAIN'])) ? $user->lang['LANGUAGE_ENTRIES_EXPLAIN'] : '{ LANGUAGE_ENTRIES_EXPLAIN }')); ?></p>

    <form id="lang_entries" method="post"
          action="<?php echo (isset($this->_rootref['U_ENTRY_ACTION'])) ? $this->_rootref['U_ENTRY_ACTION'] : ''; ?>">

        <?php if ($this->_rootref['S_FROM_STORE']) { ?>

            <fieldset class="quick"
                      style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>;">
                <input type="submit" name="remove_store"
                       value="<?php echo((isset($this->_rootref['L_REMOVE_FROM_STORAGE_FOLDER'])) ? $this->_rootref['L_REMOVE_FROM_STORAGE_FOLDER'] : ((isset($user->lang['REMOVE_FROM_STORAGE_FOLDER'])) ? $user->lang['REMOVE_FROM_STORAGE_FOLDER'] : '{ REMOVE_FROM_STORAGE_FOLDER }')); ?>"
                       class="button2"/>
            </fieldset>
        <?php } ?>


        <fieldset class="quick"
                  style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">
            <select
                name="language_file"><?php echo (isset($this->_rootref['S_LANG_OPTIONS'])) ? $this->_rootref['S_LANG_OPTIONS'] : ''; ?></select>&nbsp;<input
                type="submit" class="button2" name="change"
                value="<?php echo((isset($this->_rootref['L_SELECT'])) ? $this->_rootref['L_SELECT'] : ((isset($user->lang['SELECT'])) ? $user->lang['SELECT'] : '{ SELECT }')); ?>"/>
        </fieldset>

        <p>&nbsp;<br/>&nbsp;</p>


        <!--[if lt IE 8]>
        <style type="text/css">
            /* <![CDATA[ */
		input.langvalue, textarea.langvalue {
		width: 450px;
		}
	/* ]]> */
	</style>
	<![endif]-->

        <table cellspacing="1">
            <thead>
            <?php if ($this->_rootref['S_EMAIL_FILE']) { ?>

                <tr>
                    <th colspan="2"><?php echo((isset($this->_rootref['L_FILE_CONTENTS'])) ? $this->_rootref['L_FILE_CONTENTS'] : ((isset($user->lang['FILE_CONTENTS'])) ? $user->lang['FILE_CONTENTS'] : '{ FILE_CONTENTS }')); ?></th>
                </tr>
            <?php } else { ?>

                <tr>
                    <th><?php echo((isset($this->_rootref['L_LANGUAGE_KEY'])) ? $this->_rootref['L_LANGUAGE_KEY'] : ((isset($user->lang['LANGUAGE_KEY'])) ? $user->lang['LANGUAGE_KEY'] : '{ LANGUAGE_KEY }')); ?></th>
                    <th><?php echo((isset($this->_rootref['L_LANGUAGE_VARIABLE'])) ? $this->_rootref['L_LANGUAGE_VARIABLE'] : ((isset($user->lang['LANGUAGE_VARIABLE'])) ? $user->lang['LANGUAGE_VARIABLE'] : '{ LANGUAGE_VARIABLE }')); ?></th>
                </tr>
            <?php } ?>

            <tr>
                <td rowspan="2" class="row3">
                    <strong><?php echo (isset($this->_rootref['PRINT_MESSAGE'])) ? $this->_rootref['PRINT_MESSAGE'] : '';
                        if ($this->_rootref['S_FROM_STORE']) { ?><br/><span
                            style="color: red;"><?php echo((isset($this->_rootref['L_FILE_FROM_STORAGE'])) ? $this->_rootref['L_FILE_FROM_STORAGE'] : ((isset($user->lang['FILE_FROM_STORAGE'])) ? $user->lang['FILE_FROM_STORAGE'] : '{ FILE_FROM_STORAGE }')); ?></span><?php } ?>
                    </strong></td>
                <td class="row3" style="text-align: right;"><input type="submit" name="download_file" class="button2"
                                                                   value="<?php echo((isset($this->_rootref['L_SUBMIT_AND_DOWNLOAD'])) ? $this->_rootref['L_SUBMIT_AND_DOWNLOAD'] : ((isset($user->lang['SUBMIT_AND_DOWNLOAD'])) ? $user->lang['SUBMIT_AND_DOWNLOAD'] : '{ SUBMIT_AND_DOWNLOAD }')); ?>"/>&nbsp;&nbsp;<input
                        type="submit" name="submit_file" class="button2"
                        value="<?php echo((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>"/>
                </td>
            </tr>
            <tr>
                <td class="row3" style="text-align: right;">
                    <?php if ($this->_rootref['ALLOW_UPLOAD']) { ?>&nbsp;&nbsp;<?php echo((isset($this->_rootref['L_UPLOAD_METHOD'])) ? $this->_rootref['L_UPLOAD_METHOD'] : ((isset($user->lang['UPLOAD_METHOD'])) ? $user->lang['UPLOAD_METHOD'] : '{ UPLOAD_METHOD }')); ?>:&nbsp;<?php $_buttons_count = (isset($this->_tpldata['buttons'])) ? sizeof($this->_tpldata['buttons']) : 0;
                        if ($_buttons_count) {
                            for ($_buttons_i = 0; $_buttons_i < $_buttons_count; ++$_buttons_i) {
                                $_buttons_val = &$this->_tpldata['buttons'][$_buttons_i]; ?><input type="radio"
                                                                                                   class="radio"<?php if ($_buttons_val['S_FIRST_ROW']) { ?> id="method" checked="checked"<?php } ?>
                                                                                                   value="<?php echo $_buttons_val['VALUE']; ?>"
                                                                                                   name="method" />&nbsp;<?php echo $_buttons_val['VALUE']; ?>&nbsp;<?php }
                        } ?><input type="submit" name="upload_file" class="button2"
                                   value="<?php echo((isset($this->_rootref['L_SUBMIT_AND_UPLOAD'])) ? $this->_rootref['L_SUBMIT_AND_UPLOAD'] : ((isset($user->lang['SUBMIT_AND_UPLOAD'])) ? $user->lang['SUBMIT_AND_UPLOAD'] : '{ SUBMIT_AND_UPLOAD }')); ?>" /><?php } ?>
                </td>
            </tr>
            </thead>
            <tbody>
            <?php if ($this->_rootref['S_EMAIL_FILE']) { ?>

                <tr>
                    <td class="row2" colspan="2" style="text-align: center;"><textarea name="entry" id="entry" cols="80"
                                                                                       rows="20"><?php echo (isset($this->_rootref['LANG'])) ? $this->_rootref['LANG'] : ''; ?></textarea>
                    </td>
                </tr>
            <?php } else { ?>

                <?php echo (isset($this->_rootref['TPL'])) ? $this->_rootref['TPL'] : ''; ?>

            <?php } ?>

            <tr>
                <td class="row3" colspan="3"
                    style="text-align: right;"><?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>
                    <input type="submit" name="download_file" class="button2"
                           value="<?php echo((isset($this->_rootref['L_SUBMIT_AND_DOWNLOAD'])) ? $this->_rootref['L_SUBMIT_AND_DOWNLOAD'] : ((isset($user->lang['SUBMIT_AND_DOWNLOAD'])) ? $user->lang['SUBMIT_AND_DOWNLOAD'] : '{ SUBMIT_AND_DOWNLOAD }')); ?>"/>&nbsp;&nbsp;<input
                        type="submit" name="submit_file" class="button2"
                        value="<?php echo((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>"/>
                </td>
            </tr>
            </tbody>
        </table>
    </form>

<?php } else if ($this->_rootref['S_UPLOAD']) { ?>


    <a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>"
       style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">&laquo; <?php echo((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a>

    <h1><?php echo((isset($this->_rootref['L_UPLOAD_SETTINGS'])) ? $this->_rootref['L_UPLOAD_SETTINGS'] : ((isset($user->lang['UPLOAD_SETTINGS'])) ? $user->lang['UPLOAD_SETTINGS'] : '{ UPLOAD_SETTINGS }')); ?></h1>

    <form id="upload" method="post"
          action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

        <?php if ($this->_rootref['S_CONNECTION_SUCCESS']) { ?>

            <div class="successbox">
                <p><?php echo((isset($this->_rootref['L_CONNECTION_SUCCESS'])) ? $this->_rootref['L_CONNECTION_SUCCESS'] : ((isset($user->lang['CONNECTION_SUCCESS'])) ? $user->lang['CONNECTION_SUCCESS'] : '{ CONNECTION_SUCCESS }')); ?></p>
            </div>
        <?php } else if ($this->_rootref['S_CONNECTION_FAILED']) { ?>

            <div class="errorbox">
                <p><?php echo((isset($this->_rootref['L_CONNECTION_FAILED'])) ? $this->_rootref['L_CONNECTION_FAILED'] : ((isset($user->lang['CONNECTION_FAILED'])) ? $user->lang['CONNECTION_FAILED'] : '{ CONNECTION_FAILED }')); ?></p>
            </div>
        <?php } ?>


        <fieldset>
            <legend><?php echo((isset($this->_rootref['L_UPLOAD_SETTINGS'])) ? $this->_rootref['L_UPLOAD_SETTINGS'] : ((isset($user->lang['UPLOAD_SETTINGS'])) ? $user->lang['UPLOAD_SETTINGS'] : '{ UPLOAD_SETTINGS }')); ?></legend>
            <dl>
                <dt>
                    <label><?php echo((isset($this->_rootref['L_UPLOAD_METHOD'])) ? $this->_rootref['L_UPLOAD_METHOD'] : ((isset($user->lang['UPLOAD_METHOD'])) ? $user->lang['UPLOAD_METHOD'] : '{ UPLOAD_METHOD }')); ?>
                        :</label></dt>
                <dd><strong><?php echo (isset($this->_rootref['NAME'])) ? $this->_rootref['NAME'] : ''; ?></strong></dd>
            </dl>
            <?php $_data_count = (isset($this->_tpldata['data'])) ? sizeof($this->_tpldata['data']) : 0;
            if ($_data_count) {
                for ($_data_i = 0; $_data_i < $_data_count; ++$_data_i) {
                    $_data_val = &$this->_tpldata['data'][$_data_i]; ?>

                    <dl>
                        <dt><label for="<?php echo $_data_val['DATA']; ?>"><?php echo $_data_val['NAME']; ?>
                                :</label><br/><span><?php echo $_data_val['EXPLAIN']; ?></span></dt>
                        <dd><input
                                type="<?php if ($_data_val['DATA'] == ('password')) { ?>password<?php } else { ?>text<?php } ?>"
                                id="<?php echo $_data_val['DATA']; ?>" name="<?php echo $_data_val['DATA']; ?>"
                                value="<?php echo $_data_val['DEFAULT']; ?>"/></dd>
                    </dl>
                <?php }
            } ?>

        </fieldset>

        <fieldset class="quick">
            <?php echo (isset($this->_rootref['HIDDEN'])) ? $this->_rootref['HIDDEN'] : ''; ?>

            <?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

            <input class="button1" type="submit" name="update"
                   value="<?php echo((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>"/>
            <input class="button1" type="submit" name="test_connection"
                   value="<?php echo((isset($this->_rootref['L_TEST_CONNECTION'])) ? $this->_rootref['L_TEST_CONNECTION'] : ((isset($user->lang['TEST_CONNECTION'])) ? $user->lang['TEST_CONNECTION'] : '{ TEST_CONNECTION }')); ?>"/>
        </fieldset>
    </form>

<?php } else { ?>


    <h1><?php echo((isset($this->_rootref['L_ACP_LANGUAGE_PACKS'])) ? $this->_rootref['L_ACP_LANGUAGE_PACKS'] : ((isset($user->lang['ACP_LANGUAGE_PACKS'])) ? $user->lang['ACP_LANGUAGE_PACKS'] : '{ ACP_LANGUAGE_PACKS }')); ?></h1>

    <p><?php echo((isset($this->_rootref['L_ACP_LANGUAGE_PACKS_EXPLAIN'])) ? $this->_rootref['L_ACP_LANGUAGE_PACKS_EXPLAIN'] : ((isset($user->lang['ACP_LANGUAGE_PACKS_EXPLAIN'])) ? $user->lang['ACP_LANGUAGE_PACKS_EXPLAIN'] : '{ ACP_LANGUAGE_PACKS_EXPLAIN }')); ?></p>

    <table cellspacing="1">
        <thead>
        <tr>
            <th><?php echo((isset($this->_rootref['L_LANGUAGE_PACK_NAME'])) ? $this->_rootref['L_LANGUAGE_PACK_NAME'] : ((isset($user->lang['LANGUAGE_PACK_NAME'])) ? $user->lang['LANGUAGE_PACK_NAME'] : '{ LANGUAGE_PACK_NAME }')); ?></th>
            <th><?php echo((isset($this->_rootref['L_LANGUAGE_PACK_LOCALNAME'])) ? $this->_rootref['L_LANGUAGE_PACK_LOCALNAME'] : ((isset($user->lang['LANGUAGE_PACK_LOCALNAME'])) ? $user->lang['LANGUAGE_PACK_LOCALNAME'] : '{ LANGUAGE_PACK_LOCALNAME }')); ?></th>
            <th><?php echo((isset($this->_rootref['L_LANGUAGE_PACK_ISO'])) ? $this->_rootref['L_LANGUAGE_PACK_ISO'] : ((isset($user->lang['LANGUAGE_PACK_ISO'])) ? $user->lang['LANGUAGE_PACK_ISO'] : '{ LANGUAGE_PACK_ISO }')); ?></th>
            <th><?php echo((isset($this->_rootref['L_LANGUAGE_PACK_USED_BY'])) ? $this->_rootref['L_LANGUAGE_PACK_USED_BY'] : ((isset($user->lang['LANGUAGE_PACK_USED_BY'])) ? $user->lang['LANGUAGE_PACK_USED_BY'] : '{ LANGUAGE_PACK_USED_BY }')); ?></th>
            <th><?php echo((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="row3" colspan="5">
                <strong><?php echo((isset($this->_rootref['L_INSTALLED_LANGUAGE_PACKS'])) ? $this->_rootref['L_INSTALLED_LANGUAGE_PACKS'] : ((isset($user->lang['INSTALLED_LANGUAGE_PACKS'])) ? $user->lang['INSTALLED_LANGUAGE_PACKS'] : '{ INSTALLED_LANGUAGE_PACKS }')); ?></strong>
            </td>
        </tr>
        <?php $_lang_count = (isset($this->_tpldata['lang'])) ? sizeof($this->_tpldata['lang']) : 0;
        if ($_lang_count) {
            for ($_lang_i = 0; $_lang_i < $_lang_count; ++$_lang_i) {
                $_lang_val = &$this->_tpldata['lang'][$_lang_i];
                if (!($_lang_val['S_ROW_COUNT'] & 1)) { ?>
                    <tr class="row1"><?php } else { ?><tr class="row2"><?php } ?>

                <td>
                    <a href="<?php echo $_lang_val['U_DETAILS']; ?>"><?php echo $_lang_val['ENGLISH_NAME']; ?></a> <?php echo $_lang_val['TAG']; ?>
                </td>
                <td><?php echo $_lang_val['LOCAL_NAME']; ?></td>
                <td style="text-align: center;"><strong><?php echo $_lang_val['ISO']; ?></strong></td>
                <td style="text-align: center;"><?php echo $_lang_val['USED_BY']; ?></td>
                <td style="text-align: center;">&nbsp;<a
                        href="<?php echo $_lang_val['U_DOWNLOAD']; ?>"><?php echo((isset($this->_rootref['L_DOWNLOAD'])) ? $this->_rootref['L_DOWNLOAD'] : ((isset($user->lang['DOWNLOAD'])) ? $user->lang['DOWNLOAD'] : '{ DOWNLOAD }')); ?></a>&nbsp;|&nbsp;<a
                        href="<?php echo $_lang_val['U_DELETE']; ?>"><?php echo((isset($this->_rootref['L_DELETE'])) ? $this->_rootref['L_DELETE'] : ((isset($user->lang['DELETE'])) ? $user->lang['DELETE'] : '{ DELETE }')); ?></a>
                </td>
                </tr>
            <?php }
        }
        if (sizeof($this->_tpldata['notinst'])) { ?>

            <tr>
                <td class="row3" colspan="5">
                    <strong><?php echo((isset($this->_rootref['L_UNINSTALLED_LANGUAGE_PACKS'])) ? $this->_rootref['L_UNINSTALLED_LANGUAGE_PACKS'] : ((isset($user->lang['UNINSTALLED_LANGUAGE_PACKS'])) ? $user->lang['UNINSTALLED_LANGUAGE_PACKS'] : '{ UNINSTALLED_LANGUAGE_PACKS }')); ?></strong>
                </td>
            </tr>
        <?php }
        $_notinst_count = (isset($this->_tpldata['notinst'])) ? sizeof($this->_tpldata['notinst']) : 0;
        if ($_notinst_count) {
            for ($_notinst_i = 0; $_notinst_i < $_notinst_count; ++$_notinst_i) {
                $_notinst_val = &$this->_tpldata['notinst'][$_notinst_i];
                if (!($_notinst_val['S_ROW_COUNT'] & 1)) { ?>
                    <tr class="row1"><?php } else { ?><tr class="row2"><?php } ?>

                <td><?php echo $_notinst_val['NAME']; ?></td>
                <td><?php echo $_notinst_val['LOCAL_NAME']; ?></td>
                <td style="text-align: center;"><strong><?php echo $_notinst_val['ISO']; ?></strong></td>
                <td colspan="2" style="text-align: center;"><a
                        href="<?php echo $_notinst_val['U_INSTALL']; ?>"><?php echo((isset($this->_rootref['L_INSTALL'])) ? $this->_rootref['L_INSTALL'] : ((isset($user->lang['INSTALL'])) ? $user->lang['INSTALL'] : '{ INSTALL }')); ?></a>
                </td>
                </tr>
            <?php }
        } ?>

        </tbody>
    </table>

<?php }
$this->_tpl_include('overall_footer.html'); ?>