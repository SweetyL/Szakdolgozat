<?php
    if(!empty($error)){
        echo '<script type="text/JavaScript">
			Swal.fire({
				title: "Azonosítási probléma",
				icon: "error",
				html: "'.$error.'",
			})
			</script>';
    }
?>
<h1>Beállítások</h1>
<?php
    if($_SESSION['type']=="driver"){
?>
<div class="container">
<div class="borderForForm">
<form name="driverChange" action="index.php?page=settings" method="post">
    <fieldset>
        <legend>Sofőr adatok:</legend>
        <label for="lastname" >Vezetéknév: </label>
        <p>Jelenlegi:<span id="curLastname" class="ajaxColor"> <?php echo $driver->get_lastname(); ?></span></p>
        <input class="form-control" type="text" id="lastname" name="lastname">
        <br>
        <label for="firstname" >Keresztnév:</label>
        <p>Jelenlegi: <span id="curFirstname" class="ajaxColor"><?php echo $driver->get_firstname(); ?></span></p>
        <input  class="form-control" type="text" id="firstname" name="firstname">
        <br>
        <label for="country">Ország:</label>
        <p>Jelenlegi:<span id="curCountry" class="ajaxColor"> <?php echo $currentCountry; ?></span></p>
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
        <p>Jelenlegi: <span id="curTown" class="ajaxColor"><?php echo $currentTown; ?></span></p>
        <select class="form-control" name="town" id="town">
            <option value="">Válasszon várost!</option>
        </select>
        <br>
        <label for="street" >Utca: </label>
        <p>Jelenlegi: <span id="curStreet" class="ajaxColor"><?php echo $driver->get_street(); ?></span></p>
        <input class="form-control" type="text" id="street" name="street">
        <br>
        <label for="houseNumber" >Házszám: </label>
        <p>Jelenlegi: <span id="curHouseNumber" class="ajaxColor"><?php echo $driver->get_houseNumber(); ?></span></p>
        <input class="form-control" type="text" id="houseNumber" name="houseNumber">
        <br>
        <label for="email" >E-mail: </label>
        <p>Jelenlegi: <span id="curEmail" class="ajaxColor"><?php echo $driver->get_email(); ?></span></p>
        <input class="form-control" type="email" id="email" name="email">
        <br>
        <label for="phoneNumber" >Telefonszám: </label>
        <p>Jelenlegi: <span id="curPhoneNumber" class="ajaxColor"><?php echo $driver->get_phone(); ?></span></p>
        <input class="form-control" type="text" id="phoneNumber" name="phoneNumber">
        <br>
        <label for="password">Jelszó:</label>
        <input class="form-control" type="password" name="password" id="password">
        <br>
    </fieldset>
</form>
<button class="btn btn-primary rounded-pill m-2" onclick="confirmModify()">Módosít</button>
</div>
</div>
<script src="js/settingsDriver.js"></script>
<?php
    }else if($_SESSION['type']=="company"){
?>
<div class="container">
<div class="borderForForm">
<form name="companyChange" action="index.php?page=settings" method="post">
    <fieldset>
        <legend>Vállalati adatok:</legend>
        <label for="companyName" >Cég név: </label>
        <p>Jelenlegi: <span id="curName" class="ajaxColor"><?php echo $company->get_name(); ?></span></p>
        <input class="form-control" type="text" id="companyName" name="companyName">
        <br>
        <label for="country">Ország:</label>
        <p>Jelenlegi: <span id="curCountry" class="ajaxColor"><?php echo $currentCountry; ?></span></p>
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
        <p>Jelenlegi: <span id="curTown" class="ajaxColor"><?php echo $currentTown; ?></span></p>
        <select class="form-control" name="town" id="town">
            <option value="">Válasszon várost!</option>
        </select>
        <br>
        <label for="street" >Utca: </label>
        <p>Jelenlegi: <span id="curStreet" class="ajaxColor"><?php echo $company->get_street(); ?></span></p>
        <input class="form-control" type="text" id="street" name="street">
        <br>
        <label for="houseNumber" >Házszám: </label>
        <p>Jelenlegi: <span id="curHouseNumber" class="ajaxColor"><?php echo $company->get_houseNumber(); ?></span></p>
        <input class="form-control" type="text" id="houseNumber" name="houseNumber">
        <br>
        <label for="email" >E-mail: </label>
        <p>Jelenlegi: <span id="curEmail" class="ajaxColor"><?php echo $company->get_email(); ?></span></p>
        <input class="form-control" type="email" id="email" name="email">
        <br>
        <label for="phoneNumber" >Telefonszám: </label>
        <p>Jelenlegi: <span id="curPhoneNumber" class="ajaxColor"><?php echo $company->get_phone(); ?></span></p>
        <input class="form-control" type="text" id="phoneNumber" name="phoneNumber">
        <br>
        <label for="webpage" >Weboldal: </label>
        <p>Jelenlegi: <span id="curWebpage" class="ajaxColor"><?php echo $company->get_webpage(); ?></span></p>
        <input class="form-control" type="text" id="webpage" name="webpage" placeholder="www.valami.hu">
        <br>
        <label for="password">Jelszó:</label>
        <input class="form-control" type="password" name="password" id="password">
        <br>
    </fieldset>
</form>
<button class="btn btn-primary rounded-pill m-2" onclick="confirmModify()">Módosít</button>
</div>
</div>
<script src="js/settingsCompany.js"></script>
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