<?php

class NivelDAO {

    public function buscaNivel(Connection $con, $base) {
        $query = 'SELECT * FROM `nivel` WHERE `nivel` = "'.$base.'"';
        return mysqli_query($con->connection(), $query);
    }
    
    public function consultaNivel(Connection $con, $id) {
        $query = 'SELECT * FROM `nivel` WHERE `id` = "'.$id.'"';
        return mysqli_query($con->connection(), $query);
    }

}