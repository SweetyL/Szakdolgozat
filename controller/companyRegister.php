<?php
    require 'model/Country.php';
    $country = new Country();
    $countryIDs = $country->countriesList($conn);

    if((isset($_POST['companyname']) and isset($_POST['country']) and isset($_POST['town']) and 
    isset($_POST['street']) and isset($_POST['houseNumber']) and isset($_POST['email']) and isset($_POST['phoneNumber']) and 
    isset($_POST['webpage']) and isset($_POST['username']) and isset($_POST['password']))) {
        $sql = "SELECT * FROM companies WHERE username LIKE '".$_POST['username']."'";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if (!($result->num_rows > 0)) {
                $sql2 = "INSERT INTO `companies`(`name`, `countryID`, `townID`, `street`, `houseNumber`, `email`, `phoneNumber`, `webpage`, `username`, `password`) VALUES ('".$_POST['companyname']."','".$_POST['country']."','".$_POST['town']."','".$_POST['street']."','".$_POST['houseNumber']."','".$_POST['email']."','".$_POST['phoneNumber']."','".$_POST['webpage']."','".$_POST['username']."',MD5('".$_POST['password']."'));";
                $result = $conn->query($sql2);
                header('Location: index.php?page=index');
                exit();
            }else{
                echo '<p class="error">Egy vagy több adat nem jó.</p>';
            }
        }
    }
    include 'view/companyRegister.php';
?>