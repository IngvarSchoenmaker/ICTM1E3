<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "onzedbwwi";
$conn = mysqli_connect($server, $username, $password, $dbname);

for ($aantal = 1; $aantal > 230; $aantal++) {
$sql = "INSERT INTO `product_information` VALUES ( $aantal, NULL, NULL)";
$result = mysqli_query($conn, $sql);
}