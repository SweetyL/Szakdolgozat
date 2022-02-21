<?php
    if(empty($_SESSION["id"])){
        header('Location: index.php?page=404');
        exit();
    }
    $driver = new Driver();
    $company = new Company();
    $country = new Country();
    $town = new Town();
    $nearList = array();
    $otherList = array();
    if($_SESSION["type"]=="driver"){
        $driver->set_user($_SESSION["id"], $conn);
        $town->set_town($driver->get_townID(),$conn);
        $country->set_country($town->get_country(),$conn);
        $sqlGetNear = 'SELECT compID FROM companies INNER JOIN towns ON towns.townID=companies.townID WHERE countryID LIKE "'.$country->get_id().'"';
        if($result = $conn->query($sqlGetNear)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $nearList[] = $row['compID'];
                }
            }
        }
        foreach ($company->companiesList($conn) as $item){
            if(!in_array($item,$nearList)){
                $otherList[] = $item;
            }
        }
    }else if($_SESSION["type"]=="company"){
        $company->set_user($_SESSION["id"], $conn);
        $town->set_town($company->get_townID(),$conn);
        $country->set_country($town->get_country(),$conn);
        $sqlGetNear = 'SELECT driverID FROM drivers INNER JOIN towns ON towns.townID=companies.townID WHERE countryID LIKE "'.$country->get_id().'"';
        if($result = $conn->query($sqlGetNear)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $nearList[] = $row['driverID'];
                }
            }
        }
        foreach ($driver->driversList($conn) as $item){
            if(!in_array($item,$nearList)){
                $otherList[] = $item;
            }
        }
    }
    include 'view/browser.php';
?>