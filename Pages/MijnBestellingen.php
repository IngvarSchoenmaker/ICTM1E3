<?php
include '../incl/header.php';
//Laadt de header in.
//include '../incl/Header.html';
//Laadt Database.php in zodat ik daar queries en variablen van kan gebruiken.
include '../incl/Database.php';;
?>

<!-- Laadt javascript functies in-->
<script type="text/javascript" src="Functions.js"></script>

<div class="container" style="margin-top:200px; margin-bottom: 100px; text-align: center">
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
    //Print een tabel met order gegevens
    foreach ($OrderData as $order) {
        print("<tr>");

        print("<td>" . $order["Order_ID"] . "</td>");
        print("<td>" . $order["Date"] . "</td>");
        print("<td>" . $order["First_Name"] . "</td>");

        print("</tr>");
    }

    ?>
</table>
<br>
<!--Terugverwijzing naar accountdashboard-->
<a href="MijnAccount.php"><--Terug naar dashboard></a>
</div>
<?php
include '../incl/footer.php';
?>