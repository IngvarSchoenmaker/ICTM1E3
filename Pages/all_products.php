<?php
ob_start();
include '../incl/header.php';

if (isset($_GET['search'])) {
    $searchartical = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM stockitems WHERE SearchDetails LIKE '%$searchartical%'";
    $result = mysqli_query($conn2, $sql);
}
else{
    $sql = "SELECT * FROM stockitems ";
    $result = mysqli_query($conn2, $sql);

}
$queryResult = mysqli_num_rows($result);
if ($queryResult == 1){
    $row = mysqli_fetch_assoc($result);
    header("Location:product_info.php?item=". $row['StockItemID']);
//    header("Location: product_info.php?item=$test");
}
if ($queryResult > 0) {
    ?>
    <div class="container" style="margin-top:200px; margin-bottom: 50px;">
    <div class="row">
    <div class="col-lg-12">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "  <a href='product_info.php?item=". $row['StockItemID'] ."'>
                <div style='border: 1px solid black; margin-bottom: 5px'>
                <image src=\"../recources/usb.png\" class='img image-card__image  img-wrapper  img-wrapper--fluid  img-wrapper--center'></image>
                " . $row['StockItemName'] . " prijs: " . $row['RecommendedRetailPrice'] . "<br>
                 </div>
                </a>";
    }
}
else{
    echo "Niks gevonden";
}
?>
    </div>
    </div>
    </div>
<?php
include '../incl/footer.php';
ob_end_flush();
?>