<?php
session_start();

require "../incl/header.php";
?>
    <html>
    <head>
    <title>WW1 webshop</title>

<!--    <script type="text/javascript">-->
<!---->
<!--        function Toon_Alternatiefadres() {-->
<!--            //-->
<!--            if (document.getElementById('alternatiefadres').checked) {-->
<!--                //toont alternatief factuuradres blok-->
<!--                document.getElementById('factuuradres').style.visibility = 'visible';-->
<!--            }-->
<!--            else document.getElementById('factuuradres').style.visibility = 'hidden';-->
<!---->
<!--        }-->
<!---->
<!--    </script>-->

    </head>
<body>
    <!–– toelichting zie line 36. -->
    <!--hier staan de accountinformatie van de klant-->
<form action="signup.inc.php" method="post">
    <br>
    <br>
    <br>
    <br>
    <div style="border: 1px solid black">
    <fieldset>
    <legend style="border-radius: 20px; margin-left: 450px">accountinformatie</legend>
        <p class="clearfix">
        <label for="Voornaam" style="margin-right: 55px; margin-left: 400px">Voornaam:</label>
        <input type="text" name="Voornaam" <?php if(isset($_GET['voornaam'])) {if (!empty($_GET['voornaam'])) {echo 'value="' . $_GET['voornaam'] . '"';}else{echo 'placeholder="voornaam"';}}else{echo 'placeholder="voornaam"';}?> required>
        </p>
        <p class="clearfix">
            <label for="Tussenvoegsel" style="margin-right: 19px; margin-left: 400px">Tussenvoegsels:</label>
            <input type="text" name="Tussenvoegsel" <?php if(isset($_GET['Tussenvoegsel'])) {if (!empty($_GET['Tussenvoegsel'])) {echo 'value="' . $_GET['Tussenvoegsel'] . '"';}else{echo 'placeholder="Tussenvoegsel"';}}else{echo 'placeholder="Tussenvoegsel"';}?>>
        </p>
        <p class="clearfix">
            <label for="Achternaam" style="margin-right: 42px; margin-left: 400px">Achternaam:</label>
            <input type="text" name="Achternaam" <?php if(isset($_GET['Achternaam'])) {if (!empty($_GET['Achternaam'])) {echo 'value="' . $_GET['Achternaam'] . '"';}else{echo 'placeholder="Achternaam"';}}else{echo 'placeholder="Achternaam"';}?> required >
        </p>
        <p class="clearfix">
            <label for="Emailadres" style="margin-right: 52px; margin-left: 400px">Emailadres:</label>
            <input type="text" name="Emailadres" <?php if (isset($_GET['5'])) {if (!empty($_GET['5'])) {echo 'value="' . $_GET['5'] . '"';}else{echo 'placeholder="emailadres"';}}else{echo 'placeholder="emailadres"';}?> required> <br>
        </p>






        <p class="clearfix">
            <label for="Telefoonnummer" style="margin-right: 5px; margin-left: 400px">Telefoonnummer:</label>
            <input type="tel" name="Telefoonnummer" required>
        </p>
        <p>
            <label for="Geboortedatum" style="margin-right: 12px; margin-left: 400px">Geboortedatum:</label>
            <input type="date" name="Geboortedatum" required>
        </p>
    </fieldset>



<!-- hier staan gegevens voor factuuradres-->
    <div id="factuuradres" style="border: 1px solid black">
    <fieldset>
    <legend style="margin-left: 450px">Factuuradres</legend>
        <b style="margin-right: 52px; margin-left: 400px">postcode:</b><input type="text" name="Postcode" required>  <br><br>
        <b style="margin-right: 33px; margin-left: 400px"">straatnaam:</b> <input type="text" name="Straatnaam" required>  <br><br>
        <b style="margin-right: 20px; margin-left: 400px"">Huisnummer:</b> <input type="text" name="Huisnummer" required>  <br><br>
        <b style="margin-right: 37px; margin-left: 400px"">toevoeging:</b><input type="text" name="Toevoeging">  <br><br>
        <b style="margin-right: 77px; margin-left: 400px"">Plaats:</b><input type="text" name="Plaats" required><br><br>
        <b style="margin-right: 89px; margin-left: 400px"">
    </fieldset>
    </div>
    <br>
    <br>

<!--    Hier wordt het wachtwoord ingevoerd en gesubmit naar php-->
    <div style="border: 1px solid black">
        <fieldset>
         <legend style="margin-left: 450px">Wachtwoord</legend>
        <b style="margin-right: 83px; margin-left: 400px"">Wachtwoord:</b><input type="password" name="Wachtwoord" required><br><br>
        <b style="margin-right: 20px; margin-left: 400px"">Herhaal Wachtwoord:</b><input type="password" name="Wachtwoord-herhaal" required><br><br>
            <input style="margin-left: 400px" type="submit" name="registreer" value="Account aanmaken">
        </fieldset>
    </div>
</form>
</body>
</html>




<?php
// zie bestand signup.inc.php --> line 23
if (isset($_GET['char'])) {
    if ($_GET['char'] === "error") {
        print("<p style='color: red'>controleer uw gegevens die een cijfer of symbolen bevatten</p>");
    } elseif ($_GET['Tussenvoegsel'] === "wwnietgoed") {
        print("wachtwoord komt niet overeen!");
    }

}



include '../incl/footer.php';

?>


<?php


// dit is voor de input velden value en placeholder voor als het aangepast moet worden
// dit zorgt ervoor dat de ingevoerde velden

//if (isset($_GET['2'])) {
//    if (!empty($_GET['2'])) {
//        echo 'value="' . $_GET['2'] . '"';
//    }else{
//        echo 'placeholder="gebruikersnaam"';
//    }
//}else{
//    echo 'placeholder="gebruikersnaam"';
//}
?>