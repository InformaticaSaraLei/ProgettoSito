<?php
/**
 *
 * This file is part of the phpBB Forum Software package.
 *
 * @copyright (c) phpBB Limited <https://www.phpbb.com>
 * @copyright (c) 2010 phpBB.it
 * @copyright (c) 2014 phpBBItalia.net <http://www.phpbbitalia.net>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * For full copyright and license information, please see
 * the docs/CREDITS.txt file.
 *
 */

if (!defined('IN_PHPBB')) {
    exit;
}

/**
 * DO NOT CHANGE
 */
if (empty($lang) || !is_array($lang)) {
    $lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
    'CLI_CONFIG_CANNOT_CACHED' => 'Imposta questa opzione se la configurazione cambia troppo spesso per essere memorizzata nella cache in modo efficiente.',
    'CLI_CONFIG_CURRENT' => 'Valore di configurazione corrente; utilizza 0 e 1 per specificare valori booleani',
    'CLI_CONFIG_DELETE_SUCCESS' => 'Config %s cancellato con successo.',
    'CLI_CONFIG_NEW' => 'Nuovo valore di configurazione; utilizza 0 e 1 per specificare valori booleani',
    'CLI_CONFIG_NOT_EXISTS' => 'Config %s non esiste',
    'CLI_CONFIG_OPTION_NAME' => 'Configurazione dell’opzione del nome',
    'CLI_CONFIG_PRINT_WITHOUT_NEWLINE' => 'Impostare questa opzione se il valore deve essere stampato senza una nuova riga alla fine.',
    'CLI_CONFIG_INCREMENT_BY' => 'Importo incrementabile da',
    'CLI_CONFIG_INCREMENT_SUCCESS' => 'Config %s incrementato con successo',
    'CLI_CONFIG_SET_FAILURE' => 'Impossibile settare il config %s',
    'CLI_CONFIG_SET_SUCCESS' => 'Impostato con successo il config %s',

    'CLI_DESCRIPTION_CRON_LIST' => 'Consenti di visualizzare un elenco di operazioni pianificate pronte o meno.',
    'CLI_DESCRIPTION_CRON_RUN' => 'Esegue tutte le operazioni pianificate pronte.',
    'CLI_DESCRIPTION_CRON_RUN_ARGUMENT_1' => 'Nome dell’operazione da eseguire',
    'CLI_DESCRIPTION_DB_MIGRATE' => 'Aggiorna il database mediante l’applicazione delle migrazioni.',
    'CLI_DESCRIPTION_DELETE_CONFIG' => 'Elimina un’opzione di configurazione',
    'CLI_DESCRIPTION_DISABLE_EXTENSION' => 'Disabilita l’estensione specificata.',
    'CLI_DESCRIPTION_ENABLE_EXTENSION' => 'Abilita l’estensione specificata.',
    'CLI_DESCRIPTION_FIND_MIGRATIONS' => 'Trova i migrazioni non dipendenti.',
    'CLI_DESCRIPTION_GET_CONFIG' => 'Ottieni il valore di un’opzione di configurazione',
    'CLI_DESCRIPTION_INCREMENT_CONFIG' => 'Incrementa il valore di un’opzione di configurazione',
    'CLI_DESCRIPTION_LIST_EXTENSIONS' => 'Elenca tutti le estensioni del database e sul filesystem.',
    'CLI_DESCRIPTION_OPTION_SAFE_MODE' => 'Esegui in modalità provvisoria (senza estensioni).',
    'CLI_DESCRIPTION_OPTION_SHELL' => 'Avvia la shell.',
    'CLI_DESCRIPTION_PURGE_EXTENSION' => 'Elimina l’estensione specificata.',
    'CLI_DESCRIPTION_RECALCULATE_EMAIL_HASH' => 'Ricalcola la colonna user_email_hash della tabella users.',
    'CLI_DESCRIPTION_SET_ATOMIC_CONFIG' => 'Imposta il valore di un’opzione di configurazione solo se il vecchio corrisponde al valore corrente',
    'CLI_DESCRIPTION_SET_CONFIG' => 'Imposta il valore di un’opzione di configurazione',

    'CLI_EXTENSION_DISABLE_FAILURE' => 'Impossibile disabilitare l’estensione %s',
    'CLI_EXTENSION_DISABLE_SUCCESS' => 'Estensione %s disabilitata con successo',
    'CLI_EXTENSION_ENABLE_FAILURE' => 'Impossibile abilitare l’estensione %s',
    'CLI_EXTENSION_ENABLE_SUCCESS' => 'Estensione %s abilitata con successo',
    'CLI_EXTENSION_NAME' => 'Nome dell’estensione',
    'CLI_EXTENSION_PURGE_FAILURE' => 'Impossibile eliminare l’estensione %s',
    'CLI_EXTENSION_PURGE_SUCCESS' => 'Estensione %s eliminata con successo',
    'CLI_EXTENSION_NOT_FOUND' => 'Non sono state trovate estensioni.',
    'CLI_EXTENSIONS_AVAILABLE' => 'Disponibile',
    'CLI_EXTENSIONS_DISABLED' => 'Disabilitato',
    'CLI_EXTENSIONS_ENABLED' => 'Abilitato',

    'CLI_FIXUP_RECALCULATE_EMAIL_HASH_SUCCESS' => 'Ricalcolati con successo tutti gli hash delle email.',
));
