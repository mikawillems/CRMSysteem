<?php
session_start(); // Cruciaal om de sessie te laden!

require __DIR__ . '/vendor/autoload.php'; // Zorg dat de autoloader er staat voor Dotenv

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$Servername = $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'];
$Username = $_ENV['DB_USERNAME'];
$Password = $_ENV['DB_PASSWORD'];
$Dbname = $_ENV['DB_NAME'];

$conn = new mysqli($Servername, $Username, $Password, $Dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT
            `ID`,
            `First_name`,
            `Name_prefix`,
            `Last_name`,
            `Date_of_birth`,
            `Work_E-mail`,
            `Location/Branch`
        FROM `employer`";

$result = $conn->query($sql);

if (!$result) {
    die("SQL-fout: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Werkgevers</title>


    <link rel="stylesheet" href="stylesheet.css">

</head>

<body>

    <!-- Navigatie - consistent met alle andere pagina's -->
    <?php include 'navbar.php' ?>

    <div class="container">

        <div class="title-row">
            <h1>Werkgevers</h1>


            <button class="werkgevertoevoegen"> Medewerker toevoegen</button>
            <button class="werkgeverbewerken"> Medewerker bewerken</button>
            <button class="werkgeververwijderen"> Medewerker verwijderen</button>
            <button class="pdf-btn" onclick="window.print()">🖨️ Als PDF opslaan</button>

            <div class="searchbar">
                <input type="text" id="search" placeholder="zoeken..."> 🔍
            </div>

        </div>

        <table id="dataTable">
            <tr>
                <th>ID</th>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Achternaam</th>
                <th>Geboorte datum</th>
                <th>Werk mail</th>
                <th>Vestiging</th>
            </tr>

            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['ID']}</td>";
                    echo "<td>{$row['First_name']}</td>";
                    echo "<td>{$row['Name_prefix']}</td>";
                    echo "<td>{$row['Last_name']}</td>";
                    echo "<td>{$row['Date_of_birth']}</td>";
                    echo "<td>{$row['Work_E-mail']}</td>";
                    echo "<td>{$row['Location/Branch']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Geen werkgevers gevonden</td></tr>";
            }
            ?>
        </table>

    </div>

    <script>
        // Zoekfunctie
        document.getElementById("search").addEventListener("input", function () {
            const val = this.value.toLowerCase();
            document.querySelectorAll("#dataTable tr").forEach((row, i) => {
                if (i === 0) return;
                row.style.display = row.textContent.toLowerCase().includes(val) ? "" : "none";
            });
        });
    </script>

</body>

</html>

<?php $conn->close(); ?>