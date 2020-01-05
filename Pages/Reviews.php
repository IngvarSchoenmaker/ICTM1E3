<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Laadt database in
include '../incl/ConnectieFunctie.php';
?>

<style>
    .form-resize {
        width: 100%;
    }

    div.form {
        display: block;
        text-align: center;
    }

    form {
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
    }
</style>

<!--Hier maak ik de review input-->
<div class="review">
    <form action="" method="post">
        <div class="form-resize">
            <div class="form-group">
                <label>E-mail*: </label>
                <input type="email" name="mail" placeholder="voorbeeld@mail.com" required class="form-control">
                <small class="form-text text-muted">Je email wordt niet openbaar gemaakt!</small>
            </div>
            <div class="form-group">
                <label>Naam*:</label>
                <input type="text" name="naam" placeholder="Jan Voet" required class="form-control">
            </div>
        </div>

        <div class="form-check form-check-inline">
            <div class="form-group">
            Score:
            <label class="radio-inline"><input type="radio" name="star" value="1" class>1</label>
            <label class="radio-inline"><input type="radio" name="star" value="2">2</label>
            <label class="radio-inline"><input type="radio" name="star" value="3">3</label>
            <label class="radio-inline"><input type="radio" name="star" value="4">4</label>
            <label class="radio-inline"><input type="radio" name="star" value="5" checked>5</label>
            </div>
        </div>

        <div class="form-resize">
            Beoordeling*: <br><textarea rows="2" cols="25" name="beoordeling" required
                                        class="form-control"></textarea><br>
        </div>
        <input name="plaatsreview" type="submit" value="Plaats review" class="btn btn-primary"><br>
    </form>
</div>

<?php
ob_start();
// ################################################
// Review gegevens opslaan.
// ################################################

//Als er op de knop plaatsreview is gedrukt
//Worden de input velden opgeslagen in variablen.
if (isset($_POST['plaatsreview'])) {
    if (!isset($_SESSION['ID'])) {
        print "<script>alert('Je moet ingelogd zijn om een review te plaatsen!'); </script>";
    } else {
        //Ophalen van de gegevens omtrent de reviews
        //om die gegevens vervolgens in de database te zetten.
        $productDB = $_SESSION['ProductID'];
        $emailDB = $_POST['mail'];
        $scoreDB = $_POST['star'];
        $beoordelingDB = $_POST['beoordeling'];
        //Prepared statement
        $statement = mysqli_prepare($conn = get_connection(), "INSERT INTO reviews VALUES(?,?,?,?)");

        mysqli_stmt_bind_param($statement, 'isis', $productDB, $emailDB, $scoreDB, $beoordelingDB);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        print "<script>alert('Je review is succesvol geplaatst!'); </script>";
        header("Refresh:0");
    }
}

ob_end_flush();
?>