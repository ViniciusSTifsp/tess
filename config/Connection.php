<?php

class Connection {
    
    private $host = 'localhost';
    private $username = '3306';
    private $password = '';
    private $database = 'hostdeprojetos_tess';

    public function connection() {
        $con = new mysqli($this->host, $this->username, $this->password, $this->database);
        return $con;
    }

    public function initCURL() {
        $ch = curl_init();
        return $ch;
    }

}
