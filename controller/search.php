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
    include 'view/search.php';
    if($_SESSION["type"]=="driver"){
        if(!empty($_POST['companyName']) || !empty($_POST['country']) || !empty($_POST['town']) || !empty($_POST['street']) || !empty($_POST['houseNumber']) || !empty($_POST['email']) || !empty($_POST['phoneNumber']) || !empty($_POST['webpage'])) {
            $name = "%";
            $townID = "%";
            $street = "%";
            $houseNumber = "%";
            $email = "%";
            $phoneNumber = "%";
            $webpage = "%";
            //$sql = "SELECT compID FROM companies WHERE name LIKE '?' AND townID IN('?') AND street LIKE '?' AND houseNumber LIKE '?' AND email LIKE '?' AND phoneNumber LIKE '?' AND webpage LIKE '?'";
            $sql = "SELECT compID FROM companies WHERE name LIKE '?'";
            $stmt = $conn->prepare($sql);
            if(isset($_POST['companyName']) and !empty($_POST['companyName'])){
                $name = "%".htmlspecialchars($_POST['companyName'])."%";
            }

            if(isset($_POST['town']) and !empty($_POST['town'])){
                $townID = intval(htmlspecialchars($_POST['town']));
            }

            if(isset($_POST['street']) and !empty($_POST['street'])){
                $street = "%".htmlspecialchars($_POST['street'])."%";
            }

            if(isset($_POST['houseNumber']) and !empty($_POST['houseNumber'])){
                $houseNumber = "%".htmlspecialchars($_POST['houseNumber'])."%";
            }

            if(isset($_POST['email']) and !empty($_POST['email'])){
                $email = "%".htmlspecialchars($_POST['email'])."%";
            }

            if(isset($_POST['phoneNumber']) and !empty($_POST['phoneNumber'])){
                $phoneNumber = "%".htmlspecialchars($_POST['phoneNumber'])."%";
            }

            if(isset($_POST['webpage']) and !empty($_POST['webpage'])){
                $webpage = "%".htmlspecialchars($_POST['webpage'])."%";
            }
            $stmt->bind_param("sisssss",$name ,$townID, $street, $houseNumber, $email, $phoneNumber, $webpage);
            $stmt->execute();
            if($result = $stmt->get_result()) {
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
            $stmt->close();
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