<?php
ob_start();
require "../incl/header.php";

//  ***Bezoekers zijn niet ingelogd en krijgen customer ID 0 mee voor opslaan orders***
if (!isset($_SESSION['ID'])) {
    $_SESSION['ID'] = 0;
}
$connOnzeDB = mysqli_connect($servername, $DBusername, $DBpassword, "wwi_customers") or
die("Could not connect: " . mysqli_error());

foreach ($_SESSION['cart'] as $cart => $array) {
    $_SESSION['cart'][$cart] = $array;
}

if (!$_SESSION['check'] AND !$_SESSION['ID'] = 0) {
    header("Location: ShoppingCartQueries.php");
}

$itemPrice = ($_SESSION['itemPrice']);
$itemName = ($_SESSION['itemName']);
$rating = ($_SESSION['rating']);
$photo = ($_SESSION['photo']);
?>
<!DOCTYPE html>
<html lang="en">
<style>
    #wrapper {
        width: 900px; /*can be in percentage also.*/
        height: auto;
        margin: 0 auto;
        padding: 10px;
        position: relative;
        border: 1px solid black;
        overflow: auto;
    }

    #first {
        float: left;
        width: 405px;
        border: 1px black;
    }
</style>
<head>
    <title>Productlijst</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="../JS/ShoppingCart.js" async></script>
</head>
<body>

<div class="container" style="margin-top: 150px; margin-bottom: 100px">
    <h2>Winkelwagen</h2>
    <p>Verder winkelen knop &emsp; Verder met bestellen</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Product</th>
            <th>Aantal</th>
            <th>Prijs</th>
        </tr>
        </thead>
        <tbody class="cart-items">
        <?php
        $cartTotal = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $ID => $aantal) {
                $itemTotal = ($aantal * $itemPrice[$ID]);
                print("

        <tr class='cart-row'>
            <td>
                <p class='cart-item'>$ID</p><BR>
                 <img src=\"../recources/voorbeeld fotos/$itemName[$ID]1.jpg\" class=\"img\">
                 <BR>
                $itemName[$ID]
            </td>
            <td>

                Rating $rating[$ID]<BR>
                

                Aantal <input type='number' onchange='Refresh()' class='cart-quantity-input form-control' name=\"aantal$ID\" id='' value= '$aantal'
                </form>
            </td>
            <td>Prijs per stuk <p class='cart-price'>$itemPrice[$ID]</p>
                Prijs totaal <div class='item-total'>$itemTotal</div>
                <button class='verwijder btn btn-danger' type=\"button\">VERWIJDEREN</button>
            </td>
        </tr>

        ");
                $cartTotal += $itemTotal;
            }
        }
        if (!empty($_SESSION['cart'])) {
            print("
        <div class='end-row'>
            <tr><td></td><td>Totaalprijs</td><td class='cart-total-price'>$cartTotal<BR></td></tr>

        </div>
        <form method='post' action='../Pages/AfrondenBestelling.php'>
        <button class='order btn btn-success' type='submit' name='bestellen' onclick='javascript:ajax_post();'>Bestellen</button><div id=\"status\"></div>
</form>
        ");
        }


        $_SESSION['Querycheck'] = false;
        ?>

        </tbody>
    </table>
</div>

<div id="wrapper">
    <div id="first">
        <h3><b>Waarom zou je bij ons bestellen?</b></h3>
        <img src="../recources/voorbeeld%20fotos/Milieu.png" alt="Milieuvriendelijkheid" height="169" width="313">
    </div>
    <div id="second">
        <h3><b>Feiten over kartonnen dozen</b></h3>
        <ul>
            <li>
                Karton wordt gemaakt uit hout. Bomen nemen CO2 op, waarmee zij de CO2-uitstoot van de productie van
                papier en karton grotendeels neutraliseren
            </li>
            <li>
                Hout is een hernieuwbare bron. Voor elke geoogste boom wordt een nieuwe geplant. Sinds 1950 is het
                bosoppervlak in Europa gegroeid met liefst 30%. De productiebossen van de hout-, papier- en
                kartonindustrie dragen daaraan bij.
            </li>
        </ul>
    </div>
</div>

<br>
</body>
</html>

<?php
include "../incl/footer.php";
ob_end_flush();

function SqlGetSingleRow($sql, $conn)
{
//    ** DEZE FUNCTIE HAALT 1 WAARDE PER KEER UIT DE DOORGEGEVEN DATABASE **

    $statement = mysqli_prepare($conn, $sql);
    if ($statement === FALSE) {
        print($sql);
        die(mysqli_error($conn));
    }
    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    }
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    if ($result !== NULL) {
        while ($row = $result->fetch_assoc()) {
            return ($row);


        }
    }
    mysqli_stmt_close($statement);
    $conn->close();
}

?>
