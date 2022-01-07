<?php

$servername = "localhost";
$username = "appSzakdoga";
$password = "dirW._/5d8pILDkk";
$dbname = "szakdoga";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
