<div class="container">
<?php 
    if(!empty($_SESSION['id']) and $_SESSION['type']=="driver"){
?>
<div>
    <img class="rounded mx-auto profilePic d-block" src="img/default.svg" alt="Profilkép" class="img-thumbnail img-responsive">
</div>
<br>
<div>
    <?php
        if ($adrIDs) {
            foreach($adrIDs as $row) {
                if(in_array($row,array_intersect($driverADRs,$adrIDs))){
                    echo "<img class='smallPic' src='img/ADR/Class_".$row.".svg' alt='ADR osztály ".$row."'>";
                }else{
                    if($row!=9){
                       echo "<img class='disabledPic smallPic' src='img/ADR/Class_".$row.".svg' alt='ADR osztály ".$row."'>";
                    }
                }
            }
        }
    ?>
</div>
<br>
<p>Név: <?php echo $driver->get_lastname()." ".$driver->get_firstname()?></p>
<p>Ország: <?php echo $country->get_name() ?></p>
<p>Város: <?php echo $town->get_name()?></p>
<p>Utca, házszám: <?php echo $driver->get_street()." ".$driver->get_houseNumber()?></p>
<p>Email: <?php echo $driver->get_email()?></p>
<p>Telefonszám: <?php echo $driver->get_phone()?></p>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2 p-1" onclick="window.location.href = 'index.php?page=settings'">Adatok módosítása</button>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2 p-1" onclick="window.location.href = 'index.php?page=editADR'">ADR tanúsítványok kezelése</button>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2 p-1" onclick="window.location.href = 'index.php?page=genPage'">QR kód generálás</button>
<br>
<?php
}else if(!empty($_SESSION['id']) and $_SESSION['type']=="company"){
?>
<div>
    <img class="rounded mx-auto profilePic d-block" src="img/default.svg" alt="Profilkép" class="img-thumbnail img-responsive">
</div>
<p>Név: <?php echo $company->get_name()?></p>
<p>Ország: <?php echo $country->get_name() ?></p>
<p>Város: <?php echo $town->get_name()?></p>
<p>Utca, házszám: <?php echo $company->get_street()." ".$company->get_houseNumber()?></p>
<p>Email: <?php echo $company->get_email()?></p>
<p>Telefonszám: <?php echo $company->get_phone()?></p>
<p class="normalLink">Weboldal: <?php echo "<a href='https://".$company->get_webpage()."' target='_blank'>".$company->get_webpage()."</a>"?>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2 p-1" onclick="window.location.href = 'index.php?page=settings'">Adatok módosítása</button>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2 p-1" onclick="window.location.href = 'index.php?page=genPage'">QR kód generálás</button>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2 p-1" onclick="window.location.href = 'index.php?page=editTrips'">Utak felvitele</button>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2 p-1" onclick="window.location.href = 'index.php?page=editCargo'">Szállítmányok felvitele</button>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2 p-1" onclick="window.location.href = 'index.php?page=editEngines'">Motorok felvitele</button>
<br>
<button type="button" class="btn btn-primary rounded-pill my-2 p-1" onclick="window.location.href = 'index.php?page=editTrucks'">Kamionok felvitele</button>
<br>
<?php
}else{
?>
<div class="container h-100 row align-items-center my-5 wow slideInLeft">
<h1 class="text-center my-5">Üdvözöljük az admin panelen!</h1>
<button type="button" class="btn btn-primary rounded-pill p-3 my-3" onclick="window.location.href = 'index.php?page=editCargo'">Szállítmányok módosítása</button>
<br>
<button type="button" class="btn btn-primary rounded-pill p-3 my-3" onclick="window.location.href = 'index.php?page=editTrucks'">Kamionok módosítása</button>
<br>
<button type="button" class="btn btn-primary rounded-pill p-3 my-3" onclick="window.location.href = 'index.php?page=editEngines'">Motorok módosítása</button>
<br>
<button type="button" class="btn btn-primary rounded-pill p-3 my-3" onclick="window.location.href = 'index.php?page=editTrips'">Utak módosítása</button>
<br>
<button type="button" class="btn btn-primary rounded-pill p-3 my-3" onclick="window.location.href = 'index.php?page=editJobs'">Megbízások módosítása</button>
<br>
<button type="button" class="btn btn-primary rounded-pill p-3 my-3" onclick="window.location.href = 'index.php?page=editAdmin'">Adminok kezelése</button>
<br>
<button type="button" class="btn btn-primary rounded-pill p-3 my-3" onclick="window.location.href = 'index.php?page=editADR'">ADR tanúsítványok kezelése</button>
</div>
<?php
}
?>
<?php
    if(file_exists("./generatedPages/".$filename.".html") and $_SESSION['type']!="admin"){
        echo "<button type='button' class='btn btn-primary rounded-pill my-2 p-1' onclick='showQR(`".$filename."`)'>QR kód mutatása</button>";
    }
?>
</div>