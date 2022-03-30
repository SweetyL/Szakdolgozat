<div class="container">
<?php 
    if(!empty($_SESSION["id"]) and $_SESSION["type"]=="driver"){
?>
<img class="rounded mx-auto d-block img-fluid" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="img-thumbnail img-responsive">
<p>Név: <?php echo $driver->get_lastname()." ".$driver->get_firstname()?></p>
<p>Ország: <?php echo $country->get_name() ?></p>
<p>Város: <?php echo $town->get_name()?></p>
<p>Utca, házszám: <?php echo $driver->get_street()." ".$driver->get_houseNumber()?></p>
<p>Email: <?php echo $driver->get_email()?></p>
<p>Telefonszám: <?php echo $driver->get_phone()?></p>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2" onclick="window.location.href = 'index.php?page=settings'">Adatok módosítása</button>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2" onclick="window.location.href = 'index.php?page=genPage'">QR kód generálás</button>
<br>
<?php
}else if(!empty($_SESSION["id"]) and $_SESSION["type"]=="company"){
?>
<img class="rounded mx-auto d-block" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F65%2F25%2Fa0%2F6525a08f1df98a2e3a545fe2ace4be47.jpg&f=1&nofb=1" alt="Profilkép" class="img-thumbnail img-responsive">
<p>Név: <?php echo $company->get_name()?></p>
<p>Ország: <?php echo $country->get_name() ?></p>
<p>Város: <?php echo $town->get_name()?></p>
<p>Utca, házszám: <?php echo $company->get_street()." ".$company->get_houseNumber()?></p>
<p>Email: <?php echo $company->get_email()?></p>
<p>Telefonszám: <?php echo $company->get_phone()?></p>
<p>Weboldal: <?php echo "<a href='https://".$company->get_webpage()."' target='_blank'>".$company->get_webpage()."</a>"?>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2" onclick="window.location.href = 'index.php?page=settings'">Adatok módosítása</button>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2" onclick="window.location.href = 'index.php?page=genPage'">QR kód generálás</button>
<br>
<?php
}else{
?>
<h1>Üdvözöljük az admin panelen!</h1>
<button type="button" class="btn btn-primary rounded-pill my-2" onclick="window.location.href = 'index.php?page=editCargo'">Szállítmányok módosítása</button>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2" onclick="window.location.href = 'index.php?page=editTrucks'">Kamionok módosítása</button>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2" onclick="window.location.href = 'index.php?page=editJobs'">Megbízások módosítása</button>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2" onclick="window.location.href = 'index.php?page=editTrips'">Utak módosítása</button>
<?php
}
?>
<?php
    if(file_exists("./generatedPages/".$filename.".html") and $_SESSION!="admin"){
    echo "<button type='button' class='btn btn-primary rounded-pill my-2' onclick='showQR(`".$filename."`)'>QR kód mutatása</button>";
    }
?>
</div>