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
            `E-mail`,
            `Phone_number`,
            `Address`,
            `Postal_code`,
            `Land`
        FROM `customers`";

$result = $conn->query($sql);

if (!$result) {
    die("SQL-fout: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <title>Klanten</title>


</head>

<body>

    <!-- Navigatie - consistent met alle andere pagina's -->
    <?php include 'navbar.php' ?>


    </nav>

    
    <div class="container">

        <div class="title-row">
            <h1><span class="title-icon"></span> Klanten</h1>

            <button class="werkgevertoevoegen"> Klant toevoegen</button>
            <button class="werkgeverbewerken"> Klant bewerken</button>
            <button class="werkgeververwijderen"> Klant verwijderen</button> 
            <button class="pdf-btn" onclick="window.print()">🖨️ Als PDF opslaan</button>

            <div class="searchbar">
                <input type="text" placeholder="zoeken...">
                🔍
            </div>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Achternaam</th>
                <th>E-mail</th>
                <th>Telefoonnummer</th>
                <th>Adres</th>
                <th>Postcode</th>
                <th>Land</th>
            </tr>
        </table>

        <table>

            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['First_name'] . "</td>";
                    echo "<td>" . $row['Name_prefix'] . "</td>";
                    echo "<td>" . $row['Last_name'] . "</td>";
                    echo "<td>" . $row['E-mail'] . "</td>";
                    echo "<td>" . $row['Phone_number'] . "</td>";
                    echo "<td>" . $row['Address'] . "</td>";
                    echo "<td>" . $row['Postal_code'] . "</td>";
                    echo "<td>" . $row['Land'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Geen gegevens gevonden</td></tr>";
            }
            ?>

        </table>
    </div>
    <script>
        // Zoekfunctie
        const searchInput = document.querySelector('.searchbar input');
        const tableRows = document.querySelectorAll('table tbody tr');

        searchInput.addEventListener('input', function () {
            const query = this.value.toLowerCase();
            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                row.style.display = rowText.includes(query) ? '' : 'none';
            });
        });
    </script>
</body>

</html>

<?php $conn->close(); ?>