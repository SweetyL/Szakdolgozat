<?php
    $driver = new Driver();
    $company = new Company();
    $country = new Country();
    $town = new Town();
    $id = $_REQUEST['action'];

    if(empty($_REQUEST['action'])){
        header('Location: index.php?page=index');
        exit();
    }

    $driver->set_user($id,$conn);

include 'view/myProfile.php';
?>