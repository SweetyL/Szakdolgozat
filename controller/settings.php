<?php
    if(empty($_SESSION["id"])){
        header('Location: index.php?page=404');
        exit();
    }
    $driver = new Driver();
    $company = new Company();
    $country = new Country();
    $town = new Town();
    $currentCountry = "";
    $currentTown = "";
    $countryIDs = $country->countriesList($conn);
    if($_SESSION["type"]=="driver"){
        $driver->set_user($_SESSION["id"],$conn);
        $town->set_town($driver->get_townID(),$conn);
        $country->set_country($town->get_country(),$conn);
        $currentCountry = $country->get_name();
        $currentTown = $town->get_name();
    }else if($_SESSION["type"]=="company"){
        $company->set_user($_SESSION["id"],$conn);
        $town->set_town($company->get_townID(),$conn);
        $country->set_country($town->get_country(),$conn);
        $currentCountry = $country->get_name();
        $currentTown = $town->get_name();
    }
    include 'view/settings.php';
?>