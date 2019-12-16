<?php
require "../incl/header.php";
?>
<body>
<!-- wat doet dit hier?? -->
<!--<form method="post" action="logout.php">-->
<!--    <br><br><br><br><br> <button>Log out</button>-->
<!---->
<!--</form>-->
<!--    toelichting zie line 36. -->
<!--    hier staan de accountinformatie van de klant-->
<div class="container" style="margin-top:200px; margin-bottom: 233px; text-align: center">
    <div class="row">
        <div class="col-lg-12">
<form action="signup.inc.php" method="post">
    <fieldset>
    <legend style="border-radius: 20px; margin-left: 450px">accountinformatie</legend>
        <p class="clearfix">
        <label for="Voornaam" style="margin-right: 55px">Voornaam:</label>
        <input type="text" name="Voornaam" <?php if(isset($_GET['voornaam'])) {if (!empty($_GET['voornaam'])) {echo 'value="' . $_GET['voornaam'] . '"';}else{echo 'placeholder="voornaam"';}}else{echo 'placeholder="voornaam"';}?> required>*
        </p>
        <p class="clearfix">
            <label for="Tussenvoegsel" style="margin-right: 19px">Tussenvoegsels:</label>
            <input type="text" name="Tussenvoegsel" <?php if(isset($_GET['Tussenvoegsel'])) {if (!empty($_GET['Tussenvoegsel'])) {echo 'value="' . $_GET['Tussenvoegsel'] . '"';}else{echo 'placeholder="Tussenvoegsel"';}}else{echo 'placeholder="Tussenvoegsel"';}?>>
        </p>
        <p class="clearfix">
            <label for="Achternaam" style="margin-right: 42px">Achternaam:</label>
            <input type="text" name="Achternaam" <?php if(isset($_GET['Achternaam'])) {if (!empty($_GET['Achternaam'])) {echo 'value="' . $_GET['Achternaam'] . '"';}else{echo 'placeholder="Achternaam"';}}else{echo 'placeholder="Achternaam"';}?> required>*
        </p>
        <p class="clearfix">
            <label for="Emailadres" style="margin-right: 52px;">Emailadres:</label>
            <input type="text" name="Emailadres" <?php if (isset($_GET['error']) === 'mail') {if (!empty($_GET['Emailadres'])) {echo 'value="' . $_GET['Emailadres'] . '"';}else{echo 'placeholder="emailadres"';}}else{echo 'placeholder="emailadres"';}?> required>* <br>
        </p>
        <p class="clearfix">
            <label for="Telefoonnummer" style="margin-right: 5px;">Telefoonnummer:</label>
            <input type="text" name="Telefoonnummer"  PLACEHOLDER="06" required>*
        </p>
        <p>
            <label for="Geboortedatum" style="margin-right: 12px;">Geboortedatum:</label>
            <input  id="datum" type="date" name="Geboortedatum" min="1910-01-01" max="2001-01-01">* <br>
            <input type="checkbox" name="nieuwsbrief" style="margin-right: 5px;"> aanmelden voor nieuwsbrief
        </p>
    </fieldset>
            <!--        Hier wordt er een telefoonnummer error gegeven als de error-tel geset/actief is.-->
            <?php
            if(isset($_GET['error'])) {

                if($_GET['error']=== "Tel"){
                    Print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Ingevoerde Telefoonnummer klopt niet!</p>");
                }
            }
            ?>
<!--            Hier wordt de geboortedatum error gegeven als de error-gbdatum geset/actief is.-->
            <?php
            if(isset($_GET['error'])) {
                if ($_GET['error'] === "gbdatum") {
                    print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Geboortedatum is niet geldig!</p>");
                }
            }
            ?>
<!--        Hier wordt er een mail error gegeven als de error-mail geset/actief is.-->
            <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] === "mail") {
                print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Controleer je Emailadres!</p>");
            }
        }
        ?>
            <?php
if (isset($_GET['char'])) {
    if ($_GET['char'] === "error") {
        print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Controleer of er geen speciale tekens wordt gebruikt! </p>");
    }
}
?>

<!-- hier staan gegevens voor factuuradres-->
    <div id="factuuradres">
    <fieldset>
    <legend style="margin-left: 450px">Factuuradres</legend>
        <b style="margin-right: 52px;">Postcode:</b><input type="text" name="Postcode"  placeholder="voorbeeld:1088AA" required> * <br><br>
        <b style="margin-right: 33px;">Straatnaam:</b> <input type="text" name="Straatnaam" required>*  <br><br>
        <b style="margin-right: 20px;">Huisnummer:</b> <input type="text" name="Huisnummer" required>*  <br><br>
        <b style="margin-right: 77px;">Plaats:</b><input type="text" name="Plaats" required>*
        <!--Hier wordt een Postcode error gegeven als de error-Postcode geset/actief is.-->
            <?php
        if(isset($_GET['error'])){
            if($_GET['error'] === "Postcode"){
                print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Controleer uw postcode!</p>");
            }
        }
        ?>

        <!--Hier wordt een straatnaam error gegeven als de error-straatnaam geset/actief is.-->
            <?php if(isset($_GET['error'])){
                if ($_GET['error'] === "Straatnaam"){
                    Print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">De ingevoerde straatnaam klopt niet!</p>");
                }
            }
            ?>
        <!--Hier wordt er een huisnummer error gegeven als de error-Huisnummer geset/actief is.-->
            <?php
            if(isset($_GET['error'])) {
                if ($_GET['error'] === "Huisnummer") {
                    print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Controleer uw huisnummer </p>");
                }
            }
            ?>

    </fieldset>
    </div>
    <br>
    <br>
<!--    Hier wordt het wachtwoord ingevoerd en gesubmit naar php-->
    <div >
        <fieldset>
         <legend style="margin-left: 450px">Wachtwoord</legend>
        <b style="margin-right: 83px;">Wachtwoord:</b><input type="password" name="Wachtwoord" required >*<br><br>
        <b style="margin-right: 20px;">Herhaal Wachtwoord:</b><input type="password" name="Wachtwoord-herhaal" required>*<br><br>

            <?php
            // hier wordt een error gegeven als de gebruiker niet bestaat
            if(isset($_GET['error'])) {
                if ($_GET['error'] === "Wachtwoord") {
                    Print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">De ingevoerde wachtwoord voldoet niet aan de eisen. <br>Controleer of het wachtwoord minimaal 8 tekens bevatten </p>");
                }
            }
            // hier wordt een error gegeven als de gebruiker al bestaat!
            if(isset($_GET['error'])){
                if($_GET['error'] === "Gebruikerbestaatal"){
                    Print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">De ingevoerde emailadres bestaat al!</p>");
                }
            }
            ?>

            <input type="submit" name="registreer" value="Account aanmaken">
        </fieldset>
    </div>
</form>
        </div>
    </div>
</div>
</body>

<?php
if(isset($_GET['error'])){

    if($_GET['error']=== "SQL-initilaze"){

        print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Er is een fout opgetreden op onze website!</p>");

    }
}

include '../incl/footer.php';
?>


