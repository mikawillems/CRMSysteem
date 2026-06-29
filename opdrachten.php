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
            `Customer_ID`, 
            `Titel`, 
            `Description`,
            `Aplication_date`,
            `Needed_knowledge`
        FROM `assignments`";

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

            <button id="openModalBtn">Opdracht toevoegen</button>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close-btn" id="closeModalBtn">&times;</span>
                    <h3>Nieuwe opdracht</h3>

                    <form action="voegtoe.php" method="POST">

                        <label for="name">Klant-ID:</label>
                        <input type="text" id="name" name="Customer_ID" required placeholder="Typ klant-ID...">
                        <br><label for="name">Titel:</label>
                        <input type="text" id="name" name="Titel" required placeholder="Typ titel...">
                        <br><label for="name">Omschrijving:</label>
                        <input type="text" id="name" name="Description" required placeholder="Typ omschrijving...">
                        <br><label for="date">Aanvraag datum:</label>
                        <input type="date" id="name" name="Aplication_date" <br><label for="mail">Benodigde
                            kennis:</label>
                        <input type="text" id="name" name="Needed_knowledge" required
                            placeholder="Typ benodigde kennis...">

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
            
<button id="openDeleteModalBtn" data-id="12">Opdracht verwijderen</button>

            <div id="deleteModal" class="modal">
                <div class="modal-content">
                    <span class="close-btn" id="closeDeleteModalBtn">&times;</span>

                    <h3>Opdracht Verwijderen</h3>
                    <br><label for="location">ID van opdracht:</label>
                    <input type="text" id="name" name="ID" required placeholder="Typ ID..">

                    <p>Weet je zeker dat je deze opdracht wilt verwijderen?</p>

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
                <th>Klant-ID</th>
                <th>Titel</th>
                <th>Omschrijving</th>
                <th>Aanvraag datum</th>
                <th>Benodigde kennis</th>
                <th>&nbsp;</th>
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
                    echo "<td><button data-id=\"{$row['ID']}\" class=\"facturen\">factuur</button></td>";
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

        const factuurButtons = document.querySelectorAll(".facturen");
        if (factuurButtons && factuurButtons.length > 0) {
            factuurButtons.forEach(function (btn) {
                btn.addEventListener("click", (e) => {
                    console.log("clicked button", btn)
                    const opdrachtId = btn.dataset.id;
                    window.location.href = "factuur.php?opdrachtid=" + opdrachtId;


                })
            })
        }


    </script>
    <script src="editmode.js"></script>
</body>

</html>

<?php $conn->close(); ?>