<?php
session_start();
//Functie de connect met de database en maximaal 1 row teruggeeft
//

//*****GEERT-JAN VERKUIL*******\\
function SqlQuery($sql) {
    $servername = "localhost";
    $DBusername = "root";
    $DBpassword = "";
    $DBname = "wideworldimporters";
    $port = "3306";


    $conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname, $port);
    $statement = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_array($result);
    $conn->close();
    return $row['0'];


}



//Aanroepen functie en resultaat in een variable zetten.
$fullname = SqlQuery("SELECT FullName FROM People WHERE PersonID = 3049");
$email = SqlQuery("SELECT EmailAddress FROM People WHERE PersonID = 3049");
$postcode = SqlQuery("SELECT DeliveryPostalcode FROM customers WHERE customerID = 66");
$adres = SqlQuery("SELECT DeliveryAddressLine2 FROM customers WHERE CustomerID = 66;");
$provincie = SqlQuery("SELECT stateprovincename FROM stateprovinces WHERE StateProvinceID = 2");
//$telefoonnmr = implode(SqlQuery("SELECT Phone FROM Customer WHERE CustomerID = 1060"));


$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "wideworldimporters";
$port = "3306";

$sql = "SELECT OrderID, InvoiceDate FROM invoices WHERE customerID = 1060";


$conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname, $port);
$statement = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);

$orders = array();
$datums = array();

$naamOrder = SqlQuery("SELECT CustomerName FROM customers WHERE customerID = 1060");

while(($row = mysqli_fetch_assoc($result))) {
    $orders[] = $row['OrderID'];
    $datums[] = $row['InvoiceDate'];
}

$aantalOrders = count($orders);


//$connection = mysql_connect("localhost", "root", "");
//$db = mysql_select_db("company", $connection);
//if (isset($_GET['submit'])) {
//    $id = $_GET['did'];
//    $name = $_GET['dname'];
//    $email = $_GET['demail'];
//    $mobile = $_GET['dmobile'];
//    $address = $_GET['daddress'];
//    $query = mysql_query("update employee set
//employee_name='$name', employee_email='$email', employee_contact='$mobile',
//employee_address='$address' where employee_id='$id'", $connection);
//}



//De naam die in de database als volledige naam staat,
//uit elkaar trekken in voornaam, achternaam en eventueel tussenvoegsels.
$parts = explode(' ', $fullname);
$naam = array(
        'firstname' => array_shift($parts),
        'lastname' => array_pop($parts),
        'middlename' => join(' ', $parts));

//De uitkomsten van de array in variablen zetten
//zodat er later mee gewerkt kan worden.
$voornaam = $naam['firstname'];
$achternaam = $naam['lastname'];
$tussenvoegsels = $naam['middlename'];

?>