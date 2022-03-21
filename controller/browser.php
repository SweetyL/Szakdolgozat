<?php
    if(empty($_SESSION["id"])){
        header('Location: index.php?page=404');
        exit();
    }
    include 'view/browser.php';
    echo '<div class="container mx-auto">';
    $driver = new Driver();
    $company = new Company();
    $country = new Country();
    $town = new Town();
    $nearList = array();
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
        //show near profiles (drivers)
        foreach($nearList as $item){
            $company->set_user($item,$conn);
            $town->set_town($company->get_townID(),$conn);
            $country->set_country($town->get_country(),$conn);
            echo '<div class="row">';
            echo '<div class="mx-auto col-sm-6 my-5 result p-2 wow fadeInLeft">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="smallPic">
                <h1>Név: <a href="index.php?page=profile&id='.$item.'" target="_blank">'.$company->get_name().'</a></h1>
                <p>Ország: '.$country->get_name().'</p>
                <p>Város: '.$town->get_name().'</p>
                <p>Utca, házszám: '.$company->get_street().' '.$company->get_houseNumber().'</p>
                <p>Email: '.$company->get_email().'</p>
                <p>Telefonszám: '.$company->get_phone().'</p>
                <p>Weboldal: <a href="https://'.$company->get_webpage().'" target="_blank">'.$company->get_webpage().'</a>
            </div>';
            echo '</div>';
        }
        //show other profiles (drivers)
        foreach ($company->companiesList($conn) as $item){
            if(!in_array($item,$nearList)){
                $company->set_user($item,$conn);
                $town->set_town($company->get_townID(),$conn);
                $country->set_country($town->get_country(),$conn);
                echo '<div class="row">';
                echo '<div class="mx-auto col-sm-6 my-5 result p-2 wow fadeInLeft">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="smallPic">
                    <h1>Név: <a href="index.php?page=profile&id='.$item.'" target="_blank">'.$company->get_name().'</a></h1>
                    <p>Ország: '.$country->get_name().'</p>
                    <p>Város: '.$town->get_name().'</p>
                    <p>Utca, házszám: '.$company->get_street().' '.$company->get_houseNumber().'</p>
                    <p>Email: '.$company->get_email().'</p>
                    <p>Telefonszám: '.$company->get_phone().'</p>
                    <p>Weboldal: <a href="https://'.$company->get_webpage().'" target="_blank">'.$company->get_webpage().'</a>
                </div>';
                echo '</div>';
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
        //show near profiles (companies)
        foreach($nearList as $item){
            $driver->set_user($item,$conn);
            $town->set_town($driver->get_townID(),$conn);
            $country->set_country($town->get_country(),$conn);
            // skip admins HOTFIX
            #region
            if(empty($driver->get_email())){
                continue;
            }
            #endregion
            echo '<div class="row">';
            echo '<div class="mx-auto col-sm-6 my-5 result p-2 wow fadeInLeft">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="smallPic">
                <h1>Név: <a href="index.php?page=profile&id='.$item.'" target="_blank">'.$driver->get_lastname().' '.$driver->get_firstname().'</a></h1>
                <p>Ország: '.$country->get_name().'</p>
                <p>Város: '.$town->get_name().'</p>
                <p>Utca, házszám: '.$driver->get_street().' '.$driver->get_houseNumber().'</p>
                <p>Email: '.$driver->get_email().'</p>
                <p>Telefonszám: '.$driver->get_phone().'</p>
            </div>';
            echo '</div>';
        }
        //show other profiles (companies)
        foreach ($driver->driversList($conn) as $item){
            if(!in_array($item,$nearList)){
                $driver->set_user($item,$conn);
                $town->set_town($driver->get_townID(),$conn);
                $country->set_country($town->get_country(),$conn);
                // skip admins HOTFIX
                #region
                if(empty($driver->get_email())){
                    continue;
                }
                #endregion
                echo '<div class="row">';
                echo '<div class="mx-auto col-sm-6 my-5 result p-2 wow fadeInLeft">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="smallPic">
                    <h1>Név: <a href="index.php?page=profile&id='.$item.'" target="_blank">'.$driver->get_lastname().' '.$driver->get_firstname().'</a></h1>
                    <p>Ország: '.$country->get_name().'</p>
                    <p>Város: '.$town->get_name().'</p>
                    <p>Utca, házszám: '.$driver->get_street().' '.$driver->get_houseNumber().'</p>
                    <p>Email: '.$driver->get_email().'</p>
                    <p>Telefonszám: '.$driver->get_phone().'</p>
                </div>';
                echo '</div>';
            }
        }
    }
    echo '</div>';
?>