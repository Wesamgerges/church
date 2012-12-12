<?php require_once ("constants.php"); ?>
<?php require_once ("Config.php"); ?>
<?php

class DataBase {

    public $ServerName = SERVERNAME;
    public $UserName = USERNAME;
    public $Password = PASSWORD;
    public $DataBaseName = DBNAME;

    public function __construct($databasename = DBNAME, $servername = SERVERNAME, $username = USERNAME, $password = PASSWORD) {
        $this->ServerName = $servername;
        $this->UserName = $username;
        $this->Password = $password;
        $this->DataBaseName = $databasename;
        $this->connect();
    }

    public function connect() {
        $this->DBConnection = mysql_connect($this->ServerName, $this->UserName, $this->Password) or die("server connection error" . mysql_error());
        mysql_select_db($this->DataBaseName, $this->DBConnection) or die("Database connection error" . mysql_error());
    }

    //public function __destruct()
    //{
    //mysql_close($this->Connection);		
    //}
}

class Connection {

    public $database;
    public $DBConnection;
    public $QueryText = "";
    public $Results = array();

    public function __construct() {
        mysql_query('SET character_set_results=utf8');
        mysql_query('SET names=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_results=utf8');
        mysql_query('SET collation_connection=utf8_general_ci');

        $this->database = new DataBase();
    }

    public function Query($query = "") {
        $this->Results = array();
        if ($query)
            $this->QueryText = $query;

        $rs = mysql_query($this->QueryText) or die("DataBase query error " . mysql_error());
        $i = 0;
        while ($r = mysql_fetch_array($rs)) {
            $this->Results[$i++] = $r;
        }
        //return  $this->Results;	
    }

    public function InsertQuery($query = "") {
        if ($query)
            $this->QueryText = $query;
        mysql_query($this->QueryText) or die("DataBase query error " . mysql_error());
        return mysql_insert_id();
    }

    public function FreeResult() {
        mysql_free_result($this->Results);
    }

}
?>

