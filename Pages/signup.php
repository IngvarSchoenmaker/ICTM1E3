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
<form method="post" action="logout.php">
    <br><br><br><br><br>
    <button>Log out</button>

</form>
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
                <input type="text" name="Voornaam" <?php if (isset($_GET['voornaam'])) {
                    if (!empty($_GET['voornaam'])) {
                        echo 'value="' . $_GET['voornaam'] . '"';
                    } else {
                        echo 'placeholder="voornaam"';
                    }
                } else {
                    echo 'placeholder="voornaam"';
                } ?> required>
            </p>
            <p class="clearfix">
                <label for="Tussenvoegsel" style="margin-right: 19px; margin-left: 400px">Tussenvoegsels:</label>
                <input type="text" name="Tussenvoegsel" <?php if (isset($_GET['Tussenvoegsel'])) {
                    if (!empty($_GET['Tussenvoegsel'])) {
                        echo 'value="' . $_GET['Tussenvoegsel'] . '"';
                    } else {
                        echo 'placeholder="Tussenvoegsel"';
                    }
                } else {
                    echo 'placeholder="Tussenvoegsel"';
                } ?>>
            </p>
            <p class="clearfix">
                <label for="Achternaam" style="margin-right: 42px; margin-left: 400px">Achternaam:</label>
                <input type="text" name="Achternaam" <?php if (isset($_GET['Achternaam'])) {
                    if (!empty($_GET['Achternaam'])) {
                        echo 'value="' . $_GET['Achternaam'] . '"';
                    } else {
                        echo 'placeholder="Achternaam"';
                    }
                } else {
                    echo 'placeholder="Achternaam"';
                } ?> required>
            </p>
            <p class="clearfix">
                <label for="Emailadres" style="margin-right: 52px; margin-left: 400px">Emailadres:</label>
                <input type="text" name="Emailadres" <?php if (isset($_GET['error']) === 'mail') {
                    if (!empty($_GET['Emailadres'])) {
                        echo 'value="' . $_GET['Emailadres'] . '"';
                    } else {
                        echo 'placeholder="emailadres"';
                    }
                } else {
                    echo 'placeholder="emailadres"';
                } ?> required> <br>

            </p>

            <p class="clearfix">
                <label for="Telefoonnummer" style="margin-right: 5px; margin-left: 400px">Telefoonnummer:</label>
                <input type="tel" name="Telefoonnummer" value="06" required>


            </p>
            <p>
                <label for="Geboortedatum" style="margin-right: 12px; margin-left: 400px">Geboortedatum:</label>
                <input type="date" name="Geboortedatum" required> <br>
                <input type="checkbox" name="nieuwsbrief" style="margin-right: 5px; margin-left: 400px"> aanmelden voor
                nieuwsbrief
            </p>
        </fieldset>

        <!--        Hier wordt er een telefoonnummer error gegeven als de error-tel geset/actief is.-->
        <?php
        if (isset($_GET['error'])) {

            if ($_GET['error'] === "Tel") {
                Print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Ingevoerde Telefoonnummer klopt niet!</p>");
            }
        }
        ?>

        <!--            Hier wordt de geboortedatum error gegeven als de error-gbdatum geset/actief is.-->
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] === "gbdatum") ;
            print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Geboortedatum is niet geldig!</p>");
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
        <div id="factuuradres" style="border: 1px solid black">
            <fieldset>
                <legend style="margin-left: 450px">Factuuradres</legend>
                <b style="margin-right: 52px; margin-left: 400px">postcode:</b><input type="text" name="Postcode"
                                                                                      placeholder="voorbeeld:1088AA">
                <br><br>
                <b style="margin-right: 33px; margin-left: 400px"">straatnaam:</b> <input type="text" name="Straatnaam">
                <br><br>
                <b style="margin-right: 20px; margin-left: 400px"">Huisnummer:</b> <input type="text" name="Huisnummer">
                <br><br>
                <b style="margin-right: 37px; margin-left: 400px"">toevoeging:</b><input type="text" name="Toevoeging">
                <br><br>
                <b style="margin-right: 77px; margin-left: 400px"">Plaats:</b><select name="Plaats">
                    <option>Amsterdam</option>
                    <option>Armani</option>
                    <option>Den Haag</option>
                    <option>Rotterdam</option>
                    <option>Utrecht</option>
                    <option>Harderwijk</option>
                </select><br><br>


                <!--Hier wordt een Postcode error gegeven als de error-Postcode geset/actief is.-->
                <?php
                if (isset($_GET['error'])) {

                    if ($_GET['error'] === "Postcode") {

                        print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Controleer uw postcode!</p>");
                    }
                }

                ?>

                <!--Hier wordt een straatnaam error gegeven als de error-straatnaam geset/actief is.-->
                <?php if (isset($_GET['error'])) {

                    if ($_GET['error'] === "Straatnaam") {
                        Print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">De ingevoerde straatnaam klopt niet!</p>");
                    }

                }


                ?>

                <!--Hier wordt er een huisnummer error gegeven als de error-Huisnummer geset/actief is.-->
                <?php

                if (isset($_GET['error'])) {

                    if ($_GET['error'] === "Huisnummer") ;

                    print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Controleer uw huisnummer </p>");

                }


                ?>

                <!--Hier wordt toevoeging error gegeven als de error-toevoeging geset/actief is.-->
                <?php
                if (isset($_GET['error'])) {

                    if ($_GET['error'] === "Toevoeging") ;

                    print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Controleer De ingevoerde toevoeging </p>");

                }
                ?>

            </fieldset>
        </div>
        <br>
        <br>

        <!--    Hier wordt het wachtwoord ingevoerd en gesubmit naar php-->
        <div style="border: 1px solid black">
            <fieldset>
                <legend style="margin-left: 450px">Wachtwoord</legend>
                <b style="margin-right: 83px; margin-left: 400px"">Wachtwoord:</b><input type="password"
                                                                                         name="Wachtwoord"><br><br>
                <b style="margin-right: 20px; margin-left: 400px"">Herhaal Wachtwoord:</b><input type="password"
                                                                                                 name="Wachtwoord-herhaal"><br><br>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] === "Wachtwoord") {

                        Print("<p style=\" color:red; margin-right: 5px; margin-left: 400px\">Wachtwoord komt niet overeen!</p>");

                    }
                }

                ?>
                <input style="margin-left: 400px" type="submit" name="registreer" value="Account aanmaken">
            </fieldset>
        </div>
</form>
</body>
</html>


<?php
include '../incl/footer.php';
?>


