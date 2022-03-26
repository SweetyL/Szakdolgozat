<?php
    require 'model/truck/Engine.php';
    require 'model/truck/Truck.php';
    $engine = new Engine();
    $truck = new Truck();
    $engineIDs = $engine->engineList($conn);
    $truckIDs = $truck->truckList($conn);
    include 'view/editTrucks.php';
?>