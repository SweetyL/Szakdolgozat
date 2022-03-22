<?php
    if(empty($_SESSION["id"])){
        header('Location: index.php?page=404');
        exit();
    }
    echo '<div class="d-flex flex-column align-items-center justify-content-center">';
    include 'view/search.php';
    $driver = new Driver();
    $company = new Company();
    $country = new Country();
    $town = new Town();
    if($_SESSION["type"]=="driver" or $_SESSION["type"]=="admin"){
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
    else if($_SESSION["type"]=="company" or $_SESSION["type"]=="admin"){
            if(!empty($_POST['lname']) and empty($_POST['fname'])){
                $sql = "SELECT driverID FROM drivers WHERE lastname LIKE '%".mysqli_real_escape_string($conn,$_POST['lname'])."%'";
            }else if(!empty($_POST['fname']) and empty($_POST['lname'])){
                $sql = "SELECT driverID FROM drivers WHERE firstname LIKE '%".mysqli_real_escape_string($conn,$_POST['fname'])."%'";
            }else if(empty($_POST['fname']) and empty($_POST['lname'])){
                $sql = "SELECT driverID FROM drivers WHERE lastname LIKE '%".mysqli_real_escape_string($conn,$_POST['lname'])."%' AND firstname LIKE '%".mysqli_real_escape_string($conn,$_POST['fname'])."%'";
            }
            echo $sql;
            if($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $driver->set_user($row["driverID"],$conn);
                        $town->set_town($driver->get_townID(),$conn);
                        $country->set_country($town->get_country(),$conn);
                        // skip admins HOTFIX
                        #region
                        if(empty($driver->get_email())){
                            continue;
                        }
                        #endregion
                        echo '<div class="result p-2 flex-fill">
                            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="smallPic">
                            <h1>Név: <a href="index.php?page=profile&id='.$row["driverID"].'" target="_blank">'.$driver->get_lastname().' '.$driver->get_firstname().'</a></h1>
                            <p>Ország: '.$country->get_name().'</p>
                            <p>Város: '.$town->get_name().'</p>
                            <p>Utca, házszám: '.$driver->get_street().' '.$driver->get_houseNumber().'</p>
                            <p>Email: '.$driver->get_email().'</p>
                            <p>Telefonszám: '.$driver->get_phone().'</p>
                        </div>';
                    }
                }
            }
        }
    echo '</div>';
?>