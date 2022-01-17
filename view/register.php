<form action="index.php?page=register" method="post">
    <fieldset>
        <legend>Sofőr regisztráció:</legend>
        <label for="ln" >Vezetéknév: </label>
        <input class="form-control" type="text" id="ln" name="lastname">
        <br>
        <label for="fn" >Keresztnév:</label>
        <input  class="form-control" type="text" id="fn" name="firstname">
        <br>
        <label for="country">Ország:</label>
        <select class="form-control" name="country" id="country">
            <option value="">Válasszon országot!</option>
			<?php
                if ($countryIDs) {
					foreach($countryIDs as $row) {
						$country->set_user($row, $conn);
						if($country->get_name()) echo '<option value="'.$row.'">'.$country->get_name().'</option>';
					}
				}
			?>							
		</select>
        <br>
        <label for="town" >Város:</label>
        <select class="form-control" name="town" id="town">
            <option value="">Válasszon várost!</option>
        </select>
        <br>
        <label for="str" >Utca: </label>
        <input class="form-control" type="text" id="str" name="street">
        <br>
        <label for="hn" >Házszám: </label>
        <input class="form-control" type="text" id="hn" name="houseNumber">
        <br>
        <label for="em" >E-mail: </label>
        <input class="form-control" type="email" id="em" name="email">
        <br>
        <label for="pn" >Telefonszám: </label>
        <input class="form-control" type="text" id="pn" name="phoneNumber">
        <br>
        <label for="password">Jelszó:</label>
        <input class="form-control" type="password" name="password" id="password">
        <br>
        <input class="btn btn-primary" type="submit" value="Regisztrálás">
    </fieldset>
</form>
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