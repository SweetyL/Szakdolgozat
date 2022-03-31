<?php
    if(!empty($_SESSION["id"]) and !$_SESSION["type"] == "admin"){
        header('Location: index.php?page=404');
        exit();
    }

    include 'view/editJobs.php';
?>