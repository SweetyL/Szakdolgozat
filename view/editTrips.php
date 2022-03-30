<div class="container">
<h1>Út hozzáadása</h1>
	<div class="borderForForm">
	<form name="add" action="index.php?page=editTrips" method="post">
	<fieldset>
		<legend class="text-center">Hozzáadás</legend>
		<div class="input-group">
			<label for="addStart">Út indulási helye: </label>
			<br>
			<input type="text" id="addStart" name="aStart" class="form-control" required>
		</div>
		<br>
		<div class="input-group">
			<label for="addEnd">Út érkezési helye: </label>
			<br>
			<input type="text" id="addEnd" name="aEnd" class="form-control" required>
		</div>
		<br>
        <div class="input-group">
			<label for="addLength">Út hossza kilométerben: </label>
			<br>
			<input type="number" id="addLength" name="aLength" class="form-control" required>
		</div>
        <br>
		<div class="input-group">
			<label for="addCargo">Szállítmány hozzáadása az úthoz:</label>
        	<select class="form-control" name="addCargo" id="addCargo" required>
            	<option value="">Válasszon szállítmányt!</option>
				<?php
                	if ($cargoIDs) {
						foreach($cargoIDs as $row) {
							$cargo->set_cargo($row, $conn);
							if($cargo->get_id()) echo '<option value="'.$row.'">'.$cargo->get_name()." ".$cargo->get_mass().'</option>';
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
<h1>Út törlése</h1>
	<div class="borderForForm">
	<form name="delete" action="index.php?page=editTrips" method="post">
	<fieldset>
		<legend class="text-center">Törlés</legend>
		<div class="input-group">
			<label for="delTrip">Út azonosítója:</label>
        	<select class="form-control" name="delTrip" id="delTrip" required>
            	<option value="">Válasszon ki utat!</option>
				<?php
                	if ($tripIDs) {
						foreach($tripIDs as $row) {
							$trip->set_trip($row, $conn);
							if($trip->get_id()) echo '<option value="'.$row.'">'.$trip->get_start()." - ".$trip->get_end().'</option>';
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
<h1>Út módosítása</h1>
	<div class="borderForForm">
	<form name="modify" action="index.php?page=editTrips" method="post">
	<fieldset>
		<legend class="text-center">Módosítás</legend>
		<div class="input-group">
			<label for="modTrip">Út azonosítója:</label>
        	<select class="form-control" name="modTrip" id="modTrip" required>
            	<option value="">Válasszon utat!</option>
				<?php
                	if ($tripIDs) {
						foreach($tripIDs as $row) {
							$trip->set_trip($row, $conn);
							if($trip->get_id()) echo '<option value="'.$row.'">'.$trip->get_start()." - ".$trip->get_end().'</option>';
						}
					}
				?>							
			</select>
		</div>
		<label for="modStart" >Út indulás helye: </label>
        <p><i>Jelenlegi: <span id="curStart"  class="ajaxColor"></span></i></p>
        <input class="form-control" type="text" id="modStart" name="mStart">
        <br>
        <label for="modEnd" >Út érkezési helye:</label>
        <p><i>Jelenlegi: <span id="curEnd"  class="ajaxColor"></span></i></p>
        <input  class="form-control" type="text" id="modEnd" name="mEnd">
		<br>
		<label for="modLength" >Út hossza kilométerben:</label>
        <p><i>Jelenlegi: <span id="curLength"  class="ajaxColor"></span></i></p>
        <input  class="form-control" type="number" id="modLength" name="mLength">
		<br>
		<div class="input-group">
			<label for="modCargo">Szállítmány hozzáadása az úthoz:</label>
        	<select class="form-control" name="modCargo" id="modCargo" required>
            	<option value="">Válasszon szállítmányt!</option>
				<?php
                	if ($cargoIDs) {
						foreach($cargoIDs as $row) {
							$cargo->set_cargo($row, $conn);
							if($cargo->get_id()) echo '<option value="'.$row.'">'.$cargo->get_name()." ".$cargo->get_mass().'</option>';
						}
					}
				?>							
			</select>
		</div>
        <p><i>Jelenlegi: <span id="curCargo"  class="ajaxColor"></span></i></p>
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="confirmModify()">Módosít</button>
	</div>
</div>
<script src="js/trip.js"></script>
<script type="text/javascript">
    $("#modTrip").on("change", function(){
        let tripID = $(this).val();
        $.ajax({
            url :"ajax/updateTrip.php",
            type:"POST",
			dataType: "json",
            cache:false,
            data:{tripID:tripID},
            success:function(response){
                $("#curStart").html(response['start']);
				$("#curEnd").html(response['end']);
				$("#curLength").html(response['length']);
				$("#curCargo").html(response['cargo']);
            }
        });
    });
</script>