<?php


$_GET['item'];

$_SESSION['ProductID'] = $productid;

$server = "localhost";
$username = "root";
$password = "";
$dbname = "onzedbwwi";
$conn2 = mysqli_connect($server, $username, $password, $dbname);
//hier wordt het average van de sterren opgehaald
$sql1 = "SELECT ID_Product, Email, AVG(Stars), Message FROM reviews WHERE ID_Product = $productid GROUP BY ID_Product";
$result1 = mysqli_query($conn2, $sql1);

while ($row = mysqli_fetch_assoc($result1)) {
    $stars = $row['AVG(Stars)'];
}

$resultcheck = mysqli_num_rows($result1);

//hier worden de sterren getoont
if ($resultcheck == 0) {
    echo "Dit product heeft nog geen reviews!";
} else {
    list($int, $dec) = explode('.', $stars);
    for ($x = 0; $x < $int; $x++) {
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
    }
    if ($dec >= 2500 and $dec < 7500) {
        echo "<img src=\"../incl/starhalf.jpg\" class=\"starimage\" alt=\"icon\" />";
    } elseif ($dec >= 7500) {
        echo "<img src=\"../incl/star3.png\" class=\"starimage\" alt=\"icon\" />";
    }
}
?>