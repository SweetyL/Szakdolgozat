<?php
    if(empty($_SESSION['id']) or $_SESSION['type'] == "driver"){
        header('Location: index.php?page=404');
        exit();
    }
    require 'model/truck/Engine.php';
    $engine = new Engine();
    $engineIDs = $engine->engineList($conn);

    //    ADD ENGINE   //
    if(isset($_POST['aBrand']) and isset($_POST['aName']) and isset($_POST['aPower'])){
        $sql = "INSERT INTO `engines`(`name`, `brand`, `power`) VALUES ('".htmlspecialchars($_POST['aBrand'])."','".htmlspecialchars($_POST['aName'])."','".htmlspecialchars($_POST['aPower'])." kW')";
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }

    //    DEL ENGINE   //
    if(isset($_POST['delEngine'])){
        $sql = "DELETE FROM `engines` WHERE engineID = ".htmlspecialchars($_POST['delEngine']);
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }

    //    MODIFY ENGINE    //
    if(isset($_POST['modEngine']) and isset($_POST['mName']) and isset($_POST['mBrand']) and isset($_POST['mPower'])){
        $sql = "UPDATE `engines` SET ";

        //this code cheks if the user wants to change the cargo's name
        if(isset($_POST['mName']) and !empty($_POST['mName'])){
            $sql .= "`name`='".htmlspecialchars($_POST['mName'])."', ";
        }else{
            $tmpSql = "SELECT name FROM engines WHERE engineID = ".htmlspecialchars($_POST['modEngine']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`name`='".$row['name']."', ";
        }

        //this code checks if the user wants to change the cargo's mass
        if(isset($_POST['mBrand']) and !empty($_POST['mBrand'])){
            $sql .= "`brand`='".htmlspecialchars($_POST['mBrand'])."', ";
        }else{
            $tmpSql = "SELECT brand FROM engines WHERE engineID = ".htmlspecialchars($_POST['modEngine']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`brand`='".$row['brand']."', ";
        }

        //this code checks if the user wants to change the cargo's ADR class
        if(isset($_POST['mPower']) and !empty($_POST['mPower'])){
            $sql .= "`power`='".htmlspecialchars($_POST['mPower'])." kW' ";
        }else{
            $tmpSql = "SELECT power FROM engines WHERE engineID = ".htmlspecialchars($_POST['modEngine']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`power`='".$row['power']."' ";
        }

        $sql .= "WHERE engineID = ".htmlspecialchars($_POST['modEngine']);
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }
    include 'view/editEngines.php';
?>