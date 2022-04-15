<div class="container">
<?php 
    if($_SESSION["type"]=="driver"){
?>
<div>
    <img class="rounded mx-auto profilePic d-block" src="img/default.svg" alt="Profilkép" class="img-thumbnail img-responsive">
</div>
<?php echo $status;?>
<p id="name">Név: <?php echo $company->get_name() ?></p>
<p>Ország: <?php echo $country->get_name() ?></p>
<p>Város: <?php echo $town->get_name()?></p>
<p>Utca, házszám: <?php echo $company->get_street()." ".$company->get_houseNumber()?></p>
<p>Email: <?php echo $company->get_email()?></p>
<p>Telefonszám: <?php echo $company->get_phone()?></p>
<p class="normalLink">Weboldal: <?php echo "<a href='https://".$company->get_webpage()."' target='_blank'>".$company->get_webpage()."</a>"?>
<p class="normalLink"><?php echo '<a href="index.php?page=showJobs&id='.$company->get_id().'" target="_blank">Megbízások</a>'?>
<?php
}else{
?>
<div>
    <img class="rounded mx-auto profilePic d-block" src="img/default.svg" alt="Profilkép" class="img-thumbnail img-responsive">
</div>
<div>
<?php
    if ($adrIDs) {
        foreach($adrIDs as $row) {
            if(in_array($row,array_intersect($driverADRs,$adrIDs))){
                echo "<img class='smallPic' src='img/ADR/Class_".$row.".svg' alt='ADR osztály".$row."'>";
            }else{
                if($row!=9){
                    echo "<img class='disabledPic smallPic' src='img/ADR/Class_".$row.".svg' alt='ADR osztály".$row."'>";
                }
            }
        }
    }
?>
</div>
<p id="name">Név: <?php echo $driver->get_lastname()." ".$driver->get_firstname()?></p>
<?php echo $status;?>
<p>Ország: <?php echo $country->get_name() ?></p>
<p>Város: <?php echo $town->get_name()?></p>
<p>Utca, házszám: <?php echo $driver->get_street()." ".$driver->get_houseNumber()?></p>
<p>Email: <?php echo $driver->get_email()?></p>
<p>Telefonszám: <?php echo $driver->get_phone()?></p>
<?php
}
?>
</div>
<script type="text/javascript">
    let title = $("#name").text();
    $(document).ready(function() {
        document.title = title.substring(4,11)+"... profilja";
    });
</script>