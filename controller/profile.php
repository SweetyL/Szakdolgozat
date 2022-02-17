<?php
    if(empty($_REQUEST['id']) or empty($_SESSION["id"])){
        header('Location: index.php?page=404');
        exit();
    }
    $driver = new Driver();
    $company = new Company();
    $country = new Country();
    $town = new Town();
    $id = $_REQUEST['id'];
    if($_SESSION["type"]=="driver"){
        if(!in_array($id,$driver->driversList($conn))){
            header('Location: index.php?page=404');
            exit();
        }
    }else{
        $driver->set_user($id,$conn);
        echo "driver";
    }

    if($_SESSION["type"]=="driver"){
        if(!in_array($id,$company->companiesList($conn))){
            header('Location: index.php?page=404');
            exit();
        }
    }else{
        $company->set_company($id,$conn);
        echo "company";
    }

include 'view/profile.php';
?>