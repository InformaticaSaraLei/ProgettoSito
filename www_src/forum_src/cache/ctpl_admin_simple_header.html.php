<?php if (!defined('IN_PHPBB')) exit; ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>"
      lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>"
      xml:lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>">
<head>

    <meta http-equiv="Content-Type"
          content="text/html; charset=<?php echo (isset($this->_rootref['S_CONTENT_ENCODING'])) ? $this->_rootref['S_CONTENT_ENCODING'] : ''; ?>"/>
    <meta http-equiv="Content-Style-Type" content="text/css"/>
    <meta http-equiv="Content-Language"
          content="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>"/>
    <meta http-equiv="imagetoolbar" content="no"/>
    <?php if ($this->_rootref['META']) {
        echo (isset($this->_rootref['META'])) ? $this->_rootref['META'] : '';
    } ?>

    <title><?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>

    <link href="style/admin.css" rel="stylesheet" type="text/css" media="screen"/>

    <script type="text/javascript">
        // <![CDATA[
        var jump_page = '<?php echo ((isset($this->_rootref['LA_JUMP_PAGE'])) ? $this->_rootref['LA_JUMP_PAGE'] : ((isset($this->_rootref['L_JUMP_PAGE'])) ? addslashes($this->_rootref['L_JUMP_PAGE']) : ((isset($user->lang['JUMP_PAGE'])) ? addslashes($user->lang['JUMP_PAGE']) : '{ JUMP_PAGE }'))); ?>:';
        var on_page = '<?php echo (isset($this->_rootref['ON_PAGE'])) ? $this->_rootref['ON_PAGE'] : ''; ?>';
        var per_page = '<?php echo (isset($this->_rootref['PER_PAGE'])) ? $this->_rootref['PER_PAGE'] : ''; ?>';
        var base_url = '<?php echo (isset($this->_rootref['A_BASE_URL'])) ? $this->_rootref['A_BASE_URL'] : ''; ?>';

        /**
         * Window popup
         */
        function popup(url, width, height, name) {
            if (!name) {
                name = '_popup';
            }

            window.open(url.replace(/&amp;/g, '&'), name, 'height=' + height + ',resizable=yes,scrollbars=yes, width=' + width);
            return false;
        }

        /**
         * Jump to page
         */
        function jumpto() {
            var page = prompt(jump_page, on_page);

            if (page !== null && !isNaN(page) && page == Math.floor(page) && page > 0) {
                if (base_url.indexOf('?') == -1) {
                    document.location.href = base_url + '?start=' + ((page - 1) * per_page);
                }
                else {
                    document.location.href = base_url.replace(/&amp;/g, '&') + '&start=' + ((page - 1) * per_page);
                }
            }
        }

        /**
         * Set display of page element
         * s[-1,0,1] = hide,toggle display,show
         */
        function dE(n, s, type) {
            if (!type) {
                type = 'block';
            }

            var e = document.getElementById(n);
            if (!s) {
                s = (e.style.display == '') ? -1 : 1;
            }
            e.style.display = (s == 1) ? type : 'none';
        }

        /**
         * Mark/unmark checkboxes
         * id = ID of parent container, name = name prefix, state = state [true/false]
         */
        function marklist(id, name, state) {
            var parent = document.getElementById(id);
            if (!parent) {
                return;
            }

            var rb = parent.getElementsByTagName('input');

            for (var r = 0; r < rb.length; r++) {
                if (rb[r].name.substr(0, name.length) == name) {
                    rb[r].checked = state;
                }
            }
        }

        /**
         * Find a member
         */
        function find_username(url) {
            popup(url, 760, 570, '_usersearch');
            return false;
        }

        // ]]>
    </script>
</head>

<body
    class="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>">

<div id="page-body" class="simple-page-body">