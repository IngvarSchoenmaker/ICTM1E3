<?php
        require 'database toevoegen.php';


if (isset($_POST['sumbit'])) {

    require 'databasetoevoegen.php';
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];
    $wachtwoordherhaal = $_POST['wachtwoord-repeat'];
    $email = $_POST['emailadres'];

    if (empty($_POST['gebruikersnaam']) || empty($_POST['wachtwoord']) || empty($_POST['wachtwoord-repeat']) || empty($_POST['emailadres'])) {
        header("Location: signup.php?1=misveld&2=".$gebruikersnaam."&3=".$wachtwoord."&4=".$wachtwoordherhaal."&5=".$email);

    } elseif ($_POST['wachtwoord'] !== $_POST['wachtwoord-repeat']) {
        header("Location: signup.php?1=wwnietgoed&2=".$gebruikersnaam."&3=".$wachtwoord."&4="."&5=".$email);

    } elseif (!filter_var($_POST['emailadres'], FILTER_VALIDATE_EMAIL)) {
        print("je emailadres is niet geldig!");

    } elseif (!preg_match("/^[a-z 0-9 @ ]*$/", $_POST['gebruikersnaam'])) {

        print("je mag geen symbolen gebruiken bij je gebruikersnaam");


    }
}








