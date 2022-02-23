<h1>404</h1>
<?php
    if(empty($_SESSION["id"])){
        echo '<h2>A keresett oldal nem található vagy nem vagy <a href="index.php?page=login">bejelentkezve!</a></h2>';
    }else{
        echo '<h2>A keresett oldal nem található!';
    }
?>