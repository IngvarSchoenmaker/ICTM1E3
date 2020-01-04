<?php
ob_start();
include '../incl/header.php';
// destroyed de sessie
session_destroy();

header("Location: ../Pages/index.php ");
ob_end_flush();
?>