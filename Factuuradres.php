<?php
//Start sessie.
session_start();
//Laadt de header in.
include 'Header.html';
//Laadt Database.php in zodat ik daar queries en variablen van kan gebruiken.
include 'Database.php';
?>

<script type="text/javascript" src="Functions.js"></script>

<h1>Factuuradres</h1>

<?php
if (!empty($_GET['message'])) {
    $SuccesMelding = $_GET['message'];
    print("<h3>" . $SuccesMelding . "</h3>");
}
?>

<!-- Formulier waar factuuradres te zien is
mogelijkheid tot wijzigen -->

<div class="factuuradres">
    <form action="incl/Database.php" method="post">
        <input onclick="ChangeForm()" id="wijzig" type="button" value="Wijzig"> <br>
        <div id="form-inputs">
            Ter attentie van:*: <br> <input type="text" id="naam" name="naam" value="<?=($fullname) ?>" readonly required><br>
            Plaats*: <br> <input type="text" id="naam" name="plaats" value="<?=($plaats) ?>" readonly required><br>
            Postcode*: <br> <input type="text" id="postcode" name="postcode" value="<?=($postcode) ?>" readonly required><br>
            Straat*: <br> <input type="text" id="straat" name="straat" value="<?=($straat) ?>" readonly required><br>
            Huisnummer*: <br> <input type="text" id="huisnnr" name="huisnnr" value="<?=($huisnummer) ?>" readonly required><br>
            Toevoegsel: <br> <input type="text" id="toev" name="toevoegsel" value="<?=($toevoegsel) ?>" readonly><br>
            Land*: <br> <input type="text" id="land" name="land" value="Nederland" readonly required><br>
            <input id='opslaan' type='submit' name="opslaanFactuuradres" value='Opslaan'>
        </div>
    </form>
</div>
<a href="MijnAccount.php"><--Terug naar dashboard></a>
