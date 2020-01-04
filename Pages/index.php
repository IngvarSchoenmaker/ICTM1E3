<?php
include '../incl/header.php';

?>

    <div class="container" style="margin-top:150px">
        <div class="row">
            <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" style="height: 370px;">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../recources/voorbeeld%20fotos/Sale_Christmas3.jpg"
                                 alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../recources/voorbeeld%20fotos/Sale_BlackFirday3.png"
                                 alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../recources/voorbeeld%20fotos/sale.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 15px; margin-bottom: 15px">
            <div class="col-lg-6">
                <img src="https://image.coolblue.be/max/422x390/products/117928" style="width: 540px; height: 200px;">
            </div>
            <div class="col-lg-6">
                <img src="https://assets.pcmag.com/media/images/237124-usb-missile-launcher.jpg?width=740" style="width: 540px; height: 200px;">
            </div>
        </div>
<!--        --><?php
//        if (!empty($_SESSION['ID'])) {
//            include_once "../incl/productSugestions.php";
//            include_once "../incl/db.php";
//            $products = getSuggestions($_SESSION['ID'], $conn, $conn2);
//            echo $products;
//            if ($products != NULL) {
//                echo '<div class="col-lg-3">';
//                foreach ($products AS $value) {
//                    echo $value["StockItemName"];
//                }
//                echo '</div>';
//            }
//
//        }
//        ?>
    </div>
<?php
include '../incl/footer.php';
?>
<?php
// de pop-up als je inlogt
if (isset($_SESSION['check'])) {
    if ($_SESSION['check'] === "true") {
        if (isset($_SESSION['loginsucesesvol'])) {
            print "<script>alert('Welkom terug, " . $_SESSION['loginsucesesvol'] . "!'); </script>";
            $_SESSION['check'] = "false";
        }
    }
}
?>
