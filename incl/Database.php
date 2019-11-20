<?php

//Functie de connect met de database en maximaal 1 row teruggeeft
//

//*****GEERT-JAN VERKUIL*******\\
function SqlQuery($sql) {
    $servername = "localhost";
    $DBusername = "root";
    $DBpassword = "";
    $DBname = "test";
    $port = "3306";


    $conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname, $port);
    $statement = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    if(!empty($result)) {
        $row = mysqli_fetch_array($result);
        $conn->close();
        return $row['0'];
    }


}



//Aanroepen functie en resultaat in een variable zetten.
$email = SqlQuery("SELECT Email FROM Customer WHERE Customer_ID = 1");
$postcode = SqlQuery("SELECT Zip_Code FROM Address WHERE Address_ID = 1");
$straat = SqlQuery("SELECT Street_Name FROM Address WHERE Address_ID = 1");
$huisnummer = SqlQuery("SELECT House_Number FROM Address WHERE Address_ID = 1");
$toevoegsel = SqlQuery("SELECT Addition FROM Address WHERE Address_ID = 1");
//$provincie = SqlQuery("SELECT stateprovincename FROM stateprovinces WHERE StateProvinceID = 2");
$telefoonnr = SqlQuery("SELECT Phone FROM customer WHERE Customer_ID = 1");
$voornaam = SqlQuery("SELECT First_Name FROM customer WHERE Customer_ID = 1" );
$achternaam = SqlQuery("SELECT Last_Name FROM customer WHERE Customer_ID = 1");
$tussenvoegsels = SqlQuery("SELECT Middle_Name FROM customer WHERE Customer_ID = 1");

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

$naamOrder = SqlQuery("SELECT First_Name FROM customers WHERE Customer_ID = 1");

while(($row = mysqli_fetch_assoc($result))) {
    $orders[] = $row['Order_ID'];
    $datums[] = $row['Date'];
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

?>