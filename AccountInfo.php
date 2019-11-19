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

<!--Laat de account gegevens van de gebruiker zien in een form
De gebruiker kan hier zijn gegevens ook wijzigen. -->
<div class="AccForm">
    <form action="AccountInfo.php" method="get">
        <input onclick="ChangeForm()" id="wijzig" type="button" value="Wijzig" class="Button"> <br>
        <?php
        if(isset($_GET['wijzig'])) {
            print("<input id='opslaan' type='button' value='opslaan' class='Button'><br>");
        }
        ?>
        <div id="form-inputs">
            Voornaam*: <br> <input type="text" id="voor" name="voornaam" value="<?=($voornaam) ?>" readonly><br>
            Tussenvoegsels: <br> <input type="text" id="tussenv" name="tussenvoegsel" value="<?=($tussenvoegsels) ?>" readonly><br>
            Achternaam*: <br> <input type="text" id="achter" name="achternaam" value="<?=($achternaam) ?>" readonly><br>
            E-mail*: <br> <input type="email" id="mail" name="email" value="<?=$email?>" readonly><br>

            <h3>Wachtwoord veranderen</h3>
            Huidig wachtwoord* <br> <input type="password" id="huidigpass" name="wachtwoord"><br>
            Nieuw wachtwoord* <br> <input type="password" id="newpass" name="nieuwwachtwoord"><br>
            Herhaal wachtwoord* <br> <input type="password" id="herhaalpass" name="herhaalwachtwoord"><br>
        </div>
    </form>
</div>

<?php
if(isset($_GET['wijzig']))

?>

<a href="MijnAccount.php"><--Terug naar dashboard></a>
