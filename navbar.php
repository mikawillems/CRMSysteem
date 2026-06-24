  <nav>
    <div class="links">
      <a href="index.php">Home</a>

      <?php
      // Als de gebruiker ADMIN of MEDEWERKER is, toon dan alle links
      if (isset($_SESSION['role']) && ($_SESSION['role'] == 'leidinggevende' || $_SESSION['role'] == 'werknemer')) {
        ?>
        <a href="Employers.php">Werkgevers</a>
        <a href="Workers.php">Werknemers</a>
        <a href="klanten.php">Klanten</a>
      <?php
      } // Als de gebruiker een KLANT is, ziet hij de bovenstaande links dus NIET 
      ?>

      <a href="opdrachten.php">Opdrachten</a>
      <a href="werkzaamheden.php">Werkzaamheden</a>
      <?php
      // VEILIGHEIDSCHECK: Controleer eerst of de rol wel echt bestaat
      if (isset($_SESSION['role'])) {
        // htmlspecialchars() voorkomt dat er vreemde tekens de layout slopen
        echo '<span class="user-role">Rol: ' . htmlspecialchars($_SESSION['role']) . '</span>';
      } else {
        echo '<span class="user-role">Niet ingelogd</span>';

      }
      ?>
      <a href="logout.php" class="btn-logout" style="text-decoration: none;"><button class="buttonlogout" type="button">Uitloggen</button></a>
    </div>
  </nav>