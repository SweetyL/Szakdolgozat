<div class="container">
<h1>QR kód generáló</h1>
<p>
    Itt tud generálni egy oldalt és annak QR kódját. Ezt az oldalt regisztráció nélkül is meg lehet nyitni majd a QR kód vagy link használatával, így Ön bárhol megoszthatja ezt, 
    ahol akarja.
    A következőkben be bírja állítani, hogy milyen adatok látszódjanak a generált oldalon. 
</p>
<?php
    if(!empty($_SESSION["id"]) and $_SESSION["type"]=="driver"){
?>
<form method="post" action="index.php?page=genPage">      
    <fieldset>      
        <legend>Adatok</legend>
        <div>
            <h3>Teljes vagy rövidített neve jelenjen meg?</h3>  
            <input type="radio" name="nameQ" value="full" checked><span>Teljes</span>
            <br>
            <input type="radio" name="nameQ" value="short"><span>Rövidített</span>
        </div>   
        <div>
            <h3>Egyéb adatok</h3>
            <input type="checkbox" name="country" value="yes"><span>Ország</span>
            <br>
            <input type="checkbox" name="town" value="yes"><span>Város</span>
            <br>
            <input type="checkbox" name="street" value="yes"><span>Utca</span>
            <br>
            <input type="checkbox" name="houseNum" value="yes"><span>Házszám</span>
            <br>
            <input type="checkbox" name="email" value="yes"><span>E-mail</span>
            <br>
            <input type="checkbox" name="phone" value="yes"><span>Telefon</span>
            <br>
            <br>
            <input type="checkbox" id="all" value=""><span>Minden</span>
        </div>
        <br>
        <input class="btn btn-primary rounded-pill" type="submit" value="Generálás!">     
    </fieldset>      
</form>
<?php
    }else{
?>
<form method="post" action="index.php?page=genPage">      
    <fieldset>      
        <legend>Adatok</legend>
        <div>
            <h3>Megjegyzés: cégeknél a név megjelenítése kötelező! Elfogadja?</h3>  
            <input type="checkbox" name="nameQ" value="yes"><span>Igen</span>
        </div> 
        <div>
            <h3>Egyéb adatok</h3>
            <input type="checkbox" name="country" value="yes"><span>Ország</span>
            <br>
            <input type="checkbox" name="town" value="yes"><span>Város</span>
            <br>
            <input type="checkbox" name="street" value="yes"><span>Utca</span>
            <br>
            <input type="checkbox" name="houseNum" value="yes"><span>Házszám</span>
            <br>
            <input type="checkbox" name="email" value="yes"><span>E-mail</span>
            <br>
            <input type="checkbox" name="phone" value="yes"><span>Telefon</span>
            <br>
            <input type="checkbox" name="webpage" value="yes"><span>Weboldal</span>
            <br>
            <br>
            <input type="checkbox" id="all" value=""><span>Minden</span>
        </div>
        <br>
        <input class="btn btn-primary rounded-pill" type="submit" value="Generálás!">     
    </fieldset>      
</form>
<?php
    }
?>
<script>
    $("#all").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
</div>