<?php 
        if(isset($_SESSION['admin'])){
            include_once "../module/menu_admin.php";
        }
        else {
            include_once "../module/menu.php";
        }
    ?>