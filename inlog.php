<?php
session_start();

// ==========================================
// 1. DB-INSTELLINGEN: VUL HIER JOUW GEGEVENS IN
// ==========================================

// !!! VUL HIER JE HOST IN (meestal 'localhost') !!!
$host = 'localhost'; 

// !!! VUL HIER DE NAAM VAN JOUW DATABASE IN (bijv. 'crm_systeem') !!!
$db   = 'userstory_CRM'; 

// !!! VUL HIER JE DATABASE GEBRUIKERSNAAM IN (bijv. 'root') !!!
$user = 'team6'; 

// !!! VUL HIER JE DATABASE WACHTWOORD IN (bij MAMP/XAMPP vaak leeg '' of 'root') !!!
$pass = '@VoetenBadje2026!'; 

$charset = 'utf8mb4';

// Verbinding maken met de database
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
     $pdo = new PDO($dsn, $user, $pass);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
     die("Database verbinding mislukt: " . $e->getMessage());
}

// ==========================================
// 2. INLOGGEN VERWERKEN
// ==========================================

// Controleren of het formulier is verstuurd
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ingevoerde_gebruiker = $_POST['username'];
    $ingevoerd_wachtwoord = $_POST['password'];

    // !!! VERANDER 'HIER_JE_TABELNAAM_INVULLEN' NAAR DE NAAM VAN JE INLOGTABEL !!!
    $stmt = $pdo->prepare('SELECT * FROM inlog WHERE username = :username');
    
    $stmt->execute(['username' => $ingevoerde_gebruiker]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Controleren of gebruiker bestaat en wachtwoord exact matcht
    if ($user && $ingevoerd_wachtwoord === $user['wachtwoord']) {
        
        // Sessie variabelen aanmaken (de server onthoudt nu wie er is ingelogd)
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // =========================================================================
        // 3. DE REDIRECT-LOGICA (DOORSTUREN OP BASIS VAN DE ROL)
        // =========================================================================
        
        if ($_SESSION['role'] === 'werknemer') {
            
            // HOE DIT WERKT: Als de database zegt dat de rol 'werknemer' is (zoals bij JanBakker), 
            // stuurt de server de browser door naar de pagina tussen de haakjes.
            //
            // HOE JE DIT VERANDERT: Als jouw pagina voor werknemers 'urenregistratie.php' heet,
            // dan verander je 'uren-schrijven.php' hieronder naar 'urenregistratie.php'.
            header('Location: uren-schrijven.php'); 
            exit(); // Stopt het script direct, zodat de rest van de code niet stiekem laadt.

        } elseif ($_SESSION['role'] === 'leidinggevende') {
            
            // HOE DIT WERKT: Als de rol 'leidinggevende' is (zoals bij BeatriceFinch),
            // wordt deze pagina geopend. Hier staat normaal het grote beheer-dashboard.
            //
            // HOE JE DIT VERANDERT: Als jouw beheerpagina bijvoorbeeld 'admin.php' of 'management.php' heet,
            // vervang dan 'dashboard-beheer.php' hieronder door jouw eigen bestandsnaam.
            header('Location: dashboard-beheer.php'); 
            exit(); // Belangrijk voor de beveiliging: stop de verdere uitvoering.

        } elseif ($_SESSION['role'] === 'klant') {
            
            // HOE DIT WERKT: Als de rol 'klant' is (zoals bij ThomasDeBoer), wordt de klant doorgestuurd.
            // Volgens jouw acceptatiecriteria hoeven klanten nu niks in te zien, maar mocht je dit
            // later willen uitbreiden, dan staat de logica er alvast in.
            //
            // HOE JE DIT VERANDERT: Vervang 'klant-pagina.php' door het bestand dat jij voor klanten hebt gemaakt.
            header('Location: klantinlogpagina.php'); 
            exit(); 

        } else {
            
            // EXTRA INFORMATIE: Je komt hier ALLEEN terecht als er een rol in de database staat
            // die je hierboven niet hebt gedefinieerd (bijvoorbeeld als er per ongeluk 'stagiair' in de tabel staat).
            // Dit is een vangnet zodat het systeem niet crasht, maar netjes meldt dat er iets mis is.
            echo "Fout: Er is een rol gevonden ('" . htmlspecialchars($_SESSION['role']) . "') die het systeem niet herkent. Neem contact op met de beheerder.";
        }

    } else {
        // Foutmelding als gebruikersnaam of wachtwoord niet klopt
        echo "<script>alert('Onjuiste gebruikersnaam of wachtwoord!'); window.location.href='login.html';</script>";
    }
}
?>
    </script>

</body>

</html>