<?php 
include "../includes/db.inc.php";
include "../includes/functions.inc.php";
include "../model/ADR.php";
$ADR = new ADR();
if (isset($_POST['cargoID']) && !empty($_POST['cargoID'])) {
    $sql = "SELECT cargoID, name, mass, adr FROM cargo WHERE cargoID = '".mysqli_real_escape_string($conn,$_POST['cargoID'])."'";
    $result = $conn->query($sql);
    if ($conn->query($sql)) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $ADR->set_adr($row['adr'],$conn);
            $returnV['name'] = $row['name'];
            $returnV['mass'] = $row['mass'];
            $returnV['adr'] = $ADR->get_name();
            echo json_encode($returnV);
        }
    else {
        logger("[E]".date("Y-m-d H:i:s")." - "." HIBA: update cargo ajax, ".$conn->error);
    }
    }
}
?>