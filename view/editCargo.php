<script>
	function confirm() {
		Swal.fire({
  			title: 'Biztos benne?',
  			text: "Ha kitörli, akkor már nincs visszaút!",
  			icon: 'warning',
  			showCancelButton: true,
  			confirmButtonColor: '#3085d6',
  			cancelButtonColor: '#d33',
  			confirmButtonText: 'Igen, mehet!',
			cancelButtonText: 'Vissza'
		}).then((result) => {
  			if (result.isConfirmed) {
				document.delete.submit();
  			}
		})
	}
</script>
<div class="container">
<h1>Szállítmány hozzáadása</h1>
	<form action="" method="post">
	<fieldset>
		<legend class="text-center">Hozzáadás</legend>
		<div class="input-group">
			<label for="modName">Szállítmány neve: </label>
			<br>
			<input type="text" id="modName" name="mName" class="form-control">
		</div>
		<br>
		<div class="input-group">
			<label for="modMass">Szállítmány tömege: </label>
			<br>
			<input type="password" id="modMass" name="mMass" class="form-control">
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
			<input class="btn btn-primary rounded-pill" type="submit" value="Hozzáadás">
	</fieldset>
	</form>
</div>
<div class="container">
<h1>Szállítmány törlése</h1>
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
	<button class="btn btn-primary rounded-pill" onclick="confirm()">Törlés</button>
</div>
<div class="container">
<h1>Szállítmány módosítása</h1>
	<form action="" method="post">
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
			<input class="btn btn-primary rounded-pill" type="submit" value="Módosít">
	</fieldset>
	</form>
</div>