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

<?php
//Laat succes meldingen zien als gegevens zijn gewijzigd.
if (!empty($_GET['message'])) {
    $SuccesMelding = $_GET['message'];
    print("<h3>" . $SuccesMelding . "</h3>");
}
?>

<!-- Formulier waar afleveradres te zien is
mogelijkheid tot wijzigen -->

<div class="afleveradres">
    <form action="Database.php" method="post">
        <!--        De functie in de onklick zorgt ervoor dat er gegevens gewijzigd kunnen worden-->
        <!--        wanneer er op de knop wijzig gedrukt word.-->
        <input onclick="ChangeForm()" id="wijzig" type="button" value="Wijzig"> <br>
        <div id="form-inputs">
            Ter attentie van:* <br> <input type="text" id="naam" name="naam" value="<?=($fullname) ?>" readonly required><br>
            Plaats*: <br> <input type="text" id="plaats" name="plaats" value="<?=($plaats) ?>" readonly required><br>
            Postcode*: <br> <input type="text" id="postcode" name="postcode" value="<?=($postcode) ?>" readonly required><br>
            Straat*: <br> <input type="text" id="straat" name="straat" value="<?=($straat) ?>" readonly required><br>
            Huisnummer*: <br> <input type="text" id="huisnnr" name="huisnnr" value="<?=($huisnummer) ?>" readonly required><br>
            Toevoegsel: <br> <input type="text" id="toev" name="toevoegsel" value="<?=($toevoegsel) ?>" readonly><br>
            Land*: <br> <input type="text" id="land" name="land" value="Nederland" readonly required><br>
            Telefoonnummer: <br> <input type="tel" id="telefoonnr" name="telefoonnr" value="<?=$telefoonnr?>" readonly><br>
            <input type='submit' id='opslaan' value='Opslaan' name="opslaanAfleveradres"><br>
        </div>
    </form>
</div>

<!--Linkje waarmee je terug naar je accountdashboard wordt gestuurd.-->
<a href="MijnAccount.php"><--Terug naar dashboard></a>
