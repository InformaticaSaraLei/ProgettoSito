<?php if (!defined('IN_PHPBB')) exit; ?>
<div
    style="text-align: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">
    <a href="#"
       onclick="self.close(); return false;"><?php echo((isset($this->_rootref['L_CLOSE_WINDOW'])) ? $this->_rootref['L_CLOSE_WINDOW'] : ((isset($user->lang['CLOSE_WINDOW'])) ? $user->lang['CLOSE_WINDOW'] : '{ CLOSE_WINDOW }')); ?></a>
</div>
<br/><br/>
</div>

<div id="page-footer">

    <?php if ($this->_rootref['S_COPYRIGHT_HTML']) { ?>

        <br/><?php echo (isset($this->_rootref['CREDIT_LINE'])) ? $this->_rootref['CREDIT_LINE'] : ''; ?>

        <?php if ($this->_rootref['TRANSLATION_INFO']) { ?>
            <br/><?php echo (isset($this->_rootref['TRANSLATION_INFO'])) ? $this->_rootref['TRANSLATION_INFO'] : '';
        }
    }
    if ($this->_rootref['DEBUG_OUTPUT']) {
        if ($this->_rootref['S_COPYRIGHT_HTML']) { ?><br/><br/><?php } ?>

        <?php echo (isset($this->_rootref['DEBUG_OUTPUT'])) ? $this->_rootref['DEBUG_OUTPUT'] : ''; ?>

    <?php } ?>


</div>

</body>
</html>