<?php 
    if($_SESSION["type"]=="driver"){
?>
<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="img-thumbnail img-responsive">
<p id="name">Név: <?php echo $company->get_name()?></p>
<p>Ország: <?php echo $country->get_name() ?></p>
<p>Város: <?php echo $town->get_name()?></p>
<p>Utca, házszám: <?php echo $company->get_street()." ".$company->get_houseNumber()?></p>
<p>Email: <?php echo $company->get_email()?></p>
<p>Telefonszám: <?php echo $company->get_phone()?></p>
<p>Weboldal: <?php echo "<a class='normalLink' href='https://".$company->get_webpage()."' target='_blank'>".$company->get_webpage()."</a>"?>
<?php
}else{
?>
<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="img-thumbnail img-responsive">
<p id="name">Név: <?php echo $driver->get_lastname()." ".$driver->get_firstname()?></p>
<p>Ország: <?php echo $country->get_name() ?></p>
<p>Város: <?php echo $town->get_name()?></p>
<p>Utca, házszám: <?php echo $driver->get_street()." ".$driver->get_houseNumber()?></p>
<p>Email: <?php echo $driver->get_email()?></p>
<p>Telefonszám: <?php echo $driver->get_phone()?></p>
<?php
}
?>
<script type="text/javascript">
    let title = $("#name").text();
    $(document).ready(function() {
        document.title = title.substring(4,11)+"... profilja";
    });
</script>