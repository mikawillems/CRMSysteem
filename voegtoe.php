<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hier pas je variabelen ophalen, bijv:
    $id = $_POST['ID'];
    // ... de rest van je code ...
}
// 1. Verbinding maken met de database
$host = '192.168.6.40';
$db   = 'userstory_CRM';
$user = 'team6';
$pass = '@VoetenBadje2026!';
$charset = 'utf8mb4';


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// 2. Controleren of het formulier is ingestuurd
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Gegevens ophalen uit het formulier (de 'name' attributen uit je HTML)
    $ID = $_POST['ID'];
    $voornaam = $_POST['First_name'];
    $tussenvoegsel = $_POST['Name_prefix'];
    $achternaam = $_POST['Last_name'];
    $geboortedatum = $_POST['Date_of_birth'];
    $werkmail = $_POST['Work_E-mail'];
    $vestiging = $_POST['Location/Branch'];

    // 3. SQL Query voorbereiden (veilig tegen SQL-injection dankzij prepared statements)
    $sql = "INSERT INTO medewerkers (naam, tussenvoegsel, achternaam, geboortedatum, werkmail, vestiging) 
            VALUES (:naam, :tussenvoegsel, :achternaam, :geboortedatum, :werkmail, :vestiging)";
    
    $stmt = $pdo->prepare($sql);
    
    // 4. De data daadwerkelijk uitvoeren
    $succes = $stmt->execute([
        ':naam' => $naam,
        ':tussenvoegsel' => $tussenvoegsel,
        ':achternaam' => $achternaam,
        ':geboortedatum' => $geboortedatum,
        ':werkmail' => $werkmail,
        ':vestiging' => $vestiging
    ]);

    if ($succes) {
        // Als het is gelukt, stuur de gebruiker terug naar de hoofdpagina
        header("Location: index.php?status=succes");
        exit;
    } else {
        echo "Er is iets fout gegaan bij het opslaan.";
    }
}
?>