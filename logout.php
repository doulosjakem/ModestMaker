<?php
session_start();
$userLoggedIn = false;
session_unset();
unset($_SESSION["username"]);
header("Location: ./index.php");
?>
<a href="./index.php">Back Home</a>