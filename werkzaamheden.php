<?php
// 1. Laden van de database variabelen via Dotenv
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$Servername = $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'];
$Username = $_ENV['DB_USERNAME'];
$Password = $_ENV['DB_PASSWORD'];
$Dbname = $_ENV['DB_NAME'];

// 2. Verbinding maken met mysqli
$conn = new mysqli($Servername, $Username, $Password, $Dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Query specifiek voor Werkzaamheden
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* ACHTERGROND & BASIS */
        body {
            margin: 0;
            padding: 0;
            background-color: #8e72ae;
            background-attachment: fixed;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        nav {
            background: #faf0ff;
            padding: 20px;
            display: flex;
            justify-content: center;
            border-bottom: 3px solid #000000;
        }

        nav .links a {
            margin: 0;
            padding-right: 15px;
            padding-left: 15px;
            color: #000;
            font-weight: bold;
            text-decoration: none;
            border-right: 2px solid #000000;
        }

        nav .links a:last-child {
            border-right: none;
        }

        /* DE WITTE KAART */
        .container-main {
            display: flex;
            justify-content: center;
            padding: 40px 0;
        }

        .main-card {
            background-color: #faf0ff;
            width: 90%;
            max-width: 1100px;
            border-radius: 40px;
            border: 4px solid #000000;
            padding: 20px;
        }

        /* HEADER RIJ */
        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 8px;
        }

        h1 {
            margin: 0;
            font-size: 30px;
            display: flex;
            align-items: center;
            font-weight: bold;
        }

        /* ZOEKBALK */
        .searchbar {
            background: white;
            border-radius: 20px;
            padding: 5px 10px;
            border: 2px solid #000000;
            display: flex;
            align-items: center;
        }

        .searchbar input {
            border: none;
            outline: none;
            background: transparent;
            font-size: 15px;
        }

        /* PDF knop */
        .pdf-btn {
            background: #8e72ae;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .pdf-btn:hover {
            background: #786194;
        }

        /* TABEL STIJL */
        .table-container {
            background: #faf0ff;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            position: sticky;
            top: 0;
            background: #d0bbda !important;
            z-index: 2;
            padding: 10px;
            border-bottom: 3px solid #000000;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #000000;
        }

        table tr:hover {
            background: #f0e2f7;
        }

        /* PRINT SETTINGS */
        @media print {

            nav,
            .searchbar,
            .pdf-btn {
                display: none !important;
            }

            body {
                background: white !important;
            }

            .main-card {
                border: none;
                width: 100%;
                box-shadow: none;
                padding: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Navigatie - consistent met alle andere pagina's -->
    <?php include 'navbar.php' ?>

    <div class="container-main">
        <div class="main-card">

            <div class="header-row no-print">
                <h1>Werkzaamheden</h1>

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