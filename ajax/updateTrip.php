<?php 
include '../includes/db.inc.php';
include '../includes/functions.inc.php';
include '../model/Cargo.php';
$cargo = new Cargo();

if (isset($_POST['tripID']) && !empty($_POST['tripID'])) {
    $sql = "SELECT tripID, tripStart, tripEnd, tripLength, cargoID FROM trips WHERE tripID = '".htmlspecialchars($_POST['tripID'])."'";
    $result = $conn->query($sql);
    if ($conn->query($sql)) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $cargo->set_cargo($row['cargoID'],$conn);
            $returnV['start'] = $row['tripStart'];
            $returnV['end'] = $row['tripEnd'];
            $returnV['length'] = $row['tripLength'];
            $returnV['cargo'] = $cargo->get_name()." ".$cargo->get_mass();
            echo json_encode($returnV);
        }
    }
}
?>