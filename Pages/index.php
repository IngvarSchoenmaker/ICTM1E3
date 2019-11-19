<?php
include '../incl/header.php'
?>
    <link rel="stylesheet" href="../style/style.css">

    <div class="container" style="margin-top:150px">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="margin-top: 70px;">
                <div class="collapse navbar-collapse container" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
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
                            <img class="d-block w-100" src="https://picsum.photos/1200?random=1" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://picsum.photos/1200?random=2" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://picsum.photos/1200?random=3" alt="Third slide">
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
        <div class="row top-buffer">
            <div class="col-lg-6">
                <img src="https://picsum.photos/1200?random=4" style="width: 540px; height: 200px;">
            </div>
            <div class="col-lg-6">
                <img src="https://picsum.photos/1200?random=5" style="width: 540px; height: 200px;">
            </div>
        </div>
    </div>
<?php
include '../incl/footer.php';
?>