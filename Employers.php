<?php

if (!$_SESSION['role'] || $_SESSION['role'] === 'klant')
    header('location: index.php');
exit;

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

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #8e72ae;


        }

        /* Navigatiebalk */
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

        /* Zoekveld */
        .searchbar {
            background: white;
            border-radius: 20px;
            padding: 5px 10px;
            border: 2px solid #000000;
            display: flex;
            align-items: center;
            margin: 8px;
        }

        .searchbar input {
            border: none;
            outline: none;
            font-size: 15px;
            padding-left: 5px;
            background: transparent;
        }

        /* Container */
        .container {
            background: #faf0ff;
            margin: 40px auto;
            width: 80%;
            padding: 30px;
            border-radius: 20px;
            border: 4px solid #000000;
        }

        /* Titel + icoon */
        .title-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .title-icon {
            font-size: 35px;
            margin-right: 10px;
        }

        h1 {
            margin: 0;
            font-size: 30px;
            display: flex;
            align-items: center;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
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
            padding: 10px;
            border-bottom: 1px solid #000000;
        }

        table tr:hover {
            background: #f0e2f7;
        }

        @media print {

            /* Verberg elementen die niet in PDF moeten komen */
            nav,
            .searchbar {
                display: none !important;
            }

            /* Zorg dat de container mooi blijft */
            .container {
                margin: 0;
                width: 100%;
                box-shadow: none;
                border: none;
                padding: 0;
            }

            /* Fix tabel-borders & spacing in PDF */
            table {
                border-collapse: collapse !important;
                width: 100% !important;
            }

            table th {
                background: #000000 !important;
                -webkit-print-color-adjust: exact;
                border-bottom: 2px solid #000000 !important;
                position: static !important;
                /* <— Belangrijk: sticky uitschakelen in print */
            }

            table td {
                border-bottom: 1px solid #000000 !important;
            }

            /* Pagina-vulling verminderen */
            body {
                margin: 10px;
                background: white !important;
            }
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
            /* donkerder rood */
        }

        ``
    </style>

</head>

<body>

    <!-- Navigatie -->
    <nav>
        <div class="links">
            <a href="index.php">Home</a>
            <?php if ($_SESSION['role']) { ?><a href="Employers.php">Werkgevers</a> <?php } ?>
            <a href="Workers.php">Werknemers</a>
            <a href="klanten.php">Klanten</a>
            <a href="opdrachten.php">Opdrachten</a>
            <a href="werkzaamheden.php">Werkzaamheden</a>
        </div>
    </nav>

    <div class="container">

        <div class="title-row">
            <h1>Werkgevers</h1>

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
            
            <!-- Login popup (uit jouw code, volledig werkend en in hetzelfde design) -->
            <div id="loginPopup" class="popup">
                <div class="popup-content">
                    <span onclick="closeLogin()" class="close">&times;</span>


                    <!-- Login buttons voor klant, medewerker, leidinggevende -->
                    <?php include 'loginbuttons.php' ?>
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