<?php
    if(!empty($_SESSION["id"]) and !$_SESSION["type"] == "admin"){
        header('Location: index.php?page=404');
        exit();
    }
    
    include 'model/Cargo.php';
    include 'model/Trip.php';
    $cargo = new Cargo();
    $trip = new Trip();
    $cargoIDs = $cargo->cargoList($conn);
    $tripIDs = $trip->tripList($conn);
    
    //    ADD TRIP   //
    if(isset($_POST['aStart']) and isset($_POST['aEnd']) and isset($_POST['aLength']) and isset($_POST['addCargo'])){
        $sql = "INSERT INTO `trips`(`tripStart`, `tripEnd`, `tripLength`, `cargoID`) VALUES ('".mysqli_real_escape_string($conn,$_POST['aStart'])."','".mysqli_real_escape_string($conn,$_POST['aEnd'])."','".mysqli_real_escape_string($conn,$_POST['aLength'])." KM','".mysqli_real_escape_string($conn,$_POST['addCargo'])."')";
        echo $sql;
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }

    //    DEL TRIP   //
    if(isset($_POST['delTrip'])){
        $sql = "DELETE FROM `trips` WHERE tripID = ".mysqli_real_escape_string($conn,$_POST['delTrip']);
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }

    //    MODIFY CARGO    //
    if(isset($_POST['modTrip']) and isset($_POST['mStart']) and isset($_POST['mEnd']) and isset($_POST['mLength']) and isset($_POST['modCargo'])){
        $sql = "UPDATE `trips` SET ";

        //this code cheks if the user wants to change the cargo's name
        if(isset($_POST['mStart']) and !empty($_POST['mStart'])){
            $sql .= "`tripStart`='".mysqli_real_escape_string($conn,$_POST['mStart'])."', ";
        }else{
            $tmpSql = "SELECT tripStart FROM trips WHERE tripID = ".mysqli_real_escape_string($conn,$_POST['modTrip']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`tripStart`='".$row['tripStart']."', ";
        }

        //this code checks if the user wants to change the cargo's mass
        if(isset($_POST['mEnd']) and !empty($_POST['mEnd'])){
            $sql .= "`tripEnd`='".mysqli_real_escape_string($conn,$_POST['mEnd'])."', ";
        }else{
            $tmpSql = "SELECT tripEnd FROM trips WHERE tripID = ".mysqli_real_escape_string($conn,$_POST['modTrip']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`tripEnd`='".$row['tripEnd']."', ";
        }

        //this code checks if the user wants to change the cargo's mass
        if(isset($_POST['mLength']) and !empty($_POST['mLength'])){
            $sql .= "`tripLength`='".mysqli_real_escape_string($conn,$_POST['mLength'])." KM', ";
        }else{
            $tmpSql = "SELECT tripLength FROM trips WHERE tripID = ".mysqli_real_escape_string($conn,$_POST['modTrip']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`tripLength`='".$row['tripLength']."', ";
        }

        //this code checks if the user wants to change the cargo's ADR class
        if(isset($_POST['modCargo']) and !empty($_POST['modCargo'])){
            $sql .= "`cargoID`='".mysqli_real_escape_string($conn,$_POST['modCargo'])."' ";
        }else{
            $tmpSql = "SELECT cargoID FROM trips WHERE tripID = ".mysqli_real_escape_string($conn,$_POST['modCargo']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`cargoID`=".$row['cargoID']." ";
        }

        $sql .= "WHERE tripID = ".mysqli_real_escape_string($conn,$_POST['modTrip']);
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }
    include 'view/editTrips.php';
?>