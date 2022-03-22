<?php
    $ADR = new ADR();
    $cargo = new Cargo();
    $cargoIDs = $cargo->cargoList($conn);
    $adrIDs = $ADR->adrList($conn);
    include 'view/editCargo.php';
?>