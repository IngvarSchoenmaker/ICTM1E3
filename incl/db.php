<?php
$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "wideworldimporters";
$port = "3306";
$conn2 = mysqli_connect($servername, $DBusername, $DBpassword, "wideworldimporters", $port) or
die("Could not connect: " . mysqli_error());
?>