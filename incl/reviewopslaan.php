<?php
include 'ConnectieFunctie.php';

// ################################################
// Review gegevens opslaan.
// ################################################

//Als er op de knop plaatsreview is gedrukt
//Worden de input velden opgeslagen in variablen.
if (isset($_POST['plaatsreview'])) {
    $productDB = $_SESSION['ProductID'];

    $statement = mysqli_prepare($conn = get_connection(), "INSERT INTO product_information VALUES($productDB, NULL)");
    mysqli_stmt_execute($statement);

    $emailDB = $_POST['mail'];
    $scoreDB = $_POST['star'];
    $beoordelingDB = $_POST['beoordeling'];
    //Prepared statement
    $statement = mysqli_prepare($conn = get_connection(), "INSERT INTO reviews VALUES(?,?,?,?)");

    mysqli_stmt_bind_param($statement, 'isis', $productDB, $emailDB, $scoreDB, $beoordelingDB);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    header("Location: ../Pages/Reviews.php?message=Je review is succesvol geplaatst!");
}
?>
