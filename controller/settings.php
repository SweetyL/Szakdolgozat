<?php
    if(empty($_SESSION['id'])){
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
    if($_SESSION['type']=="driver"){
        $driver->set_user($_SESSION["id"],$conn);
        $town->set_town($driver->get_townID(),$conn);
        $country->set_country($town->get_country(),$conn);
        $currentCountry = $country->get_name();
        $currentTown = $town->get_name();
        //    MODIFY PERSONAL INFORMATIONS    //
        if(isset($_POST['password']) and !empty($_POST['password'])){
            $error = '';
            $sql = "SELECT driverID FROM drivers WHERE username LIKE '".$driver->get_username()."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                if($row = $result->fetch_assoc()) {
                        if(!(md5($_POST['password']) == $driver->get_password())) {
                            $error .= 'Érvénytelen jelszó!';
                        }else{
                            if(isset($_POST['lastname']) and isset($_POST['firstname']) and isset($_POST['country']) and isset($_POST['town']) and isset($_POST['street']) and isset($_POST['houseNumber']) and isset($_POST['email']) and isset($_POST['phoneNumber']) and isset($_POST['password'])){
                                $sql = "UPDATE `drivers` SET ";
                    
                                //check if the user wants to change their firstname
                                if(isset($_POST['firstname']) and !empty($_POST['firstname'])){
                                    $sql .= "`firstname`='".htmlspecialchars($_POST['firstname'])."', ";
                                }else{
                                    $tmpSql = "SELECT firstname FROM drivers WHERE driverID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`firstname`='".$row['firstname']."', ";
                                }
                    
                                //check if the user wants to change their lastname
                                if(isset($_POST['lastname']) and !empty($_POST['lastname'])){
                                    $sql .= "`lastname`='".htmlspecialchars($_POST['lastname'])."', ";
                                }else{
                                    $tmpSql = "SELECT lastname FROM drivers WHERE driverID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`lastname`='".$row['lastname']."', ";
                                }
                    
                                //check if the user wants to change their country
                                if(isset($_POST['town']) and !empty($_POST['town'])){
                                    $sql .= "`townID`='".htmlspecialchars($_POST['town'])."', ";
                                }else{
                                    $tmpSql = "SELECT townID FROM drivers WHERE driverID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`townID`='".$row['townID']."', ";
                                }
                    
                                //check if the user wants to change their country
                                if(isset($_POST['street']) and !empty($_POST['street'])){
                                    $sql .= "`street`='".htmlspecialchars($_POST['street'])."', ";
                                }else{
                                    $tmpSql = "SELECT street FROM drivers WHERE driverID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`street`='".$row['street']."', ";
                                }
                    
                                //check if the user wants to change their country
                                if(isset($_POST['houseNumber']) and !empty($_POST['houseNumber'])){
                                    $sql .= "`houseNumber`='".htmlspecialchars($_POST['houseNumber'])."', ";
                                }else{
                                    $tmpSql = "SELECT houseNumber FROM drivers WHERE driverID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`houseNumber`='".$row['houseNumber']."', ";
                                }
                    
                                //check if the user wants to change their country
                                if(isset($_POST['email']) and !empty($_POST['email'])){
                                    $sql .= "`email`='".htmlspecialchars($_POST['email'])."', ";
                                }else{
                                    $tmpSql = "SELECT email FROM drivers WHERE driverID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`email`='".$row['email']."', ";
                                }
                    
                                //check if the user wants to change their country
                                if(isset($_POST['phoneNumber']) and !empty($_POST['phoneNumber'])){
                                    $sql .= "`phoneNumber`='".htmlspecialchars($_POST['phoneNumber'])."' ";
                                }else{
                                    $tmpSql = "SELECT phoneNumber FROM drivers WHERE driverID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`phoneNumber`='".$row['phoneNumber']."' ";
                                }
                                $sql .= "WHERE driverID = ".$_SESSION['id'];
                                $result = $conn->query($sql);
                                header('Location: index.php?page=redirect');
                                exit();
                        }
                    }
                }
            }
        }
}else if($_SESSION['type']=="company"){
        $company->set_user($_SESSION["id"],$conn);
        $town->set_town($company->get_townID(),$conn);
        $country->set_country($town->get_country(),$conn);
        $currentCountry = $country->get_name();
        $currentTown = $town->get_name();
        //    MODIFY PERSONAL INFORMATIONS    //
        if(isset($_POST['password']) and !empty($_POST['password'])){
            $error = '';
            $sql = "SELECT compID FROM companies WHERE username LIKE '".$company->get_username()."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                if($row = $result->fetch_assoc()) {
                        if(!(md5($_POST['password']) == $company->get_password())) {
                            $error .= 'Érvénytelen jelszó!';
                        }else{
                            if(isset($_POST['companyName']) and isset($_POST['country']) and isset($_POST['town']) and isset($_POST['street']) and isset($_POST['houseNumber']) and isset($_POST['email']) and isset($_POST['phoneNumber']) and isset($_POST['webpage']) and isset($_POST['password'])){
                                $sql = "UPDATE `companies` SET ";
                    
                                //check if the user wants to change their lastname
                                if(isset($_POST['companyName']) and !empty($_POST['companyName'])){
                                    $sql .= "`name`='".htmlspecialchars($_POST['companyName'])."', ";
                                }else{
                                    $tmpSql = "SELECT companyName FROM companies WHERE compID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`name='".$row['companyName']."', ";
                                }
                    
                                //check if the user wants to change their country
                                if(isset($_POST['town']) and !empty($_POST['town'])){
                                    $sql .= "`townID`='".htmlspecialchars($_POST['town'])."', ";
                                }else{
                                    $tmpSql = "SELECT townID FROM companies WHERE compID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`townID`='".$row['townID']."', ";
                                }
                    
                                //check if the user wants to change their country
                                if(isset($_POST['street']) and !empty($_POST['street'])){
                                    $sql .= "`street`='".htmlspecialchars($_POST['street'])."', ";
                                }else{
                                    $tmpSql = "SELECT street FROM companies WHERE compID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`street`='".$row['street']."', ";
                                }
                    
                                //check if the user wants to change their country
                                if(isset($_POST['houseNumber']) and !empty($_POST['houseNumber'])){
                                    $sql .= "`houseNumber`='".htmlspecialchars($_POST['houseNumber'])."', ";
                                }else{
                                    $tmpSql = "SELECT houseNumber FROM companies WHERE compID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`houseNumber`='".$row['houseNumber']."', ";
                                }
                    
                                //check if the user wants to change their country
                                if(isset($_POST['email']) and !empty($_POST['email'])){
                                    $sql .= "`email`='".htmlspecialchars($_POST['email'])."', ";
                                }else{
                                    $tmpSql = "SELECT email FROM companies WHERE compID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`email`='".$row['email']."', ";
                                }
                    
                                //check if the user wants to change their country
                                if(isset($_POST['phoneNumber']) and !empty($_POST['phoneNumber'])){
                                    $sql .= "`phoneNumber`='".htmlspecialchars($_POST['phoneNumber'])."', ";
                                }else{
                                    $tmpSql = "SELECT phoneNumber FROM companies WHERE compID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`phoneNumber`='".$row['phoneNumber']."', ";
                                }

                                //check if the user wants to change their country
                                if(isset($_POST['webpage']) and !empty($_POST['webpage'])){
                                    $sql .= "`webpage`='".htmlspecialchars($_POST['webpage'])."' ";
                                }else{
                                    $tmpSql = "SELECT webpage FROM companies WHERE compID = ".$_SESSION['id'];
                                    $res = $conn->query($tmpSql);
                                    $row = $res->fetch_assoc();
                                    $sql .="`webpage`='".$row['webpage']."' ";
                                }

                                $sql .= "WHERE compID = ".$_SESSION['id'];
                                $result = $conn->query($sql);
                                header('Location: index.php?page=redirect');
                                exit();
                        }
                    }
                }
            }
        }
}
    include 'view/settings.php';
?>