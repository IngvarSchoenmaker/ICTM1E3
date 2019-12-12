<?php
ob_start();
//include '../Pages/ShoppingCartQueries.php';
include '../incl/ConnectieFunctie.php';
include_once '../incl/header.php';
//session_start();
print("<BR>");
print("<BR>");
print("<BR>");
print("<BR>");
print("<BR>");
print("<BR>");


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

    print("<p style=''>Je bestelling is succesvol geplaatst!</p><br>Je wordt doorgestuurd naar de homepage.<br><br><img src='../recources/voorbeeld%20fotos/check.png' width='150px'; <br>");
}
header("refresh:4;url=../Pages/index.php");
include '../incl/footer.php';
ob_end_flush();
?>