<?php

class Database
{
    public $db_host = "localhost";
    public $db_user = "pariopp";
    public $db_password = "pariopp";
    public $db_name = "pariopp";
    public $table_offertelavoro = "offertelavoro";
    public $table_offertelavorostati = "offertelavorostati";
    public $table_offertelavorotags = "offertelavorotags";
    public $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);

        if ($this->mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }

    }


    public function getOfferteLavoro($start = 0, $limit = 30)
    {
        $sql = "SELECT * FROM offertelavoro LIMIT " . $start . "," . $limit;
        // print $sql;
        $res = $this->mysqli->query($sql);
        return $res;
    }


}

?>