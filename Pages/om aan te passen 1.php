<?php
        require '../incl/db.php';

// ingevoerde gegevens van de input velden.
if (isset($_POST['registreer'])) {


    $voornaam = $_POST['Voornaam'];
    $Tussenvoegsels = $_POST['Tussenvoegsel'];
    $Achternaam = $_POST['Achternaam'];
    $Emailadres = $_POST['Emailadres'];
    $Type = $_POST['typeklant'];
    $Postcode = $_POST['Postcode'];
    $Straatnaam = $_POST['Straatnaam'];
    $Huisnummer = $_POST['Huisnummer'];
    $Toevoeging = $_POST['Toevoeging'];
    $Plaats = $_POST['Plaats'];
    $Land = $_POST['Land'];
    $Wachtwoord = $_POST['Wachtwoord'];
    $Wachtwoordherhaal = $_POST['Wachtwood-herhaal'];


// hier wordt gecontroleerd of er geen symbolen worden gebruikt tijdens het invullen van de formulier . Als er symbolen worden gebruikt verwijst ie terug naar de singup met een error

    if (!preg_match("/^[a-zA-Z]*$/", $voornaam) || !preg_match("/^[a-zA-Z]*$/", $Tussenvoegsels) || !preg_match("/^[a-zA-Z]*$/", $Achternaam)) {

        header("Location:signup.php?char=error&Voornaam=" . $voornaam . "&Tussenvoegsel=" . $Tussenvoegsels . "&Achternaam=" . $Achternaam);

    } elseif (!filter_var($Emailadres, FILTER_VALIDATE_EMAIL)) {
        print("je emailadres is niet geldig!");

    }
//mysqli_escape_string()


}

//if ($Wachtwoord != $Wachtwoordherhaal) {
//    header("location: signup.php?error=wachtwoord"."&voornaam=".$voornaam."&Tussenvoegsel=".$Tussenvoegsels."&Achternaam=".$Achternaam);




