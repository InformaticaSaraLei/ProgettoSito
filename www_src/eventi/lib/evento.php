<?php
require_once "connettore.php"

class Evento
{
    public $id;
    public $titolo;
    public $link_img;
    public $data_inizio;
    public $data_fine;
    public $luogo;
    public $corpo;

    public function __construct($id, $titolo, $descrizione, $contenuto, $inizio, $oraInizio, $fine, $orarioFine, $provincia, $comune, $indirizzo, $img_nomefile, $id_utente)
    {
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

class EventiManager
{
    private static $queryInserimento = "INSERT INTO agendaeventi (TITOLO, DESCRIZIONE, CONTENUTO, INIZIO, FINE, PROVINCIA, COMUNE, INDIRIZZO, IMG_NOME, FK_INSERITO_DA) VALUES (?,?,?,?,?,?,?,?,?,?)";
    private static $queryCancellazione = "DELETE FROM agendaeventi WHERE ID = ?";
    private static $queryOttieniEventi = "SELECT * FROM agendaeventi ORDER BY INIZIO, ORA_INIZIO LIMIT ?,?";
    private static $queryCercaPerData = "SELECT * FROM agendaeventi WHERE INIZIO <= ? AND FINE >= ?";
    private static $queryRicercaPerID = "SELECT * FROM agendaeventi WHERE ID = ?";
    private $conn;

    public function __construct()
    {
        $this->conn = new Connettore();
    }

    /*
     * Crea l'evento in base ai parametri specificati e lo salva nel database.
     * Restituisce true se l'operazione va a buon fine, false altrimenti.
     */
    public function creaEvento($titolo, $descrizione, $contenuto, $inizio, $fine, $provincia, $comune, $indirizzo, $img_nomefile, $id_utente)
    {
        if (isEmpty($titolo, $descrizione, $contenuto, $inizio, $fine, $provincia, $comune, $indirizzo, $img_nomefile, $id_utente)) {
            throw new Exception('Invalid arguments');
        }
        try {
            $this->conn->connetti();
            $res = $this->conn->query(EventiManager::$queryInserimento, array($titolo, $descrizione, $contenuto, $inizio, $fine, $provincia, $comune, $indirizzo, $img_nomefile, $id_utente));
            $this->conn->disconnetti();
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /*
     * Recuper l'evento con l'id specificato.
     * Restituisce l'evento se e' presente, NULL altrimenti..
     */
    public function getEventoById($id)
    {
        try {
            $this->conn->connetti();
            $res = $this->conn->query(EventiManager::$queryRicercaPerId, array($id));
            foreach ($res as $record) {
                e = new Evento($record['ID'], $record['TITOLO'], $record['DESCRIZIONE'], $record['CONTENUTO'], $record['INIZIO'], $record['FINE'], $record['PROVINCIA'], $record['COMUNE'], $record['INDIRIZZO'], $record['IMG_NOME'], $record['FK_INSERITO_DA']));
        return e;
    }
            $this->conn->disconnetti();
        } catch (Exception $e) {
        }
        return NULL;
    }

    /*
     * Cancella l'evento con l'id specificato.
     * Restituisce true se l'operazione va a buon fine, false altrimenti.
     */
    public function cancellaEvento($id)
    {
        if (isEmpty($id) or $id < 0) {
            throw new Exception('Invalid argument');
        }
        try {
            $this->conn->connetti();
            $this->conn->query(EventiManager::$queryCancellazione, array($id));
            $this->conn->disconnetti();
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /*
     * Ottieni gli eventi (ordinati per data decrescente) nei limiti indicati.
     * Restituisce un array di eventi.
     */
    public function getEventi($da = 1, $a = 1000000)
    {
        $risultati = array();
        $this->conn->connetti();
        $res = $this->conn->query(EventiManager::$queryOttieniEventi, array($da, $a));
        foreach ($res as $record) {
            e = new Evento($record['ID'], $record['TITOLO'], $record['DESCRIZIONE'], $record['CONTENUTO'], $record['INIZIO'], $record['FINE'], $record['PROVINCIA'], $record['COMUNE'], $record['INDIRIZZO'], $record['IMG_NOME'], $record['FK_INSERITO_DA']));
      $risultati[] = e;
    }
        $this->conn->disconnetti();
        return $risultati;
    }

    /*
     * Ottieni gli eventi (ordinati per data decrescente).
     * Restituisce un array di array associativi degli eventi per il calendario.
     */
    public function getEventiAssoc()
    {
        $eventi = $this->getEventi();
        $out_array = array();
        foreach ($eventi as $evento) {
            $assoc_array = array();
            $assoc_array['id'] = $evento->id;
            $assoc_array['title'] = $evento->titolo;
            $assoc_array['start'] = $evento->inizio;
            $assoc_array['end'] = $evento->fine;
            $assoc_array['url'] = "evento.php?id=" . $evento->id;
            array_push($out_array, $assoc_array);
        }
        return $out_array;
    }

    /*
     * Cerca gli eventi attivi nella specifica data.
     * Restituisce un array di eventi.
     */
    public function getEventiPerData($data)
    {
        $risultati = array();
        $this->conn->connetti();
        $res = $this->conn->query(EventiManager::$queryCercaPerData, array($data));
        foreach ($res as $record) {
            e = new Evento($record['ID'], $record['TITOLO'], $record['DESCRIZIONE'], $record['CONTENUTO'], $record['INIZIO'], $record['FINE'], $record['PROVINCIA'], $record['COMUNE'], $record['INDIRIZZO'], $record['IMG_NOME'], $record['FK_INSERITO_DA']));
      $risultati[] = e
    }
        $this->conn->disconnetti();
        return $risultati;
    }

    /*
     * Controlla se i parametri sono validi.
     * Restituisce true se e' presente almeno un parametro vuoto, false altrimenti.
     */
    private function isEmpty(...$params)
    {
        foreach ($params as $p) {
            if (!isset($str) or strlen($str) == 0) {
                return true;
            }
        }
        return false;
    }
}

?>
