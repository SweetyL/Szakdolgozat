<?php 
include '../includes/db.inc.php';
include '../model/truck/Truck.php';
$truck = new Truck();
if (isset($_POST['compID']) && !empty($_POST['compID'])) {
    $sql = "SELECT compID, truckID FROM owneroftrucks WHERE compID = ".htmlspecialchars($_POST['compID']);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<option value="">Válasszon kamiont!</option>';
        while ($row = $result->fetch_assoc()) {
            $truck->set_truck($row['truckID'],$conn);
            echo '<option value="'.$row['truckID'].'">'.$truck->get_brand().' '.$truck->get_name().'</option>'; 
        }
    }else {
        echo '<option value="">Ennek a cégnek nincsen kamionja!</option>';
    }
}else{
    echo "<option value=''>Válasszon céget!</option>";
}
?>