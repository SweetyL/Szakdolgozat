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
    }else{
        $compIDs = $company->companiesList($conn);
        $jobIDs = $job->jobList($conn);
    }
    
    include 'view/editJobs.php';
?>