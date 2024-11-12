<?php

class Connection {
    
    private $host = 'localhost';
    private $username = 'hostdeprojetos_tess';
    private $password = 'tess@ifsp';
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
