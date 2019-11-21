<?php
        require '../../incl/db.php';

// ingevoerde gegevens van de input velden.
if (isset($_POST['registreer'])) {


    $voornaam = $_POST['Voornaam'];
    $Tussenvoegsels = $_POST['Tussenvoegsel'];
    $Achternaam = $_POST['Achternaam'];
    $Emailadres = $_POST['Emailadres'];
    $Telnnr = $_POST['Telefoonnummer'];
    //$Type = $_POST['typeklant'];
    $Geboortedatum = $_POST['Geboortedatum'];
    $Postcode = $_POST['Postcode'];
    $Straatnaam = $_POST['Straatnaam'];
    $Huisnummer = $_POST['Huisnummer'];
    $Toevoeging = $_POST['Toevoeging'];
    $Plaats = $_POST['Plaats'];
    //$Land = $_POST['Land'];
    $Wachtwoord = $_POST['Wachtwoord'];
    $Wachtwoordherhaal = $_POST['Wachtwood-herhaal'];


// hier wordt gecontroleerd of er geen symbolen worden gebruikt tijdens het invullen van de formulier . Als er symbolen worden gebruikt verwijst ie terug naar de singup met een error

    if (!preg_match("/^[a-zA-Z]*$/", $voornaam) || !preg_match("/^[a-zA-Z]*$/", $Tussenvoegsels) || !preg_match("/^[a-zA-Z]*$/", $Achternaam)) {

        header("Location:signup.php?char=error&Voornaam=" . $voornaam . "&Tussenvoegsel=" . $Tussenvoegsels . "&Achternaam=" . $Achternaam);

    } elseif (!filter_var($Emailadres, FILTER_VALIDATE_EMAIL)) {
        print("je emailadres is niet geldig!");

    }
    $adres_ID = 2;
    $sql = "INSERT INTO customer(First_Name, Middle_Name, Last_Name, Email, Birthdate, Password, Phone, Address_1) VALUES (?,?,?,?,?,?,?,?)";
    $statement = mysqli_prepare($conn, $sql);
    if ($conn == false) {
        die("<pre>" . mysqli_error($conn) . PHP_EOL . $sql . "</pre>");
    }


    mysqli_stmt_bind_param($statement, 'ssssssii', $voornaam, $Tussenvoegsels, $Achternaam, $Emailadres, $Geboortedatum, $Wachtwoord, $Telnnr, $adres_ID); // i = integer; s = string;
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    header("Location: login.php ");
}







//if ($Wachtwoord != $Wachtwoordherhaal) {
//    header("location: signup.php?error=wachtwoord"."&voornaam=".$voornaam."&Tussenvoegsel=".$Tussenvoegsels."&Achternaam=".$Achternaam);
