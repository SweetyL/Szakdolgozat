<?php
/*
*   Egyszerű logoló rendszer
*   [I] - információ
*   [W] - figyelmeztetés
*   [E] - hiba
*   [C] - kritikus hiba
*   [D] - debug
*/
function logger($txt) {
    $myfile = @fopen("./log.log", "a") or die("Critical ERROR!");
    fwrite($myfile, $txt);
    fclose($myfile);
}

function getAdmins($conn) {
    $list = array();
    $sql = "SELECT id FROM admins";
    if($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $list[] = $row['id'];
            }
        }
    }
    return $list;
}

?>