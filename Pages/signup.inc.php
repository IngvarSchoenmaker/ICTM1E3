<?php
require '../incl/db.php';

// ingevoerde gegevens van de input velden.
if (isset($_POST['registreer'])) {

// hier wordt de error gegeven als de connectie met de datbase niet actief is.
    if ($conn->connect_error) {
        die("Connection Failed:" . mysqli_error($conn));
    }


    $voornaam = $_POST['Voornaam'];
    $Tussenvoegsels = $_POST['Tussenvoegsel'];
    $Achternaam = $_POST['Achternaam'];
    $Emailadres = $_POST['Emailadres'];
    $Telnnr = $_POST['Telefoonnummer'];
    $Geboortedatum = $_POST['Geboortedatum'];
    $Postcode = $_POST['Postcode'];
    $Straatnaam = $_POST['Straatnaam'];
    $Huisnummer = $_POST['Huisnummer'];
    $Plaats = $_POST['Plaats'];
    $Wachtwoord = $_POST['Wachtwoord'];
    $Wachtwoordherhaal = $_POST['Wachtwoord-herhaal'];
    $encrpted = password_hash($Wachtwoord, PASSWORD_DEFAULT);


// hier wordt gecontroleerd of er geen symbolen worden gebruikt tijdens het invullen van de formulier . Als er symbolen worden gebruikt verwijst ie terug naar de singup met een error

    if (preg_match('/^[= or " " as # *]*$/', $voornaam) || preg_match('/^[= or " " as # *]*$/', $Tussenvoegsels) || preg_match('/^[= or " " as # *]*$/', $Achternaam)) {

        header("Location:signup.php?char=error&Voornaam=" . $voornaam . "&Tussenvoegsel=" . $Tussenvoegsels . "&Achternaam=" . $Achternaam);

// hier wordt gecontroleerd of de email wel geldig is.
    } elseif (!filter_var($Emailadres, FILTER_VALIDATE_EMAIL)) {
        header("Location:signup.php?error=mail&mail=" . $Emailadres);

// hier wordt gecontroleerd of de mobiele nummer 10 cijfers heeft met een streepje = 11

    } elseif (!preg_match("/^(06)[0-9]*$/", $Telnnr) || (strlen($Telnnr) !== 10)) {
        header("Location: signup.php?error=Tel&Tel=" . $Telnnr);

// Hier moet pascal mee moet helpen.

    } elseif ($Geboortedatum < "01-01-1950" || $Geboortedatum > "31-12-2002" || empty($Geboortedatum)) {
        header("signup.php?error=gbdatum&gbdatum=" . $Geboortedatum);

// Hier wordt gecontroleerd of de postcode wel klopt.

    } elseif (!preg_match('/^[0-9]{4}[A-Z]{2}/', $Postcode)) {
        header("Location: signup.php?error=Postcode&Postcode43=" . $Postcode);

//        Hier wordt gecontroleerd op straatnaam Met SQL injectie preventie

    } elseif (preg_match('/^[= or " " as # *]*$/', $Straatnaam) || (!preg_match('/^[a-zA-Z ]*$/', $Straatnaam))) {

        header("location: Signup.php?error=Straatnaam&Straatnaam=" . $Straatnaam);


        // hier wordt gecontroleerd op Huisnummer
    } elseif (!preg_match('/^[0-9]*$/', $Huisnummer) || $Huisnummer > 18926) {
        header("Location: signup.php?error=Huisnummer&Huisnummer=" . $Huisnummer);


    }         // Hier wordt gecontroleerd of het wachtwoord met elkaar overeenkomen
    elseif ($Wachtwoord != $Wachtwoordherhaal || strlen($Wachtwoord) < 8) {
        header("Location: signup.php?error=Wachtwoord");

    } else {

        //Hier wordt gecontroleerd of de gegevens al bestaan of niet.
        $stmtselect = $conn->prepare("SELECT Email FROM customer WHERE Email = ?");
        $stmtselect->bind_param("s", $Emailadres);
        $stmtselect->execute();
        $result = $stmtselect->get_result();

        if ($result->num_rows === 1) {
            $stmtselect->close();
            header("Location: signup.php?error=Gebruikerbestaatal");
            exit();
        } else {
            echo "ik doe de else uwu";
        }


// gegevens worden opgeslagen in de database
            try {
                $conn->autocommit(FALSE);
                $stmt1 = $conn->prepare("INSERT INTO customer(First_Name, Middle_Name, Last_Name, Email, Birthdate, Password, Phone) VALUES (?,?,?,?,?,?,?)");
                $stmt2 = $conn->prepare("INSERT INTO customer_archive(First_Name, Middle_Name, Last_Name, Email, Birthdate, Password, Phone) VALUES (?,?,?,?,?,?,?)");
                $stmt3 = $conn->prepare("INSERT INTO address(City, Zip_Code, Street_Name, House_Number) VALUES (?,?,?,?)");
                $stmt4 = $conn->prepare("INSERT INTO address_archive(City, Zip_Code, Street_Name, House_Number) VALUES (?,?,?,?)");
                $stmt1->bind_param("sssssss", $voornaam, $Tussenvoegsels, $Achternaam, $Emailadres, $Geboortedatum, $encrpted, $Telnnr);
                $stmt2->bind_param("sssssss", $voornaam, $Tussenvoegsels, $Achternaam, $Emailadres, $Geboortedatum, $encrpted, $Telnnr);
                $stmt3->bind_param("sssi", $Plaats, $Postcode, $Straatnaam, $Huisnummer);
                $stmt4->bind_param("sssi", $Plaats, $Postcode, $Straatnaam, $Huisnummer);
                $stmt1->execute();
                $stmt1->close();
                $stmt2->execute();
                $stmt2->close();
                $stmt3->execute();
                $stmt3->close();
                $stmt4->execute();
                $stmt4->close();
                $conn->autocommit(TRUE);
            } catch (Exception $e) {

                if ($conn->errno === 1062) {

                    print("De ingevoerde gegevens bestaan al!");
                }

            }

        

        }


    }

header("Location: registratiegelukt.php?registratie=succes");
exit;
//if ($Wachtwoord != $Wachtwoordherhaal) {
//    header("location: signup.php?error=wachtwoord"."&voornaam=".$voornaam."&Tussenvoegsel=".$Tussenvoegsels."&Achternaam=".$Achternaam);


// ,$Plaats, $Postcode, $Straatnaam, $Huisnummer, $Toevoeging