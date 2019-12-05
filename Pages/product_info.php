<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="../style/footer.css">
</head>
<body>

<!-- beetje style om de text en images op de goeie plek te zetten -->
<style>
    body{
        background-color: antiquewhite;
    }

    .img {
        height: 600px;
        width: auto;
        float:left;
        border: 1px solid #021a40;
    }

    .text {
        padding: 0px 10px;
    }

    .featured {
        font-size: 100px;
        padding: 0px 300px;
    }
</style>

<!-- de image -->
<div>
    <image src="../recources/usb.png" class="img"></image>
</div>

<?php

$productid = 1;

?>


<?php
// database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "wideworldimporters";
$conn1 = mysqli_connect($server, $username, $password, $dbname);
$sql = "SELECT * FROM stockitems WHERE StockItemID = $productid";
$result = mysqli_query($conn1, $sql);
?>

<!-- Data printen op site -->
<div class="text">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>". $row['StockItemName'] ."<br> €" . $row['RecommendedRetailPrice'] . "<br>" .  $row['MarketingComments'] . "<br>" . $row['TypicalWeightPerUnit']. " KG <br>" . $row['Size']."</p>";

    $itemname = $row['StockItemName'];
    }
    ?>
</div>

<?php

function addToCart ($productid, $amount) {

    $addItem = array (
      $productid => $amount
    );
    if(isset ($_SESSION['cart'][$productid])) {
        print("Dit product staat al in uw winkelman!");
        }
        elseif ($addItem[$productid] != null) {
            $_SESSION['cart']=$addItem;
        }
}

?>

<form method="post">
    <input type="submit" name="addToCart" value="Add to cart" />
    <input type="text" name="Amount" value="1">
</form>

<br>
<br>
<br>
<br>


<?php

if(isset($_POST['Amount'])) {
    $amount = $_POST['Amount'];
}


if(isset($_POST['addToCart'])) {

    addToCart($productid, $amount);

    echo "<p> The item " . $itemname . " has been added to your shopping cart! </p>";
}

?>


<!-- placeholder brakes om de featured items omlag te zetten -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!-- Hier komt de featured items slider -->
<div>



</div>


</body>
</html>