<?php
    if(empty($_SESSION['id']) or !$_SESSION['type']=="driver" or empty($_REQUEST['id'])){
        header('Location: index.php?page=404');
        exit();
    }
?>