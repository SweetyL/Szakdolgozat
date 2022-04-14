<?php
    if(!empty($_SESSION['id'])){
        header('Location: index.php?page=404');
        exit();
    }
    include 'view/login.php';
?>