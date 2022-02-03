<?php
    if(!empty($_SESSION["id"])) {
    ?>
        <form action="index.php?page=loginPanel&action=logout" method="post">
	        <input type="submit" name="logout" value="Kilépés">
	    </form>
<?php
    }
    else{
	    if(isset($_POST['user'])) {
			
		    echo "<div class='alert alert-danger alert-dismissible'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<p>".$loginError."</p>
				</div>";
	    }
?>
<div class="container">
	<form action="index.php?page=loginPanel&action=<?php echo $_REQUEST['action']; ?>" method="post">
	<fieldset>
		<legend class="text-center">Belépés</legend>
		<div class="input-group">
			<label for="usr">Felhasználó név:</label>
			<input type="text" id="usr" name="user" class="form-control">
		</div>
		<div class="input-group">
			<label for="pass">Jelszó:</label>
			<input type="password" id="pass" name="pw" class="form-control">
		</div>
			<input class="btn btn-primary" type="submit" value="Belépés">
	</fieldset>
	</form>
</div>
<?php						
		}
?>