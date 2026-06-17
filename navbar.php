<nav>
  <div class="links">
    <a href="index.php">Home</a>
    <?php if (isset($_SESSION['role'])) { ?><a href="Employers.php">Werkgevers</a> 
    <a href="Workers.php">Werknemers</a>
    <a href="klanten.php">Klanten</a>
    <?php } ?>
    <a href="opdrachten.php">Opdrachten</a>
    <a href="werkzaamheden.php">Werkzaamheden</a>
  </div>

  <!-- Extra navigatie-elementen uit jouw code (alleen de login-knop blijft over) -->
  <div class="nav-actions">
    <button class="login-trigger" onclick="openLogin()">log in</button>
  </div>
</nav>