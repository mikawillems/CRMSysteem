<?php
session_start();
// 1. Start altijd eerst de sessie om toegang te krijgen tot $_SESSION
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Veiligheidscheck: als er niemand is ingelogd, stuur ze terug naar de homepagina
if (!isset($_SESSION['role'])) {
    header('Location: index.php');
    exit();
}

// 2. Laden van de database variabelen via Dotenv
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$Servername = $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'];
$Username = $_ENV['DB_USERNAME'];
$Password = $_ENV['DB_PASSWORD'];
$Dbname = $_ENV['DB_NAME'];

// 3. Verbinding maken met mysqli
$conn = new mysqli($Servername, $Username, $Password, $Dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 4. Query specifiek voor Werkzaamheden
$sql = "SELECT 
            `ID`, 
            `Opdracht_ID`, 
            `Worker_ID`, 
            `Worked_hours`
        FROM `work`";

$result = $conn->query($sql);

if (!$result) {
    die("SQL-fout: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Werkzaamheden</title>
    <link rel="stylesheet" href="stylesheet.css">

</head>

<body>

    <!-- Navigatie - consistent met alle andere pagina's -->
    <?php include 'navbar.php' ?>

    <div class="container">
        <div class="title-row">
            <h1>Werkzaamheden</h1>

            <button id="openModalBtn">Werkzaamheid toevoegen</button>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close-btn" id="closeModalBtn">&times;</span>
                    <h3>Nieuwe werkzaamheid</h3>

                    <form action="voegtoe.php" method="POST">

                        <label for="name">Opdracht-ID:</label>
                        <input type="text" id="name" name="Opdracht_ID" required placeholder="Typ opdracht-ID...">
                        <br><label for="name">Werknemer-ID:</label>
                        <input type="text" id="name" name="Worker_ID" required placeholder="Typ werknemer-ID...">
                        <br><label for="name">Gewerkte uren:</label>
                        <input type="text" id="name" name="Worked_hours" required placeholder="Typ gewerkte uren...">

                        <br><button class="opslaanbutton" type="submit">Opslaan</button>
                    </form>
                </div>
            </div>

            <script>
                // JavaScript om de pop-up te besturen
                const modal = document.getElementById("myModal");
                const openBtn = document.getElementById("openModalBtn");
                const closeBtn = document.getElementById("closeModalBtn");

                // Open de pop-up als je op de hoofdknop klikt
                openBtn.onclick = function () {
                    modal.style.display = "block";
                }

                // Sluit de pop-up als je op het kruisje klikt
                closeBtn.onclick = function () {
                    modal.style.display = "none";
                }

                // Sluit de pop-up ook als je ergens buiten de pop-up box klikt
                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
            <button class="werkzaamheidbewerken"> Werkzaamheid bewerken</button>
            <button class="werkzaamheidverwijderen"> Werkzaamheid verwijderen</button>





            
            
            <button class="pdf-btn" onclick="window.print()">🖨️ Als PDF opslaan</button>
            <div class="searchbar">
                <input type="text" id="search" placeholder="zoeken..."> 🔍
            </div>
        </div>

        <div class="table-container">
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Opdracht-ID</th>
                        <th>Werknemer-ID</th>
                        <th>Gewerkte uren</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Opdracht_ID']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Worker_ID']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Worked_hours']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Geen werkzaamheden gevonden</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    </div>

    <script>
        // Zoekfunctie
        document.getElementById("search").addEventListener("input", function () {
            const val = this.value.toLowerCase();
            const rows = document.querySelectorAll("#dataTable tbody tr");

            rows.forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(val) ? "" : "none";
            });
        });
    </script>

</body>

</html>

<?php
$conn->close();
?>