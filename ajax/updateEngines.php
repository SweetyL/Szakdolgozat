<?php 
include '../includes/db.inc.php';
include '../includes/functions.inc.php';
include '../model/truck/Engine.php';
$engine = new Engine();
if (isset($_POST['engineID']) && !empty($_POST['engineID'])) {
    $sql = "SELECT engineID, name, brand, power FROM engines WHERE engineID = ".htmlspecialchars($_POST['engineID'])."";
    $result = $conn->query($sql);
    if ($conn->query($sql)) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $engine->set_engine($row['engineID'],$conn);
            $returnV['name'] = $row['name'];
            $returnV['brand'] = $row['brand'];
            $returnV['power'] = $row['power'];
            echo json_encode($returnV);
        }
    }
}
?>