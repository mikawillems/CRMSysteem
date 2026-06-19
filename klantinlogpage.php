<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <title>Home - Urenregistratie Systeem</title>
</head>

<body>

    <!-- Navigatie - consistent met alle andere pagina's -->
    <?php include 'navbar.php' ?>

    <div class="container">

        <h1>Inloggen in het CRM-Systeem als: Klant</h1><br>

        <form action="inlog.php" method="POST">
            <div class="input-group">
                <label for="username">Gebruikersnaam:</label><br>
                <input type="text" id="username" name="ingevoerde_gebruiker" required>
            </div>

            <div class="input-group">
                <label for="password">Wachtwoord:</label><br>
                <input type="password" id="password" name="ingevoerd_wachtwoord" required>
            </div>

            <br><button class="inlogbutton" type="submit">Inloggen</button><br><br>
        </form>


        <?php include 'loginbuttons.php' ?>

    </div>



    </div>
    </div>

    </div>

    <script>
        // Login popup functies
        function openLogin() {
            document.getElementById("loginPopup").style.display = "flex";
        }

        function closeLogin() {
            document.getElementById("loginPopup").style.display = "none";
        }

        // Simpele login-demo (je kunt dit later vervangen door echte authenticatie)
        function attemptLogin() {
            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();

            if (username && password) {
                alert("✅ Ingelogd als: " + username + "\n\n(Deze demo-logic kun je later vervangen door een echte PHP-sessie/login-systeem)");
                closeLogin();
                // Hier kun je later window.location = "medewerkers.php"; zetten als je direct wilt doorsturen
            } else {
                alert("Vul zowel username als wachtwoord in.");
            }
        }
    </script>

</body>

</html>