<?php
require '../incl/db.php';

$wachtwoord = 'zackaria';

$encrypted = (password_hash($wachtwoord, PASSWORD_DEFAULT));

if (password_verify($wachtwoord, $encrypted)) {

    print("je wachtwoord komt overeen!");


} else {

    print("komt niet overeen!");

}
