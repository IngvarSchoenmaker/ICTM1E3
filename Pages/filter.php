<?php

include "../incl/dbwwi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Filter</title>
</head>
<body>

<form action="all_products.php" method="post">
    <input  type="checkbox" name="huismerk" value="ans1"> Huismerk
    <input type="checkbox" name="sale" value="ans2"> Sale
    <input type="checkbox" name="highlow" value="ans3"> Prijs Hoog-Laag
    <input type="checkbox" name="lowhigh" value="ans4"> Prijs Laag-Hoog <br>

    <input type="submit" value="submit" />
</form> <br>

<?php



if (isset($_POST['huismerk'])) {
    $huismerk = $_POST['huismerk'];
    if($huismerk == "ans1") {
        $sql = "SELECT * FROM stockitems WHERE brand LIKE ''";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['StockItemName'] . "<br>" . $row['RecommendedRetailPrice'] . "<br><br>";
        }
    } else {
        echo "Er zijn geen zoekresultaten gevonden met het gekozen filter";
    }
}

if(isset($_POST['sale'])) {
    $huismerk = $_POST['sale'];
    if($huismerk == "ans2") {
        $sql = "SELECT * FROM stockitems WHERE StockItemID IN (SELECT StockItemID FROM specialdeals)";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['StockItemName'] . "<br>" . $row['RecommendedRetailPrice'] . "<br><br>";
        }
    } else {
        echo "Er zijn geen zoekresultaten gevonden met het gekozen filter";
    }
}

if(isset($_POST['highlow'])) {
    $huismerk = $_POST['highlow'];
    if($huismerk == "ans3") {
        $sql = "SELECT * FROM stockitems ORDER BY RecommendedRetailPrice DESC";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
            echo $row['StockItemName'] . "<br>" . $row['RecommendedRetailPrice'] . "<br><br>";
        }
    } else {
        echo "Er zijn geen zoekresultaten gevonden met het gekozen filter";
    }
}

if(isset($_POST['lowhigh'])) {
    $huismerk = $_POST['lowhigh'];
    if($huismerk == "ans4") {
        $sql = "SELECT * FROM stockitems ORDER BY RecommendedRetailPrice ASC";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
            echo $row['StockItemName'] . "<br>" . $row['RecommendedRetailPrice'] . "<br><br>";
        }
    } else {
        echo "Er zijn geen zoekresultaten gevonden met het gekozen filter";
    }
}
?>  
</body>
</html>