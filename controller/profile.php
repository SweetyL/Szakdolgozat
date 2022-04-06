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
    if($_SESSION["type"]=="company"){
        if(!in_array($id,$driver->driversList($conn))){
            header('Location: index.php?page=404');
            exit();
        }else{
            $driver->set_user($id,$conn);
            $town->set_town($driver->get_townID(),$conn);
            $country->set_country($town->get_country(),$conn);
            $online = getOnlineCompanies($conn);
            if(in_array($driver->get_id(),$online)){
                $status = "<p><i class='fas fa-circle offline'></i> Jelenleg online</p>";
            }else{
                $status = "<p><i class='fas fa-circle offline'></i> Utoljára online: ".str_replace("-","/",getDriverLastOnline($driver->get_id(),$conn))."</p>";
            }
        }
    }

    if($_SESSION["type"]=="driver"){
        if(!in_array($id,$company->companiesList($conn))){
            header('Location: index.php?page=404');
            exit();
        }else{
            $company->set_user($id,$conn);
            $town->set_town($company->get_townID(),$conn);
            $country->set_country($town->get_country(),$conn);
            $online = getOnlineDrivers($conn);
            if(in_array($company->get_id(),$online)){
                $status = "<p><i class='fas fa-circle online'></i> Jelenleg online</p>";
            }else{
                $status = "<p><i class='fas fa-circle offline'></i> Utoljára online: ".str_replace("-","/",getCompanyLastOnline($company->get_id(),$conn))."</p>";
            }
        }
    }

include 'view/profile.php';
?>