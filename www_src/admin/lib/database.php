<?php

class Database
{

    // Parametri connessione database
    private $host = SETTINGS_DBHOST;
    private $username = SETTINGS_USERNAME;
    private $pass = SETTINGS_PASSWORD;
    private $dbname = SETTINGS_DATABASE;

    private $dbconn = null;

    // funzione per la connessione al databse
    public function connect()
    {
        if (empty($this->dbconn)) {
            try {
                $this->dbconn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->pass);
                $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connessione al database non riuscita: <br>' . $e->getMessage());
            }
        } else {
            return true;
        }
    }

    // funzione per la disconnesione dal database
    public function disconnect()
    {
        if (isset($this->dbconn)) {
            $this->dbconn = null;
            return true;
        } else {
            return false;
        }
    }

    // Funzione che esegue una query
    public function Query($query)
    {
        if (isset($this->dbconn)) {
            try {
                $statement = $this->dbconn->prepare($query);
                $statement->execute();
            } catch (PDOException $e) {
                die("Errore durante l'esecuzione della query.<br>" . $e->getMessage());
            }
        }
    }

    // Funzione che esegue una query e ritorna il numero di risultati
    public function QueryCountResults($query)
    {
        if (isset($this->dbconn)) {
            try {
                $statement = $this->dbconn->prepare($query);
                $statement->execute();
                return $statement->rowCount();
            } catch (PDOException $e) {
                die("Errore durante l'esecuzione della query.<br>" . $e->getMessage());
            }
        }
    }

    // Funzione che seleziona e ritorna un risultato di una query
    public function QuerySingleResults($query)
    {
        if (isset($this->dbconn)) {
            try {
                $statement = $this->dbconn->prepare($query);
                $statement->execute();
                return $statement->fetchColumn();
            } catch (PDOException $e) {
                die("Errore durante l'esecuzione della query.<br>" . $e->getMessage());
            }
        }
    }

    // Funzione che seleziona e ritorna tutti i risultati di una query
    public function QueryMultiResults($query)
    {
        if (isset($this->dbconn)) {
            try {
                $statement = $this->dbconn->prepare($query);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Errore durante l'esecuzione della query.<br>" . $e->getMessage());
            }
        }
    }

}

?>
