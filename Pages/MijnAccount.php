<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <style>
        .AccDash {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .box {
            display: flex;
            flex-basis: border-box;
            flex-direction: column;
            width: 125px;
            height: 250px;
            padding: 50px;
            border: 1px groove;
            box-shadow: 5px 5px 5px grey;
        }
    </style>
</head>
<body>

<h1 class="AccDash">Account-dasboard</h1>

<!--Verschillende accountinformatie-->
<div class="box"><a href="AccountInfo.php">Account informatie</a><br><br>
    <a href="Factuuradres.php">Factuuradres</a><br><br>
    <a href="Afleveradres.php">Afleveradres</a><br><br>
    <a href="MijnBestellingen.php">Mijn bestellingen</a><br><br>
    <a href="../shoppingcart/ShoppingCart.php">Mijn winkelwagen</a><br><br>
    <a href="MijnAccount.php">Afmelden</a><br>
</div>


</body>
</html>