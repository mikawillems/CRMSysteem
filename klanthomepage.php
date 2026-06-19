<?php
// 1. Start de sessie altijd als allereerste
session_start();

// 2. Controleer of autoload.php wel echt bestaat voordat we het inladen
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
    
    if (class_exists('Dotenv\Dotenv')) {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }
} else {
    echo "Fout: vendor/autoload.php niet gevonden. Run 'composer install' of controleer de map.";
}

// DE REDIRECTS ZIJN HIER NU WEGGEHAALD OM DE LOOP TE BREKEN!
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Home - Urenregistratie Systeem</title>
    <link rel="stylesheet" href="stylesheet.css">
    
</head>

<body>

    <!-- Navigatie - consistent met alle andere pagina's -->
    <?php include 'navbar.php' ?>

    <div class="container">

        <h1>Je bent ingelogd als klant</h1>

        <div class="content">
            <h2> Hier kun je opdrachten of werkzaamheden bekijken</h2>

        </div>



                <!-- Login buttons voor klant, medewerker, leidinggevende -->
                <?php include 'loginbuttons.php' ?>
            </div>
        </div>

    </div>

    <script>
   
    </script>

</body>

</html>