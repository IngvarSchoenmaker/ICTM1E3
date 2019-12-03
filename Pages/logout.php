<?php
include '../incl/header.php';

session_destroy();

header("Location: ../Pages/index.php");
?>