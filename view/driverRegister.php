<div class="container">
<form action="index.php?page=driverRegister" method="post">
    <fieldset>
        <legend>Sofőr regisztráció:</legend>
        <label for="ln" >Vezetéknév: </label>
        <input class="form-control" type="text" id="ln" name="lastname" required>
        <br>
        <label for="fn" >Keresztnév:</label>
        <input  class="form-control" type="text" id="fn" name="firstname" required>
        <br>
        <label for="country">Ország:</label>
        <select class="form-control" name="country" id="country" required>
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
        <select class="form-control" name="town" id="town" required>
            <option value="">Válasszon várost!</option>
        </select>
        <br>
        <label for="str" >Utca (opcionális): </label>
        <input class="form-control" type="text" id="str" name="street">
        <br>
        <label for="hn" >Házszám (opcionális): </label>
        <input class="form-control" type="text" id="hn" name="houseNumber">
        <br>
        <label for="em" >E-mail: </label>
        <input class="form-control" type="email" id="em" name="email" required>
        <br>
        <label for="pn" >Telefonszám (opcionális): </label>
        <input class="form-control" type="text" id="pn" name="phoneNumber">
        <br>
        <label for="username">Felhasználónév:</label>
        <input class="form-control" type="text" id="username" name="username" required>
        <span id="result"></span>
        <br>
        <label for="password">Jelszó:</label>
        <input class="form-control" type="password" name="password" id="password" required>
        <br>
        <input class="btn btn-primary rounded-pill" type="submit" value="Regisztrálás">
    </fieldset>
</form>
</div>
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
<script type="text/javascript">
    $("#username").on("input", function(){
        var username = $(this).val();
        var table = "drivers";
        $.ajax({
            url :"ajax/checkUsernameAvailable.php",
            type:"POST",
            cache:false,
            data:{username:username, table:table},
            success:function(data){
                $("#result").html(data);
            }
        });
    });
</script>