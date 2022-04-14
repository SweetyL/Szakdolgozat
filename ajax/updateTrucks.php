<?php 
include "../includes/db.inc.php";
include "../includes/functions.inc.php";
include "../model/truck/Engine.php";
$engine = new Engine();
if (isset($_POST['truckID']) && !empty($_POST['truckID'])) {
    $sql = "SELECT truckID, name, brand, engineID, tankSize, consumption, numberOfAxles FROM trucks WHERE truckID = ".htmlspecialchars($_POST['truckID'])."";
    $result = $conn->query($sql);
    if ($conn->query($sql)) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $engine->set_engine($row['engineID'],$conn);
            $returnV['name'] = $row['name'];
            $returnV['brand'] = $row['brand'];
            $returnV['engine'] = $engine->get_brand()." ".$engine->get_name();
            $returnV['tank'] = $row['tankSize'];
            $returnV['cons'] = $row['consumption'];
            $returnV['axles'] = $row['numberOfAxles'];
            echo json_encode($returnV);
        }
    }
}
?>