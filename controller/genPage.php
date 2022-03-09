<?php
//https://goqr.me/api/
    if(empty($_SESSION["id"])){
        header('Location: index.php?page=404');
        exit();
    }
    include 'view/genPage.php';
?>