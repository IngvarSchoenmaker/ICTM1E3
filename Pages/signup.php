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
<div class="container" style="margin-top: 150px; margin-bottom: 50px">
    <div class="row">
        <div class="col-lg-12">
            <form action="signup.inc.php" method="post">
                <legend>Accountinformatie</legend>
                <div class="form-group">
                    <label for="Voornaam">Voornaam:*</label>
                    <input type="text" class="form-control" name="Voornaam" <?php if (isset($_GET['voornaam'])) {
                        if (!empty($_GET['voornaam'])) {
                            echo 'value="' . $_GET['voornaam'] . '"';
                        } else {
                            echo 'placeholder="Voornaam"';
                        }
                    } else {
                        echo 'placeholder="Voornaam"';
                    } ?> required>
                </div>
                <div class="form-group">
                    <label for="Tussenvoegsel">Tussenvoegsels:</label>
                    <input type="text" class="form-control"
                           name="Tussenvoegsel" <?php if (isset($_GET['Tussenvoegsel'])) {
                        if (!empty($_GET['Tussenvoegsel'])) {
                            echo 'value="' . $_GET['Tussenvoegsel'] . '"';
                        } else {
                            echo 'placeholder="Tussenvoegsel"';
                        }
                    } else {
                        echo 'placeholder="Tussenvoegsel"';
                    } ?>>
                </div>
                <div class="form-group">
                    <label for="Achternaam">Achternaam:*</label>
                    <input type="text" class="form-control" name="Achternaam" <?php if (isset($_GET['Achternaam'])) {
                        if (!empty($_GET['Achternaam'])) {
                            echo 'value="' . $_GET['Achternaam'] . '"';
                        } else {
                            echo 'placeholder="Achternaam"';
                        }
                    } else {
                        echo 'placeholder="Achternaam"';
                    } ?> required>
                </div>
                <div class="form-group">
                    <label for="Emailadres">Emailadres:*</label>
                    <input type="text" class="form-control"
                           name="Emailadres" <?php if (isset($_GET['error']) === 'mail') {
                        if (!empty($_GET['Emailadres'])) {
                            echo 'value="' . $_GET['Emailadres'] . '"';
                        } else {
                            echo 'placeholder="emailadres"';
                        }
                    } else {
                        echo 'placeholder="emailadres"';
                    } ?> required>
                </div>
                <div class="form-group">
                    <label for="Telefoonnummer">Telefoonnummer:*</label>
                    <input type="text" class="form-control" name="Telefoonnummer" PLACEHOLDER="06" required>
                </div>
                <div class="form-group">
                    <label for="Geboortedatum">Geboortedatum:*</label>
                    <input id="datum" class="form-control" type="date" name="Geboortedatum" min="1910-01-01"
                           max="2001-01-01">

                </div>
                <!--        Hier wordt er een telefoonnummer error gegeven als de error-tel geset/actief is.-->
                <?php
                if (isset($_GET['error'])) {

                    if ($_GET['error'] === "Tel") {
                        Print("<div class='alert alert-danger' role='alert'>Ingevoerde Telefoonnummer klopt niet!</div>");
                    }
                }
                ?>
                <!--            Hier wordt de geboortedatum error gegeven als de error-gbdatum geset/actief is.-->
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] === "gbdatum") {
                        print("<div class='alert alert-danger' role='alert'>Geboortedatum is niet geldig!</div>");
                    }
                }
                ?>
                <!--        Hier wordt er een mail error gegeven als de error-mail geset/actief is.-->
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] === "mail") {
                        print("<div class='alert alert-danger' role='alert'>Controleer je Emailadres!</div>");
                    }
                }
                ?>
                <?php
                if (isset($_GET['char'])) {
                    if ($_GET['char'] === "error") {
                        print("<div class='alert alert-danger' role='alert'>Controleer of er geen speciale tekens wordt gebruikt! </div>");
                    }
                }
                ?>

                <!-- hier staan gegevens voor factuuradres-->
                <div id="factuuradres">
                    <legend>Factuuradres</legend>
                    <div class="form-group">
                        <label for="postcode">Postcode:*</label>
                        <input type="text" class="form-control" name="Postcode" placeholder="voorbeeld:1088AA" required>
                    </div>
                    <div class="form-group">
                        <label for="straatnaam">Straatnaam:*</label>
                        <input type="text" class="form-control" name="Straatnaam" required>
                    </div>
                    <div class="form-group">
                        <label for="huisnummer">Huisnummer:*</label>
                        <input type="text" class="form-control" name="Huisnummer" required>
                    </div>
                    <div class="form-group">
                        <label for="plaats">Plaats:*</label>
                        <input type="text" class="form-control" name="Plaats" required>
                    </div>
                    <!--Hier wordt een Postcode error gegeven als de error-Postcode geset/actief is.-->
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] === "Postcode") {
                            print("<div class='alert alert-danger' role='alert'>Controleer uw postcode!</div>");
                        }
                    }
                    ?>

                    <!--Hier wordt een straatnaam error gegeven als de error-straatnaam geset/actief is.-->
                    <?php if (isset($_GET['error'])) {
                        if ($_GET['error'] === "Straatnaam") {
                            Print("<div class='alert alert-danger' role='alert'>De ingevoerde straatnaam klopt niet!</div>>");
                        }
                    }
                    ?>
                    <!--Hier wordt er een huisnummer error gegeven als de error-Huisnummer geset/actief is.-->
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] === "Huisnummer") {
                            print("<div class='alert alert-danger' role='alert'>Controleer uw huisnummer </div>>");
                        }
                    }
                    ?>
                </div>
                <br>
                <br>
                <!--    Hier wordt het wachtwoord ingevoerd en gesubmit naar php-->
                <div>
                    <legend>Wachtwoord</legend>
                    <div class="form-group">
                        <label for="wachtwoord">Wachtwoord:*</label><input type="password" class="form-control"
                                                                           name="Wachtwoord" required>
                    </div>
                    <div class="form-group">
                        <label for="herhaal_wachtwoord">Herhaal Wachtwoord:*</label>
                        <input type="password" class="form-control" name="Wachtwoord-herhaal" required>
                    </div>

                    <?php
                    // hier wordt een error gegeven als de gebruiker niet bestaat
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] === "Wachtwoord") {
                            Print("<div class='alert alert-danger' role='alert'>De ingevoerde wachtwoord voldoet niet aan de eisen. <br>Controleer of het wachtwoord minimaal 8 tekens bevatten </div>>");
                        }
                    }
                    // hier wordt een error gegeven als de gebruiker al bestaat!
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] === "Gebruikerbestaatal") {
                            Print("<div class='alert alert-danger' role='alert'>De ingevoerde emailadres bestaat al!</div>>");
                        }
                    }
                    ?>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="nieuwsbrief">
                        <label class="form-check-label" for="nieuwsbrief">
                            Meld je hier aan voor de nieuwsbrief!
                        </label>
                    </div>
                    <input type="submit" name="registreer" class="btn btn-success" value="Account aanmaken">
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<?php
if (isset($_GET['error'])) {

    if ($_GET['error'] === "SQL-initilaze") {

        print("<div class='alert alert-danger' role='alert'>Er is een fout opgetreden op onze website!</p>");

    }
}

include '../incl/footer.php';
?>


