<?php
include_once '../settings.php';
$servername = SETTINGS_DBHOST;
$username = SETTINGS_USERNAME;
$password = SETTINGS_PASSWORD;

// Create connection
$conn = mysqli_connect($servername, $username, $password, "alla_scoperta_dell_informatica");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//passo in post il tipo di tabella da 0 a 3, in base al tipo avrò più o meno parametri per fare le query.
$tipo_tabella = $_POST['tipo_tabella'];

function valida_post($valore){
    if(!empty($valore)) {
        return $valore;
    } else {
        return 0;
    }
}

//compongo la query
switch ($tipo_tabella) {
    default:
    case 0: //tabella giocotipicontenuti, avrò come parametro solo l'id
        $id = valida_post($_POST['id']);
        $query = "SELECT CONTENUTO FROM GiocoTipiContenuti WHERE ID = ".$id;
        break;
    case 1: //tabella nazioni, avrò come parametro solo l'id
        $id = valida_post($_POST['id']);
        $query = "SELECT DESCRIZIONE FROM Nazioni WHERE ID = ".$id;
        break;
    case 2: //tabella GiocoContenuti, avrò come parametro: l'id, fk_tipo_contenuto, fk_nazione
        $id = valida_post($_POST['id']);
        $FK_TIPO_CONTENUTO = valida_post($_POST['fk_tipo_contenuto']);
        $FK_NAZIONE = valida_post($_POST['fk_nazione']);
        $query = "SELECT TESTO FROM GiocoContenuti WHERE ";
        if (($id == 0) && ($FK_TIPO_CONTENUTO == 0) && ($FK_NAZIONE > 0)){
            $query += "FK_NAZIONE = ".$FK_NAZIONE;
        } else {
            if (($id == 0) && ($FK_TIPO_CONTENUTO > 0) && ($FK_NAZIONE == 0)){
                $query += "FK_TIPO_CONTENUTO = ".$FK_TIPO_CONTENUTO;
            } else {
                if (($id == 0) && ($FK_TIPO_CONTENUTO > 0) && ($FK_NAZIONE > 0)){
                    $query += "FK_NAZIONE = ".$FK_NAZIONE." AND FK_TIPO_CONTENUTO = ".$FK_TIPO_CONTENUTO;
                } else {
                    if (($id > 0) && ($FK_TIPO_CONTENUTO == 0) && ($FK_NAZIONE == 0)){
                        $query += " ID = ".$id;
                    } else {
                        if (($id > 0) && ($FK_TIPO_CONTENUTO == 0) && ($FK_NAZIONE > 0)){
                            $query += "ID = ".$id." AND FK_NAZIONE = ".$FK_NAZIONE;
                        } else {
                            if (($id > 0) && ($FK_TIPO_CONTENUTO > 0) && ($FK_NAZIONE == 0)){
                                $query += "ID = ".$id." AND FK_TIPO_CONTENUTO = ".$FK_TIPO_CONTENUTO;
                            } else {
                                $query += "ID = ".$id + " AND FK_TIPO_CONTENUTO = ".$FK_TIPO_CONTENUTO." AND FK_NAZIONE = ".$FK_NAZIONE; 
                            }    
                        }    
                    }    
                }    
            }
        }
        break;
    case 3: //tabella GiocoSchemi, avrò come parametro id, livello, sottolivello
        $id = $_POST['id'];
        $livello = valida_post($_POST['livello']);
        $sottolivello = valida_post($_POST['sottolivello']);
        $query = "SELECT SCHEMA FROM GiocoSchemi WHERE ";
        if (($id == 0) && ($livello == 0) && ($sottolivello > 0)){
            $query += "sottolivello = ".$sottolivello;
        } else {
            if (($id == 0) && ($livello > 0) && ($sottolivello == 0)){
                $query += "livello = ".$livello;
            } else {
                if (($id == 0) && ($livello > 0) && ($sottolivello > 0)){
                    $query += "sottolivello = ".$sottolivello." AND livello = ".$livello;
                } else {
                    if (($id > 0) && ($livello == 0) && ($sottolivello == 0)){
                        $query += " ID = ".$id;
                    } else {
                        if (($id > 0) && ($livello == 0) && ($sottolivello > 0)){
                            $query += "ID = ".$id." AND sottolivello = ".$sottolivello;
                        } else {
                            if (($id > 0) && ($livello > 0) && ($sottolivello == 0)){
                                $query += "ID = ".$id." AND livello = ".$livello;
                            } else {
                                $query += "ID = ".$id + " AND livello = ".$livello." AND sottolivello = ".$sottolivello; 
                            }    
                        }    
                    }    
                }    
            }
        }
        break;
}

//eseguo la query
$result = mysqli_query($conn, $query) or die("errore");

//xml output
$output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$output = $output."<dati>\n";

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        switch ($tipo_tabella) {
            default:
            case 0:
                $output = $output."\t<contenuto>".$row["CONTENUTO"]."</contenuto>\n";
                break;
            case 1:
                $output = $output."\t<descrizione>".$row["DESCRIZIONE"]."</descrizione>\n";
                break;
            case 2:
                $output = $output."\t<testo>".$row["TESTO"]."</testo>\n";
                break;
            case 3:
                $output = $output."\t<schema>".$row["SCHEMA"]."</schema>\n";
                break;
        }
    }
} 

$output = $output."</dati>";

echo $output;

mysqli_close($conn);

?>