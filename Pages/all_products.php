<?php
ob_start();
include '../incl/header.php';

if (isset($_GET['search'])) {
    $searchartical = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM stockitems WHERE SearchDetails LIKE '%$searchartical%'";
    $result = mysqli_query($conn2, $sql);
} else {
    $sql = "SELECT * FROM stockitems ";
    $result = mysqli_query($conn2, $sql);

}
$queryResult = mysqli_num_rows($result);
if ($queryResult == 1) {
    $row = mysqli_fetch_assoc($result);
    header("Location:product_info.php?item=" . $row['StockItemID']);
//    header("Location: product_info.php?item=$test");
}
if ($queryResult > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = $row;
    }
    ?>
    <div class="container" style="margin-top:200px; margin-bottom: 50px;">
    <div class="col-lg-12">
    <?php
    foreach (array_chunk($json, 4) as $products) {
        echo "<div class='card-deck mb-4'>";
        foreach ($products as $row) {
            ?>
            <div class="card">
                <img class="card-img-top" src="../recources/usb.png" alt="Card image cap">
                <div class="card-body d-flex flex-column align-items-stretch">
                    <h5 class="card-title"><?php echo $row['StockItemName'] ?></h5>
                    <p class="card-text"><?php echo $row['MarketingComments'] ?></p>
                    <div class="row mt-auto">
                        <p class="col-6"><?php echo "&euro;" . $row['RecommendedRetailPrice'] ?></p>
                        <a href="product_info.php?item=<?php echo $row['StockItemID'] ?>"
                           class="btn btn-primary col-5">Meer info</a>
                    </div>
                </div>
            </div>
            <?php
        }
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "Niks gevonden";
}
?>
    </div>
    </div>
<?php
include '../incl/footer.php';
ob_end_flush();
?>