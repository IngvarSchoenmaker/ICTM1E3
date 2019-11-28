<?php
//Start sessie.
session_start();
//Laadt de header in.
include 'Header.html';
//Laadt Database.php in zodat ik daar queries en variablen van kan gebruiken.
include 'Database.php';
?>

<script type="text/javascript" src="Functions.js"></script>

<h1 class="AccInfo">Account informatie</h1>

<?php
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

    <form action="Database.php" method="post">
        <input onclick="ChangeForm()" id="wijzig" name="wijzig" type="button" value="Wijzig"> <br>
        <div id="form-inputs">
            Voornaam*: <br> <input type="text" id="voor" name="voornaam" value="<?=($voornaam) ?>" readonly required><br>
            Tussenvoegsels: <br> <input type="text" id="tussenv" name="tussenvoegsel" value="<?=($tussenvoegsels) ?>" readonly><br>
            Achternaam*: <br> <input type="text" id="achter" name="achternaam" value="<?=($achternaam) ?>" readonly required><br>
            E-mail*: <br> <input type="email" id="mail" name="email" value="<?=$email?>" readonly required><br>
            Geboortedatum*: <br> <input type="text" id="datum" name="gbdatum" value="<?=($gbdatum) ?>" readonly required><br>
            <input type="submit" id='opslaan'name="opslaanAccountinfo" value='Opslaan'><br>
        </div>
    </form>

    <form action="Database.php" method="post">
        <div id="ww-inputs">
            <h3>Wachtwoord veranderen</h3>
            Huidig wachtwoord* <br> <input type="password" id="huidigpass" name="wachtwoord"><br>
            Nieuw wachtwoord* <br> <input type="password" id="newpass" name="nieuwwachtwoord"><br>
            Herhaal wachtwoord* <br> <input type="password" id="herhaalpass" name="herhaalwachtwoord"><br>
            <input type="submit" name="opslaanWachtwoord" value="Verander wachtwoord"><br>
        </div>
    </form>
</div>

<!-- ff een update -->

<a href="MijnAccount.php"><--Terug naar dashboard></a>
