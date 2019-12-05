<?php
require "../incl/header.php";
ob_start();
if(isset($_SESSION['ID'])) {
    $customer_ID = $_SESSION['ID'];
} else{
    $customer_ID=2;
}
//print($_SESSION['cart']);
$shoppinglist_ID=(SqlQuery("SELECT shoppinglist_ID FROM shoppinglist WHERE customer_ID =$customer_ID"));
if(!empty($shoppinglist_ID)){
    $shoppinglist_ID=implode('|',$shoppinglist_ID);
    $_SESSION['shoppinglist_ID']=$shoppinglist_ID;
    if(isset($_SESSION['Querycheck']) AND $_SESSION['Querycheck']) {
    }else {
        header("Location: ../Pages/ShoppingCartQueries.php");
        //exit;
    }
};
?>
    <!DOCTYPE html>
    <html lang="en">
    <style>
        .btn-order {background-color: #008CBA;} /* blue /*
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
        <p>Verder winkelen knop &emsp; Verder naar bestellen</p>
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

            function SqlQuery($sql)
            {
//    ** DEZE FUNCTIE wordt gebruikt voor het verwijderen van artikelen uit de winkelwagen **

                $servername = "localhost";
                $DBusername = "root";
                $DBpassword = "";
                $DBname = "onzedbwwi";
                $port = "3306";
//        $sql="DELETE FROM shoppinglist WHERE customer_ID=... AND ID_Product= $ID";   // nog niet werkend, klant id moet opgevraagd kunnen worden.

                $conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname, $port) or
                die("Could not connect: " . mysqli_error());

                $statement = mysqli_prepare($conn, $sql);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);
                while ($row = $result->fetch_assoc()) {
                    return ($row);
                }


                mysqli_stmt_close($statement);
                $conn->close();
            }
            function DeSessionImplode($array){
//    ***haalt array session naam weg***
                foreach($array as $key => $value){
                    $result[$key]=$value;
                }
                return($result);
            }
            if(!empty($_SESSION['Cart'])) {
                $photo = $_SESSION['itemPhoto'];
                $photo = DeSessionImplode($photo);

                $unitName = $_SESSION['itemName'];
                $unitName = DeSessionImplode($unitName);


                $rating = $_SESSION['itemRating'];
                $rating = DeSessionImplode($rating);


                $unitPrice = $_SESSION['itemPrice'];
                $unitPrice = DeSessionImplode($unitPrice);


                $unitTotal = $_SESSION['itemTotalPrice'];
                $unitTotal = DeSessionImplode($unitTotal);

                $cartTotal = 0;



                foreach ($_SESSION['cart'] as $ID => $aantal) {
                    $unitTotal = ($aantal * $unitPrice[$ID]);
                    print("
        
 <tr class='cart-row'>
 
            <td>
                Product nummer $ID<BR>
                Foto $photo[$ID]<BR>
                Naam $unitName[$ID]
            </td>
            <td>
                Rating $rating[$ID]<BR>
                Aantal <input type='number' class='cart-quantity-input' name=\"aantal\"  value= $aantal <?php echo $aantal;?>
            </td>
            <td>Prijs per stuk <p class='cart-price'>$unitPrice[$ID]</p>
            Prijs totaal <div class='item-total'>$unitTotal</div>
            <button class='btn btn-danger' type=\"button\">VERWIJDEREN</button>
            </td>
        </tr>
        
        ");

                    $cartTotal += $unitTotal;
                }
                print("
        <div class='end-row'>
        <tr><td></td><td>Totaal prijs</td><td class='cart-total-price'>$cartTotal<BR><button class='btn-order' type='button'>Bestellen</button></td></tr>
        
        </div>
        ");
            }
            $_SESSION['Querycheck']=false;
            ?>

            </tbody>
        </table>

    </div>
    </body>
    </html>
<?php
include "../incl/footer.php";
ob_end_flush();
?>