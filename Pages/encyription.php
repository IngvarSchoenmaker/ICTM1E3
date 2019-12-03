<?php
require '../incl/db.php';

$wachtwoord = 'zackaria';

$encrypted = (password_hash($wachtwoord, CRYPT_MD5));

if (password_verify($wachtwoord, $encrypted)) {

    print("je wachtwoord komt overeen!");


} else {

    print("komt niet overeen!");

}
