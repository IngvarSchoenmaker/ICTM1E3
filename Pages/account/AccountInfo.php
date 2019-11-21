<?php
//Start sessie.
session_start();
//Laadt de header in.
include '../../incl/header.php';
//Laadt Database.php in zodat ik daar queries en variablen van kan gebruiken.
include '../../incl/Database.php';
?>

<script type="text/javascript" src="../../JS/Functions.js"></script>

    <div class="container" style="margin-top:150px">
        <div class="row">
            <div class="col-lg-12">
<h1 class="AccInfo">Account informatie</h1>

<!--Laat de account gegevens van de gebruiker zien in een form
De gebruiker kan hier zijn gegevens ook wijzigen. -->
<div class="AccForm">
    <form action="AccountInfo.php" method="post">
        <input onclick="ChangeForm(); myFunction()" id="wijzig" name="wijzig" type="button" value="Wijzig" class="Button"> <br>
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

<div id="hide" style="display: none">
    <input id='opslaan' type='button' value='Opslaan' class='Button' onclick="myFunction()"><br>
</div>
<a href="MijnAccount.php"><--Terug naar dashboard></a>
            </div>
        </div>
    </div>
<?php
include '../../incl/footer.php';
?>