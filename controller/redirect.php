<?php
    if(empty($_SESSION['id'])){
        header('Location: index.php?page=404');
        exit();
    }
    echo "
    <script>
    setTimeout(function(){
        $(window).attr('location','index.php?page=myProfile');
    }, 2000);
    setTimeout();
    </script>
    ";
    include 'view/redirect.php';
?>