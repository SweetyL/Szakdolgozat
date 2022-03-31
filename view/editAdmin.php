<?php
    if(!empty($loginError)){
        echo '<script type="text/JavaScript">
			Swal.fire({
				title: "Azonosítási probléma",
				icon: "error",
				html: "'.$loginError.'",
			})
			</script>';
    }
?>
<div class="container">
<h1>Admin hozzáadása</h1>
	<div class="borderForForm">
	<form name="add" action="index.php?page=editAdmin" method="post">
	<fieldset>
		<legend class="text-center">Hozzáadás</legend>
        <div class="input-group">
			<label for="addAdmin">Felhasználó azonosítója:</label>
        	<select class="form-control" name="addAdmin" id="addAdmin" required>
            	<option value="">Válasszon ki felhasználót!</option>
				<?php
                	if ($driverIDs) {
						foreach($driverIDs as $row) {
                            $driver->set_user($row, $conn);
                            if(!(in_array($driver->get_id(),$admins))){
                                if($driver->get_id()) echo '<option value="'.$row.'">'.$driver->get_username().'</option>';
                            }else{
                                echo $driver->get_username();
                            }
						}
					}
				?>							
			</select>
		</div>
        <br>
        <label for="addPass" >Jelszó a megerősítéshez: </label>
        <input class="form-control" type="password" id="addPass" name="aPass">
        <br>
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="confirmAdd()">Hozzáadás</button>
	</div>
</div>
<div class="container">
<h1>Admin törlése</h1>
	<div class="borderForForm">
	<form name="delete" action="index.php?page=editAdmin" method="post">
	<fieldset>
		<legend class="text-center">Törlés</legend>
		<div class="input-group">
			<label for="delAdmin">Admin azonosítója:</label>
        	<select class="form-control" name="delAdmin" id="delAdmin" required>
            	<option value="">Válasszon ki admint!</option>
				<?php
                	if ($admins) {
						foreach($admins as $row) {
							$driver->set_user($row, $conn);
							if($driver->get_id()) echo '<option value="'.$row.'">'.$driver->get_username().'</option>';
						}
					}
				?>							
			</select>
		</div>
		<br>
        <label for="delPass" >Jelszó a megerősítéshez: </label>
        <input class="form-control" type="password" id="delPass" name="dPass">
        <br>
	</fieldset>
	</form>
	<button class="btn btn-primary rounded-pill m-2" onclick="confirmDelete()">Törlés</button>
	</div>
</div>
<script src="js/admin.js"></script>