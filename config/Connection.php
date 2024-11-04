<?php

class Connection {
    
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'tess_oficial';

    public function connection() {
        $con = new mysqli($this->host, $this->username, $this->password, $this->database);
        return $con;
    }

    public function initCURL() {
        $ch = curl_init();
        return $ch;
    }

}