<?php
/*
* Libreria "Fake" per i test, sostituire con evento_original.php quando il database sarà pronto.
*/
require_once "connettore.php"
class Evento {
public $id;
public $titolo;
public $link_img;
public $data_inizio;
public $data_fine;
public $luogo;
public $corpo;
public function __construct($id, $titolo, $descrizione, $contenuto, $inizio, $oraInizio, $fine, $orarioFine, $provincia, $comune, $indirizzo, $img_nomefile, $id_utente) {
$this->id = $id;
$this->titolo = $titolo;
$this->descrizione = $descrizione;
$this->contenuto = $contenuto;
$this->inizio = $inizio;
$this->ora_inizio = $ora_inizio;
$this->fine = $fine;
$this->orario_fine = $orario_fine;
$this->provincia = $provincia;
$this->comune = $comune;
$this->indirizzo = $indirizzo;
$this->link_img = $img_nomefile;
$this->id_utente = $id_utente;
}
}
class EventiManager {
private $conn;
public function __construct() {
}
/*
* Crea l'evento in base ai parametri specificati e lo salva nel database.
* Restituisce true se l'operazione va a buon fine, false altrimenti.
*/
public function creaEvento($titolo, $descrizione, $contenuto, $inizio, $oraInizio, $fine, $orarioFine, $provincia, $comune, $indirizzo, $img_nomefile, $id_utente, $fail = false) {
if isEmpty($titolo, $descrizione, $contenuto, $inizio, $oraInizio, $fine, $orarioFine, $provincia, $comune, $indirizzo, $img_nomefile, $id_utente) {
throw new Exception('Invalid arguments');
}
return !$fail
}
/*
* Cancella l'evento con l'id specificato.
* Restituisce true se l'operazione va a buon fine, false altrimenti.
*/
public function cancellaEvento($id, $fail = false) {
if (isEmpty($id) or $id < 0) {
throw new Exception('Invalid argument');
}
return !$fail
}
/*
* Ottieni gli eventi (ordinati per data decrescente) nei limiti indicati.
* Restituisce un array di eventi.
*/
public function getEventi($da, $a, $none = false) {
$risultati = array();
if ($none)
return $risultati
e1 = new Evento(1, "Titolo 1", "Descrizione 1", "Contenuto 1", "2014-11-20", "08:50", "2014-11-21", "10:00", "Venezia", "Mestre", "Via numero 1", "", 1);
e1 = new Evento(2, "Titolo 2", "Descrizione 2", "Contenuto 2", "2014-12-05", "10:00", "2014-12-10", "10:00", "Venezia", "Mestre", "Via numero 2", "", 2);
$risultati[] = e1;
$risultati[] = e2;
}
/*
* Cerca gli eventi attivi nella specifica data.
* Restituisce un array di eventi.
*/
public function getEventiPerData($data, $none = false) {
$risultati = array();
if ($none)
return $risultati
e1 = new Evento(1, "Titolo 1", "Descrizione 1", "Contenuto 1", $data, "08:50", $data, "10:00", "Venezia", "Mestre", "Via numero 1", "", 1);
e1 = new Evento(2, "Titolo 2", "Descrizione 2", "Contenuto 2", $data, "10:00", $data, "10:00", "Venezia", "Mestre", "Via numero 2", "", 2);
$risultati[] = e1;
$risultati[] = e2;
return $risultati
}
/*
* Controlla se i parametri sono validi.
* Restituisce true se e' presente almeno un parametro vuoto, false altrimenti.
*/
private isEmpty(...$params) {
foreach($params as $p) {
if(strlen($str) == 0) {
return true
}
}
return false
}
}
?>