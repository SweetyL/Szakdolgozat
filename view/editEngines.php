<?php
	if($_SESSION['type']=="company"){
?>
<div class="container">
<h1>Motor hozzáadása</h1>
	<div class="borderForForm">
	<form name="add" action="index.php?page=editEngines" method="post">
	<fieldset>
		<legend class="text-center">Hozzáadás</legend>
		<div class="input-group">
			<label for="addBrand">Motor márkája: </label>
			<br>
			<input type="text" id="addBrand" name="aBrand" class="form-control" required>
		</div>
		<br>
		<div class="input-group">
			<label for="addName">Motor neve: </label>
			<br>
			<input type="text" id="addName" name="aName" class="form-control" required>
		</div>
        <br>
        <div class="input-group">
			<label for="addPower">Motor ereje kW-ban: </label>
			<br>
			<input type="text" id="addPower" name="aPower" class="form-control" required>
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
<h1>Motor hozzáadása</h1>
	<div class="borderForForm">
	<form name="add" action="index.php?page=editEngines" method="post">
	<fieldset>
		<legend class="text-center">Hozzáadás</legend>
		<div class="input-group">
			<label for="addBrand">Motor márkája: </label>
			<br>
			<input type="text" id="addBrand" name="aBrand" class="form-control" required>
		</div>
		<br>
		<div class="input-group">
			<label for="addName">Motor neve: </label>
			<br>
			<input type="text" id="addName" name="aName" class="form-control" required>
		</div>
        <br>
        <div class="input-group">
			<label for="addPower">Motor ereje kW-ban: </label>
			<br>
			<input type="text" id="addPower" name="aPower" class="form-control" required>
		</div>
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="confirmAdd()">Hozzáadás</button>
	</div>
</div>
<div class="container">
<h1>Motor törlése</h1>
	<div class="borderForForm">
	<form name="delete" action="index.php?page=editEngines" method="post">
	<fieldset>
		<legend class="text-center">Törlés</legend>
		<div class="input-group">
			<label for="delEngine">Motor azonosítója:</label>
        	<select class="form-control" name="delEngine" id="delEngine" required>
            	<option value="">Válasszon ki motort!</option>
				<?php
                	if ($engineIDs) {
						foreach($engineIDs as $row) {
							$engine->set_engine($row, $conn);
							if($engine->get_id()) echo '<option value="'.$row.'">'.$engine->get_brand().", ".$engine->get_name().'</option>';
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
<h1>Motor módosítása</h1>
	<div class="borderForForm">
	<form name="modify" action="index.php?page=editEngines" method="post">
	<fieldset>
		<legend class="text-center">Módosítás</legend>
		<div class="input-group">
			<label for="modEngine">Motor azonosítója:</label>
        	<select class="form-control" name="modEngine" id="modEngine" required>
            	<option value="">Válasszon azonosítót!</option>
				<?php
                	if ($engineIDs) {
						foreach($engineIDs as $row) {
							$engine->set_engine($row, $conn);
							if($engine->get_id()) echo '<option value="'.$row.'">'.$engine->get_brand().", ".$engine->get_name().'</option>';
						}
					}
				?>							
			</select>
		</div>
		<label for="modBrand" >Márka: </label>
        <p><i>Jelenlegi: <span id="curBrand"  class="ajaxColor"></span></i></p>
        <input class="form-control" type="text" id="modBrand" name="mBrand">
        <br>
        <label for="modName" >Név:</label>
        <p><i>Jelenlegi: <span id="curName"  class="ajaxColor"></span></i></p>
        <input  class="form-control" type="text" id="modName" name="mName">
		<br>
		<label for="modPower" >Erő kW-ban:</label>
        <p><i>Jelenlegi: <span id="curPower"  class="ajaxColor"></span></i></p>
        <input  class="form-control" type="text" id="modPower" name="mPower">
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="confirmModify()">Módosít</button>
	</div>
</div>
<script type="text/javascript">
    $("#modEngine").on("change", function(){
        let engineID = $(this).val();
        $.ajax({
            url :"ajax/updateEngines.php",
            type:"POST",
			dataType: "json",
            cache:false,
            data:{engineID:engineID},
            success:function(response){
                $("#curName").html(response['name']);
				$("#curBrand").html(response['brand']);
				$("#curPower").html(response['power']);
            }
        });
    });
</script>
<?php
	}
?>
<script src="js/engine.js"></script>