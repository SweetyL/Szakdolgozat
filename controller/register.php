<?php
    require 'model/Country.php';
    $country = new Country();
    $countryIDs = $country->countriesList($conn);
    include 'view/register.php';
?>