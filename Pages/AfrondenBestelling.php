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
$ProductList = $_SESSION['cart'];
$_SESSION['ID'] = 2;
$Customer_ID = $_SESSION['ID'];
$_SESSION['cart_ID'] = 2;
$ShoppinglistID = $_SESSION['cart_ID'];


if(isset($_SESSION['ID'])) {
    //Zet de bestelling in de database.
    $OrderID = 0;
    $Customer_ID = $_SESSION['ID'];
    $Datum = date("Y/m/d");
    $PaymentID = 2;

    //Prepared statement om bestelgegevens in de tabel orders te zetten
    $statement = mysqli_prepare($conn = get_connection(), 'INSERT INTO Orders VALUES(?,?,?,?)');
    mysqli_stmt_bind_param($statement, 'iisi', $OrderID, $Customer_ID, $Datum, $PaymentID);
    mysqli_stmt_execute($statement);

    //Zet de shoppingcart gegevens in het archief.
    foreach ($_SESSION['cart'] as $productID => $aantal) {
        $statement = mysqli_prepare($conn = get_connection(), 'INSERT INTO Shoppinglist_archive VALUES(?,?,?,?,?,?,?)');
        mysqli_stmt_bind_param($statement, 'iis')
    }


    //Haalt de shoppingcart weer leeg
    $statement = mysqli_prepare($conn = get_connection(), 'DELETE FROM Shoppinglist WHERE Customer_ID =? ');
    mysqli_stmt_bind_param($statement, 'i', $Customer_ID);
    mysqli_stmt_execute($statement);
    //Print de bevestiging.
    print("<p style=''>Je bestelling is succesvol geplaatst!</p><br>Je wordt doorgestuurd naar de homepage.<br><br><img src='../recources/voorbeeld%20fotos/check.png' width='150px'; <br>");

}
//Stuurt de klant na 4 seconden terug naar de homepage.
header("refresh:4;url=../Pages/index.php");
include '../incl/footer.php';
ob_end_flush();
?>