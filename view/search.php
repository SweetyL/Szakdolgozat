<h1 class="text-center">Keresés</h1>
<p class="text-center">Töltse ki azokat az adatokat amikre rá szeretne szűrni. Minél több adatot ad meg, annál pontosabb eredményeket fog kapni!</p>
<div class="container">
    <div class="borderForForm">
        <?php
            if($_SESSION["type"]=="driver"){
        ?>
    <form name="companySearch" action="index.php?page=search" method="post">
    <fieldset>
        <legend>Vállalati adatok:</legend>
        <div class="row">
            <div class="col">
                <label for="companyName" >Cég név: </label>
                <input class="form-control" type="text" id="companyName" name="companyName">
            </div>
            <div class="col">
                <label for="country">Ország:</label>
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
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="town" >Város:</label>
                <select class="form-control" name="town" id="town">
                    <option value="">Válasszon várost!</option>
                </select>
            </div>
            <div class="col">
                <label for="street" >Utca: </label>
                <input class="form-control" type="text" id="street" name="street">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="houseNumber" >Házszám: </label>
                <input class="form-control" type="text" id="houseNumber" name="houseNumber">
            </div>
            <div class="col">
                <label for="email" >E-mail: </label>
                <input class="form-control" type="email" id="email" name="email">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="phoneNumber" >Telefonszám: </label>
                <input class="form-control" type="text" id="phoneNumber" name="phoneNumber">
            </div>
            <div class="col">
                <label for="webpage" >Weboldal: </label>
                <input class="form-control" type="text" id="webpage" name="webpage" placeholder="www.valami.hu">
            </div>
        </div>
        <br>
        <input class="btn btn-primary rounded-pill" type="submit" value="Keresés">
    </fieldset>
</form>
        <?php
            }else if($_SESSION["type"]=="company"){
        ?>
<form name="driverSearch" action="index.php?page=search" method="post">
    <fieldset>
        <legend>Sofőr adatok:</legend>
        <div class="row">
            <div class="col">
            <label for="lastname" >Vezetéknév: </label>
            <input class="form-control" type="text" id="lastname" name="lastname">
            </div>
            <div class="col">
            <label for="firstname" >Keresztnév:</label>
            <input  class="form-control" type="text" id="firstname" name="firstname">
            </div>
        </div>
        <br>
            <div class="col">
                <label for="country">Ország:</label>
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
            </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="town" >Város:</label>
                <select class="form-control" name="town" id="town">
                    <option value="">Válasszon várost!</option>
                </select>
            </div>
            <div class="col">
                <label for="street" >Utca: </label>
                <input class="form-control" type="text" id="street" name="street">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="houseNumber" >Házszám: </label>
                <input class="form-control" type="text" id="houseNumber" name="houseNumber">
            </div>
            <div class="col">
                <label for="email" >E-mail: </label>
                <input class="form-control" type="email" id="email" name="email">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="phoneNumber" >Telefonszám: </label>
                <input class="form-control" type="text" id="phoneNumber" name="phoneNumber">
            </div>
            <div class="col">
                <label for="webpage" >Weboldal: </label>
                <input class="form-control" type="text" id="webpage" name="webpage" placeholder="www.valami.hu">
            </div>
        </div>
        <br>
        <input class="btn btn-primary rounded-pill" type="submit" value="Keresés">
    </fieldset>
</form>
        <?php
            }
        ?>
        </div>
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