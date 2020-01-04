<?php
ob_start();
include '../incl/header.php';

//zoekt naar het product via de zoekbar
if (isset($_GET['search'])) {
    $searchartical = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM stockitems WHERE SearchDetails LIKE '%$searchartical%'";
    $result = mysqli_query($conn2, $sql);
} else {
    include 'filter.php';
}

$queryResult = mysqli_num_rows($result);
//wordt gelijk naar het product gestuurt
if ($queryResult == 1) {
    $row = mysqli_fetch_assoc($result);
    header("Location:product_info.php?item=" . $row['StockItemID']);
}
//wordt naar een pagina gestuurt met de procuten die onder de zoek termen vallen
if ($queryResult > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = $row;
    }
    ?>
    <div class="container" style="margin-top:200px; margin-bottom: 50px;">
    <div class="col-lg-12">
    <div class="col-8">
    <form action="all_products.php" method="post">
<!--        dit zijn de filer opties-->
        <input type="checkbox" name="huismerk" value="ans1"> Huismerk
        <input type="checkbox" name="sale" value="ans2" style="margin-left: 20px"> Korting
        <input type="checkbox" name="highlow" value="ans3" style="margin-left: 20px"> Prijs Hoog-Laag
        <input type="checkbox" name="lowhigh" value="ans4" style="margin-left: 20px"> Prijs Laag-Hoog

        <input type="submit" value="Zoek" class="btn btn-primary col-1" style="margin-left: 20px"/>
    </form><br>
    </div>
    <?php
    foreach (array_chunk($json, 4) as $products) {
//        laat alle producten zien
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
    echo "Er zijn geen producten gevonden.";
}
?>
    </div>
    </div>
<?php
include '../incl/footer.php';
ob_end_flush();
?>