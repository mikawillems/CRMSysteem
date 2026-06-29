<?php
// get_werkgever.php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$conn = new mysqli($_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT First_name, Last_name, `Location/Branch` FROM `employer` WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode([
            'voornaam' => $row['First_name'],
            'achternaam' => $row['Last_name'],
            'locatie' => $row['Location/Branch']
        ]);
    } else {
        echo json_encode(['error' => 'Niet gevonden']);
    }
    $stmt->close();
}
$conn->close();
?>