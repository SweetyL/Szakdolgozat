<?php 
    if(!empty($_SESSION["id"]) and $_SESSION["type"]=="driver"){
?>
<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="img-thumbnail img-responsive">
<p>Név: <?php echo $driver->get_lastname()." ".$driver->get_firstname()?></p>
<p>Ország: <?php echo $country->get_name() ?></p>
<p>Város: <?php echo $town->get_name()?></p>
<p>Utca, házszám: <?php echo $driver->get_street()." ".$driver->get_houseNumber()?></p>
<p>Email: <?php echo $driver->get_email()?></p>
<p>Telefonszám: <?php echo $driver->get_phone()?></p>
<?php
}else if(!empty($_SESSION["id"]) and $_SESSION["type"]=="company"){
?>
<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="img-thumbnail img-responsive">
<p>Név: <?php echo $company->get_name()?></p>
<p>Ország: <?php echo $country->get_name() ?></p>
<p>Város: <?php echo $town->get_name()?></p>
<p>Utca, házszám: <?php echo $company->get_street()." ".$company->get_houseNumber()?></p>
<p>Email: <?php echo $company->get_email()?></p>
<p>Telefonszám: <?php echo $company->get_phone()?></p>
<p>Weboldal: <?php echo "<a href='https://".$company->get_webpage()."' target='_blank'>".$company->get_webpage()."</a>"?>
<?php
}
?>
<br>
<button type="button" class="btn btn-hcbutton" onclick="window.location.href = 'index.php?page=settings'">Adatok módosítása</button>
<button type="button" class="btn btn-hcbutton" onclick="window.location.href = 'index.php?page=genPage'">QR kód generálás</button>
<?php
    if(file_exists("./generatedPages/".$filename.".html")){
       echo '<img src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=FFFFFF&amp;data=http%3A%2F%2Fbanki13.komarom.net%2Fklaszlo%2Fszakdolgozat%2FgeneratedPages%2F'.$filename.'.html&amp;qzone=1&amp;margin=0&amp;size=200x200&amp;ecc=L" alt="QR kód" />';
    //echo '<img src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=FFFFFF&amp;data=http%3A%2F%2Flocalhost%2Fszakdolgozat%2FgeneratedPages%2F'.$filename.'.html&amp;qzone=1&amp;margin=0&amp;size=200x200&amp;ecc=L" alt="QR kód" />';
    }
?>