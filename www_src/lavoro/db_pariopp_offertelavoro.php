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

    public function __construct() {
		$this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
		$this->mysqli->set_charset("utf8");
		if ($this->mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
		}
		// else printf("Current character set: %s\n", $this->mysqli->character_set_name());
	
    }
		
		
	public function getOfferteLavoro($start=0,$limit=30){
		$sql = "SELECT * FROM offertelavoro LIMIT ".$start.",".$limit;
		// print $sql;
		$res = $this->mysqli->query($sql);
		while($row = $res->fetch_array(MYSQLI_ASSOC)){
			$return[]=$row;
		}
		return $return;
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
	
	
}
	
?>