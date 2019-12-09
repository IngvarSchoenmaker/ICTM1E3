<?php
//include '../Pages/ShoppingCartQueries.php';
include '../incl/ConnectieFunctie.php';
include '../incl/header.php';
//session_start();
print("\n");
print("\n");
print("\n");
print("\n");
print("<BR>");
print("<BR>");
print("Hallo");


$_SESSION['cart'] = array(220 => 3, 221 => 4);
$productList = $_SESSION['cart'];
$_SESSION['ID'] = 2;
$Customer_ID = $_SESSION['ID'];

if(isset($_SESSION['ID'])) {
    //Zet de bestelling in de database.
    $OrderID = 0;
    $Customer_ID = $_SESSION['ID'];
    $Datum = date("Y/m/d");
    $PaymentID = 2;

    $statement = mysqli_prepare($conn = get_connection(), 'INSERT INTO Orders VALUES(?,?,?,?)');
    mysqli_stmt_bind_param($statement, 'iisi', $OrderID, $Customer_ID, $Datum, $PaymentID);
    mysqli_stmt_execute($statement);

    //Haalt de shoppingcart weer leeg
    $statement = mysqli_prepare($conn = get_connection(), 'DELETE FROM Shoppinglist WHERE Customer_ID =? ');
    mysqli_stmt_bind_param($statement, 'i', $Customer_ID);
    mysqli_stmt_execute($statement);

}


