<?php
        require '../incl/db.php';
// ingevoerde gegevens van de input velden.
if (isset($_POST['registreer'])) {

        $voornaam = $_POST['Voornaam'];
        $Tussenvoegsels = $_POST['Tussenvoegsel'];
        $Achternaam = $_POST['Achternaam'];
        $Emailadres = $_POST['Emailadres'];
        $Type = $_POST['typeklant'];
        $Postcode  = $_POST['Postcode'];
        $Straatnaam  = $_POST['Straatnaam'];
        $Huisnummer  = $_POST['Huisnummer'];
        $Toevoeging  = $_POST['Toevoeging'];
        $Plaats   = $_POST['Plaats'];
        $Land  = $_POST['Land'];
        $Wachtwoord  = $_POST['Wachtwoord'];
        $Wachtwoordherhaal = $_POST['Wachtwood-herhaal'];




// hier wordt het wachtwoord gecontroleerd of ze gelijk zijn. Zo niet dan wordt je terug verwezen naar de signup pagina met een error melding
    if ($_POST['Wachtwoord'] !== $_POST['Wachtwoord-herhaal']) {
        header("location: signup.php?error=wachtwoord");


    } elseif (!filter_var($_POST['emailadres'], FILTER_VALIDATE_EMAIL)) {
        print("je emailadres is niet geldig!");

    } elseif (!preg_match("/^[a-z 0-9 @ ]*$/", $_POST['gebruikersnaam'])) {

        print("je mag geen symbolen gebruiken bij je gebruikersnaam");


    }
}







