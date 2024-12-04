<?php

class Connection {
    
    /*private $host = 'localhost';
    private $username = 'ifhostgru_tess';
    private $password = 'ifspgru@2024';
    private $database = 'ifhostgru_tess';*/

    
private $host = '144.217.39.54';
    private $username = 'hostdeprojetos_tess';
    private $password = 'ifspgru@2022';
    private $database = 'hostdeprojetos_tess';

    public function connection() {
        $con = new mysqli($this->host, $this->username, $this->password, $this->database);
        mysqli_set_charset($con, 'utf8');
        return $con;
    }

    public function initCURL() {
        $ch = curl_init();
        return $ch;
    }

}
