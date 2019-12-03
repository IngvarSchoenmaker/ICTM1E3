<?php

//$tel = 06-34045890;
//
//
//if(!preg_match("/^[0-9]{2}-[0-9]{8}$/", $tel)) {
//    print("Nummer is niet goed!");
//
//} else {
//    Print("Nummer is goed!");
//
//}


$Wachtwoord = "hammou12";

$Wachtwoord = password_hash($Wachtwoord, CRYPT_SHA256);

print($Wachtwoord);