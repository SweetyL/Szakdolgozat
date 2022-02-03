<?php
    
    $driver = new Driver();
    $company = new Company();
    if(!empty($_SESSION["id"])){
        $driver->set_user($_SESSION["id"], $conn);
    }



    include 'view/profile.php';
?>