<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>WorldWideImporters</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/28cb3c38ec.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../JS/searchbar.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <div class="row col-12">
                <a class="navbar-brand" href="../Pages/index.php">World Wide Importers</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inlines" name="myform" action="../Pages/all_products.php" method="GET">
                    <div class="search-box input-group p-1 bg-light rounded rounded-pill shadow-sm mb-4 my-sm-0">
                        <input type="search" placeholder="What're you searching for?" name="search"
                               autocomplete="off" class="form-control border-0 bg-light rounded rounded-pill">
                        <div class="input-group-append">
                            <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="result"></div>
                    </div>
                </form>


                <ul class="navbar-nav ml-auto">
                    <?php
                    if (empty($_SESSION['loginsucesesvol'])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../Pages/signup.php">Registreer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Pages/login.php">Login</a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../Pages/MijnAccount.php">Mijn Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Pages/logout.php">Uitloggen</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../Pages/ShoppingCartQueries.php"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                </ul>
            </div>
            <div class="row col-12">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="../Pages/index.php">Home <span
                                    class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Pages/all_products.php">Producten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Pages/contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!---->
<!--<nav class="navbar navbar-expand-sm navbar-custom fixed-top">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-5">-->
<!--                <div class="navbar-header">-->
<!--                    <a class="navbar-brand" href="#">World Wide Importers</a>-->
<!--                    <button class="navbar-toggler" type="button" data-toggle="collapse"-->
<!--                            data-target="#collapsibleNavbar">-->
<!--                        <span class="navbar-toggler-icon"></span>-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-7">-->
<!--                <form class="form-inline align-self-center" action="../Pages/search.php" method="POST">-->
<!--                    <div class="search-box input-group p-1 bg-light rounded rounded-pill shadow-sm mb-4">-->
<!--                        <input type="search" placeholder="What're you searching for?" name="search"-->
<!--                               autocomplete="off" class="form-control border-0 bg-light rounded rounded-pill">-->
<!--                        <div class="input-group-append">-->
<!--                            <button id="button-addon1" type="submit" class="btn btn-link text-primary"-->
<!--                                    name="submit-search"><i class="fa fa-search"></i></button>-->
<!--                        </div>-->
<!--                        <div class="result"></div>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--            <ul class="nav">-->
<!--                --><?php
//                if (empty($_SESSION['loginsucesesvol'])) {
//                    ?>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="../Pages/signup.php">Registreer</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="../Pages/login.php">Login</a>-->
<!--                    </li>-->
<!--                    --><?php
//                } else {
//                    ?>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="../Pages/MijnAccount.php">Mijn Account</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="../Pages/logout.php">Uitloggen</a>-->
<!--                    </li>-->
<!--                    --><?php
//                }
//                ?>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="../Pages/ShoppingCartQueries.php"><i class="fas fa-shopping-cart"></i></a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <button class="navbar-toggler" type="button" data-toggle="collapse"-->
<!--                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"-->
<!--                aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!--        <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--            <div class="container">-->
<!--                <ul class="navbar-nav ml-md-auto">-->
<!--                    <li class="nav-item active">-->
<!--                        <a class="nav-link" href="../Pages/index.php">Home <span-->
<!--                                    class="sr-only">(current)</span></a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="../Pages/all_products.php">Producten</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="../Pages/contact.php">Contact</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->
</body>
