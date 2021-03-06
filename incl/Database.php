<?php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    include '../incl/ConnectieFunctie.php';

    $_CustomerID = $_SESSION['ID'];
    //print($_CustomerID);

    // ################################################
    // Ophalen klant en adresgegevens
    // ################################################

    //Query die gegevens van de customer uit de database haalt
    $hugeQuery = "
        SELECT A.City, A.Zip_Code, A.Street_Name, A.House_Number, A.Addition, C.Phone, C.First_Name, C.Last_Name, C.Middle_Name, C.Birthdate, C.Email
        FROM Customer as C 
        LEFT JOIN Address as A 
        ON C.customer_ID = A.Address_ID
        WHERE C.Customer_ID = {$_CustomerID}
    ";

    $CustomerData = GetData($hugeQuery, true);

    //Zet alle gegevens uit de database in variablen
    //zodat ik die makkelijk in een form kan zetten.
    $email = $CustomerData["Email"];
    $straat = $CustomerData["Street_Name"];
    $plaats = $CustomerData["City"];
    $postcode = $CustomerData["Zip_Code"];
    $huisnummer = $CustomerData["House_Number"];
    $toevoegsel = $CustomerData["Addition"];
    $telefoonnr = $CustomerData["Phone"];
    $voornaam = $CustomerData["First_Name"];
    $achternaam = $CustomerData["Last_Name"];
    $tussenvoegsels = $CustomerData["Middle_Name"];
    $gbdatum = $CustomerData["Birthdate"];

    //Controleren of er wat in de variable tussenvoegsels staat
    if (strlen($tussenvoegsels) > 1) {
        $fullname = $voornaam . " " . $tussenvoegsels . " " . $achternaam;
    } else {
        $fullname = $voornaam . " " . $achternaam;
    }

    // ################################################
    // Ophalen ordergegevens
    // ################################################

    //Query die ordergegevens uit de database haalt.
    $sql = "SELECT O.Order_ID, O.Date, C.First_Name 
            FROM Orders as O 
            LEFT JOIN Customer as C 
            ON C.Customer_ID = O.Customer_ID
            WHERE C.Customer_ID = {$_CustomerID}";

    $OrderData = GetData($sql, false);

    // ################################################
    // Opslaan gewijzigde account/afleveradres/factuuradres gegevens.
    // ################################################

    //Als er op de knop Opslaan is gedrukt worden de gegevens die ingevuld zijn
    //opgeslagen in variablen.

    if (isset($_POST['opslaanAccountinfo'])) {
        $voornaamDB = $_POST['voornaam'];
        $tussenvoegselsDB = $_POST['tussenvoegsel'];
        $achternaamDB = $_POST['achternaam'];
        $emailDB = $_POST['email'];
        $gbdatumDB = $_POST['gbdatum'];

        //prepared statement
        $statement = mysqli_prepare($conn = get_connection(), "UPDATE Customer SET First_Name =?, Last_Name =?, Middle_Name =?, Email =?, Birthdate =? WHERE Customer_ID = {$_CustomerID}");
        //Bind de variablen in de statement en wordt uitgevoerd.
        mysqli_stmt_bind_param($statement, 'sssss', $voornaamDB, $achternaamDB, $tussenvoegselsDB, $emailDB, $gbdatumDB);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        //Teruggestuurd naar de accountinformatie met een succes melding die wordt meegegeven
        header("Location: ../Pages/AccountInfo.php?message=Je gegevens zijn succesvol verwerkt!");
    }

    //Als er op de knop Opslaan is gedrukt worden de gegevens die ingevuld zijn
    //Opgeslagen in variablen.

    if (isset($_POST['opslaanAfleveradres'])) {
        $plaatsDB = $_POST['plaats'];
        $postcodeDB = $_POST['postcode'];
        $straatDB = $_POST['straat'];
        $huisnummerDB = $_POST['huisnnr'];
        $toevoegselDB = $_POST['toevoegsel'];
        $telefoonnrDB = $_POST['telefoonnr'];

        //prepared statement
        $statement = mysqli_prepare($conn = get_connection(), "UPDATE Customer as C JOIN Address as A ON C.Customer_ID = A.Address_ID  SET C.Phone =?, A.city =?, A.Zip_Code =?, A.street_name =?, A.House_number =?, A.addition =? WHERE Customer_ID = {$_CustomerID}");
        //bind de veriablen in de statement en wordt uitgevoerd.
        mysqli_stmt_bind_param($statement, 'isssis', $telefoonnrDB, $plaatsDB, $postcodeDB, $straatDB, $huisnummerDB, $toevoegselDB);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        //teruggestuurd naar de afleveradres pagina en succes melding.
        header("Location: ../Pages/Afleveradres.php?message=Je gegevens zijn succesvol verwerkt!");
    }


    if (isset($_POST['opslaanFactuuradres'])) {
        $plaatsDB = $_POST['plaats'];
        $postcodeDB = $_POST['postcode'];
        $straatDB = $_POST['straat'];
        $huisnummerDB = $_POST['huisnnr'];
        $toevoegselDB = $_POST['toevoegsel'];

        $statement = mysqli_prepare($conn = get_connection(), "UPDATE Customer as C JOIN Address as A ON C.Customer_ID = A.Address_ID  SET A.city =?, A.Zip_Code =?, A.street_name =?, A.House_number =?, A.addition =? WHERE Customer_ID = {$_CustomerID}");

        mysqli_stmt_bind_param($statement, 'sssis', $plaatsDB, $postcodeDB, $straatDB, $huisnummerDB, $toevoegselDB);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        header("Location: ../Pages/Factuuradres.php?message=Je gegevens zijn succesvol verwerkt!");
    }

    // ################################################
    // Wachtwoord veranderen
    // ################################################

    // Check if we have to save password
    if (isset($_POST['opslaanWachtwoord'])) {

        // yes, we have to change password
        $passwordChangeResult = ChangePassword($_CustomerID);

        switch ($passwordChangeResult) {
            case "PASSWORDS_NOT_THE_SAME":
                header("Location: ../Pages/AccountInfo.php?messagepass=Je wachtwoorden komen niet overeen!");
                break;
            case "PASSWORD_NOT_CORRECT":
                header("Location: ../Pages/AccountInfo.php?messagepass=Je wachtwoord is onjuist!");
                break;
            case "PASSWORD_CHANGED":
                header("Location: ../Pages/AccountInfo.php?messagepass=Je wachtwoord is succesvol gewijzigd!");
                break;
        }

    }




//    if (!function_exists('ChangePassword')) {
        function ChangePassword($customerID)
        {

            $wachtwoord = $_POST['nieuwwachtwoord'];
            $wachtwoordCheck = $_POST['herhaalwachtwoord'];

            //Controleert of de input van de wachtwoorden hetzelfde zijn.
            if ($wachtwoord != $wachtwoordCheck) {
                return "PASSWORDS_NOT_THE_SAME";
            }

            //Nu halen we het huidige wachtwoord uit de database
            //Query uitvoeren
            $getPasswordQuery = "SELECT Password
             FROM Customer 
             WHERE Customer_ID = {$customerID}";

            $PassData = GetData($getPasswordQuery, true);
            $oudeWachtwoord = $PassData['Password'];

            //Nu controleren we of het huidige wachtwoord
            //hetzelfde is als de input van de gebruiker.
            if (!password_verify($_POST['wachtwoord'], $oudeWachtwoord)) {
                return "PASSWORD_NOT_CORRECT";
            }
            //Als die hetzelfde is kunnen we het nieuwe wachtwoord hashen.
            //De hash wordt opgeslagen in de database.
            $nieuweDatabaseWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
            $statement = mysqli_prepare($conn = get_connection(), "UPDATE Customer SET password =? WHERE Customer_ID = {$customerID}");

            mysqli_stmt_bind_param($statement, 's', $nieuweDatabaseWachtwoord);
            mysqli_stmt_execute($statement);
            //Wachtwoord is verandert!
            return "PASSWORD_CHANGED";
        }
//    }

    // ################################################
    // Review gegevens opslaan.
    // ################################################

    //Als er op de knop plaatsreview is gedrukt
    //Worden de input velden opgeslagen in variablen.
    if (isset($_POST['plaatsreview'])) {
        $productDB = $_SESSION['ProductID'];

        $statement = mysqli_prepare($conn = get_connection(), "INSERT INTO product_information VALUES($productDB, NULL)");
        mysqli_stmt_execute($statement);

        $emailDB = $_POST['mail'];
        $scoreDB = $_POST['star'];
        $beoordelingDB = $_POST['beoordeling'];
        //Prepared statement
        $statement = mysqli_prepare($conn = get_connection(), "INSERT INTO reviews VALUES(?,?,?,?)");

        mysqli_stmt_bind_param($statement, 'isis', $productDB, $emailDB, $scoreDB, $beoordelingDB);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        header("Location: ../Pages/Reviews.php?message=Je review is succesvol geplaatst!");
    }
    ?>

