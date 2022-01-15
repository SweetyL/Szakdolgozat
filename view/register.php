<form action="index.php?page=register" method="post">
    <fieldset>
        <legend>Sofőr regisztráció:</legend>
        Vezetéknév: <input class="form-control" type="text" name="lastname">
        <br>
        Keresztnév: <input  class="form-control" type="text" name="firstname">
        <br>
        Ország:
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
        Város:
        <select class="form-control" name="town" id="town">
            <option value="">Válasszon várost!</option>
        </select>
        <br>
        Utca: <input class="form-control" type="text" name="street">
        <br>
        Házszám: <input class="form-control" type="text" name="houseNumber">
        <br>
        E-mail: <input class="form-control" type="email" name="email">
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