<?php
    if(empty($_SESSION["id"]) || $_SESSION["type"] == "driver"){
        header('Location: index.php?page=404');
        exit();
    }
    require 'model/truck/Engine.php';
    require 'model/truck/Truck.php';
    require 'model/Cargo.php';
    require 'model/Trip.php';
    require 'model/Job.php';
    $engine = new Engine();
    $truck = new Truck();
    $cargo = new Cargo();
    $trip = new Trip();
    $job = new Job();
    $engineIDs = $engine->engineList($conn);
    $truckIDs = array();
    $cargoIDs = $cargo->cargoList($conn);
    $tripIDs = $trip->tripList($conn);
    $company = new Company();
    if($_SESSION['type']=="company"){
        $jobIDs = array();
        $sql = "SELECT jobID FROM jobs WHERE ownerOfJob =".$_SESSION['id'];
            if($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $jobIDs[] = $row['jobID'];
                    }
                }
        }
        $sql = "SELECT compID, truckID FROM owneroftrucks WHERE compID=".$_SESSION['id'];
            if($result = $conn->query($sql)){
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $truckIDs[] = $row['truckID'];
                    }
                }
            }

        //    ADD JOB    //
        if(isset($_POST['addTrip']) and !empty($_POST['addTrip']) and 
        isset($_POST['addTruck']) and !empty($_POST['addTruck']) and
        isset($_POST['addReward']) and isset($_POST['addComment']) and
        isset($_POST['addDeadline']) and !empty($_POST['addDeadline'])){
            $sql = "INSERT INTO `jobs`(`driverID`, `tripID`, `truckID`, `reward`, `comment`, `deadline`, `ownerOfJob`) VALUES (NULL,'".htmlspecialchars($_POST['addTrip'])."','".htmlspecialchars($_POST['addTruck'])."','".htmlspecialchars($_POST['addReward'])."','".htmlspecialchars($_POST['addComment'])."','".htmlspecialchars($_POST['addDeadline'])."','".$_SESSION['id']."')";
            $result = $conn->query($sql);
            header('Location: index.php?page=redirect');
            exit();
        }

        //    DELETE JOB    //
        if(isset($_POST['delJob']) and !empty($_POST['delJob'])){
            $sql = "DELETE FROM `jobs` WHERE jobID = ".htmlspecialchars($_POST['delJob']);
            $result = $conn->query($sql);
            header('Location: index.php?page=redirect');
            exit();
        }

        //    MODIFY JOB    //
        if(isset($_POST['modTrip']) and isset($_POST['modTruck']) 
        and isset($_POST['modReward']) and isset($_POST['modComment']) 
        and isset($_POST['modDeadline'])){
            $sql = "UPDATE `jobs` SET ";

            //    TRIP CHECK    //
            if(isset($_POST['modTrip']) and !empty($_POST['modTrip'])){
                $sql .= "`tripID`='".htmlspecialchars($_POST['modTrip'])."', ";
            }else{
                $tmpSql = "SELECT tripID FROM jobs WHERE jobID = ".htmlspecialchars($_POST['modJob']);
                $res = $conn->query($tmpSql);
                $row = $res->fetch_assoc();
                $sql .="`tripID`='".$row['tripID']."', ";
            }

            //    TRUCK CHECK    //
            if(isset($_POST['modTruck']) and !empty($_POST['modTruck'])){
                $sql .= "`truckID`='".htmlspecialchars($_POST['modTruck'])."', ";
            }else{
                $tmpSql = "SELECT tripID FROM jobs WHERE jobID = ".htmlspecialchars($_POST['modJob']);
                $res = $conn->query($tmpSql);
                $row = $res->fetch_assoc();
                $sql .="`tripID`='".$row['tripID']."', ";
            }

            //    REWARD CHECK    //
            if(isset($_POST['modReward']) and !empty($_POST['modReward'])){
                $sql .= "`reward`='".htmlspecialchars($_POST['modReward'])."', ";
            }else{
                $tmpSql = "SELECT reward FROM jobs WHERE jobID = ".htmlspecialchars($_POST['modJob']);
                $res = $conn->query($tmpSql);
                $row = $res->fetch_assoc();
                $sql .="`reward`='".$row['reward']."', ";
            }

            //    COMMENT CHECK    //
            if(isset($_POST['modComment']) and !empty($_POST['modComment'])){
                $sql .= "`comment`='".htmlspecialchars($_POST['modComment'])."', ";
            }else{
                $tmpSql = "SELECT comment FROM jobs WHERE jobID = ".htmlspecialchars($_POST['modJob']);
                $res = $conn->query($tmpSql);
                $row = $res->fetch_assoc();
                $sql .="`comment`='".$row['comment']."', ";
            }

            //    DEADLINE CHECK    //
            if(isset($_POST['modDeadline']) and !empty($_POST['modDeadline'])){
                $sql .= "`deadline`='".htmlspecialchars($_POST['modDeadline'])."' ";
            }else{
                $tmpSql = "SELECT deadline FROM jobs WHERE jobID = ".htmlspecialchars($_POST['modJob']);
                $res = $conn->query($tmpSql);
                $row = $res->fetch_assoc();
                $sql .="`deadline`='".$row['deadline']."' ";
            }

            $sql .= "WHERE jobID = ".htmlspecialchars($_POST['modJob']);
            $result = $conn->query($sql);
            header('Location: index.php?page=redirect');
            exit();
        }
    }else{
        $compIDs = $company->companiesList($conn);
        $jobIDs = $job->jobList($conn);

        //    ADD JOB    //
        if(isset($_POST['addTrip']) and !empty($_POST['addTrip']) and
        isset($_POST['addTruck']) and !empty($_POST['addTruck']) and
        isset($_POST['addReward']) and isset($_POST['addComment']) and
        isset($_POST['addDeadline']) and !empty($_POST['addDeadline'])){
            $sql = "INSERT INTO `jobs`(`driverID`, `tripID`, `truckID`, `reward`, `comment`, `deadline`, `ownerOfJob`) VALUES (NULL,'".htmlspecialchars($_POST['addTrip'])."','".htmlspecialchars($_POST['addTruck'])."','".htmlspecialchars($_POST['addReward'])."','".htmlspecialchars($_POST['addComment'])."','".htmlspecialchars($_POST['addDeadline'])."','".htmlspecialchars($_POST['addCompany'])."')";
            $result = $conn->query($sql);
            header('Location: index.php?page=redirect');
            exit();
        }

        //    DELETE JOB    //
        if(isset($_POST['delJob']) and !empty($_POST['delJob'])){
            $sql = "DELETE FROM `jobs` WHERE jobID = ".htmlspecialchars($_POST['delJob']);
            $result = $conn->query($sql);
            header('Location: index.php?page=redirect');
            exit();
        }

        //    MODIFY JOB    //
        if(isset($_POST['modTrip']) and isset($_POST['modTruck']) 
        and isset($_POST['modReward']) and isset($_POST['modComment']) 
        and isset($_POST['modDeadline'])){
            $sql = "UPDATE `jobs` SET ";

            //    TRIP CHECK    //
            if(isset($_POST['modTrip']) and !empty($_POST['modTrip'])){
                $sql .= "`tripID`='".htmlspecialchars($_POST['modTrip'])."', ";
            }else{
                $tmpSql = "SELECT tripID FROM jobs WHERE jobID = ".htmlspecialchars($_POST['modJob']);
                $res = $conn->query($tmpSql);
                $row = $res->fetch_assoc();
                $sql .="`tripID`='".$row['tripID']."', ";
            }

            //    TRUCK CHECK    //
            if(isset($_POST['modTruck']) and !empty($_POST['modTruck'])){
                $sql .= "`truckID`='".htmlspecialchars($_POST['modTruck'])."', ";
            }else{
                $tmpSql = "SELECT tripID FROM jobs WHERE jobID = ".htmlspecialchars($_POST['modJob']);
                $res = $conn->query($tmpSql);
                $row = $res->fetch_assoc();
                $sql .="`tripID`='".$row['tripID']."', ";
            }

            //    REWARD CHECK    //
            if(isset($_POST['modReward']) and !empty($_POST['modReward'])){
                $sql .= "`reward`='".htmlspecialchars($_POST['modReward'])."', ";
            }else{
                $tmpSql = "SELECT reward FROM jobs WHERE jobID = ".htmlspecialchars($_POST['modJob']);
                $res = $conn->query($tmpSql);
                $row = $res->fetch_assoc();
                $sql .="`reward`='".$row['reward']."', ";
            }

            //    COMMENT CHECK    //
            if(isset($_POST['modComment']) and !empty($_POST['modComment'])){
                $sql .= "`comment`='".htmlspecialchars($_POST['modComment'])."', ";
            }else{
                $tmpSql = "SELECT comment FROM jobs WHERE jobID = ".htmlspecialchars($_POST['modJob']);
                $res = $conn->query($tmpSql);
                $row = $res->fetch_assoc();
                $sql .="`comment`='".$row['comment']."', ";
            }

            //    DEADLINE CHECK    //
            if(isset($_POST['modDeadline']) and !empty($_POST['modDeadline'])){
                $sql .= "`deadline`='".htmlspecialchars($_POST['modDeadline'])."' ";
            }else{
                $tmpSql = "SELECT deadline FROM jobs WHERE jobID = ".htmlspecialchars($_POST['modJob']);
                $res = $conn->query($tmpSql);
                $row = $res->fetch_assoc();
                $sql .="`deadline`='".$row['deadline']."' ";
            }

            $sql .= "WHERE jobID = ".htmlspecialchars($_POST['modJob']);
            $result = $conn->query($sql);
            header('Location: index.php?page=redirect');
            exit();
        }
    }
    
    include 'view/editJobs.php';
?>