<?php
	if($_SESSION['type']=="company"){
?>
<div class="container">
<h1>Kamion hozzáadása</h1>
	<div class="borderForForm">
	<form name="add" action="index.php?page=editTrucks" method="post">
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
			<label for="addTank">Kamion tank mérete literben: </label>
			<br>
			<input type="number" id="addTank" name="aTank" class="form-control" required>
		</div>
        <br>
		<div class="input-group">
			<label for="addCons">Kamion fogyasztása L/100KM (opcionális): </label>
			<br>
			<input type="number" id="addCons" name="aCons" class="form-control">
		</div>
        <br>
		<div class="input-group">
			<label for="addAxles">Kamion tengelyeinek száma: </label>
			<br>
			<input type="number" id="addAxles" name="aAxles" class="form-control" required>
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
<h1>Kamion hozzáadása</h1>
	<div class="borderForForm">
	<form name="add" action="index.php?page=editTrucks" method="post">
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
			<label for="addTank">Kamion tank mérete literben: </label>
			<br>
			<input type="number" id="addTank" name="aTank" class="form-control" required>
		</div>
        <br>
		<div class="input-group">
			<label for="addCons">Kamion fogyasztása L/100KM (opcionális): </label>
			<br>
			<input type="number" id="addCons" name="aCons" class="form-control">
		</div>
        <br>
		<div class="input-group">
			<label for="addAxles">Kamion tengelyeinek száma: </label>
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
	<form name="delete" action="index.php?page=editTrucks" method="post">
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
<div class="container">
<h1>Kamion módosítása</h1>
	<div class="borderForForm">
	<form name="modify" action="index.php?page=editTrucks" method="post">
	<fieldset>
		<legend class="text-center">Módosítás</legend>
		<div>
			<label for="modTruck">Kamion azonosítója:</label>
        	<select class="form-control" name="modTruck" id="modTruck" required>
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
			<label for="modBrand">Kamion márkája: </label>
			<p><i>Jelenlegi: <span id="curBrand" class="ajaxColor"></span></i></p>
			<input type="text" id="modBrand" name="mBrand" class="form-control" required>
		</div>
		<br>
		<div>
			<label for="modName">Kamion neve: </label>
			<p><i>Jelenlegi: <span id="curName" class="ajaxColor"></span></i></p>
			<input type="text" id="modName" name="mName" class="form-control" required>
		</div>
		<br>
		<div class="input-group">
			<label for="modEngine">Kamion motorja:</label>
        	<select class="form-control" name="modEngine" id="modEngine" required>
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
		<p><i>Jelenlegi: <span id="curEngine" class="ajaxColor"></span></i></p>
		<br>
		<div>
			<label for="modTank">Kamion tank mérete literben: </label>
			<p><i>Jelenlegi: <span id="curTank" class="ajaxColor"></span></i></p>
			<input type="number" id="modTank" name="mTank" class="form-control" required>
		</div>
        <br>
		<div>
			<label for="modCons">Kamion fogyasztása L/100KM (opcionális): </label>
			<p><i>Jelenlegi: <span id="curCons" class="ajaxColor"></span></i></p>
			<input type="number" id="modCons" name="mCons" class="form-control">
		</div>
        <br>
		<div>
			<label for="modAxles">Kamion tengelyeinek száma: </label>
			<p><i>Jelenlegi: <span id="curAxles" class="ajaxColor"></span></i></p>
			<input type="number" id="modAxles" name="mAxles" class="form-control" required>
		</div>
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="confirmModify()">Módosít</button>
	</div>
</div>
<script type="text/javascript">
    $("#modTruck").on("change", function(){
        let truckID = $(this).val();
        $.ajax({
            url :"ajax/updateTrucks.php",
            type:"POST",
			dataType: "json",
            cache:false,
            data:{truckID:truckID},
            success:function(response){
                $("#curBrand").html(response['brand']);
				$("#curName").html(response['name']);
				$("#curEngine").html(response['engine']);
				$("#curTank").html(response['tank']);
				$("#curCons").html(response['cons']);
				$("#curAxles").html(response['axles']);
            }
        });
    });
</script>
<?php
	}
?>
<script src="js/truck.js"></script>