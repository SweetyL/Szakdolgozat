<?php
    if(!empty($_SESSION["id"]) and !$_SESSION["type"] == "admin"){
        header('Location: index.php?page=404');
        exit();
    }
    
    require 'model/truck/Engine.php';
    require 'model/truck/Truck.php';
    $engine = new Engine();
    $truck = new Truck();
    $engineIDs = $engine->engineList($conn);
    $truckIDs = $truck->truckList($conn);

    //    ADD TRUCK   //
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
    //    DEL TRUCK   //
    if(isset($_POST['delTruck'])){
        $sql = "DELETE FROM `trucks` WHERE truckID = ".mysqli_real_escape_string($conn,$_POST['delTruck']);
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }
    //    MODIFY TRUCK    //
    if(isset($_POST['modTruck']) and isset($_POST['mBrand']) and isset($_POST['mName']) and isset($_POST['modEngine']) and isset($_POST['mTank']) and isset($_POST['mCons']) and isset($_POST['mAxles'])){
        $sql = "UPDATE `trucks` SET ";

        //this code cheks if the user wants to change the cargo's name
        if(isset($_POST['mName']) and !empty($_POST['mName'])){
            $sql .= "`name`='".mysqli_real_escape_string($conn,$_POST['mName'])."', ";
        }else{
            $tmpSql = "SELECT name FROM trucks WHERE truckID = ".mysqli_real_escape_string($conn,$_POST['modTruck']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`name`='".$row['name']."', ";
        }

        //this code checks if the user wants to change the cargo's mass
        if(isset($_POST['mBrand']) and !empty($_POST['mBrand'])){
            $sql .= "`brand`='".mysqli_real_escape_string($conn,$_POST['mBrand'])."', ";
        }else{
            $tmpSql = "SELECT brand FROM trucks WHERE truckID = ".mysqli_real_escape_string($conn,$_POST['modTruck']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`brand`='".$row['brand']."', ";
        }

        //this code checks if the user wants to change the cargo's ADR class
        if(isset($_POST['modEngine']) and !empty($_POST['modEngine'])){
            $sql .= "`engineID`=".mysqli_real_escape_string($conn,$_POST['modEngine']).", ";
        }else{
            $tmpSql = "SELECT engineID FROM trucks WHERE truckID = ".mysqli_real_escape_string($conn,$_POST['modTruck']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`engineID`=".$row['engineID']." ";
        }

        //this code checks if the user wants to change the cargo's ADR class
        if(isset($_POST['mTank']) and !empty($_POST['mTank'])){
            $sql .= "`tankSize`='".mysqli_real_escape_string($conn,$_POST['mTank'])." l', ";
        }else{
            $tmpSql = "SELECT tankSize FROM trucks WHERE truckID = ".mysqli_real_escape_string($conn,$_POST['modTruck']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`tankSize`='".$row['tankSize']."', ";
        }        

        //this code checks if the user wants to change the cargo's ADR class
        if(isset($_POST['mCons']) and !empty($_POST['mCons'])){
            $sql .= "`consumption`='".mysqli_real_escape_string($conn,$_POST['mTank'])." L/100KM', ";
        }else{
            $tmpSql = "SELECT consumption FROM trucks WHERE truckID = ".mysqli_real_escape_string($conn,$_POST['modTruck']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`consumption`='".$row['consumption']."', ";
        }

        //this code checks if the user wants to change the cargo's ADR class
        if(isset($_POST['mAxles']) and !empty($_POST['mAxles'])){
            $sql .= "`numberOfAxles`='".mysqli_real_escape_string($conn,$_POST['mAxles'])."' ";
        }else{
            $tmpSql = "SELECT numberOfAxles FROM trucks WHERE truckID = ".mysqli_real_escape_string($conn,$_POST['modTruck']);
            $res = $conn->query($tmpSql);
            $row = $res->fetch_assoc();
            $sql .="`numberOfAxles`='".$row['numberOfAxles']."' ";
        } 
        $sql .= "WHERE truckID = ".mysqli_real_escape_string($conn,$_POST['modTruck']);
        echo $sql;
        $result = $conn->query($sql);
        header('Location: index.php?page=redirect');
        exit();
    }
    include 'view/editTrucks.php';
?>