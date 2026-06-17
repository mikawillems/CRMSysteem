<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Home - Urenregistratie Systeem</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #8e72ae;
        }

        /* Navigatie - exact hetzelfde als de andere pagina's */
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

        .container {
            background: #faf0ff;
            margin: 40px auto;
            width: 80%;
            padding: 40px 30px;
            border-radius: 20px;
            border: 4px solid #000000;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);

        }

        h1 {
            margin: 0;
            font-size: 32px;
            color: #000000;
            text-align: center;
        }

        h2 {
            margin-top: 30px;
            font-size: 20px;
            color: #8e72ae;
            text-align: center;
        }


        /* Login popup styling (aangepast aan hetzelfde kleurenschema) */
        .popup {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(182, 132, 159, 0.85);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background: #faf0ff;
            padding: 30px 35px;
            border-radius: 20px;
            border: 4px solid #000000;
            width: 420px;
            text-align: left;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .close {
            position: absolute;
            top: 12px;
            right: 20px;
            font-size: 32px;
            font-weight: bold;
            color: #000000;
            cursor: pointer;
            line-height: 1;
        }

        .login-field {
            margin-bottom: 20px;
        }

        .login-field label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #8e72ae;
        }

        .login-field input {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid #000000;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .login-btn {
            background: #8e72ae;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            margin-top: 10px;
        }


        .nav-actions {
            position: absolute;
            right: 40px;
            top: 18px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .login-trigger {
            background: #8e72ae;
            color: white;
            padding: 8px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;

        }

        .login-trigger:hover {
            background: #786194
        }

        .login-btn:hover {
            background: #786194;
        }
    </style>
</head>

<body>

    <!-- Navigatie - consistent met alle andere pagina's -->
        <?php include 'navbar.php' ?>

    <div class="container">

        <h1>Welkom in het Urenregistratie Systeem</h1>

        <div class="content">
            <h2> Zoek, bekijk en beheer eenvoudig gegevens.<br>
                Zoek snel informatie op via de zoekfunctie of navigeer via het menu.</h2>

        </div>

        <!-- Login popup (uit jouw code, volledig werkend en in hetzelfde design) -->
        <div id="loginPopup" class="popup">
            <div class="popup-content">
                <span onclick="closeLogin()" class="close">&times;</span>

                <button class="login-btn" onclick="attemptLogin()">log in als Klant</button>
                <button class="login-btn" onclick="attemptLogin()">log in als Medewerker</button>
                <button class="login-btn" onclick="attemptLogin()">log in als Leidinggevende</button>
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