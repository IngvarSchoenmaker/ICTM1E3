<?php
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 4 Website Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../JS/searchbar.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
</head>
<body>
<?php
    if (empty($_SESSION['ID'])) {
        ?>
        <nav class="navbar navbar-expand-sm navbar-custom fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <a class="navbar-brand" href="#">World Wide Importers</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="col-7">
                        <form class="form-inline align-self-center" action="../Pages/search/search.php" method="POST">
                            <div class="search-box input-group p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                                <input type="search" placeholder="What're you searching for?" name="search"
                                       autocomplete="off" class="form-control border-0 bg-light rounded rounded-pill">
                                <div class="input-group-append">
                                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"
                                            name="submit-search"><i class="fa fa-search"></i></button>
                                </div>
                                <div class="result"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="margin-top: 70px;">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="container">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home <span
                                            class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="auth/signup.php">Registreer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="auth/login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="all_products.php">Producten</a>
                            </li>
                            <!--                <li class="nav-item dropdown">-->
                            <!--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"-->
                            <!--                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                            <!--                        Dropdown-->
                            <!--                    </a>-->
                            <!--                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
                            <!--                        <a class="dropdown-item" href="#">Action</a>-->
                            <!--                        <a class="dropdown-item" href="#">Another action</a>-->
                            <!--                        <div class="dropdown-divider"></div>-->
                            <!--                        <a class="dropdown-item" href="#">Something else here</a>-->
                            <!--                    </div>-->
                            <!--                </li>-->
                            <!--                <li class="nav-item">-->
                            <!--                    <a class="nav-link disabled" href="#">Disabled</a>-->
                            <!--                </li>-->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
<?php
    }
    else {
        ?>
        <nav class="navbar navbar-expand-sm navbar-custom fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <a class="navbar-brand" href="#">World Wide Importers</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="col-7">
                        <form class="form-inline align-self-center" action="../Pages/search/search.php" method="POST">
                            <div class="search-box input-group p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                                <input type="search" placeholder="What're you searching for?" name="search"
                                       autocomplete="off" class="form-control border-0 bg-light rounded rounded-pill">
                                <div class="input-group-append">
                                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"
                                            name="submit-search"><i class="fa fa-search"></i></button>
                                </div>
                                <div class="result"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="margin-top: 70px;">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="container">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home <span
                                            class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="account/AccountInfo.php">Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="all_products.php">Producten</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="auth/logout.php">uitloggen</a>
                            </li>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <!--                <li class="nav-item dropdown">-->
                            <!--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"-->
                            <!--                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                            <!--                        Dropdown-->
                            <!--                    </a>-->
                            <!--                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
                            <!--                        <a class="dropdown-item" href="#">Action</a>-->
                            <!--                        <a class="dropdown-item" href="#">Another action</a>-->
                            <!--                        <div class="dropdown-divider"></div>-->
                            <!--                        <a class="dropdown-item" href="#">Something else here</a>-->
                            <!--                    </div>-->
                            <!--                </li>-->
                            <!--                <li class="nav-item">-->
                            <!--                    <a class="nav-link disabled" href="#">Disabled</a>-->
                            <!--                </li>-->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
<?php
    }
?>
