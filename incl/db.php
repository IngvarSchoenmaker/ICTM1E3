<?php

// het weergeven van de errors wordt hierdoor geactiveerd zorg ervoor dat je try en catch gebruikt!!! (i.v.m gevoelige data)

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "onzedbwwi";
    $conn = mysqli_connect($server, $username, $password, $dbname);


// zodra de connectie met de database verbroken is krijg je een melding te zien.
// De error_log wordt hier bijgehouden
// errors mogen niet zichtbaar zijn voor de gebruikers!!!!! (i.v.m gevoelige gegevens)

} catch (Exception $e) {
    error_log($e->getMessage());
    exit("Oops, er is een fout ontstaan met de connectie probeer het later weer.");

}
$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "wideworldimporters";
$port = "3306";
$conn2 = mysqli_connect($servername, $DBusername, $DBpassword, "wideworldimporters", $port) or
die("Could not connect: " . mysqli_error());
?>