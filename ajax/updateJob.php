<?php 
include "../includes/db.inc.php";
include "../includes/functions.inc.php";
include "../model/Trip.php";
include "../model/truck/Truck.php";
$trip = new Trip();
$truck = new Truck();
if (isset($_POST['jobID']) && !empty($_POST['jobID'])) {
    $sql = "SELECT jobID, tripID, truckID, reward, deadline FROM jobs WHERE jobID =".$_POST['jobID'];
    $result = $conn->query($sql);
    if ($conn->query($sql)) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $trip->set_trip($row['tripID'],$conn);
            $truck->set_truck($row['truckID'],$conn);
            $returnV['trip'] = $truck->get_brand()." ".$truck->get_name();
            $returnV['truck'] = $trip->get_start()." - ".$trip->get_end();
            $returnV['reward'] = $row['reward'];
            $returnV['deadline'] = $row['deadline'];
            echo json_encode($returnV);
        }
    }
}
?>