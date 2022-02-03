<?php
    
    $driver = new Driver();
    $company = new Company();
    $country = new Country();
    $town = new Town();
    if(!empty($_SESSION["id"]) and $_SESSION["type"]=="driver"){
        $driver->set_user($_SESSION["id"], $conn);
        $town->set_town($driver->get_townID(),$conn);
        $country->set_country($town->get_country(),$conn);
    }else if(!empty($_SESSION["id"]) and $_SESSION["type"]=="company"){
        $company->set_user($_SESSION["id"], $conn);
        $town->set_town($company->get_townID(),$conn);
        $country->set_country($town->get_country(),$conn);
    }
    include 'view/profile.php';
?>