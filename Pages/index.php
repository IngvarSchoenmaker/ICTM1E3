<?php
include '../incl/header.php'
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
                            <img class="d-block w-100" src="../recources/sale_1920x619_94531.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../recources/ww1wapens.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../recources/sale.jpg" alt="Third slide">
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
                <img src="https://picsum.photos/1200?random=1" style="width: 540px; height: 200px;">
            </div>
            <div class="col-lg-6">
                <img src="https://picsum.photos/1200?random=2" style="width: 540px; height: 200px;">
            </div>
        </div>
    </div>
<?php
include '../incl/footer.php';
?>