<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<!-- beetje style om de text en images op de goeie plek te zetten -->
<style>
    body{
        background-color: antiquewhite;
    }

    .img {
        height: 600px;
        width: auto;
        float:left;
    }

    .text {
        padding: 0px 10px;
    }

    .featured {
        font-size: 100px;
        padding: 0px 300px;
    }
</style>

<!-- de image -->
<div>
    <image src="../recources/usb.png" class="img"></image>
</div>


<?php
// database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "wideworldimporters";
$conn1 = mysqli_connect($server, $username, $password, $dbname);
$sql = "SELECT * FROM stockitems WHERE StockItemID = 1";
$result = mysqli_query($conn1, $sql);
?>

<!-- Data printen op site -->
<div class="text">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>". $row['StockItemName'] ."<br> €" . $row['RecommendedRetailPrice'] . "<br>" .  $row['MarketingComments'] . "<br>" . $row['Size']. "</p>";
    }
    ?>
</div>

<!-- placeholder brakes om de featured items omlag te zetten -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!-- Hier komt de featured items slider -->
<div class="featured">
    FEATURED ITEMS
</div>


</body>
</html>