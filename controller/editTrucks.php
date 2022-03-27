<?php
    require 'model/truck/Engine.php';
    require 'model/truck/Truck.php';
    $engine = new Engine();
    $truck = new Truck();
    $engineIDs = $engine->engineList($conn);
    $truckIDs = $truck->truckList($conn);

    if(isset($_POST['aBrand']) and isset($_POST['aName']) and isset($_POST['addEngine']) and isset($_POST['aTank']) and isset($_POST['aAxles'])){
        $sql = "";
        if(isset($_POST['aCons']) and !empty($_POST['aCons'])){
            $sql = "INSERT INTO `trucks`(`name`, `brand`, `engineID`, `tankSize`, `consumption`, `numberOfAxles`) VALUES ('".mysqli_real_escape_string($conn,$_POST['aName'])."','".mysqli_real_escape_string($conn,$_POST['aBrand'])."','".mysqli_real_escape_string($conn,$_POST['addEngine'])."','".mysqli_real_escape_string($conn,$_POST['aTank'])." l', '".mysqli_real_escape_string($conn,$_POST['aCons'])." l/100km','".mysqli_real_escape_string($conn,$_POST['aAxles'])."')";
        }else{
            $sql = "INSERT INTO `trucks`(`name`, `brand`, `engineID`, `tankSize`, `consumption`, `numberOfAxles`) VALUES ('".mysqli_real_escape_string($conn,$_POST['aName'])."','".mysqli_real_escape_string($conn,$_POST['aBrand'])."','".mysqli_real_escape_string($conn,$_POST['addEngine'])."','".mysqli_real_escape_string($conn,$_POST['aTank'])." l', NULL, '".mysqli_real_escape_string($conn,$_POST['aAxles'])."')";
        }
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }
    if(isset($_POST['delTruck'])){
        $sql = "DELETE FROM `trucks` WHERE truckID = ".mysqli_real_escape_string($conn,$_POST['delTruck']);
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }
    include 'view/editTrucks.php';
?>