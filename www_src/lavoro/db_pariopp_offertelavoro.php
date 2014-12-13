<?php

class Database {
	public $db_host="localhost";
	public $db_user="pariopp-owner";
	public $db_password="";
	public $db_name="pariopp";
	public $table_offertelavoro="offertelavoro";
	public $table_offertelavorostati="offertelavorostati";
	public $table_offertelavorotags="offertelavorotags";
	public $mysqli;
	public $total_results;

    public function __construct() {
		$this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
		$this->mysqli->set_charset("utf8");
		if ($this->mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
		}
		// else printf("Current character set: %s\n", $this->mysqli->character_set_name());
	
    }
		
		
	public function getOfferteLavoro($start=0,$limit=30,$q=""){
		if($q!="") $and=" AND (TITOLO_LAVORO LIKE '%".$q."%' OR AZIENDA_NOME LIKE '%".$q."%' OR SNIPPET_ANNUNCIO LIKE '%".$q."%')";
		$sql = "SELECT * FROM offertelavoro WHERE 1=1 ".$and." LIMIT ".$start.",".$limit;
		$res = $this->mysqli->query($sql);
		while($row = $res->fetch_array(MYSQLI_ASSOC)){
			$return[]=$row;
		}
		$total_results_query="SELECT COUNT(*) AS cnt FROM offertelavoro WHERE 1=1 ".$and;
		$res = $this->mysqli->query($total_results_query);
		$row=$res->fetch_array(MYSQLI_ASSOC);
		$this->total_results=$row["cnt"];
		return $return;
	}

	public function getOffertaLavoro($id=""){
		if($id!=""){
			$sql = "SELECT * FROM offertelavoro WHERE ID=".$id;
			$res = $this->mysqli->query($sql);
			$return=$res->fetch_array(MYSQLI_ASSOC);
			return $return;
		}else return false;	
	}
	
	
	public function getNazioni(){
		$sql = "SELECT * FROM nazioni";
		$res = $this->mysqli->query($sql);
		while($row = $res->fetch_array(MYSQLI_ASSOC)){
			$return[]=$row;
		}
		return $return;
	}
	
	public function getStatiOpportunita(){
		$sql = "SELECT * FROM offertelavorostati";
		$res = $this->mysqli->query($sql);
		while($row = $res->fetch_array(MYSQLI_ASSOC)){
			$return[]=$row;
		}
		return $return;
	}	
	
	public function insertOpportunita($values=""){
		$sql="INSERT INTO offertelavoro 
		(TITOLO_LAVORO, TIPO_CONTRATTO, AZIENDA_NOME, AZIENDA_PROVINCIA, AZIENDA_CITTA, AZIENDA_LATITUDINE, AZIENDA_LONGITUDINE, CONTATTO_TEL, CONTATTO_FAX, CONTATTO_EMAIL, FONTE_DESCR, FONTE_LINK, SNIPPET_ANNUNCIO, DATA_INSERIMENTO, FK_STATO_OFFERTA, FK_NAZIONE) 
		VALUES 
		('".$values["TITOLO_LAVORO"]."', '".$values["TIPO_CONTRATTO"]."', '".$values["AZIENDA_NOME"]."', '".$values["AZIENDA_PROVINCIA"]."', '".$values["AZIENDA_CITTA"]."', '".$values["AZIENDA_LATITUDINE"]."', '".$values["AZIENDA_LONGITUDINE"]."', '".$values["CONTATTO_TEL"]."', '".$values["CONTATTO_FAX"]."', '".$values["CONTATTO_EMAIL"]."', '".$values["FONTE_DESCR"]."', '".$values["FONTE_LINK"]."', '".$values["SNIPPET_ANNUNCIO"]."', DATE(NOW()), '".$values["FK_STATO_OFFERTA"]."', '".$values["FK_NAZIONE"]."');
		";
		$res = $this->mysqli->query($sql);
	}
	
	public function updateOpportunita($values=""){
		$sql="UPDATE INTO offertelavoro 
		(TITOLO_LAVORO, TIPO_CONTRATTO, AZIENDA_NOME, AZIENDA_PROVINCIA, AZIENDA_CITTA, AZIENDA_LATITUDINE, AZIENDA_LONGITUDINE, CONTATTO_TEL, CONTATTO_FAX, CONTATTO_EMAIL, FONTE_DESCR, FONTE_LINK, SNIPPET_ANNUNCIO, DATA_INSERIMENTO, FK_STATO_OFFERTA, FK_NAZIONE) 
		VALUES 
		('".$values["TITOLO_LAVORO"]."', '".$values["TIPO_CONTRATTO"]."', '".$values["AZIENDA_NOME"]."', '".$values["AZIENDA_PROVINCIA"]."', '".$values["AZIENDA_CITTA"]."', '".$values["AZIENDA_LATITUDINE"]."', '".$values["AZIENDA_LONGITUDINE"]."', '".$values["CONTATTO_TEL"]."', '".$values["CONTATTO_FAX"]."', '".$values["CONTATTO_EMAIL"]."', '".$values["FONTE_DESCR"]."', '".$values["FONTE_LINK"]."', '".$values["SNIPPET_ANNUNCIO"]."', DATE(NOW()), '".$values["FK_STATO_OFFERTA"]."', '".$values["FK_NAZIONE"]."') 
		WHERE ID=".$values["ID"]."";
		$res = $this->mysqli->query($sql);
	}	
	
	
}
	
?>
