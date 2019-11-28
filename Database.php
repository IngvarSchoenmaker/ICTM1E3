<?php

    $_SESSION['CustomerID'] = 1;
    $_CustomerID = $_SESSION['CustomerID'];

    function get_connection(){
        $_database["server"] = "localhost";
        $_database["username"] = "root";
        $_database["password"] = "";
        $_database["name"] = "test";
        $_database["poort"] = "3306";

        return mysqli_connect($_database["server"], $_database["username"], $_database["password"], $_database["name"], $_database["poort"]);
    }

    //Functie de connect met de database en de rows teruggeeft
    //*****GEERT-JAN VERKUIL*******\\
    function GetData($sql, $onlyOneRecord = false)
    {
        //Verbinding maken met de database

        //Query uitvoeren
        $conn = get_connection();
        $statement = mysqli_prepare($conn, $sql);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        $resultList = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $resultList[] = $row;
        }
        $conn->close();

        if ($onlyOneRecord) {
            return $resultList[0];
        }
        return $resultList;
    }

    function UpdateData($sql) {

    }

    // ################################################
    // Ophalen klant en adresgegevens
    // ################################################
    $hugeQuery = "
        SELECT A.City, A.Zip_Code, A.Street_Name, A.House_Number, A.Addition, C.Phone, C.First_Name, C.Last_Name, C.Middle_Name, C.Birthdate, C.Email
        FROM Customer as C 
        LEFT JOIN Address as A 
        ON C.customer_ID = A.Address_ID
        WHERE C.Customer_ID = {$_CustomerID}
    ";

    $CustomerData = GetData($hugeQuery, true);

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

    $sql = "SELECT O.Order_ID, O.Date, C.First_Name 
            FROM Orders as O 
            LEFT JOIN Customer as C 
            ON C.Customer_ID = O.Customer_ID
            WHERE C.Customer_ID = {$_CustomerID}";

    $OrderData = GetData($sql, false);

    // ################################################
    // Opslaan gewijzigde account/afleveradres/factuuradres gegevens.
    // ################################################

    if (isset($_POST['opslaanAccountinfo'])) {
        $voornaamDB = $_POST['voornaam'];
        $tussenvoegselsDB = $_POST['tussenvoegsel'];
        $achternaamDB = $_POST['achternaam'];
        $emailDB = $_POST['email'];
        $wachtwoordDB = $_POST['nieuwwachtwoord'];

        $statement = mysqli_prepare($conn = get_connection(), "UPDATE Customer SET First_Name =?, Last_Name =?, Middle_Name =?, Email =? WHERE Customer_ID = {$_CustomerID}");

        mysqli_stmt_bind_param($statement, 'ssss', $voornaamDB, $achternaamDB, $tussenvoegselsDB, $emailDB);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        header("Location: AccountInfo.php?message=Je gegevens zijn succesvol verwerkt!");
    }

    if (isset($_POST['opslaanAfleveradres'])) {
        $plaatsDB = $_POST['plaats'];
        $postcodeDB = $_POST['postcode'];
        $straatDB = $_POST['straat'];
        $huisnummerDB = $_POST['huisnnr'];
        $toevoegselDB = $_POST['toevoegsel'];
        $telefoonnrDB = $_POST['telefoonnr'];

        $statement = mysqli_prepare($conn = get_connection(), "UPDATE Customer as C JOIN Address as A ON C.Customer_ID = A.Address_ID  SET C.Phone =?, A.city =?, A.Zip_Code =?, A.street_name =?, A.House_number =?, A.addition =? WHERE Customer_ID = {$_CustomerID}");

        mysqli_stmt_bind_param($statement, 'isssis', $telefoonnrDB, $plaatsDB, $postcodeDB, $straatDB, $huisnummerDB, $toevoegselDB);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        header("Location: Afleveradres.php?message=Je gegevens zijn succesvol verwerkt!");
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

        header("Location: Factuuradres.php?message=Je gegevens zijn succesvol verwerkt!");
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
                header("Location: AccountInfo.php?messagepass=Je wachtwoorden komen niet overeen!");
                break;
            case "PASSWORD_NOT_CORRECT":
                header("Location: AccountInfo.php?messagepass=Je wachtwoord is onjuist!");
                break;
            case "PASSWORD_CHANGED":
                header("Location: AccountInfo.php?messagepass=Je wachtwoord is succesvol gewijzigd!");
                break;
        }

    }


    function ChangePassword($customerID) {

        $wachtwoord = $_POST['nieuwwachtwoord'];
        $wachtwoordCheck = $_POST['herhaalwachtwoord'];

        //Check if the two input passwords are the same.
        if($wachtwoord != $wachtwoordCheck)
        {
            return "PASSWORDS_NOT_THE_SAME";
        }

        // yes, we have to change password
        // Now first, get current password from database

        // build query
        $getPasswordQuery = "SELECT Password
             FROM Customer 
             WHERE Customer_ID = {$customerID}";

        $PassData = GetData($getPasswordQuery, true);
        $oudeWachtwoord = $PassData['Password'];

        // ok, now check if current password from database
        // is the same as user input password.
        
        if(!password_verify($_POST['wachtwoord'], $oudeWachtwoord)) {
            return "PASSWORD_NOT_CORRECT";
        }
        //
        $nieuweDatabaseWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $statement = mysqli_prepare($conn = get_connection(), "UPDATE Customer SET password =? WHERE Customer_ID = {$customerID}");

        mysqli_stmt_bind_param($statement, 's', $nieuweDatabaseWachtwoord);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        return "PASSWORD_CHANGED";
    }



    // ################################################
    // Review gegevens opslaan.
    // ################################################
    if (isset($_POST['plaatsreview'])) {
        $productDB = 8;
        $emailDB = $_POST['mail'];
        $scoreDB = $_POST['star'];
        $beoordelingDB = $_POST['beoordeling'];

        $statement = mysqli_prepare($conn = get_connection(), "INSERT INTO product_review VALUES(?,?,?,?)");

        mysqli_stmt_bind_param($statement, 'isis', $productDB, $emailDB, $scoreDB, $beoordelingDB);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        header("Location: Reviews.php?message=Je review is succesvol geplaatst!");
    }
    ?>

