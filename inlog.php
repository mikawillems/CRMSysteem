<?php
// 1. ALWAYS start the session first
session_start();

// Remove the two lines that were here at the very top trying to set $_SESSION blindly.

// ==========================================
// 1. DB-INSTELLINGEN
// ==========================================
$host = '192.168.6.40';
$db = 'userstory_CRM';
$user = 'team6';
$pass = '@VoetenBadje2026!';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    die("Database verbinding mislukt: " . $e->getMessage());
}

// ==========================================
// 2. INLOGGEN VERWERKEN
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // FIX: Match the 'name' attributes from your HTML form
    $ingevoerde_gebruiker = $_POST['ingevoerde_gebruiker'];
    $ingevoerd_wachtwoord = $_POST['ingevoerd_wachtwoord'];

    $stmt = $pdo->prepare('SELECT * FROM inlog WHERE username = :username');
    $stmt->execute(['username' => $ingevoerde_gebruiker]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Controleren of gebruiker bestaat en wachtwoord exact matcht
    if ($user && $ingevoerd_wachtwoord === $user['wachtwoord']) {

        // FIX: Grab the role from the $user array returned by the database
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; // Changed from $role['role'] to $user['role']

        // =========================================================================
        // 3. DE REDIRECT-LOGICA
        // =========================================================================
        if ($_SESSION['role'] === 'werknemer') {

            //echo 'werknemer';
            header('Location: medewerkerinlogpage.php'); 
            exit();
        } elseif ($_SESSION['role'] === 'leidinggevende') {
            //echo 'leidinggevende';
            header('Location: leidinggevendeinlogpage.php');
            exit();
        } elseif ($_SESSION['role'] === 'klant') {
            //echo 'klant';
            header('Location: klantinlogpage.php');
            exit();
        } else {
            echo "Fout: Er is een rol gevonden ('" . htmlspecialchars($_SESSION['role']) . "') die het systeem niet herkent.";
        }

    } else {
        echo "<script>alert('Onjuiste gebruikersnaam of wachtwoord!'); window.history.back();</script>";
    }
}
?>