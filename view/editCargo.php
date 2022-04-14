<?php
	if($_SESSION['type']=="company"){
?>
<div class="container">
<h1>Szállítmány hozzáadása</h1>
	<div class="borderForForm">
	<form name="add" action="index.php?page=editCargo" method="post">
	<fieldset>
		<legend class="text-center">Hozzáadás</legend>
		<div class="input-group">
			<label for="addName">Szállítmány neve: </label>
			<br>
			<input type="text" id="addName" name="aName" class="form-control" required>
		</div>
		<br>
		<div class="input-group">
			<label for="addMass">Szállítmány tömege (tonnában): </label>
			<br>
			<input type="number" id="addMass" name="aMass" class="form-control" required>
		</div>
		<br>
		<div class="input-group">
			<label for="addCargo">Szállítmány ADR osztálya:</label>
        	<select class="form-control" name="addADR" id="addADR" required>
            	<option value="">Válasszon ADR osztályt!</option>
				<?php
                	if ($adrIDs) {
						foreach($adrIDs as $row) {
							$ADR->set_adr($row, $conn);
							if($ADR->get_name()) echo '<option value="'.$row.'">'.$ADR->get_name().'</option>';
						}
					}
				?>							
			</select>
		</div>
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="confirmAdd()">Hozzáadás</button>
	</div>
</div>
<?php
	}else{
?>
<div class="container">
<h1>Szállítmány törlése</h1>
	<div class="borderForForm">
	<form name="delete" action="index.php?page=editCargo" method="post">
	<fieldset>
		<legend class="text-center">Törlés</legend>
		<div class="input-group">
			<label for="delCargo">Szállítmány azonosítója:</label>
        	<select class="form-control" name="delCargo" id="delCargo" required>
            	<option value="">Válasszon ki szállítmányt!</option>
				<?php
                	if ($cargoIDs) {
						foreach($cargoIDs as $row) {
							$cargo->set_cargo($row, $conn);
							if($cargo->get_id()) echo '<option value="'.$row.'">'.$cargo->get_name().", ".$cargo->get_mass().'</option>';
						}
					}
				?>							
			</select>
		</div>
		<br>
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="confirmDelete()">Törlés</button>
	</div>
</div>
<div class="container">
<h1>Szállítmány módosítása</h1>
	<div class="borderForForm">
	<form name="modify" action="index.php?page=editCargo" method="post">
	<fieldset>
		<legend class="text-center">Módosítás</legend>
		<div class="input-group">
			<label for="modCargo">Szállítmány azonosítója:</label>
        	<select class="form-control" name="modCargo" id="modCargo" required>
            	<option value="">Válasszon azonosítót!</option>
				<?php
                	if ($cargoIDs) {
						foreach($cargoIDs as $row) {
							$cargo->set_cargo($row, $conn);
							if($cargo->get_id()) echo '<option value="'.$row.'">'.$cargo->get_name().", ".$cargo->get_mass().'</option>';
						}
					}
				?>							
			</select>
		</div>
		<label for="modName" >Név: </label>
        <p><i>Jelenlegi: <span id="curName"  class="ajaxColor"></span></i></p>
        <input class="form-control" type="text" id="modName" name="mn">
        <br>
        <label for="modMass" >Tömeg:</label>
        <p><i>Jelenlegi: <span id="curMass"  class="ajaxColor"></span></i></p>
        <input  class="form-control" type="number" id="modMass" name="ms">
		<br>
		<div class="input-group">
			<label for="modADR">ADR osztály:</label>
			<br>
			<br>
        	<select class="form-control" name="modADR" id="modADR" required>
            	<option value="">Válasszon ADR osztályt!</option>
				<?php
                	if ($adrIDs) {
						foreach($adrIDs as $row) {
							$ADR->set_adr($row, $conn);
							if($ADR->get_name()) echo '<option value="'.$row.'">'.$ADR->get_name().'</option>';
						}
					}
				?>							
			</select>
		</div>
		<p><i>Jelenlegi: <span id="curADR" class="ajaxColor"></span></i></p>
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="confirmModify()">Módosít</button>
	</div>
</div>
<script type="text/javascript">
    $("#modCargo").on("change", function(){
        let cargoID = $(this).val();
        $.ajax({
            url :"ajax/updateCargo.php",
            type:"POST",
			dataType: "json",
            cache:false,
            data:{cargoID:cargoID},
            success:function(response){
                $("#curName").html(response['name']);
				$("#curMass").html(response['mass']);
				$("#curADR").html(response['adr']);
            }
        });
    });
</script>
<?php
	}
?>
<script src="js/cargo.js"></script>