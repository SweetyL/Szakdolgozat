<?php
    $ADR = new ADR();
    $cargo = new Cargo();
    $cargoIDs = $cargo->cargoList($conn);
    $adrIDs = $ADR->adrList($conn);

    if(isset($_POST['aName']) and isset($_POST['aMass']) and isset($_POST['addADR'])){
        $sql = "INSERT INTO `cargo`(`name`, `mass`, `adr`) VALUES ('".mysqli_real_escape_string($conn,$_POST['aName'])."','".mysqli_real_escape_string($conn,$_POST['aMass'])." tonna','".mysqli_real_escape_string($conn,$_POST['addADR'])."')";
        $result = $conn->query($sql);
        header('Location: index.php?page=redirectFromCargo');
        exit();
    }
    if(isset($_POST['delCargo'])){
        $sql = "DELETE FROM `cargo` WHERE cargoID = ".mysqli_real_escape_string($conn,$_POST['delCargo']);
        $result = $conn->query($sql);
        header('Location: index.php?page=redirectFromCargo');
        exit();
    }
    if(isset($_POST['modCargo']) and isset($_POST['mn']) and isset($_POST['ms']) and isset($_POST['modADR'])){
        $sql = "UPDATE `cargo` SET ";
        if(isset($_POST['mn'])){
            $sql .= "`name`='".mysqli_real_escape_string($conn,$_POST['mn'])."', ";
        }
        if(isset($_POST['ms'])){
            $sql .= "`mass`='".mysqli_real_escape_string($conn,$_POST['ms'])." tonna', ";
        }
        if(isset($_POST['modADR'])){
            $sql .= "`adr`=".mysqli_real_escape_string($conn,$_POST['modADR'])." ";
        }
        $sql .= "WHERE cargoID = ".mysqli_real_escape_string($conn,$_POST['modCargo']);
        echo $sql;
        $result = $conn->query($sql);
        header('Location: index.php?page=redirectFromCargo');
        exit();
    }
    include 'view/editCargo.php';
?>