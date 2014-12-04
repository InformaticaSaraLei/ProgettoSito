<?php
require_once "connettore.php";

class Evento
{
    public $id;
    public $titolo;
    public $descrizione;
    public $contenuto;
    public $inizio;
    public $fine;
    public $provincia;
    public $comune;
    public $indirizzo;
    public $link_img;
    public $id_utente;

    public function __construct($id, $titolo, $descrizione, $contenuto, $inizio, $fine, $provincia, $comune, $indirizzo, $img_nomefile, $id_utente)
    {
        $this->id = $id;
        $this->titolo = $titolo;
        $this->descrizione = $descrizione;
        $this->contenuto = $contenuto;
        $this->inizio = $inizio;
        $this->fine = $fine;
        $this->provincia = $provincia;
        $this->comune = $comune;
        $this->indirizzo = $indirizzo;
        $this->link_img = $img_nomefile;
        $this->id_utente = $id_utente;
    }

}

class EventiManager
{
    
    private $conn;

    public function __construct()
    {
        $this->conn = new Connettore();
    }

    /*
     * Crea l'evento in base ai parametri specificati e lo salva nel database.
     * Restituisce true se l'operazione va a buon fine, false altrimenti.
     */
     public function isEmpty($params)// potrebbe non essere suportato (...) da php < 5.6
      {
        foreach ($params as $p) {
            if (!isset($p) or strlen($p) == 0) {
                return true;
            }
        }
        return false;
    }

    public function creaEvento($titolo, $descrizione, $contenuto, $inizio, $fine, $provincia, $comune, $indirizzo, $img_nomefile, $id_utente)
    {
        if ($this->isEmpty(array($titolo, $descrizione, $contenuto, $inizio, $fine, $provincia, $comune, $indirizzo, $img_nomefile, $id_utente))) {
            throw new Exception('Invalid arguments');
        }
        try {
            return $this->conn->execAction("Insert INTO agendaeventi(TITOLO, DESCRIZIONE, CONTENUTO, INIZIO, FINE, PROVINCIA, COMUNE, INDIRIZZO, IMG_NOME, FK_INSERITO_DA)VALUES('".$titolo."','".$descrizione."','".$contenuto."','".$inizio."','".$fine."','".$provincia."','".$comune."','".$indirizzo."','".$img_nomefile."','".$id_utente."');");
        } catch (Exception $e){ 
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
            $res = $this->conn->execQuery("Select * From agendaeventi Where ID=".$id);
            foreach ($res as $record) {
                $e = new Evento($record['ID'], $record['TITOLO'], $record['DESCRIZIONE'], $record['CONTENUTO'], $record['INIZIO'], $record['FINE'], $record['PROVINCIA'], $record['COMUNE'], $record['INDIRIZZO'], $record['IMG_NOME'], $record['FK_INSERITO_DA']);
			return $e;
			}
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
        if ($this->isEmpty(array($id)) or $id < 0) {
            throw new Exception('Invalid argument');
        }
        try {
            return $this->conn->execAction("Delete From agendaeventi Where ID=".$id);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /*
     * Ottieni gli eventi (ordinati per data decrescente) nei limiti indicati.
     * Restituisce un array di eventi.
     */
    public function getEventi($da = 0, $a = 1000000)
    {
        $risultati = array();
        $res = $this->conn->execQuery("Select * From agendaeventi LIMIT ".$da.",".$a);
        foreach ($res as $record) {
            $e = new Evento($record['ID'], $record['TITOLO'], $record['DESCRIZIONE'], $record['CONTENUTO'], $record['INIZIO'], $record['FINE'], $record['PROVINCIA'], $record['COMUNE'], $record['INDIRIZZO'], $record['IMG_NOME'], $record['FK_INSERITO_DA']);
      $risultati[] = $e;
    }
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
            $assoc_array['url'] = "paginaEvento.php?id=" . $evento->id;
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
        $res = $this->conn->execQuery("Select * From agendaeventi Where DATA='".$data."'");
        foreach ($res as $record) {
            $e = new Evento($record['ID'], $record['TITOLO'], $record['DESCRIZIONE'], $record['CONTENUTO'], $record['INIZIO'], $record['FINE'], $record['PROVINCIA'], $record['COMUNE'], $record['INDIRIZZO'], $record['IMG_NOME'], $record['FK_INSERITO_DA']);
      $risultati[] = $e;
    }
        return $risultati;
    }

    /*
     * Controlla se i parametri sono validi.
     * Restituisce true se e' presente almeno un parametro vuoto, false altrimenti.
     */
    
}

?>
