<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$Servername = $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'];
$Username   = $_ENV['DB_USERNAME'];
$Password   = $_ENV['DB_PASSWORD'];
$Dbname     = $_ENV['DB_NAME'];

$conn = new mysqli($Servername, $Username, $Password, $Dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// === GEVONDEN SQL-FOUT: trailing comma verwijderd ===
$sql = "SELECT
            `ID`,
            `Customer_ID`,
            `Titel`,
            `Description`,
            `Aplication_date`,
            `Needed_knowledge`
        FROM `assignments`";     // ← hier stond een komma te veel


$result = $conn->query($sql);

if (!$result) {
    die("SQL-fout: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>

<link rel="stylesheet" href="stylesheet.css">

</head>
<body>

    <!-- Navigatie - consistent met alle andere pagina's -->
    <?php include 'navbar.php' ?>

<div class="container">
    <div class="title-row">
        <h1>Opdrachten</h1>
        <button class="pdf-btn" onclick="window.print()">🖨️ Als PDF opslaan</button>
        <div class="searchbar">
            <input type="text" id="search" placeholder="zoeken..."> 🔍
        </div>
    </div>

    <table id="dataTable">
        <tr>
            <th>ID</th>
            <th>Klant-ID</th>
            <th>Titel</th>
            <th>Omschrijving</th>
            <th>Aanvraag datum</th>
            <th>Benodigde kennis</th>
        </tr>

        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['ID']}</td>";
                echo "<td>{$row['Customer_ID']}</td>";
                echo "<td>{$row['Titel']}</td>";
                echo "<td>{$row['Description']}</td>";
                echo "<td>{$row['Aplication_date']}</td>";
                echo "<td>{$row['Needed_knowledge']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Geen opdrachten gevonden</td></tr>";
        }
        ?>
    </table>
</div>

<script>
// Zoekfunctie
document.getElementById("search").addEventListener("input", function () {
    const val = this.value.toLowerCase();
    document.querySelectorAll("#dataTable tr").forEach((row, i) => {
        if (i === 0) return; // header overslaan
        row.style.display = row.textContent.toLowerCase().includes(val) ? "" : "none";
    });
});
</script>

</body>
</html>

<?php $conn->close(); ?>