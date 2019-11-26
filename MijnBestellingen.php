<?php
//Start sessie.
session_start();
//Laadt de header in.
include 'Header.html';
//Laadt Database.php in zodat ik daar queries en variablen van kan gebruiken.
include 'Database.php';
?>

<!-- Laadt javascript functies in-->
<script type="text/javascript" src="Functions.js"></script>

<h1>Mijn bestellingen</h1>

<br>
<br>

<!--Maakt een tabel waar alle bestellingen staan.-->
<table style="width:100%" border="1">
    <tr>
        <th>Ordernummer</th>
        <th>Orderdatum</th>
        <th>Verzonden aan</th>
    </tr>
<?php

foreach ($OrderData as $order){
    print("<tr>");

    print("<td>" . $order["Order_ID"]  . "</td>");
    print("<td>" . $order["Date"]  . "</td>");
    print("<td>" . $order["First_Name"]  . "</td>");

    print("</tr>");
}

?>
</table>
<br>
<a href="MijnAccount.php"><--Terug naar dashboard></a>