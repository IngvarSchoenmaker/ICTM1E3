<?php
include '../incl/header.php';
//Laadt de header in.
//Laadt Database.php in zodat ik daar queries en variablen van kan gebruiken.
include '../incl/Database.php';;
?>

<!-- Laadt javascript functies in-->
<script type="text/javascript" src="../JS/Functions.js"></script>

<div class="container" style="margin-top:200px; margin-bottom: 100px;">
<h1>Mijn bestellingen</h1>

<br>
<br>

<!--Maakt een tabel waar alle bestellingen staan.-->
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Ordernummer</th>
            <th scope="col">Orderdatum</th>
            <th scope="col">Verzonden aan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Print een tabel met order gegevens
        foreach ($OrderData as $order) {
            print("<tr>");

            print("<th scope=\"row\">" . $order["Order_ID"] . "</th>");
            print("<td>" . $order["Date"] . "</td>");
            print("<td>" . $order["First_Name"] . "</td>");

            print("</tr>");
        }

        ?>
    </tbody>
</table>
<br>
<!--Terugverwijzing naar accountdashboard-->
    <a href="MijnAccount.php"><button class="btn btn-primary">Terug naar dashboard</button></a>

</div>
<?php
include '../incl/footer.php';
?>