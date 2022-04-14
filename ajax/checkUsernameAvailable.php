<?php
include '../includes/db.inc.php';
if (isset($_POST['username']) && !empty($_POST['username'])) {
    $sql = "SELECT * FROM ".$_POST['table']." WHERE username LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    if ($result = $stmt->get_result()) {
        if ($result->num_rows > 0) {
            echo '<p class="error">Ez a felhasználónév használt!</p>';
        }else{
            echo '<p class="success">Szabad ez a felhasználónév!</p>';
        }
    }
}
$stmt->close();
?>