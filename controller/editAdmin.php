<?php
    if(empty($_SESSION['id']) or !$_SESSION['type'] == "admin"){
        header('Location: index.php?page=404');
        exit();
    }
    $driver = new Driver();
    $driverIDs = $driver->driversList($conn);
    //    ADD ADMIN   //
    if(isset($_POST['addAdmin']) and isset($_POST['aPass'])){
        $loginError = '';
        $driver->set_user($_SESSION['id'],$conn);
        $sql = "SELECT driverID FROM drivers WHERE username LIKE '".$driver->get_username()."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()) {
                    if(!(md5($_POST['aPass']) == $driver->get_password())) {
                        $loginError .= 'Érvénytelen jelszó!';
                    }else{
                        $sql = "INSERT INTO `admins`(`id`) VALUES ('".htmlspecialchars($_POST['addAdmin'])."')";
                        $result = $conn->query($sql);
                        header('Location: index.php?page=redirect');
                        exit();
                    }
            }
        }
    }
    //    DELETE ADMIN   //
    if(isset($_POST['delAdmin']) and isset($_POST['dPass'])){
        $loginError = '';
        $driver->set_user($_SESSION["id"],$conn);
        $sql = "SELECT driverID FROM drivers WHERE username LIKE '".$driver->get_username()."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()) {
                    if(!(md5($_POST['dPass']) == $driver->get_password())) {
                        $loginError .= 'Érvénytelen jelszó!';
                    }else{
                        $sql = "DELETE FROM `admins` WHERE id =".htmlspecialchars($_POST['delAdmin']);
                        $result = $conn->query($sql);
                        if($_SESSION['id']==$_POST['delAdmin']){
                            $_SESSION['type'] = "driver";
                        }
                        header('Location: index.php?page=redirect');
                        exit();
                    }
                }
        }
    }
    include 'view/editAdmin.php';
?>