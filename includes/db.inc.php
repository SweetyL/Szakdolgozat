<?php
$servername = "localhost";
$username = "appSzakdoga";
$password = "dirW._/5d8pILDkk";
$dbname = "szakdoga";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  $myfile = @fopen("./log.log", "a") or die("Kritikus hiba történt!");
  fwrite($myfile, "[C]".date("Y-m-d H:i:s")." - "." HIBA: vegzetes SQL hiba, ".$conn->connect_error);
  fclose($myfile);
  die("Kritikus hiba történt!");
}

?>
