<?php
include "../incl/db.php";

if (isset($_POST['huismerk'])) {
    $huismerk = $_POST['huismerk'];
    if($huismerk == "ans1") {
        $sql = "SELECT * FROM stockitems WHERE brand LIKE ''";
        $result = mysqli_query($conn2, $sql);
    } else {
        echo "Er zijn geen zoekresultaten gevonden met het gekozen filter";
    }
}
elseif(isset($_POST['sale'])) {
    $huismerk = $_POST['sale'];
    if($huismerk == "ans2") {
        $sql = "SELECT * FROM stockitems WHERE StockItemID IN (SELECT StockItemID FROM specialdeals)";
        $result = mysqli_query($conn2, $sql);
    } else {
        echo "Er zijn geen zoekresultaten gevonden met het gekozen filter";
    }
}
elseif(isset($_POST['highlow'])) {
    $huismerk = $_POST['highlow'];
    if($huismerk == "ans3") {
        $sql = "SELECT * FROM stockitems ORDER BY RecommendedRetailPrice DESC";
        $result = mysqli_query($conn2, $sql);
    } else {
        echo "Er zijn geen zoekresultaten gevonden met het gekozen filter";
    }
}
elseif(isset($_POST['lowhigh'])) {
    $huismerk = $_POST['lowhigh'];
    if($huismerk == "ans4") {
        $sql = "SELECT * FROM stockitems ORDER BY RecommendedRetailPrice ASC";
        $result = mysqli_query($conn2, $sql);
    } else {
        echo "Er zijn geen zoekresultaten gevonden met het gekozen filter";
    }
}
else {
    $sql = "SELECT * FROM stockitems ";
    $result = mysqli_query($conn2, $sql);
}
?>