<?php
// database verbindingen instellen
$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "wideworldimporters";
$port = "3306";
// connectie maken met de database
$connection = mysqli_connect($servername, $DBusername, $DBpassword, $DBname, $port);

if(!$connection) {
    die("Verbinding is mislukt: " . mysqli_connect_error()); // als de connectie maken niet lukt dan wordt er een error gegeven

}