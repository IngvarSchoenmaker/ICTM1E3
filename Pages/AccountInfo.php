<?php

include '../incl/header.php';
//Laadt de header in.
//include '../incl/Header.html';
//Laadt Database.php in zodat ik daar queries en variablen van kan gebruiken.
include '../incl/Database.php';
?>

<!--Laadt javascript bestand met functies in.-->
<script type="text/javascript" src="../JS/Functions.js"></script>

<div class="container" style="margin-top:200px; margin-bottom: 100px; text-align: center">
    <div class="row">
        <div class="col-md-6 col-sm-6">
<h1 class="AccInfo">Account informatie</h1>

<?php
//Laat succes meldingen zien als wachtwoord en/of gegevens zijn gewijzigd.
if (!empty($_GET['message'])) {
    $SuccesMelding = $_GET['message'];
    print("<h3>" . $SuccesMelding . "</h3>");
}
if (!empty($_GET['messagepass'])) {
    $SuccesMelding = $_GET['messagepass'];
    print("<h3>" . $SuccesMelding . "</h3>");
}
?>

<!--Laat de account gegevens van de gebruiker zien in een form
De gebruiker kan hier zijn gegevens ook wijzigen. -->
<div class="AccForm">

    <form action="../incl/Database.php" method="post">
        <!--        De functie in de onklick zorgt ervoor dat er gegevens gewijzigd kunnen worden-->
        <!--        wanneer er op de knop wijzig gedrukt word.-->
        <input onclick="ChangeForm()" id="wijzig" name="wijzig" type="button" value="Wijzig"> <br>
        <div id="form-inputs">
            Voornaam*: <br> <input type="text" id="voor" name="voornaam" value="<?= ($voornaam) ?>" readonly
                                   required><br>
            Tussenvoegsels: <br> <input type="text" id="tussenv" name="tussenvoegsel" value="<?= ($tussenvoegsels) ?>"
                                        readonly><br>
            Achternaam*: <br> <input type="text" id="achter" name="achternaam" value="<?= ($achternaam) ?>" readonly
                                     required><br>
            E-mail*: <br> <input type="email" id="mail" name="email" value="<?= $email ?>" readonly required><br>
            Geboortedatum*: <br> <input type="text" id="datum" name="gbdatum" value="<?= ($gbdatum) ?>" readonly
                                        required><br>
            <input type="submit" id='opslaan' name="opslaanAccountinfo" value='Opslaan'><br>
        </div>
    </form>
</div>
        </div>
        <div class="col-md-6 col-sm-6">
    <form action="Database.php" method="post">
        <div id="ww-inputs">
            <h1>Wachtwoord veranderen</h1>
            Huidig wachtwoord* <br> <input type="password" id="huidigpass" name="wachtwoord"><br>
            Nieuw wachtwoord* <br> <input type="password" id="newpass" name="nieuwwachtwoord"><br>
            Herhaal wachtwoord* <br> <input type="password" id="herhaalpass" name="herhaalwachtwoord"><br>
            <input type="submit" name="opslaanWachtwoord" value="Verander wachtwoord"><br><br><br>
        </div>
    </form>

<!--Linkje waarmee je terug naar je accountdashboard wordt gestuurd.-->
<a href="MijnAccount.php"><--Terug naar dashboard></a>
        </div>
</div>
</div>

<?php
include '../incl/footer.php';
?>
