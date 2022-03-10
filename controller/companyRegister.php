<?php
    $country = new Country();
    $countryIDs = $country->countriesList($conn);

    if((isset($_POST['companyname']) and isset($_POST['town']) and 
    isset($_POST['street']) and isset($_POST['houseNumber']) and isset($_POST['email']) and isset($_POST['phoneNumber']) and 
    isset($_POST['webpage']) and isset($_POST['username']) and isset($_POST['password']))) {
        $sql = "SELECT * FROM companies WHERE username LIKE '".mysqli_real_escape_string($conn,$_POST['username'])."'";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if (!($result->num_rows > 0)) {
                $sql2 = "INSERT INTO `companies`(`name`, `townID`, `street`, `houseNumber`, `email`, `phoneNumber`, `webpage`, `username`, `password`) VALUES ('".strip_tags(mysqli_real_escape_string($conn,$_POST['companyname']))."','".strip_tags(mysqli_real_escape_string($conn,$_POST['town']))."','".strip_tags(mysqli_real_escape_string($conn,$_POST['street']))."','".strip_tags(mysqli_real_escape_string($conn,$_POST['houseNumber']))."','".strip_tags(mysqli_real_escape_string($conn,$_POST['email']))."','".strip_tags(mysqli_real_escape_string($conn,$_POST['phoneNumber']))."','".strip_tags(mysqli_real_escape_string($conn,$_POST['webpage']))."','".strip_tags(mysqli_real_escape_string($conn,$_POST['username']))."',MD5('".strip_tags(mysqli_real_escape_string($conn,$_POST['password']))."'));";
                $result = $conn->query($sql2);
                logger("[I]".date("Y-m-d H:i:s")." - ".$_SERVER['REMOTE_ADDR']." a".$_POST['user']." uj vallalat regisztralt\n");
                header('Location: index.php?page=index');
                exit();
            }else{
                echo '<p class="error">Egy vagy több adat nem jó.</p>';
            }
        }
    }
    logger("[I]".date("Y-m-d H:i:s")." - ".$_SERVER['REMOTE_ADDR']." belepett a vallalat regisztracio oldalra\n");
    include 'view/companyRegister.php';
?>