<?php
ob_start();
include '../incl/header.php';

session_destroy();

header("Location: ../Pages/index.php ");
ob_end_flush();
?>