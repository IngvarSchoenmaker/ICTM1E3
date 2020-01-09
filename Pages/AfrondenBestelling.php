<?php
ob_start();
include '../incl/ConnectieFunctie.php';
include_once '../incl/header.php';

//session_start();
print("<BR>");
print("<BR>");
print("<BR>");
print("<BR>");
print("<BR>");
print("<BR>");


//$_SESSION['cartt'] = array(220 => 3, 221 => 4);
$ProductList = $_SESSION['cart'];
//$_SESSION['ID'] = 2;
if($_SESSION['cart_ID'] === NULL){
    $sql = 'SELECT count(distinct shoppinglist_ID) FROM shoppinglist_archive';
    $cart_ID= GetData($sql, TRUE);
    foreach ($cart_ID as $k => $v) {
        $v = $v + 1;
    }
    $_SESSION['cart_ID'] = $v;
};

$Customer_ID = $_SESSION['ID'];

$ShoppinglistID = $_SESSION['cart_ID'];


if($_SESSION['ID'] != 0) {
    if (isset($_POST['bestellen'])) {
        //Zet de bestelling in de database.
        $OrderID = 0;
        $Customer_ID = $_SESSION['ID'];
        $Datum = date("Y/m/d");
        $PaymentID = 2;
        $Price = 0;

        //Prepared statement om bestelgegevens in de tabel orders te zetten
        $statement = mysqli_prepare($conn = get_connection(), 'INSERT INTO Orders VALUES(?,?,?,?)');
        mysqli_stmt_bind_param($statement, 'iisi', $OrderID, $Customer_ID, $Datum, $PaymentID);
        mysqli_stmt_execute($statement);

        //Zet de shoppingcart gegevens in het archief.
        foreach ($_SESSION['cart'] as $productID => $aantal) {
            $statement = mysqli_prepare($conn = get_connection(), 'INSERT INTO Shoppinglist_archive VALUES(?,?,?,?,?,?,?,?)');
            mysqli_stmt_bind_param($statement, 'iisiisii', $ShoppinglistID, $productID, $aantal, $Price, $PaymentID, $Datum, $Customer_ID, $OrderID);
            mysqli_stmt_execute($statement);
        }

        //Haalt de shoppingcart weer leeg
        $statement = mysqli_prepare($conn = get_connection(), 'DELETE FROM Shoppinglist WHERE Customer_ID =? ');
        mysqli_stmt_bind_param($statement, 'i', $Customer_ID);
        mysqli_stmt_execute($statement);

        //Print de bevestiging.
        echo "<div class=\"container\" style=\"margin-top:200px; margin-bottom: 233px; text-align: center\">
        <div class=\"row\">
            <div class=\"col-lg-12\">";
        print("<p style=''>Je bestelling is succesvol geplaatst!</p><br>Je wordt doorgestuurd naar de startpagina.<br><br><img src='../recources/voorbeeld%20fotos/check.png' width='150px'; <br>");
        echo "</div>
              </div>
              </div>";
        //Stuurt de klant na 4 seconden terug naar de homepage.
        header("refresh:4;url=../Pages/index.php");
    }

}
else {
    //Laat de bezoeker een melding zien.
    print "<script>alert('Je moet ingelogd zijn om een bestelling te kunnen plaatsen!'); </script>";
    //Bezoeker wordt doorgestuurd naar de startpagina.
    header("refresh:0.1;url=../Pages/index.php");
}

include '../incl/footer.php';
ob_end_flush();
?>