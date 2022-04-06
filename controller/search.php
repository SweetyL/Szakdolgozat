<?php
    if(empty($_SESSION["id"])){
        header('Location: index.php?page=404');
        exit();
    }
    $driver = new Driver();
    $company = new Company();
    $country = new Country();
    $town = new Town();
    $countryIDs = $country->countriesList($conn);
    $companyIDs = $company->companiesList($conn);
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
            echo "<div class='container mx-auto'>";
            echo "<div class='row'><h1 class='text-center'>Eredmények:</h1></div>";
                if (sizeof($resultIDs) > 0) {
                    foreach($resultIDs as $row) {
                        $company->set_user($row,$conn);
                        $town->set_town($company->get_townID(),$conn);
                        $country->set_country($town->get_country(),$conn);
                        echo "<div class='row'>";
                        echo '<div class="mx-auto col-sm-6 my-5 result p-2 wow fadeInLeft">
                                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="smallPic">
                                <h1>Név: <a href="index.php?page=profile&id='.$row.'" target="_blank">'.$company->get_name().'</a></h1>
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
        if(isset($_POST['name'])) {
            $sql = "SELECT compID FROM companies WHERE name LIKE '%".mysqli_real_escape_string($conn,$_POST['name'])."%'";
            if($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $company->set_user($row["compID"],$conn);
                        $town->set_town($company->get_townID(),$conn);
                        $country->set_country($town->get_country(),$conn);
                        echo '<div class="result p-2 flex-fill">
                                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="smallPic">
                                <h1>Név: <a href="index.php?page=profile&id='.$row["compID"].'" target="_blank">'.$company->get_name().'</a></h1>
                                <p>Ország: '.$country->get_name().'</p>
                                <p>Város: '.$town->get_name().'</p>
                                <p>Utca, házszám: '.$company->get_street().' '.$company->get_houseNumber().'</p>
                                <p>Email: '.$company->get_email().'</p>
                                <p>Telefonszám: '.$company->get_phone().'</p>
                                <p>Weboldal: <a href="https://'.$company->get_webpage().'" target="_blank">'.$company->get_webpage().'</a>
                            </div>';
                    }
                }
            }
        }
    }
?>