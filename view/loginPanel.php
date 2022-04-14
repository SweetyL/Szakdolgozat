<?php
    if(!empty($_SESSION['id'])) {
    ?>
        <form action="index.php?page=loginPanel&action=logout" method="post">
	        <input type="submit" name="logout" value="Kilépés">
	    </form>
<?php
    }
    else{
	    if(isset($_POST['user'])) {
			echo '<script type="text/JavaScript">
			Swal.fire({
				title: "Bejelentkezési hiba",
				icon: "error",
				html: "'.$loginError.'",
			})
			</script>';
	    }
?>
<div class="container">
	<form action="index.php?page=loginPanel&action=<?php echo $_REQUEST['action']; ?>" method="post">
	<fieldset>
		<legend class="text-center">Belépés</legend>
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
			<input class="btn btn-primary rounded-pill" type="submit" value="Belépés">
	</fieldset>
	</form>
</div>
<?php						
		}
?>