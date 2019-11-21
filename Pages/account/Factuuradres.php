<?php
//Start sessie.
session_start();
//Laadt de header in.
include '../../incl/header.php';
//Laadt Database.php in zodat ik daar queries en variablen van kan gebruiken.
include '../../incl/Database.php';
?>

<script type="text/javascript" src="../../JS/Functions.js"></script>
    <div class="container" style="margin-top:150px">
        <div class="row">
            <div class="col-lg-12">
<h1>Factuuradres</h1>

<!-- Formulier waar factuuradres te zien is
mogelijkheid tot wijzigen -->

<div class="factuuradres">
    <form action="Factuuradres.php" method="post">
        <input onclick="ChangeForm(); myFunction()" id="wijzig" type="button" value="Wijzig" class="Button"> <br>
        <div id="form-inputs">
            Ter attentie van:*: <br> <input type="text" id="naam" name="naam" value="<?=($fullname) ?>" readonly><br>
            Postcode*: <br> <input type="text" id="postcode" name="postcode" value="<?=($postcode) ?>" readonly><br>
            Straat*: <br> <input type="text" id="straat" name="straat" value="<?=($straat) ?>" readonly><br>
            Huisnummer*: <br> <input type="text" id="huisnnr" name="huisnnr" value="<?=($huisnummer) ?>" readonly><br>
            Toevoegsel: <br> <input type="text" id="toev" name="toevoegsel" value="<?=($toevoegsel) ?>"><br>
            Land*: <br> <input type="text" id="land" name="land" value="Nederland" readonly><br>
        </div>
    </form>
</div>

<div id="hide" style="display: none">
    <input id='opslaan' type='button' value='Opslaan' class='Button' onclick="myFunction()"><br>
</div>

<a href="MijnAccount.php"><--Terug naar dashboard></a>
            </div>
        </div>
    </div>
<?php
include '../../incl/footer.php';
