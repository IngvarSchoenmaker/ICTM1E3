<?php

$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "test";
$port = "3306";

$sql = "SELECT O.Order_ID, O.Date, C.First_Name
FROM Orders as O
LEFT JOIN Customer as C
ON C.Customer_ID = O.Customer_ID
WHERE C.Customer_ID = 1";

//Query uitvoeren
$conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname, $port);
$statement = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);

$resultList = [];

while($row = mysqli_fetch_assoc($result)) {
    $resultList[] = $row;
}

var_dump($resultList);

$conn->close();

?>
