<?php
    $filename = "";
    if(empty($_SESSION["id"])){
        header('Location: index.php?page=404');
        exit();
    }
    $driver = new Driver();
    $company = new Company();
    $country = new Country();
    $town = new Town();
    if($_SESSION["type"]=="driver"){
        $driver->set_user($_SESSION["id"], $conn);
        $town->set_town($driver->get_townID(),$conn);
        $country->set_country($town->get_country(),$conn);
        $filename = md5($driver->get_username())."D";
    }else if($_SESSION["type"]=="company"){
        $company->set_user($_SESSION["id"], $conn);
        $town->set_town($company->get_townID(),$conn);
        $country->set_country($town->get_country(),$conn);
        $filename = md5($company->get_username())."C";
    }else if($_SESSION["type"]=="admin"){
        $driver->set_user($_SESSION["id"], $conn);
    }
    echo '<script src="js/showQR.js"></script>';
    include 'view/myProfile.php';
?>