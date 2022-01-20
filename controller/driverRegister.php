<?php
    require 'model/Country.php';
    $country = new Country();
    $countryIDs = $country->countriesList($conn);

    if(isset($_POST['lastname']) and isset($_POST['firstname']) and isset($_POST['town']) and 
    isset($_POST['street']) and isset($_POST['houseNumber']) and isset($_POST['email']) and isset($_POST['phoneNumber']) and 
    isset($_POST['username']) and isset($_POST['password'])) {
        $sql = "SELECT * FROM drivers WHERE username LIKE '".$_POST['username']."'";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if (!($result->num_rows > 0)) {
                $sql2 = "INSERT INTO `drivers`(`firstname`, `lastname`, `townID`, `street`, `houseNumber`, `email`, `phoneNumber`, `username`, `password`) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['town']."','".$_POST['street']."','".$_POST['houseNumber']."','".$_POST['email']."','".$_POST['phoneNumber']."','".$_POST['username']."',MD5('".$_POST['password']."'));";
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