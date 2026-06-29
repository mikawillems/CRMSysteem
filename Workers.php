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
// SQL voor medewerkers-tabel (zonder Afdeling)
$sql = "SELECT
            `ID`,
            `First_name`,
            `Name_prefix`,
            `Last_name`,
            `Date_of_birth`,
            `Work-E-mail`,
            `Office-number`
        FROM `workers`";
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
    <title>Medewerkers</title>

</head>

<body>

    <!-- Navigatie - consistent met alle andere pagina's -->
    <?php include 'navbar.php' ?>
    </div>

    <div class="container">
        <div class="title-row">
            <h1>Werknemers</h1>

            <button id="openModalBtn">Werknemer toevoegen</button>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close-btn" id="closeModalBtn">&times;</span>
                    <h3>Nieuwe Werknemer</h3>

                    <form action="voegtoe.php" method="POST">

                        <label for="name">Voornaam:</label>
                        <input type="text" id="name" name="First_name" required placeholder="Typ voornaam...">
                        <br><label for="name">Tussenvoegsel:</label>
                        <input type="text" id="name" name="Name_prefix" required placeholder="Typ tussenvoegsel...">
                        <br><label for="name">Achternaam:</label>
                        <input type="text" id="name" name="Last_name" required placeholder="Typ achternaam...">
                        <br><label for="date">Geboortedatum:</label>
                        <input type="date" id="name" name="Date_of_birth" <br><label for="mail">Werkmail:</label>
                        <input type="text" id="name" name="Work_E-mail" required placeholder="Typ werkmail...">
                        <br><label for="location">Kantoornummer:</label>
                        <input type="text" id="name" name="Location/Branch" required placeholder="Typ Kantoornummer...">

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

            <button id="toggleEditBtn" onclick="toggleEditMode()">Tabel bewerken</button> 
            <button id="openDeleteModalBtn" data-id="12">Werknemer verwijderen</button>

            <div id="deleteModal" class="modal">
                <div class="modal-content">
                    <span class="close-btn" id="closeDeleteModalBtn">&times;</span>

                    <h3>Werknemer Verwijderen</h3>
                    <br><label for="location">ID van werknemer:</label>
                    <input type="text" id="name" name="ID" required placeholder="Typ ID..">

                    <p>Weet je zeker dat je deze werknemer wilt verwijderen?</p>

                    <form action="verwijder.php" method="POST">
                        <input type="hidden" id="delete_employee_id" name="Employee_ID" value="">

                        <button class="opslaanbutton" style="background-color: #00365e;" type="submit">Ja,
                            Verwijderen</button>
                        <button type="button" id="cancelDeleteBtn">Annuleren</button>
                    </form>
                </div>
            </div>

            <script>
                // JavaScript voor de Verwijder Modal
                const deleteModal = document.getElementById("deleteModal");
                const openDeleteBtn = document.getElementById("openDeleteModalBtn");
                const closeDeleteBtn = document.getElementById("closeDeleteModalBtn");
                const cancelDeleteBtn = document.getElementById("cancelDeleteBtn");
                const deleteInput = document.getElementById("delete_employee_id");

                // Open de modal en stop het juiste ID in het verborgen formulier-veld
                openDeleteBtn.onclick = function () {
                    // Haal het ID op uit het 'data-id' attribuut van de knop
                    const employeeId = this.getAttribute("data-id");
                    deleteInput.value = employeeId;

                    deleteModal.style.display = "block";
                }

                // Sluit de modal bij het kruisje
                closeDeleteBtn.onclick = function () {
                    deleteModal.style.display = "none";
                }

                // Sluit de modal bij de 'Annuleren' knop
                cancelDeleteBtn.onclick = function () {
                    deleteModal.style.display = "none";
                }

                // Sluit de modal als je buiten de box klikt (gecombineerd met je vorige code)
                window.addEventListener('click', function (event) {
                    if (event.target == deleteModal) {
                        deleteModal.style.display = "none";
                    }
                });
            </script>
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
                <th>Geboortedatum</th>
                <th>Werk e-mail</th>
                <th>Kantoornummer</th>
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
                    echo "<td>{$row['Work-E-mail']}</td>";
                    echo "<td>{$row['Office-number']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Geen medewerkers gevonden</td></tr>";
            }
            ?>
        </table>
    </div>
    <script>
        // Zoekfunctie (werkt op alle kolommen)
        document.getElementById("search").addEventListener("input", function () {
            const val = this.value.toLowerCase();
            document.querySelectorAll("#dataTable tr").forEach((row, i) => {
                if (i === 0) return; // header overslaan
                row.style.display = row.textContent.toLowerCase().includes(val) ? "" : "none";
            });
        });
    </script>
    <script src="editmode.js"></script>
</body>

</html>
<?php $conn->close(); ?>