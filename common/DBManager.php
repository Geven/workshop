<?php
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "xozmarket");

class DBManager {
    public $host;
    public $user;
    public $password;
    public $db;
    public $mysqli;
    public $result;
    public $error;

    function __construct($host, $user, $password, $db) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
    }

    function connect() {
        $this->mysqli = new mysqli("p:" . $this->host, $this->user, $this->password, $this->db);

        if($this->mysqli->connect_error) {
            return false;
        }
        else {
            return true;
        }
    }

    function close() {
        $this->mysqli->close();
    }

    function query($value) {
        return ($this->result = $this->mysqli->query($value)) ? true : false;
    }
}