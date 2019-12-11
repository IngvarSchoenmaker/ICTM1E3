<?php
include '../incl/header.php';
//include '../incl/ConnectieFunctie.php';
?>
<body>

<!-- beetje style om de text en images op de goeie plek te zetten -->
<style>
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

    .starimage {
        height: 20px;
        width: auto;
    }
</style>
<div class="container" style="margin-top:200px; margin-bottom:50px; text-align: center">
    <div class="row">
        <div class="col-lg-12">
<!-- de image -->
<div>
    <image src="../recources/usb.png" class="img"></image>
</div>

<?php

$productid = $_GET['item'];

?>


<?php
// database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "wideworldimporters";
$conn1 = mysqli_connect($server, $username, $password, $dbname);
$sql1 = "SELECT * FROM stockitems WHERE StockItemID = $productid";
$result = mysqli_query($conn1, $sql1);
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

<?php

if(isset($_POST['Amount'])) {
    $amount = $_POST['Amount'];
}


if(isset($_POST['addToCart'])) {

    addToCart($productid, $amount);

    echo "<p> The item " . $itemname . " has been added to your shopping cart! </p>";
}
?>
            <br>
            <br>
            <?php
            $productid = $_GET['item'];

            $_SESSION['ProductID'] = $productid;

            $server = "localhost";
            $username = "root";
            $password = "";
            $dbname = "onzedbwwi";
            $conn2 = mysqli_connect($server, $username, $password, $dbname);
            $sql1 = "SELECT * FROM reviews WHERE ID_Product = $productid";
            $result1 = mysqli_query($conn2, $sql1);


            while ($row = mysqli_fetch_assoc($result1)) {

                $stars = $row['Stars'];

            }

            $i = 0;
            while($i < $stars ) {
                echo '<img src="../incl/star3.png" class="starimage" alt="icon" />';
                $i++;
            }

            ?>

            <div>
                Dit product heeft een rating van <?php echo $stars . "/5" ?> ontvangen!
            </div>

            <div>
                <?php include 'Reviews.php' ?>
            </div>

</div>
    </div>
</div>
</body>
<?php
include '../incl/footer.php';
?>