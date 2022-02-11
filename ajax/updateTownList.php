<?php 
include "../includes/db.inc.php";
if (isset($_POST['countryID']) && !empty($_POST['countryID'])) {
    $sql = "SELECT townID, name FROM towns WHERE countryID LIKE '".mysqli_real_escape_string($conn,$_POST['countryID'])."'";
    $result = $conn->query($sql);
    if ($conn->query($sql)) {
        if ($result->num_rows > 0) {
            echo '<option value="">Válasszon várost!</option>';
            while ($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['townID'].'">'.$row['name'].'</option>'; 
            }
        }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
}else{
    echo '<option value="">Válasszon várost!</option>';
}
?>