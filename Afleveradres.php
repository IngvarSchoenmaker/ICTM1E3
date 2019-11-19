<?php
//Start sessie.
session_start();
//Laadt de header in.
include 'Header.html';
//Laadt Database.php in zodat ik daar queries en variablen van kan gebruiken.
include 'Database.php';
?>

<!-- Laadt javascript functies in-->
<script type="text/javascript" src="Functions.js"></script>

<h1>Afleveradres</h1>

<!-- Formulier waar afleveradres te zien is
mogelijkheid tot wijzigen -->

<div class="afleveradres">
    <form action="Afleveradres.php" method="get">
        <input onclick="ChangeForm()" id="wijzig" type="button" value="Wijzig" class="Button"> <br>
        <div id="form-inputs">
            Ter attentie van:*: <br> <input type="text" id="naam" name="naam" value="<?=($fullname) ?>" readonly><br>
            Postcode*: <br> <input type="text" id="postcode" name="postcode" value="<?=($postcode) ?>" readonly><br>
            Adres*: <br> <input type="text" id="adres" name="adres" value="<?=($adres) ?>" readonly><br>
            Provincie*: <br> <input type="text" id="provincie" name="provincie" value="<?=$provincie?>" readonly><br>
            Land*: <br> <input type="text" id="land" name="land" value="Nederland" readonly><br>
            Telefoonnummer: <br> <input type="tel" id="telefoonnr" name="telefoonnr" value="<?=$telefoonnr?>" readonly><br>
        </div>
    </form>
</div>

<a href="MijnAccount.php"><--Terug naar dashboard></a>
