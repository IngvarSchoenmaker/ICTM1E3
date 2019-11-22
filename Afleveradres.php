<?php
//Start sessie.
session_start();
//Laadt de header in.
include 'incl/Header.html';
//Laadt Database.php in zodat ik daar queries en variablen van kan gebruiken.
include 'Database.php';
?>

<!-- Laadt javascript functies in-->
<script type="text/javascript" src="JS/Functions.js"></script>

<h1>Afleveradres</h1>

<?php
if (!empty($_GET['message'])) {
    $SuccesMelding = $_GET['message'];
    print("<h3>" . $SuccesMelding . "</h3>");
}
?>

<!-- Formulier waar afleveradres te zien is
mogelijkheid tot wijzigen -->

<div class="afleveradres">
    <form action="Database.php" method="post">
        <input onclick="ChangeForm()" id="wijzig" type="button" value="Wijzig" class="Button"> <br>
        <div id="form-inputs">
            Ter attentie van:* <br> <input type="text" id="naam" name="naam" value="<?=($fullname) ?>" readonly><br>
            Plaats*: <br> <input type="text" id="plaats" name="plaats" value="<?=($plaats) ?>" readonly><br>
            Postcode*: <br> <input type="text" id="postcode" name="postcode" value="<?=($postcode) ?>" readonly><br>
            Straat*: <br> <input type="text" id="straat" name="straat" value="<?=($straat) ?>" readonly><br>
            Huisnummer*: <br> <input type="text" id="huisnnr" name="huisnnr" value="<?=($huisnummer) ?>" readonly><br>
            Toevoegsel: <br> <input type="text" id="toev" name="toevoegsel" value="<?=($toevoegsel) ?>" readonly><br>
            Land*: <br> <input type="text" id="land" name="land" value="Nederland" readonly><br>
            Telefoonnummer: <br> <input type="tel" id="telefoonnr" name="telefoonnr" value="<?=$telefoonnr?>" readonly><br>
            <input type='submit' id='opslaan' value='Opslaan' name="opslaanAfleveradres"><br>
        </div>
    </form>
</div>





<a href="MijnAccount.php"><--Terug naar dashboard></a>
