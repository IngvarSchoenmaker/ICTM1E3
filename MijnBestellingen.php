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
<table style="width:100%">
    <table>
        <tr>
            <td>
                <table>
                    <thead>
                    <tr>
                        <td>Ordernummer</td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    //print elke ordernummer onder elkaar.
                    foreach($orders as $order) {
                        print("<tr>");
                        print("<td>" . $order . "<br>" . "</td>");
                        print("</tr>");
                    }

                    ?>

                    </tbody>
                </table>
            </td>
            <td>
                <table>
                    <thead>
                    <tr>
                        <td>Orderdatum</td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    //print elke orderdatum onder elkaar.
                    foreach($datums as $datum) {
                        print("<tr>");
                        print("<td>" . $datum . "<br>" . "</td>");
                        print("</tr>");
                    }

                    ?>

                    </tbody>
                </table>
            </td>
            <td>
                <table>
                    <thead>
                    <tr>
                        <td>Verzonden aan</td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                        //print elke naam van de besteller onder elkaar.
                        for ($i = 0; $i < $aantalOrders; $i++) {
                            print("<tr>");
                            print("<td>" . $naamOrder . "<BR>" . "</td>");
                            print("</tr>");
                        }
                    ?>

                    </tbody>
                </table>
            </td>

        </tr>
    </table>

    <a href="MijnAccount.php"><--Terug naar dashboard></a>