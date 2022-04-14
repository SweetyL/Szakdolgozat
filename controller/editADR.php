<?php
    if(empty($_SESSION['id']) or $_SESSION['type']=="company"){
        header('Location: index.php?page=404');
        exit();
    }
    require 'model/ADR.php';
    $ADR = new ADR();
    $adrIDs = $ADR->adrList($conn);
    $driver = new Driver();
    $driverIDs = $driver->driversList($conn);
    $driverADRs = array();
    if($_SESSION["type"]=="driver"){
        $driver->set_user($_SESSION['id'],$conn);
        $driverADRs = getADRcertificate($driver->get_id(),$conn);
        // ADD ADR
        if(!empty($_POST['addADR'])){
            $sql = "INSERT INTO `skills`(`driverID`, `adrID`) VALUES ('".$_SESSION['id']."','".$_POST['addADR']."')";
            $result = $conn->query($sql);
            header('Location: index.php?page=redirect');
            exit();
        }
        //DELETE ADR
        if(!empty($_POST['delADR'])){
            $sql = "DELETE FROM `skills` WHERE driverID =".$_SESSION['id']." AND adrID =".$_POST['delADR'];
            $result = $conn->query($sql);
            header('Location: index.php?page=redirect');
            exit();
        }
    }else if($_SESSION["type"]=="admin"){
        // ADD ADR
        if(!empty($_POST['selDriverAdd']) and !empty($_POST['addADR'])){
            $sql = "INSERT INTO `skills`(`driverID`, `adrID`) VALUES ('".$_POST['selDriverAdd']."','".$_POST['addADR']."')";
            $result = $conn->query($sql);
            header('Location: index.php?page=redirect');
            exit();
        }
        //DELETE ADR
        if(!empty($_POST['selDriverDel']) and !empty($_POST['delADR'])){
            $sql = "DELETE FROM `skills` WHERE driverID =".$_POST['selDriverDel']." AND adrID =".$_POST['delADR'];
            $result = $conn->query($sql);
            header('Location: index.php?page=redirect');
            exit();
        }
    }
    include 'view/editADR.php';
?>