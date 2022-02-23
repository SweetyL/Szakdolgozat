<h1>Beállítások</h1>
<?php
    if($_SESSION["type"]=="driver"){
?>
<div class="container">
<form action="index.php?page=settings" method="post">
    <fieldset>
        <legend>Sofőr adatok:</legend>
        <label for="ln" >Vezetéknév: </label>
        <p>Jelenlegi: <?php echo $driver->get_lastname(); ?></p>
        <input class="form-control" type="text" id="ln" name="lastname">
        <br>
        <label for="fn" >Keresztnév:</label>
        <p>Jelenlegi: <?php echo $driver->get_firstname(); ?></p>
        <input  class="form-control" type="text" id="fn" name="firstname">
        <br>
        <label for="country">Ország:</label>
        <p>Jelenlegi: <?php echo $currentCountry; ?></p>
        <select class="form-control" name="country" id="country">
            <option value="">Válasszon országot!</option>
			<?php
                if ($countryIDs) {
					foreach($countryIDs as $row) {
						$country->set_country($row, $conn);
						if($country->get_name()) echo '<option value="'.$row.'">'.$country->get_name().'</option>';
					}
				}
			?>							
		</select>
        <br>
        <label for="town" >Város:</label>
        <p>Jelenlegi: <?php echo $currentTown; ?></p>
        <select class="form-control" name="town" id="town">
            <option value="">Válasszon várost!</option>
        </select>
        <br>
        <label for="str" >Utca: </label>
        <p>Jelenlegi: <?php echo $driver->get_street(); ?></p>
        <input class="form-control" type="text" id="str" name="street">
        <br>
        <label for="hn" >Házszám: </label>
        <p>Jelenlegi: <?php echo $driver->get_houseNumber(); ?></p>
        <input class="form-control" type="text" id="hn" name="houseNumber">
        <br>
        <label for="em" >E-mail: </label>
        <p>Jelenlegi: <?php echo $driver->get_email(); ?></p>
        <input class="form-control" type="email" id="em" name="email">
        <br>
        <label for="pn" >Telefonszám: </label>
        <p>Jelenlegi: <?php echo $driver->get_phone(); ?></p>
        <input class="form-control" type="text" id="pn" name="phoneNumber">
        <br>
        <label for="password">Jelszó:</label>
        <input class="form-control" type="password" name="password" id="password">
        <br>
        <input class="btn btn-hcbutton" type="submit" value="Módosít">
    </fieldset>
</form>
</div>
<?php
    }else if($_SESSION["type"]=="company"){
?>
<div class="container">
<form action="index.php?page=settings method="post">
    <fieldset>
        <legend>Vállalati adatok:</legend>
        <label for="cn" >Cég név: </label>
        <p>Jelenlegi: <?php echo $company->get_name(); ?></p>
        <input class="form-control" type="text" id="cn" name="companyname">
        <br>
        <label for="country">Ország:</label>
        <p>Jelenlegi: <?php echo $currentCountry; ?></p>
        <select class="form-control" name="country" id="country">
            <option value="">Válasszon országot!</option>
			<?php
                if ($countryIDs) {
					foreach($countryIDs as $row) {
						$country->set_country($row, $conn);
						if($country->get_name()) echo '<option value="'.$row.'">'.$country->get_name().'</option>';
					}
				}
			?>							
		</select>
        <br>
        <label for="town" >Város:</label>
        <p>Jelenlegi: <?php echo $currentTown; ?></p>
        <select class="form-control" name="town" id="town">
            <option value="">Válasszon várost!</option>
        </select>
        <br>
        <label for="str" >Utca: </label>
        <p>Jelenlegi: <?php echo $company->get_street(); ?></p>
        <input class="form-control" type="text" id="str" name="street">
        <br>
        <label for="hn" >Házszám: </label>
        <p>Jelenlegi: <?php echo $company->get_houseNumber(); ?></p>
        <input class="form-control" type="text" id="hn" name="houseNumber">
        <br>
        <label for="em" >E-mail: </label>
        <p>Jelenlegi: <?php echo $company->get_email(); ?></p>
        <input class="form-control" type="email" id="em" name="email">
        <br>
        <label for="pn" >Telefonszám: </label>
        <p>Jelenlegi: <?php echo $company->get_phone(); ?></p>
        <input class="form-control" type="text" id="pn" name="phoneNumber">
        <br>
        <label for="www" >Weboldal: </label>
        <p>Jelenlegi: <?php echo $company->get_webpage(); ?></p>
        <input class="form-control" type="text" id="www" name="webpage">
        <br>
        <label for="password">Jelszó:</label>
        <input class="form-control" type="password" name="password" id="password">
        <br>
        <input class="btn btn-hcbutton" type="submit" value="Módosít">
    </fieldset>
</form>
</div>
<?php
    }
?>
<script type="text/javascript">
    $("#country").on("change", function(){
        var countryID = $(this).val();
        $.ajax({
            url :"ajax/updateTownList.php",
            type:"POST",
            cache:false,
            data:{countryID:countryID},
            success:function(data){
                $("#town").html(data);
            }
        });
    });
</script>