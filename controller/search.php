<?php
    if(empty($_SESSION["id"])){
        header('Location: index.php?page=404');
        exit();
    }
    $driver = new Driver();
    $company = new Company();
    $country = new Country();
    $town = new Town();
    $resultText = "Találatok:";
    $countryIDs = $country->countriesList($conn);
    $companyIDs = $company->companiesList($conn);
    $driverIDs = $driver->driversList($conn);
    $online = array();
    include 'view/search.php';
    if($_SESSION["type"]=="driver"){
        if(!empty($_POST['companyName']) || !empty($_POST['country']) || !empty($_POST['town']) || !empty($_POST['street']) || !empty($_POST['houseNumber']) || !empty($_POST['email']) || !empty($_POST['phoneNumber']) || !empty($_POST['webpage'])) {
            $name = "";
            $townID = "";
            $countryID = "";
            $street = "";
            $houseNumber = "";
            $email = "";
            $phoneNumber = "";
            $webpage = "";
            $resultIDs = array();
            foreach($companyIDs as $row){
                $company->set_user($row,$conn);
                $town->set_town($company->get_townID(),$conn);
                $country->set_country($town->get_country(),$conn);
                if(isset($_POST['companyName']) and !empty($_POST['companyName'])){
                    $name = htmlspecialchars($_POST['companyName']);
                }else{
                    $name = $company->get_name();
                }
    
                if(isset($_POST['town']) and !empty($_POST['town'])){
                    $townID = htmlspecialchars($_POST['town']);
                }else{
                    $townID = $company->get_townID();
                }

                if(isset($_POST['country']) and !empty($_POST['country'])){
                    $countryID = htmlspecialchars($_POST['country']);
                }else{
                    $countryID = $country->get_id();
                }

                if(isset($_POST['street']) and !empty($_POST['street'])){
                    $street = htmlspecialchars($_POST['street']);
                }else{
                    $street = $company->get_street();
                }
    
                if(isset($_POST['houseNumber']) and !empty($_POST['houseNumber'])){
                    $houseNumber = htmlspecialchars($_POST['houseNumber']);
                }else{
                    $houseNumber = $company->get_houseNumber();
                }
    
                if(isset($_POST['email']) and !empty($_POST['email'])){
                    $email = htmlspecialchars($_POST['email']);
                }else{
                    $email = $company->get_email();
                }
    
                if(isset($_POST['phoneNumber']) and !empty($_POST['phoneNumber'])){
                    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                }else{
                    $phoneNumber = $company->get_phone();
                }
    
                if(isset($_POST['webpage']) and !empty($_POST['webpage'])){
                    $webpage = htmlspecialchars($_POST['webpage']);
                }else{
                    $webpage = $company->get_webpage();
                }
                if(str_contains(strtolower($company->get_name()), strtolower($name))==true and intval($company->get_townID())==intval($townID) and str_contains(strtolower($country->get_id()),strtolower($countryID)) and 
                str_contains(strtolower($company->get_street()), strtolower($street))==true and str_contains(strtolower($company->get_houseNumber()), strtolower($houseNumber))==true and str_contains(strtolower($company->get_email()), strtolower($email))==true and 
                str_contains(strtolower($company->get_phone()), strtolower($phoneNumber))==true and str_contains(strtolower($company->get_webpage()), strtolower($webpage))==true){
                    $resultIDs[] = $row;
                }

            }
            if(sizeof($resultIDs) == 0){
                $resultText = "Nincsen találat!";
            }
            echo "<div class='container mx-auto'>";
            echo "<div class='row'><h1 class='text-center'>Eredmények:</h1></div>";
                if (sizeof($resultIDs) > 0) {
                    foreach($resultIDs as $row) {
                        $company->set_user($row,$conn);
                        $town->set_town($company->get_townID(),$conn);
                        $country->set_country($town->get_country(),$conn);
                        $online = getOnlineCompanies($conn);
                        if(in_array($row,$online)){
                            $status = "<p><i class='fas fa-circle offline'></i> Jelenleg online</p>";
                        }else{
                            $status = "<p><i class='fas fa-circle offline'></i> Utoljára online: ".str_replace("-","/",getCompanyLastOnline($company->get_id(),$conn))."</p>";
                        }
                        echo "<div class='row'>";
                        echo '<div class="mx-auto col-sm-6 my-5 result p-2 wow fadeInLeft">
                                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="smallPic">
                                <h1>Név: <a href="index.php?page=profile&id='.$row.'" target="_blank">'.$company->get_name().'</a></h1>'.$status.'
                                <p>Ország: '.$country->get_name().'</p>
                                <p>Város: '.$town->get_name().'</p>
                                <p>Utca, házszám: '.$company->get_street().' '.$company->get_houseNumber().'</p>
                                <p>Email: '.$company->get_email().'</p>
                                <p>Telefonszám: '.$company->get_phone().'</p>
                                <p>Weboldal: <a href="https://'.$company->get_webpage().'" target="_blank">'.$company->get_webpage().'</a>
                            </div>';
                        echo "</div>";
                    }
                }
            echo "</div>";
        }
    }else if($_SESSION["type"]=="company"){
        if(!empty($_POST['firstname']) || !empty($_POST['lastname']) || !empty($_POST['country']) || !empty($_POST['town']) || !empty($_POST['street']) || !empty($_POST['houseNumber']) || !empty($_POST['email']) || !empty($_POST['phoneNumber'])) {
            $firstname = "";
            $lastname = "";
            $townID = "";
            $countryID = "";
            $street = "";
            $houseNumber = "";
            $email = "";
            $phoneNumber = "";
            $resultIDs = array();
            foreach($driverIDs as $row){
                $driver->set_user($row,$conn);
                $town->set_town($driver->get_townID(),$conn);
                $country->set_country($town->get_country(),$conn);
                if(isset($_POST['firstname']) and !empty($_POST['firstname'])){
                    $firstname = htmlspecialchars($_POST['firstname']);
                }else{
                    $firstname = $driver->get_firstname();
                }

                if(isset($_POST['lastname']) and !empty($_POST['lastname'])){
                    $lastname = htmlspecialchars($_POST['lastname']);
                }else{
                    $lastname = $driver->get_lastname();
                }
    
                if(isset($_POST['town']) and !empty($_POST['town'])){
                    $townID = htmlspecialchars($_POST['town']);
                }else{
                    $townID = $driver->get_townID();
                }

                if(isset($_POST['country']) and !empty($_POST['country'])){
                    $countryID = htmlspecialchars($_POST['country']);
                }else{
                    $countryID = $country->get_id();
                }

                if(isset($_POST['street']) and !empty($_POST['street'])){
                    $street = htmlspecialchars($_POST['street']);
                }else{
                    $street = $driver->get_street();
                }
    
                if(isset($_POST['houseNumber']) and !empty($_POST['houseNumber'])){
                    $houseNumber = htmlspecialchars($_POST['houseNumber']);
                }else{
                    $houseNumber = $driver->get_houseNumber();
                }
    
                if(isset($_POST['email']) and !empty($_POST['email'])){
                    $email = htmlspecialchars($_POST['email']);
                }else{
                    $email = $driver->get_email();
                }
    
                if(isset($_POST['phoneNumber']) and !empty($_POST['phoneNumber'])){
                    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                }else{
                    $phoneNumber = $driver->get_phone();
                }

                if(str_contains(strtolower($driver->get_firstname()), strtolower($firstname))==true and str_contains(strtolower($driver->get_lastname()), strtolower($lastname))==true and intval($driver->get_townID())==intval($townID) and str_contains(strtolower($country->get_id()),strtolower($countryID)) and 
                str_contains(strtolower($driver->get_street()), strtolower($street))==true and str_contains(strtolower($driver->get_houseNumber()), strtolower($houseNumber))==true and 
                str_contains(strtolower($driver->get_email()), strtolower($email))==true and str_contains(strtolower($driver->get_phone()), strtolower($phoneNumber))==true){
                    if(in_array($row,$admins)){
                        continue;
                    }else{
                        $resultIDs[] = $row;
                    }
                }

            }
            if(sizeof($resultIDs) == 0){
                $resultText = "Nincsen találat!";
            }
            echo "<div class='container mx-auto'>";
            echo "<div class='row'><h1 class='text-center'>".$resultText."</h1></div>";
                if (sizeof($resultIDs) > 0) {
                    foreach($resultIDs as $row) {
                        $driver->set_user($row,$conn);
                        $town->set_town($driver->get_townID(),$conn);
                        $country->set_country($town->get_country(),$conn);
                        $online = getOnlineDrivers($conn);
                        if(in_array($row,$online)){
                            $status = "<p><i class='fas fa-circle offline'></i> Jelenleg online</p>";
                        }else{
                            $status = "<p><i class='fas fa-circle offline'></i> Utoljára online: ".getDriverLastOnline($driver->get_id(),$conn)."</p>";
                        }
                        echo "<div class='row'>";
                        echo '<div class="mx-auto col-sm-6 my-5 result p-2 wow fadeInLeft">
                                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="smallPic">
                                <h1>Név: <a href="index.php?page=profile&id='.$row.'" target="_blank">'.$driver->get_lastname().' '.$driver->get_firstname().'</a></h1>'.$status.'
                                <p>Ország: '.$country->get_name().'</p>
                                <p>Város: '.$town->get_name().'</p>
                                <p>Utca, házszám: '.$driver->get_street().' '.$driver->get_houseNumber().'</p>
                                <p>Email: '.$driver->get_email().'</p>
                                <p>Telefonszám: '.$driver->get_phone().'</p>
                            </div>';
                        echo "</div>";
                    }
                }
            echo "</div>";
        }
    }
?>