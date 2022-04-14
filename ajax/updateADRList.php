<?php 
include '../includes/db.inc.php';
require '../model/ADR.php';
require '../includes/functions.inc.php';
$ADR = new ADR();
$adrIDs = $ADR->adrList($conn);
if($_POST['action']=="del"){
    if (isset($_POST['driverID']) && !empty($_POST['driverID'])) {
        $sql = "SELECT skills.adrID, name, comment FROM `skills` INNER JOIN adr ON adr.adrID=skills.adrID WHERE driverID =".$_POST['driverID'];
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                echo '<option value="">Válasszon ADR osztályt!</option>';
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row['adrID'].'">'.$row['name'].'('.$row['comment'].')'.'</option>'; 
                }
            }else{
                echo '<option value="">Ennek a sofőrnek nincsen tanúsítványa!</option>';
            }
        }
    }else{
        echo '<option value="">Válasszon ADR osztályt!</option>';
    }
}else if($_POST['action']=="add"){
    if (isset($_POST['driverID']) && !empty($_POST['driverID'])) {
        $sql = "SELECT skills.adrID, name, comment FROM `skills` INNER JOIN adr ON adr.adrID=skills.adrID WHERE driverID =".$_POST['driverID'];
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                echo '<option value="">Válasszon ADR osztályt!</option>';
                $driverADRs = array();
                while ($row = $result->fetch_assoc()) {
                    $driverADRs[] = $row['adrID'];
                }
                foreach($adrIDs as $row){
                    $ADR->set_adr($row,$conn);
                    if(!in_array($row,array_intersect($driverADRs,$adrIDs)) and $row!=9){
                        echo '<option value="'.$row.'">'.$ADR->get_name().'('.$ADR->get_comment().')'.'</option>';
                    }
                }
                if ($result->num_rows == 8) {
                    echo '<option value="">Ez a sofőr már rendelkezik az összes tanúsítvánnyal!</option>';
                }
            }else{
                foreach($adrIDs as $row){
                    $ADR->set_adr($row,$conn);
                    if($row!=9){
                        echo '<option value="'.$row.'">'.$ADR->get_name().'('.$ADR->get_comment().')'.'</option>';
                    }
                }
            }
        }
    }else{
        echo '<option value="">Válasszon ADR osztályt!</option>';
    }
}
?>