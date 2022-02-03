<?php 
    if($_SESSION["type"]=="driver"){
?>
<p>Név:<?php echo $driver->get_lastname()." ".$driver->get_firstname()?></p>
<?php
}
?>