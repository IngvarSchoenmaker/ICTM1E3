<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "onzedbwwi";
$conn = mysqli_connect($server, $username, $password, $dbname);

$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "wideworldimporters";
$port = "3306";
$conn2 = mysqli_connect($servername, $DBusername, $DBpassword, "wideworldimporters", $port) or
die("Could not connect: " . mysqli_error());
?>