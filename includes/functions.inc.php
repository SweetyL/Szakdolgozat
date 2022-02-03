<?php
    function getCountryName($id, $conn){
        $sql = "SELECT countries.name FROM `towns` INNER JOIN countries ON towns.countryID=countries.countryID WHERE townID="$id";"
        $result = $conn->query($sql);
        echo $result;
    }
?>