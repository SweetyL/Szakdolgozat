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
                $sql2 = "INSERT INTO `companies`(`name`, `townID`, `street`, `houseNumber`, `email`, `phoneNumber`, `webpage`, `username`, `password`) VALUES ('".mysqli_real_escape_string($conn,$_POST['companyname'])."','".mysqli_real_escape_string($conn,$_POST['town'])."','".mysqli_real_escape_string($conn,$_POST['street'])."','".mysqli_real_escape_string($conn,$_POST['houseNumber'])."','".mysqli_real_escape_string($conn,$_POST['email'])."','".mysqli_real_escape_string($conn,$_POST['phoneNumber'])."','".mysqli_real_escape_string($conn,$_POST['webpage'])."','".mysqli_real_escape_string($conn,$_POST['username'])."',MD5('".mysqli_real_escape_string($conn,$_POST['password'])."'));";
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