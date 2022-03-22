<div class="container">
<h1>Szállítmány hozzáadása</h1>
	<div class="borderForForm">
	<form name="add" action="" method="post">
	<fieldset>
		<legend class="text-center">Hozzáadás</legend>
		<div class="input-group">
			<label for="modName">Szállítmány neve: </label>
			<br>
			<input type="text" id="modName" name="mName" class="form-control" required>
		</div>
		<br>
		<div class="input-group">
			<label for="modMass">Szállítmány tömege (tonnában): </label>
			<br>
			<input type="number" id="modMass" name="mMass" class="form-control" required>
		</div>
		<br>
		<div class="input-group">
			<label for="modADR">Szállítmány ADR osztálya:</label>
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
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="confirmAdd()">Hozzáadás</button>
	</div>
</div>
<div class="container">
<h1>Szállítmány törlése</h1>
	<div class="borderForForm">
	<form name="delete" action="" method="post">
	<fieldset>
		<legend class="text-center">Törlés</legend>
		<div class="input-group">
			<label for="delCargo">Szállítmány azonosítója:</label>
        	<select class="form-control" name="delCargo" id="delCargo" required>
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
		<br>
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="confirmDelete()">Törlés</button>
	</div>
</div>
<div class="container">
<h1>Szállítmány módosítása</h1>
	<div class="borderForForm">
	<form name="modify" action="" method="post">
	<fieldset>
		<legend class="text-center">Módosítás</legend>
		<div class="input-group">
			<label for="usr">Felhasználó név: </label>
			<br>
			<input type="text" id="usr" name="user" class="form-control">
		</div>
		<br>
		<div class="input-group">
			<label for="pass">Jelszó: </label>
			<br>
			<input type="password" id="pass" name="pw" class="form-control">
		</div>
			<br>
			<input class="btn btn-primary rounded-pill m-2" type="submit" value="Módosít">
	</fieldset>
	</form>

	</div>
</div>
<script src="js/cargo.js"></script>