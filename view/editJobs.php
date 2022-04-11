<div class="container">
<h1>Megbízás hozzáadása</h1>
<?php
    if($_SESSION['type']=="company"){
?>
<div class="borderForForm">
	<form name="companyAdd" action="index.php?page=editJobs" method="post">
	<fieldset>
		<legend class="text-center">Hozzáadás</legend>
		<div class="input-group">
			<label for="addTrip">Megbízás útja: </label>
			<br>
			<select class="form-control" name="addTrip" id="addTrip" required>
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
        <div class="input-group">
			<label for="addTruck">Megbízáshoz használt kamion: </label>
			<br>
			<select class="form-control" name="addTruck" id="addTruck" required>
            	<option value="">Válasszon kamiont!</option>
				<?php
                	if ($truckIDs) {
						foreach($truckIDs as $row) {
							$truck->set_truck($row, $conn);
							if($truck->get_id()) echo '<option value="'.$row.'">'.$truck->get_brand().", ".$truck->get_name().'</option>';
						}
					}
				?>							
			</select>
		</div>
        <br>
		<div>
            <label for="addReward">Megbízás jutalma (euróban) - opcionális</label>
            <br>
            <input type="number" id="addReward" name="addReward" class="form-control">
        </div>
        <div>
            <label for="addComment">Egyéb információk a megbízáshoz (opcionális): </label>
            <br>
            <textarea id="addComment" name="addComment" rows="4" cols="50">
            </textarea>
        </div>
        <div>
            <label for="addDeadline">Megbízás lejárai ideje: </label>
            <br>
            <input type="datetime-local" id="addDeadline" name="addDeadline">
        </div>
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="companyConfirmAdd()">Hozzáadás</button>
	</div>
    <br>
    <h1>Megbízás törlése</h1>
    <div class="borderForForm">
        <legend class="text-center">Törlés</legend>
	    <form name="companyDel" action="index.php?page=editJobs" method="post">
            <fieldset>
                <div class="input-group">
			    <label for="delJob">Törölni kívánt megbízás: </label>
			    <br>
			    <select class="form-control" name="delJob" id="delJob" required>
            	    <option value="">Válasszon megbízást!</option>
				    <?php
                	    if ($jobIDs) {
						    foreach($jobIDs as $row) {
							    $job->set_job($row, $conn);
                                $trip->set_trip($job->get_trip(),$conn);
                                $cargo->set_cargo($trip->get_cargoID(),$conn);
							    if($job->get_id()) echo '<option value="'.$row.'">'.$cargo->get_name().", ".$trip->get_tripLength().'km</option>';
						    }
					    }
				    ?>							
			    </select>
	</div>
            </fieldset>
        </form>
        <button class="btn btn-primary rounded-pill m-2" onclick="companyConfirmDel()">Törlés</button>
    </div>
<?php
    }else{
?>

<?php
    }
?>
</div>