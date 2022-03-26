<div class="container">
<h1>Kamion hozzáadása</h1>
	<div class="borderForForm">
	<form name="add" action="" method="post">
	<fieldset>
		<legend class="text-center">Hozzáadás</legend>
		<div class="input-group">
			<label for="addBrand">Kamion márkája: </label>
			<br>
			<input type="text" id="addBrand" name="aBrand" class="form-control" required>
		</div>
		<br>
		<div class="input-group">
			<label for="addName">Kamion neve: </label>
			<br>
			<input type="text" id="addName" name="aName" class="form-control" required>
		</div>
		<br>
		<div class="input-group">
			<label for="addEngine">Kamion motorja:</label>
        	<select class="form-control" name="addEngine" id="addEngine" required>
            	<option value="">Válasszon motort!</option>
				<?php
                	if ($engineIDs) {
						foreach($engineIDs as $row) {
							$engine->set_engine($row, $conn);
							if($engine->get_id()) echo '<option value="'.$row.'">'.$engine->get_brand().' '.$engine->get_name().'</option>';
						}
					}
				?>							
			</select>
		</div>
        <br>
		<div class="input-group">
			<label for="addName">Kamion tank mérete literben: </label>
			<br>
			<input type="number" id="addTank" name="aTank" class="form-control" required>
		</div>
        <br>
		<div class="input-group">
			<label for="addName">Kamion fogyasztása L/100KM (opcionális): </label>
			<br>
			<input type="number" id="addCons" name="aCons" class="form-control">
		</div>
        <br>
		<div class="input-group">
			<label for="addName">Kamion tengelyeinek száma: </label>
			<br>
			<input type="number" id="addAxles" name="aAxles" class="form-control" required>
		</div>
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="confirmAdd()">Hozzáadás</button>
	</div>
</div>
<div class="container">
<h1>Kamion törlése</h1>
	<div class="borderForForm">
	<form name="delete" action="" method="post">
	<fieldset>
		<legend class="text-center">Törlés</legend>
		<div class="input-group">
			<label for="delTruck">Kamion azonosítója:</label>
        	<select class="form-control" name="delTruck" id="delTruck" required>
            	<option value="">Válasszon ki kamiont!</option>
				<?php
                	if ($truckIDs) {
						foreach($truckIDs as $row) {
							$truck->set_truck($row, $conn);
							if($truck->get_id()) echo '<option value="'.$row.'">'.$truck->get_brand()." ".$truck->get_name().'</option>';
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

<script src="js/truck.js"></script>