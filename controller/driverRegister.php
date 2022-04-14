<?php
    $country = new Country();
    $countryIDs = $country->countriesList($conn);
    $err = "";
    if(!empty($_SESSION['id'])){
        header('Location: index.php?page=404');
        exit();
    }
    if(isset($_POST['lastname']) and isset($_POST['firstname']) and isset($_POST['town']) and 
    isset($_POST['street']) and isset($_POST['houseNumber']) and isset($_POST['email']) and isset($_POST['phoneNumber']) and 
    isset($_POST['username']) and isset($_POST['password'])) {
        $sql = "SELECT * FROM drivers WHERE username LIKE '".htmlspecialchars($_POST['username'])."'";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if (!($result->num_rows > 0)) {
                $sql2 = "INSERT INTO `drivers`(`firstname`, `lastname`, `townID`, `street`, `houseNumber`, `email`, `phoneNumber`, `username`, `password`) VALUES ('".htmlspecialchars($_POST['firstname'])."','".htmlspecialchars($_POST['lastname'])."','".htmlspecialchars($_POST['town'])."','".htmlspecialchars($_POST['street'])."','".htmlspecialchars($_POST['houseNumber'])."','".htmlspecialchars($_POST['email'])."','".htmlspecialchars($_POST['phoneNumber'])."','".htmlspecialchars($_POST['username'])."',MD5('".htmlspecialchars($_POST['password'])."'));";
                $result = $conn->query($sql2);
                header('Location: index.php?page=index');
                exit();
            }else{
                echo '<p class="error">Egy vagy több adat nem jó.</p>';
            }
        }
    }
    include 'view/driverRegister.php';
?>