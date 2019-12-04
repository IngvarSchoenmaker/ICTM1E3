<?php
include '../incl/header.php';
$sql = "SELECT * FROM stockitems ";
$result = mysqli_query($conn2, $sql);
$queryResult = mysqli_num_rows($result);
if ($queryResult > 0) {
    ?>
    <div class="container" style="margin-top:200px; margin-bottom: 50px;">
    <div class="row">
    <div class="col-lg-12">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "  <a href='product_info.php?item=". $row['StockItemID'] ."'
                <image src=\"../recources/usb.png\" class='img image-card__image  img-wrapper  img-wrapper--fluid  img-wrapper--center'></image>
                " . $row['StockItemName'] . " prijs: " . $row['RecommendedRetailPrice'] . "<br>
                ";
    }
}
?>
    </div>
    </div>
    </div>
<?php
include '../incl/footer.php';
?>