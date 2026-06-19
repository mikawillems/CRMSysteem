<?php
session_start();
// Maak alle sessievariabelen leeg
$_SESSION = array();

// Vernietig de sessie volledig
session_destroy();

// Stuur de gebruiker terug naar de index/homepagina
header("Location: index.php");
exit();
?>