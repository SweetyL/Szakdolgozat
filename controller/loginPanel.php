<?php
$driver = new Driver();
$company = new Company();
if(empty($_REQUEST['action'])){
    header('Location: index.php?page=index');
    exit();
}
if($_REQUEST['action'] == 'logout'){
    if($_SESSION['type']=="driver"){
        $sql = "DELETE FROM `driverstatus` WHERE id =".$_SESSION['id'];
        $conn->query($sql);
        $sql2 = "INSERT INTO `driverstatus`(`id`, `date`) VALUES (".$_SESSION['id'].",'".date("Y-m-d H:i:s")."')";
        $conn->query($sql2);
    }else if($_SESSION['type']=="company"){
        $sql = "DELETE FROM `compstatus` WHERE id =".$_SESSION['id'];
        $conn->query($sql);
        $sql2 = "INSERT INTO `compstatus`(`id`, `date`) VALUES (".$_SESSION['id'].",'".date("Y-m-d H:i:s")."')";
        $conn->query($sql2);
    }
    session_unset();
    header('Location: index.php?page=index');
    exit();
}
else if(!empty($_SESSION["id"])){
    header('Location: index.php?page=404');
    exit();
}
if(isset($_POST['user']) and isset($_POST['pw'])) {
    $loginError = '';
    if(strlen($_POST['user']) == 0) $loginError .= "Nem írtál be felhasználónevet!<br>";
    if(strlen($_POST['pw']) == 0) $loginError .= "Nem írtál be jelszót!<br>";
    if($loginError == '') {
        if($_REQUEST['action']=="drivers"){
            $sql = "SELECT driverID FROM ".$_REQUEST['action']." WHERE username LIKE '".htmlspecialchars($_POST['user'])."'";
        }else{
            $sql = "SELECT compID FROM ".$_REQUEST['action']." WHERE username LIKE '".htmlspecialchars($_POST['user'])."'";
        }
        if(!$result = $conn->query($sql)) echo $conn->error;
    
            if ($result->num_rows > 0) {
                
                if($row = $result->fetch_assoc()) {
                    if($_REQUEST['action']=="drivers"){
                        $driver->set_user($row['driverID'], $conn);
                        if(md5($_POST['pw']) == $driver->get_password()) {
                            $_SESSION["id"] = $row['driverID'];
                            $_SESSION["name"] = $driver->get_lastname()." ".$driver->get_firstname();
                            if(in_array($driver->get_id(),$admins)){
                                $_SESSION["type"] = "admin";
                            }else{
                                $_SESSION["type"] = "driver";
                            }
                            $sql = "DELETE FROM `driverstatus` WHERE id =".$row['driverID'];
                            $conn->query($sql);
                            $sql2 = "INSERT INTO `driverstatus`(`id`) VALUES (".$row['driverID'].")";
                            $conn->query($sql2);
                            header('Location: index.php?page=index');
                            exit();
                        }
                        else $loginError .= 'Érvénytelen jelszó<br>';
                    }
                    else{
                        $company->set_user($row['compID'], $conn);
                        if(md5($_POST['pw']) == $company->get_password()) {
                            $_SESSION["id"] = $row['compID'];
                            $_SESSION["name"] = $company->get_name();
                            $_SESSION["type"] = "company";
                            $sql = "DELETE FROM `compstatus` WHERE id =".$row['compID'];
                            $conn->query($sql);
                            $sql2 = "INSERT INTO `compstatus`(`id`) VALUES (".$row['compID'].")";
                            $conn->query($sql2);
                            header('Location: index.php?page=index');
                            exit();
                        }
                        else $loginError .= 'Érvénytelen jelszó<br>';
                    }
                }
            }
            else $loginError .= 'Érvénytelen felhasználónév<br>';
    }
}
include 'view/loginPanel.php';
?>