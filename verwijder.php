<?php
// 1. Verbinding maken met de database (vervang met jouw eigen gegevens)
$host = "192.168.6.40";
$user = "team6";
$pass = "@VoetenBadje2026!";
$db   = "userstory_CRM";

$conn = new mysqli($host, $user, $pass, $db);

// Controleer verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// 2. Controleren of het ID is meegestuurd via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Employee_ID'])) {
    
    // Veiligheid: zet de input om naar een heel getal (integer) om SQL-injection te voorkomen
    $employee_id = intval($_POST['Employee_ID']);

    // 3. De SQL DELETE query voorbereiden (pas 'medewerkers' en 'id' aan naar jouw tabelnaam)
    $sql = "DELETE FROM medewerkers WHERE id = ?";

    // Gebruik Prepared Statements voor de veiligheid
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $employee_id);
        
        if ($stmt->execute()) {
            // Succes! Stuur de gebruiker terug naar de hoofdpagina
            header("Location: index.php?status=verwijderd");
            exit();
        } else {
            echo "Er is iets fout gegaan bij het verwijderen: " . $conn->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>