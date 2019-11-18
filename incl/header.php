<?php
/**
 * Created by PhpStorm.
 * User: pboer
 * Date: 14-11-2019
 * Time: 11:40
 */

require 'db.php';
require 'search.php';
require 'surgestions.php';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../JS/serchbar.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">World Wide Importers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline" action="search.php" method="POST">
            <div class="search-box">
                <input class="form-control" type="text" autocomplete="off" name="search" placeholder="Search" />
                <button class="btn btn-outline-primary" type="submit" name="submit-search">Search</button>
                <div class="result"></div>
            </div>
        </form>
    </div>
</nav>
