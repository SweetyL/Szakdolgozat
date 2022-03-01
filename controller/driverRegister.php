<?php
    $country = new Country();
    $countryIDs = $country->countriesList($conn);

    if(isset($_POST['lastname']) and isset($_POST['firstname']) and isset($_POST['town']) and 
    isset($_POST['street']) and isset($_POST['houseNumber']) and isset($_POST['email']) and isset($_POST['phoneNumber']) and 
    isset($_POST['username']) and isset($_POST['password'])) {
        $sql = "SELECT * FROM drivers WHERE username LIKE '".mysqli_real_escape_string($conn,$_POST['username'])."'";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if (!($result->num_rows > 0)) {
                $sql2 = "INSERT INTO `drivers`(`firstname`, `lastname`, `townID`, `street`, `houseNumber`, `email`, `phoneNumber`, `username`, `password`) VALUES ('".mysqli_real_escape_string($conn,$_POST['firstname'])."','".mysqli_real_escape_string($conn,$_POST['lastname'])."','".mysqli_real_escape_string($conn,$_POST['town'])."','".mysqli_real_escape_string($conn,$_POST['street'])."','".mysqli_real_escape_string($conn,$_POST['houseNumber'])."','".mysqli_real_escape_string($conn,$_POST['email'])."','".mysqli_real_escape_string($conn,$_POST['phoneNumber'])."','".mysqli_real_escape_string($conn,$_POST['username'])."',MD5('".mysqli_real_escape_string($conn,$_POST['password'])."'));";
                $result = $conn->query($sql2);
                logger("[I]".date("Y-m-d H:i:s")." - ".$_SERVER['REMOTE_ADDR']." a".$_POST['user']." uj sofor regisztralt\n");
                header('Location: index.php?page=index');
                exit();
            }else{
                echo '<p class="error">Egy vagy több adat nem jó.</p>';
            }
        }
    }
    logger("[I]".date("Y-m-d H:i:s")." - ".$_SERVER['REMOTE_ADDR']." belepett a sofor regisztracio oldalra\n");
    include 'view/driverRegister.php';
?>