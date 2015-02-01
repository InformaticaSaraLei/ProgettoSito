<?php
include_once '../settings.php';
class Database
{
    public $db_host = SETTINGS_DBHOST;
    public $db_user = SETTINGS_USERNAME;
    public $db_password = SETTINGS_PASSWORD;
    public $db_name = SETTINGS_DATABASE;
    public $table_offertelavoro = "offertelavoro";
    public $table_offertelavorostati = "offertelavorostati";
    public $table_offertelavorotags = "offertelavorotags";
	public $table_tags = "tags";
    public $mysqli;
    public $total_results;

    public function __construct()
    {    
        $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        $this->mysqli->set_charset("utf8");
        if ($this->mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
        

    }


    public function getOfferteLavoro($start = 0, $limit = 30, $q = "", $admin_mode=true)
    {
		
		$stato_pubblicato = $this->getStatiOpportunita("Pubblicato");
		
		$id_stato_pubblicato = $stato_pubblicato[0]["ID"];
		if(!$admin_mode) $and_user_mode=" AND FK_STATO_OFFERTA=".$id_stato_pubblicato; else $and_user_mode=""; 
        if ($q != "") $and = " AND (TITOLO_LAVORO LIKE '%" . $this->mysqli->real_escape_string($q) . "%' OR AZIENDA_NOME LIKE '%" . $this->mysqli->real_escape_string($q) . "%' OR SNIPPET_ANNUNCIO LIKE '%" . $this->mysqli->real_escape_string($q) . "%')";
        $sql = "SELECT * FROM offertelavoro WHERE 1=1 " . $and . " ". $and_user_mode. " ORDER BY DATA_INSERIMENTO DESC LIMIT " . $start . "," . $limit;
        $res = $this->mysqli->query($sql);
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $return[] = $row;
        }
        $total_results_query = "SELECT COUNT(*) AS cnt FROM offertelavoro WHERE 1=1 " . $and;
        $res = $this->mysqli->query($total_results_query);
        $row = $res->fetch_array(MYSQLI_ASSOC);
        $this->total_results = $row["cnt"];
        return $return;
    }

	public function getTags($opp=""){
		$sql_tags_id="SELECT FK_TAG FROM ".$this->table_offertelavorotags." WHERE FK_OFFERTE=".$opp;
		$res = $this->mysqli->query($sql_tags_id);
		while($row = $res->fetch_array(MYSQLI_ASSOC)){
			$tags_id[]=$row["FK_TAG"];
		}
		
		if(is_array($tags_id)){
			$sql_tag_labels="SELECT TAG FROM ".$this->table_tags." WHERE ID IN (".implode(",",$tags_id).")";
		
			$res2=$this->mysqli->query($sql_tag_labels);
			while($row = $res2->fetch_array(MYSQLI_ASSOC)){
				$tags_string[]=$row["TAG"];
			}
		}
		else $tags_string="";
		// ricordare html_entities dei tag
		return $tags_string;
	}	
	
    public function getOffertaLavoro($id = "")
    {
        if ($id != "") {
            $sql = "SELECT * FROM offertelavoro WHERE ID=" . $id;
            $res = $this->mysqli->query($sql);
            $return = $res->fetch_array(MYSQLI_ASSOC);
			$tags=$this->getTags($return["ID"]);
			$return["TAG_LIST"]=implode(",",$tags);
            return $return;
        } else return false;
    }


    public function getNazioni()
    {
        $sql = "SELECT * FROM nazioni";
        $res = $this->mysqli->query($sql);
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $return[] = $row;
        }
        return $return;
    }

    public function getStatiOpportunita($stato="")
    {
		if($stato!="") $where_stato=" WHERE STATO='".$stato."'"; else $where_stato="";
        $sql = "SELECT * FROM offertelavorostati".$where_stato;
        $res = $this->mysqli->query($sql);
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $return[] = $row;
        }
        return $return;
    }


	
	public function getTagId($tag=""){
		$sql="SELECT * FROM ".$this->table_tags." WHERE TAG='".$this->mysqli->real_escape_string($tag)."'";
		$res = $this->mysqli->query($sql);
		$row = $res->fetch_array(MYSQLI_ASSOC);
		return $row;
	}
	
    public function insertOpportunita($values = "")
    {
        $sql = "INSERT INTO offertelavoro
		(TITOLO_LAVORO, TIPO_CONTRATTO, AZIENDA_NOME, AZIENDA_PROVINCIA, AZIENDA_CITTA, AZIENDA_LATITUDINE, AZIENDA_LONGITUDINE, CONTATTO_TEL, CONTATTO_FAX, CONTATTO_EMAIL, FONTE_DESCR, FONTE_LINK, SNIPPET_ANNUNCIO, DATA_INSERIMENTO, FK_STATO_OFFERTA, FK_NAZIONE) 
		VALUES 
		('" . $this->mysqli->real_escape_string($values["TITOLO_LAVORO"]) . "', 
		 '" . $this->mysqli->real_escape_string($values["TIPO_CONTRATTO"]) . "',
		 '" . $this->mysqli->real_escape_string($values["AZIENDA_NOME"]) . "',
		 '" . $this->mysqli->real_escape_string($values["AZIENDA_PROVINCIA"]) . "',
		 '" . $this->mysqli->real_escape_string($values["AZIENDA_CITTA"]) . "',
		 '" . $this->mysqli->real_escape_string($values["AZIENDA_LATITUDINE"]) . "',
		 '" . $this->mysqli->real_escape_string($values["AZIENDA_LONGITUDINE"]) . "',
		 '" . $this->mysqli->real_escape_string($values["CONTATTO_TEL"]) . "',
		 '" . $this->mysqli->real_escape_string($values["CONTATTO_FAX"]) . "',
		 '" . $this->mysqli->real_escape_string($values["CONTATTO_EMAIL"]) . "',
		 '" . $this->mysqli->real_escape_string($values["FONTE_DESCR"]) . "',
		 '" . $this->mysqli->real_escape_string($values["FONTE_LINK"]) . "',
		 '" . $this->mysqli->real_escape_string($values["SNIPPET_ANNUNCIO"]) . "',
		 DATE(NOW()),
		 '" . $values["FK_STATO_OFFERTA"] . "',
		 '" . $values["FK_NAZIONE"] . "');
		";
		
		
		$tags=explode(",",$_POST["TAG_LIST"]);
        $res = $this->mysqli->query($sql);
		$last_opp_insert_id=$this->mysqli->insert_id;
		for($tag=0;$tag<sizeof($tags);$tag++){
		    $tag_array_id=$this->getTagId($tags[$tag]);
			if($tag_array_id==""){
				$sql_tag="INSERT INTO ".$this->table_tags." (TAG) VALUES ('".$this->mysqli->real_escape_string($tags[$tag])."')";
				$res = $this->mysqli->query($sql_tag);
				$last_tag_insert_id=$this->mysqli->insert_id;
			} else	$last_tag_insert_id = $tag_array_id["ID"];
			
			$sql_relation="INSERT INTO ".$this->table_offertelavorotags." (FK_TAG,FK_OFFERTE) VALUES (".$last_tag_insert_id.",".$last_opp_insert_id.")";
			$res = $this->mysqli->query($sql_relation);
		}
    }

	
    public function updateOpportunita($values = "")
    {
        $sql = "UPDATE offertelavoro
		SET
			TITOLO_LAVORO='" . $this->mysqli->real_escape_string($values["TITOLO_LAVORO"]) . "',
			TIPO_CONTRATTO='" . $this->mysqli->real_escape_string($values["TIPO_CONTRATTO"]) . "',
			AZIENDA_NOME='" . $this->mysqli->real_escape_string($values["AZIENDA_NOME"]) . "',
			AZIENDA_PROVINCIA='" . $this->mysqli->real_escape_string($values["AZIENDA_PROVINCIA"] ). "',
			AZIENDA_CITTA='" . $this->mysqli->real_escape_string($values["AZIENDA_CITTA"]) . "',
			AZIENDA_LATITUDINE='" . $this->mysqli->real_escape_string($values["AZIENDA_LATITUDINE"]) . "',
			AZIENDA_LONGITUDINE='" . $this->mysqli->real_escape_string($values["AZIENDA_LONGITUDINE"]) . "',
			CONTATTO_TEL='" . $this->mysqli->real_escape_string($values["CONTATTO_TEL"]) . "',
			CONTATTO_FAX='" . $this->mysqli->real_escape_string($values["CONTATTO_FAX"]) . "',
			CONTATTO_EMAIL='" . $this->mysqli->real_escape_string($values["CONTATTO_EMAIL"]) . "',
			FONTE_DESCR='" . $this->mysqli->real_escape_string($values["FONTE_DESCR"]) . "',
			FONTE_LINK='" . $this->mysqli->real_escape_string($values["FONTE_LINK"]) . "',
			SNIPPET_ANNUNCIO='" . $this->mysqli->real_escape_string($values["SNIPPET_ANNUNCIO"]) . "',
			FK_STATO_OFFERTA='" . $this->mysqli->real_escape_string($values["FK_STATO_OFFERTA"]) . "',
			FK_NAZIONE='" . $this->mysqli->real_escape_string($values["FK_NAZIONE"]) . "'
		WHERE 
			ID=" . $values["ID"];

		$sql_reset_tags="DELETE FROM ".$this->table_offertelavorotags." WHERE FK_OFFERTE=".$values["ID"];	
		$res_delete=$this->mysqli->query($sql_reset_tags);
        $res = $this->mysqli->query($sql);
		$tags=explode(",",$_POST["TAG_LIST"]);
        $res = $this->mysqli->query($sql);
		$last_opp_insert_id=$values["ID"];
		for($tag=0;$tag<sizeof($tags);$tag++){
		    $tag_array_id=$this->getTagId($tags[$tag]);
			if($tag_array_id==""){
				$sql_tag="INSERT INTO ".$this->table_tags." (TAG) VALUES ('".$this->mysqli->real_escape_string($tags[$tag])."')";
				$res = $this->mysqli->query($sql_tag);
				$last_tag_insert_id=$this->mysqli->insert_id;
			} else	$last_tag_insert_id = $tag_array_id["ID"];
			$sql_relation="INSERT INTO ".$this->table_offertelavorotags." (FK_TAG,FK_OFFERTE) VALUES (".$last_tag_insert_id.",".$last_opp_insert_id.")";
			$res = $this->mysqli->query($sql_relation);
		}	
		
    }

	public function isAdmin($id=""){
        if (is_numeric($id)) {
			$res = $this->mysqli->query("SELECT ISADMIN FROM utenti WHERE ID='".$id."'");
			$row = $res->fetch_array(MYSQLI_ASSOC);
			return ($row["ISADMIN"]=="1");
        } else return false;
 	}

}

?>
