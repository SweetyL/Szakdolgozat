<?php 
include "../includes/db.inc.php";
include "../includes/functions.inc.php";
include "../model/truck/Engine.php";
$engine = new Engine();
if (isset($_POST['engineID']) && !empty($_POST['engineID'])) {
    $sql = "SELECT engineID, name, brand, power FROM engines WHERE engineID = ".mysqli_real_escape_string($conn,$_POST['engineID'])."";
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
    else {
        logger("[E]".date("Y-m-d H:i:s")." - "." HIBA: update cargo ajax, ".$conn->error);
    }
    }
}
?>