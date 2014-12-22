<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Benvenuto su “<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>”

<?php echo (isset($this->_rootref['WELCOME_MSG'])) ? $this->_rootref['WELCOME_MSG'] : ''; ?>


    Per favore conserva questa email con le informazioni del tuo account:

    ----------------------------
    Nome utente: <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>


    URL Board: <?php echo (isset($this->_rootref['U_BOARD'])) ? $this->_rootref['U_BOARD'] : ''; ?>

    ----------------------------

    Non scordare la tua password, non sarà possibile recuperarla dal nostro database in quanto viene criptata. In caso di smarrimento della stessa, sarà comunque possibile richiederne una nuova dalla pagina di login, utilizzando l’indirizzo email associato al tuo account.

    Grazie per esserti iscritto.

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>