<?php


$_GET['item'];

$_SESSION['ProductID'] = $productid;

$server = "localhost";
$username = "root";
$password = "";
$dbname = "onzedbwwi";
$conn2 = mysqli_connect($server, $username, $password, $dbname);
$sql1 = "SELECT ID_Product, Email, AVG(Stars), Message FROM reviews WHERE ID_Product = $productid GROUP BY ID_Product";
$result1 = mysqli_query($conn2, $sql1);


while ($row = mysqli_fetch_assoc($result1)) {
    $stars = $row['AVG(Stars)'];
}


$resultcheck = mysqli_num_rows($result1);

if($resultcheck == 0) {
    echo "Dit product heeft nog geen reviews!";
} else {
    if($stars == 0.5) {
        echo "<img src=\"../incl/starhalf.jpg\" class=\"starimage\" alt=\"icon\" />";
    } elseif($stars == 1) {
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
    } elseif($stars == 1.5) {
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/starhalf.jpg\" class=\"starimage\" alt=\"icon\" />";
    } elseif($stars == 2) {
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
    } elseif ($stars == 2.5) {
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/starhalf.jpg\" class=\"starimage\" alt=\"icon\" />";
    } elseif ($stars == 3) {
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
    } elseif($stars == 3.5) {
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/starhalf.jpg\" class=\"starimage\" alt=\"icon\" />";
    } elseif ($stars == 4) {
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
    } elseif ($stars == 4.5) {
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/starhalf.jpg\" class=\"starimage\" alt=\"icon\" />";
    } elseif($stars == 5) {
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
    }
}






?>