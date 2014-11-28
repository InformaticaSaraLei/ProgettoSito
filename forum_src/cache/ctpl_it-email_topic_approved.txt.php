<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Argomento approvato - “<?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?>”

Ciao <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>,

ricevi questa notifica perché il tuo argomento “<?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?>” su “<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>” è stato approvato da un moderatore o da un amministratore:

Se vuoi vedere il tuo argomento clicca sul link seguente:
<?php echo (isset($this->_rootref['U_VIEW_TOPIC'])) ? $this->_rootref['U_VIEW_TOPIC'] : ''; ?>


<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>