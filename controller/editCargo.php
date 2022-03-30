<?php
    require 'model/ADR.php';
    require 'model/Cargo.php';
    $ADR = new ADR();
    $cargo = new Cargo();
    $cargoIDs = $cargo->cargoList($conn);
    $adrIDs = $ADR->adrList($conn);

    //    ADD CARGO   //
    if(isset($_POST['aName']) and isset($_POST['aMass']) and isset($_POST['addADR'])){
        $sql = "INSERT INTO `cargo`(`name`, `mass`, `adr`) VALUES ('".mysqli_real_escape_string($conn,$_POST['aName'])."','".mysqli_real_escape_string($conn,$_POST['aMass'])." tonna','".mysqli_real_escape_string($conn,$_POST['addADR'])."')";
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }
    //    DEL CARGO   //
    if(isset($_POST['delCargo'])){
        $sql = "DELETE FROM `cargo` WHERE cargoID = ".mysqli_real_escape_string($conn,$_POST['delCargo']);
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }
    //    MODIFY CARGO    //
    if(isset($_POST['modCargo']) and isset($_POST['mn']) and isset($_POST['ms']) and isset($_POST['modADR'])){
        $sql = "UPDATE `cargo` SET ";

        //this code cheks if the user wants to change the cargo's name
        if(isset($_POST['mn']) and !empty($_POST['mn'])){
            $sql .= "`name`='".mysqli_real_escape_string($conn,$_POST['mn'])."', ";
        }else{
            $tmpSql = "SELECT name FROM cargo WHERE cargoID = ".mysqli_real_escape_string($conn,$_POST['modCargo']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`name`='".$row['name']."', ";
        }

        //this code checks if the user wants to change the cargo's mass
        if(isset($_POST['ms']) and !empty($_POST['ms'])){
            $sql .= "`mass`='".mysqli_real_escape_string($conn,$_POST['ms'])." tonna', ";
        }else{
            $tmpSql = "SELECT mass FROM cargo WHERE cargoID = ".mysqli_real_escape_string($conn,$_POST['modCargo']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`mass`='".$row['mass']."', ";
        }

        //this code checks if the user wants to change the cargo's ADR class
        if(isset($_POST['modADR']) and !empty($_POST['modADR'])){
            $sql .= "`adr`=".mysqli_real_escape_string($conn,$_POST['modADR'])." ";
        }else{
            $tmpSql = "SELECT adr FROM cargo WHERE cargoID = ".mysqli_real_escape_string($conn,$_POST['modCargo']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`adr`=".$row['adr']." ";
        }

        $sql .= "WHERE cargoID = ".mysqli_real_escape_string($conn,$_POST['modCargo']);
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }
    include 'view/editCargo.php';
?>