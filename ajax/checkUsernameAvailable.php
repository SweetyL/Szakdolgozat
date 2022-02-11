<?php
include "../includes/db.inc.php";
if (isset($_POST['username']) && !empty($_POST['username'])) {
    $sql = "SELECT * FROM ".$_POST['table']." WHERE username LIKE '".mysqli_real_escape_string($conn,$_POST['username'])."'";
    $result = $conn->query($sql);
    if ($conn->query($sql)) {
        if ($result->num_rows > 0) {
            echo '<p class="error">Ez a felhasználónév használt!</p>';
        }else{
            echo '<p class="success">Szabad ez a felhasználónév!</p>';
        }
    }
}
?>