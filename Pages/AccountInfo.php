<?php

include '../incl/header.php';
//Laadt de header in.
//Laadt Database.php in zodat ik daar queries en variablen van kan gebruiken.
include '../incl/Database.php';
?>

<!--Laadt javascript bestand met functies in.-->
<script type="text/javascript" src="../JS/Functions.js"></script>

<div class="container" style="margin-top:200px; margin-bottom: 100px;">
    <?php
    //Laat succes meldingen zien als wachtwoord en/of gegevens zijn gewijzigd.
    if (!empty($_GET['message'])) {
        $SuccesMelding = $_GET['message'];
        print("<div class='alert alert-danger' role='alert'>" . $SuccesMelding . "</div>>");
    }
    if (!empty($_GET['messagepass'])) {
        $SuccesMelding = $_GET['messagepass'];
        print("<div class='alert alert-success' role='alert'>" . $SuccesMelding . "</div>");
    }
    ?>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <h1 class="AccInfo">Account informatie</h1>
            <!--Laat de account gegevens van de gebruiker zien in een form
            De gebruiker kan hier zijn gegevens ook wijzigen. -->
            <div class="AccForm">
                <form action="../incl/Database.php" method="post">
                    <!--        De functie in de onklick zorgt ervoor dat er gegevens gewijzigd kunnen worden-->
                    <!--        wanneer er op de knop wijzig gedrukt word.-->
                    <div class="form-group">
                        <label for="voornaam">Voornaam:*</label>
                        <input type="text" class="form-control" id="voor" name="voornaam" value="<?= ($voornaam) ?>"
                               readonly required>
                    </div>
                    <div class="form-group">
                        <label for="tussenvoegsel">Tussenvoegsels: </label>
                        <input type="text" class="form-control" id="tussenv" name="tussenvoegsel"
                               value="<?= ($tussenvoegsels) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="achternaam">Achternaam:* </label>
                        <input type="text" class="form-control" id="achter" name="achternaam"
                               value="<?= ($achternaam) ?>" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:* </label>
                        <input type="email" class="form-control" id="mail" name="email" value="<?= $email ?>" readonly
                               required>
                    </div>
                    <div class="form-group">
                        <label for="geboortedatum">Geboortedatum:*</label>
                        <input type="text" class="form-control" id="datum" name="gbdatum" value="<?= ($gbdatum) ?>"
                               readonly required>
                    </div>
                    <div class="form-group">
                            <input onclick="ChangeForm()" id="wijzig" name="wijzig" type="button" class="btn btn-info"
                                   value="Wijzig">
                        <input type="submit" id='opslaan' class="btn btn-success" name="opslaanAccountinfo"
                               value='Opslaan'><br>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <form action="../incl/Database.php" method="post">
                    <h1>Wachtwoord veranderen</h1>
                    <div class="form-group">
                        <label for="huidigwachtwoord">Huidig wachtwoord:*</label>
                        <input type="password" class="form-control" id="huidigpass" name="wachtwoord">
                    </div>
                    <div class="form-group">
                        <label for="nieuwwachtwoord">Nieuw wachtwoord:*</label>
                        <input type="password" class="form-control" id="newpass" name="nieuwwachtwoord">
                    </div>
                    <div class="form-group">
                        <label for="herhaalwachtwoord">Herhaal wachtwoord:*</label>
                        <input type="password" class="form-control" id="herhaalpass" name="herhaalwachtwoord">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="opslaanWachtwoord" class="btn btn-success" value="Verander wachtwoord">
                    </div>
            </form>
        </div>
        <!--Linkje waarmee je terug naar je accountdashboard wordt gestuurd.-->
        <a href="MijnAccount.php"><button class="btn btn-primary">Terug naar dashboard</button></a>
    </div>
</div>

<?php
include '../incl/footer.php';
?>
