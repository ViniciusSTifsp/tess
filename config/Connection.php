<?php

class Connection {
    
    private $host = '144.217.39.54';
    private $username = 'hostdeprojetos';
    private $password = 'ifspgru@2022';
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
