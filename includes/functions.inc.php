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


?>