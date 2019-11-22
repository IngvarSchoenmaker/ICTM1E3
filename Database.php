<?php
//Functie de connect met de database en maximaal 1 row teruggeeft
//*****GEERT-JAN VERKUIL*******\\

function SqlQuery($sql) {
    //Verbinding maken met de database
    $servername = "localhost";
    $DBusername = "root";
    $DBpassword = "";
    $DBname = "test";
    $port = "3306";

    //Query uitvoeren
    $conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname, $port);
    $statement = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    if(!empty($result)) {
        $row = mysqli_fetch_array($result);
        $conn->close();
        return $row['0'];
    }
<<<<<<< Updated upstream
}
//Aanroepen functie en resultaat in een variable zetten.
$email = SqlQuery("SELECT Email FROM Customer WHERE Customer_ID = 1");
$plaats = SqlQuery("SELECT City FROM Address WHERE Address_ID = 1");
$postcode = SqlQuery("SELECT Zip_Code FROM Address WHERE Address_ID = 1");
$straat = SqlQuery("SELECT Street_Name FROM Address WHERE Address_ID = 1");
$huisnummer = SqlQuery("SELECT House_Number FROM Address WHERE Address_ID = 1");
$toevoegsel = SqlQuery("SELECT Addition FROM Address WHERE Address_ID = 1");
//$provincie = SqlQuery("SELECT stateprovincename FROM stateprovinces WHERE StateProvinceID = 2");
$telefoonnr = SqlQuery("SELECT Phone FROM customer WHERE Customer_ID = 1");
$voornaam = SqlQuery("SELECT First_Name FROM customer WHERE Customer_ID = 1" );
$achternaam = SqlQuery("SELECT Last_Name FROM customer WHERE Customer_ID = 1");
$tussenvoegsels = SqlQuery("SELECT Middle_Name FROM customer WHERE Customer_ID = 1");
$gbdatum = SqlQuery("SELECT Birthdate FROM customer WHERE Customer_ID = 1");

//Controleren of er wat in de variable tussenvoegsels staat
if (strlen($tussenvoegsels) > 1) {
    $fullname = $voornaam . " " . $tussenvoegsels . " " . $achternaam;
} else {
    $fullname = $voornaam . " " . $achternaam;
}

$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "test";
$port = "3306";

$sql = "SELECT Order_ID, Date FROM Orders WHERE customer_ID = 1";

$conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname, $port);
$statement = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);

$orders = array();
$datums = array();

$naamOrder = SqlQuery("SELECT First_Name FROM customer WHERE Customer_ID = 1");

while(($row = mysqli_fetch_assoc($result))) {
    $orders[] = $row['Order_ID'];
    $datums[] = $row['Date'];
}
$aantalOrders = count($orders);

if (isset($_POST['opslaanAccountinfo'])) {
    $voornaamDB = $_POST['voornaam'];
    $tussenvoegselsDB = $_POST['tussenvoegsel'];
    $achternaamDB = $_POST['achternaam'];
    $emailDB = $_POST['email'];
    $wachtwoordDB = $_POST['nieuwwachtwoord'];

    $sql = "UPDATE Customer SET First_Name =?, Last_Name =?, Middle_Name =?, Email =?, Password =? WHERE Customer_ID = 1";
    $statement = mysqli_prepare($conn, "UPDATE Customer SET First_Name =?, Last_Name =?, Middle_Name =?, Email =? WHERE Customer_ID = 1");

    mysqli_stmt_bind_param($statement, 'ssss', $voornaamDB, $achternaamDB, $tussenvoegselsDB, $emailDB);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    header("Location: AccountInfo.php");
}

if (isset($_POST['opslaanAfleveradres'])) {
    $plaatsDB = $_POST['plaats'];
    $postcodeDB = $_POST['postcode'];
    $straatDB = $_POST['straat'];
    $huisnummerDB = $_POST['huisnnr'];
    $toevoegselDB = $_POST['toevoegsel'];
//    if(strtoupper($_POST['land']) != "NEDERLAND") {
//        print("Het is alleen mogelijk om te verzenden naar Nederland.");
//    }
    $telefoonnrDB = $_POST['telefoonnr'];

    $sql = "UPDATE Customer as C JOIN Address as A ON C.Customer_ID = A.Address_ID  SET C.Phone =?, A.city =?, A.Zip_Code =?, A.street_name =?, A.House_number =?, A.addition =? WHERE Customer_ID = 1";
    $statement = mysqli_prepare($conn, "UPDATE Customer as C JOIN Address as A ON C.Customer_ID = A.Address_ID  SET C.Phone =?, A.city =?, A.Zip_Code =?, A.street_name =?, A.House_number =?, A.addition =? WHERE Customer_ID = 1");

    mysqli_stmt_bind_param($statement, 'isssis', $telefoonnrDB, $plaatsDB, $postcodeDB, $straatDB, $huisnummerDB, $toevoegselDB);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    header("Location: Afleveradres.php");
}

if (isset($_POST['opslaanFactuuradres'])) {
    $plaatsDB = $_POST['plaats'];
    $postcodeDB = $_POST['postcode'];
    $straatDB = $_POST['straat'];
    $huisnummerDB = $_POST['huisnnr'];
    $toevoegselDB = $_POST['toevoegsel'];
//    if(strtoupper($_POST['land']) != "NEDERLAND") {
//        print("Het is alleen mogelijk om te verzenden naar Nederland.");
//    }

    $sql = "UPDATE Customer as C JOIN Address as A ON C.Customer_ID = A.Address_ID  SET A.city =?, A.Zip_Code =?, A.street_name =?, A.House_number =?, A.addition =? WHERE Customer_ID = 1";
    $statement = mysqli_prepare($conn, "UPDATE Customer as C JOIN Address as A ON C.Customer_ID = A.Address_ID  SET A.city =?, A.Zip_Code =?, A.street_name =?, A.House_number =?, A.addition =? WHERE Customer_ID = 1");

    mysqli_stmt_bind_param($statement, 'sssis', $plaatsDB, $postcodeDB, $straatDB, $huisnummerDB, $toevoegselDB);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    header("Location: Factuuradres.php");
}
=======

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
        //    if(strtoupper($_POST['land']) != "NEDERLAND") {
        //        print("Het is alleen mogelijk om te verzenden naar Nederland.");
        //    }
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
        //    if(strtoupper($_POST['land']) != "NEDERLAND") {
        //        print("Het is alleen mogelijk om te verzenden naar Nederland.");
        //    }


        $statement = mysqli_prepare($conn = get_connection(), "UPDATE Customer as C JOIN Address as A ON C.Customer_ID = A.Address_ID  SET A.city =?, A.Zip_Code =?, A.street_name =?, A.House_number =?, A.addition =? WHERE Customer_ID = {$_CustomerID}");

        mysqli_stmt_bind_param($statement, 'sssis', $plaatsDB, $postcodeDB, $straatDB, $huisnummerDB, $toevoegselDB);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        header("Location: Factuuradres.php?message=Je gegevens zijn succesvol verwerkt!");
    }

>>>>>>> Stashed changes
