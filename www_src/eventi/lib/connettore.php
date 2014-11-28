<?php
class Connettore {
  // parametri per la connessione al database
  private $nomehost = "localhost";
  private $port = "";
  private $nomeuser = "root";
  private $password = "root";
  private $nomedb = "eventi";

  private $connessione = null;

  // funzione per la connessione al db
  public function connetti() {
    if(empty($this->connessione)) {
      try {
        $this->connessione = new PDO("mysql:host=".$this->nomehost.";"."port=".$this->port.","."dbname=".$this->nomedb,$this->nomeuser,$this->password);
        $this->connessione->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        die('Connessione fallita: '.$e->getMessage());
      }
    }else{
      return true;
    }
  }

  // funzione per la chiusura della connessione
  public function disconnetti() {
    if(isset($this->connessione)) {
      $this->connessione = null;
      return true;
    }else{
      return false;
    }
  }

  //funzione per l'esecuzione delle query
  public function query($sql,$valori = null) {
    if(isset($this->connessione)) {
      if(empty($valori)) { //query normale
        if($sql[0] == 'S' || $sql[0] == 's') { //Select
          $res = $this->connessione->query($sql);
        } else { //Query che modifica la/e tabella/e
          $res = $this->connessione->exec($sql);
        }
        return $res;
      } else { //query preparata
        $statement = $this->connessione->prepare($sql);
        $statement->execute($valori);
        return $statement;
      }
    }else{
      return false;
    }
  }

}
?>
