<?php
    if($_SESSION["type"]=="driver" or $_SESSION["type"]=="admin"){
?>
<div class="p-2 flex-fill">
    <form action="index.php?page=search" method="post">
        <fieldset>
		    <legend class="text-center">Keresés</legend>
		    <div class="input-group">
			    <label for="nm">Cég neve:</label>
			    <input type="text" id="nm" name="name" class="form-control">
		    </div>
		    <input class="btn btn-primary rounded-pill" type="submit" value="Keresés">
	    </fieldset>
    </form>
</div>
<?php
    }else if($_SESSION["type"]=="company"){
?>
<div class="result p-2 flex-fill">
    <form action="index.php?page=search" method="post">
        <fieldset>
		    <legend class="text-center">Keresés</legend>
		    <div class="input-group">
			    <label for="nm">Családnév:</label>
			    <input type="text" id="nm" name="lname" class="form-control">
		    </div>
            <div class="input-group">
			    <label for="nm">Keresztnév:</label>
			    <input type="text" id="nm" name="fname" class="form-control">
		    </div>
		    <input class="btn btn-primary rounded-pill" type="submit" value="Keresés">
	    </fieldset>
    </form>
</div>
<?php
    }
?>