<?php
    $country = new Country();
    $countryIDs = $country->countriesList($conn);
    if(!empty($_SESSION['id'])){
        header('Location: index.php?page=404');
        exit();
    }
    if((isset($_POST['companyname']) and isset($_POST['town']) and 
    isset($_POST['street']) and isset($_POST['houseNumber']) and isset($_POST['email']) and isset($_POST['phoneNumber']) and 
    isset($_POST['webpage']) and isset($_POST['username']) and isset($_POST['password']))) {
        $sql = "SELECT * FROM companies WHERE username LIKE '".htmlspecialchars($_POST['username'])."'";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if (!($result->num_rows > 0)) {
                $sql2 = "INSERT INTO `companies`(`name`, `townID`, `street`, `houseNumber`, `email`, `phoneNumber`, `webpage`, `username`, `password`) VALUES ('".htmlspecialchars($_POST['companyname'])."','".htmlspecialchars($_POST['town'])."','".htmlspecialchars($_POST['street'])."','".htmlspecialchars($_POST['houseNumber'])."','".htmlspecialchars($_POST['email'])."','".htmlspecialchars($_POST['phoneNumber'])."','".htmlspecialchars($_POST['webpage'])."','".htmlspecialchars($_POST['username'])."',MD5('".htmlspecialchars($_POST['password'])."'));";
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