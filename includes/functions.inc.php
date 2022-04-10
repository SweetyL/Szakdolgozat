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

/**
 * This function runs a MYSQL query which returns with the admin ids from the admins table.
 * @param mixed $conn Database connection variable
 * @return array Array with ids
*/
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

/**
 * This function runs a MYSQL query which returns with the ONLINE driver ids from the driverstatus table.
 * @param mixed $conn Database connection variable
 * @return array Array with ids
*/
function getOnlineDrivers($conn){
    $list = array();
    $sql = "SELECT id FROM driverstatus WHERE date IS NULL";
    if($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $list[] = $row['id'];
            }
        }
    }
    return $list;
}

/**
 * This function runs a MYSQL query which returns with the ONLINE company ids from the compstatus table.
 * @param mixed $conn Database connection variable
 * @return array Array with ids
*/
function getOnlineCompanies($conn){
    $list = array();
    $sql = "SELECT id FROM compstatus WHERE date IS NULL";
    if($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $list[] = $row['id'];
            }
        }
    }
    return $list;
}

/**
 * This function runs a MYSQL query which returns with the driver's last online date.
 * @param integer $id Driver's id
 * @param mixed $conn Database connection variable
 * @return string Logout's date
*/
function getDriverLastOnline($id,$conn){
    $sql = "SELECT id, `date` FROM driverstatus WHERE id =".$id;
    if($result = $conn->query($sql)) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
                return $row['date'];
        }
    }
}

/**
 * This function runs a MYSQL query which returns with the company's last online date.
 * @param integer $id Company's id
 * @param mixed $conn Database connection variable
 * @return string Logout's date
*/
function getCompanyLastOnline($id,$conn){
    $sql = "SELECT id, `date` FROM compstatus WHERE id =".$id;
    if($result = $conn->query($sql)) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row['date'];
        }
    }
}


function getADRcertificate($id,$conn){
    $list = array();
    $sql = "SELECT driverID, adrID FROM `skills` WHERE driverID =".$id;
    if($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $list[] = $row['adrID'];
            }
        }
    }
    return $list;
}
?>