<?php
include '../incl/header.php';
//Laadt de header in.
//include '../incl/Header.html';
//Laadt Database.php in zodat ik daar queries en variablen van kan gebruiken.
include '../incl/Database.php';
?>
<script type="text/javascript" src="../JS/Functions.js"></script>

<div class="container" style="margin-top:200px; margin-bottom: 100px;">
<h1>Factuuradres</h1>

<?php
if (!empty($_GET['message'])) {
    $SuccesMelding = $_GET['message'];
    print("<div class='alert alert-success' role='alert'>" . $SuccesMelding . "</div>");
}
?>

<!-- Formulier waar factuuradres te zien is
mogelijkheid tot wijzigen -->

<div class="factuuradres">
    <form action="../incl/Database.php" method="post">
        <div class="form-group">
            <label for="TAV">Ter attentie van:*</label>
            <input type="text" class="form-control" id="naam" name="naam" value="<?= ($fullname) ?>" readonly required>
        </div>
        <div class="form-group">
            <label for="plaats">Plaats:*</label>
            <input type="text" class="form-control" id="naam" name="plaats" value="<?= ($plaats) ?>" readonly required>
        </div>
        <div class="form-group">
            <label for="postcode">Postcode:*</label>
            <input type="text" class="form-control" id="postcode" name="postcode" value="<?= ($postcode) ?>" readonly required>
        </div>
        <div class="form-group">
            <label for="Straat">Straat:*</label>
            <input type="text" class="form-control" id="straat" name="straat" value="<?= ($straat) ?>" readonly required>
        </div>
        <div class="form-group">
            <label for="Huisnummer">Huisnummer:*</label>
            <input type="text" class="form-control" id="huisnnr" name="huisnnr" value="<?= ($huisnummer) ?>" readonly required>
        </div>
        <div class="form-group">
            <label for="Toevoegsel">Toevoegsel:</label>
            <input type="text" class="form-control" id="toev" name="toevoegsel" value="<?= ($toevoegsel) ?>" readonly>
        </div>
        <div class="form-group">
            <input onclick="ChangeForm()" class="btn btn-info" id="wijzig" type="button" value="Wijzig">
            <input class="btn btn-success" id='opslaan' type='submit' name="opslaanFactuuradres" value='Opslaan'>
        </div>
    </form>
</div>
    <a href="MijnAccount.php"><button class="btn btn-primary">Terug naar dashboard</button></a>
</div>
<?php
include '../incl/footer.php';
?>