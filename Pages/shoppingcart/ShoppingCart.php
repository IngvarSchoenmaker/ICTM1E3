<?php
include "../../incl/header.php";
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Productlijst</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../../JS/ShoppingCart.js" async></script>

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

    function SqlQueryDELETE($ID)
    {
//    ** DEZE FUNCTIE wordt gebruikt voor het verwijderen van artikelen uit de winkelwagen **

        $servername = "localhost";
        $DBusername = "root";
        $DBpassword = "";
        $DBname = "onzedbwwi";
        $port = "3306";
        $sql="DELETE FROM shoppinglist WHERE customer_ID=... AND ID_Product= $ID";   // nog niet werkend, klant id moet opgevraagd kunnen worden.

        $conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname, $port) or
        die("Could not connect: " . mysqli_error());

        $statement = mysqli_prepare($conn, $sql);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        if(!$result){
            print("Crical error: statement is invalid.");
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

        $photo=$_SESSION['itemPhoto'];
        $photo=DeSessionImplode($photo);
        $unitName=$_SESSION['itemName'];
        $unitName=DeSessionImplode($unitName);
        $rating=$_SESSION['itemRating'];
        $rating=DeSessionImplode($rating);
        $unitPrice=$_SESSION['itempPrice'];
        $unitPrice=DeSessionImplode($unitPrice);
        $unitTotal=$_SESSION['itemTotalPrice'];
        $unitTotal=DeSessionImplode($unitTotal);
        $cartTotal=0;

//        function bar($ID){
//                var x = document.getElementById("aantal").value;
//                document.getElementById("nieuw").innerHTML = x;
//                $aantal="nieuw";
//                return($aantal);
//            // Deze functie moet de prijs totaal updaten binnen de foreach.
//
//        }

        foreach($_SESSION['cart'] as $ID => $aantal){
        $unitTotal=($aantal*$unitPrice[$ID]);
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
        $cartTotal+=$unitTotal;
        }
        print("<tr><td></td><td>Totaal prijs</td><td class='cart-total-price'>$cartTotal</td></tr>")

        ?>
        </tbody>
    </table>
</div>

</body>
</html>
<?php
include "../../incl/footer.php";
?>