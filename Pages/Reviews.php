<?php
//Laadt database in
include '../incl/reviewopslaan.php';

?>

<style>
    .form-resize{
        width: 100%;
    }

    div.form
    {
        display: block;
        text-align: center;
    }
    form
    {
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
    }
</style>


<?php
//Laat een melding zien wanneer de review succesvol is toegevoegd.
if (!empty($_GET['message'])) {
    $SuccesMelding = $_GET['message'];
    print("<h3>" . $SuccesMelding . "</h3>");
    header("refresh:4;url=../Pages/index.php");
}
?>
<!--Hier maak ik de review input-->
<div class="review">
     <form action="../incl/Database.php" method="post">
        <div class="form-resize">
         E-mail*: <br><input type="email" name="mail" placeholder="example@mail.com" required class="form-control"><br>
        <small>Je email wordt niet openbaar gemaakt!</small><br>
        Naam*: <br><input type="text" name="naam" placeholder="Jan Voet" required class="form-control"><br>
        </div>

         <div class="form-check form-check-inline">
         Score: <br><input type="radio" name="star" value="1" class>1
         <input type="radio" name="star" value="2">2
        <input type="radio" name="star" value="3">3
        <input type="radio" name="star" value="4">4
        <input type="radio" name="star" value="5" checked>5<br>
         </div>

         <div class="form-resize">
         Beoordeling*: <br><textarea rows="2" cols="25" name="beoordeling" required class="form-control"></textarea><br>
         </div>
        <input name="plaatsreview" type="submit" value="Plaats review" class="btn btn-primary"><br>
    </form>
</div>