<!doctype html>
<html lang="de">
  <head>
    <?php
      require('phpFunctions/stats.php');
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mustermann IT-Systeme</title>
    <link href="bootstrap5.0.1/css/bootstrap.min.css" rel="stylesheet">
  </head>

<body>
    
<main>
  <div class="container py-4">
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand h1">Mustermann GmbH</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Startseite</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">IT-Schulungen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Online-Shop</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Service
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="support.php">Hardware-Support</a></li>
            <li><a class="dropdown-item" href="support.php?thema=software">Software-Support</li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Impressum</a></li>
            <li><a class="dropdown-item" href="#">Datenschutz</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Suche" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit"><img src="bootstrap5.0.1/icons/search.svg"></button>
      </form>
    </div>
  </div>
</nav>

    <div class="p-4 mb-4 mt-4 bg-white rounded-3 border border-ligh">
      <div class="container-fluid py-5">
        
		<h1 class="display-5 fw-bold">DB Test</h1>
		
      <p class="col-md-9 fs-4">
        <?php
          $link = mysqli_connect("localhost","root","","webeng2_1")
          or die("Die DB-Verbindung geht nicht!");

          $sql="SELECT COUNT(*) FROM team";
          $result = mysqli_query($link,$sql);
          $row = mysqli_fetch_row($result);
          echo "Anzahl Team Mitglieder: " . $row[0] . "<br/>";


          $sql = "SELECT nachname FROM team ORDER BY nachname ASC";
          $result = mysqli_query($link,$sql);
          echo"<strong>Support-Team (alphabetisch): </strong>"; 
          while($row=mysqli_fetch_row($result))
          {
            echo "$row[0], ";
          }
          #---------- ---------- ---------- ---------- ----------#
          echo"<br/><br/>";
          #---------- ---------- ---------- ---------- ----------#
          $sql = "SELECT nachname FROM `team` WHERE eintrittsjahr < 2018 ORDER BY eintrittsjahr ASC";
          $result = mysqli_query($link,$sql);
          echo"<strong>Support-Team (langjährige Mitarbeiter*innen): </strong>"; 
          while($row=mysqli_fetch_row($result))
          {
            echo "$row[0], ";
          }
          #---------- ---------- ---------- ---------- ----------#
          echo"<br/><br/>";
          #---------- ---------- ---------- ---------- ----------#
          $sql = "SELECT nachname,eintrittsjahr FROM team ORDER BY eintrittsjahr DESC";
          $result = mysqli_query($link,$sql);
          echo"<strong>Support-Team (nach Firmeneintritt): </strong>"; 
          while($row=mysqli_fetch_assoc($result))
          {
            echo "{$row['nachname']} ({$row['eintrittsjahr']}), ";
          }
          #---------- ---------- ---------- ---------- ----------#
          echo"<br/><br/>";
          #---------- ---------- ---------- ---------- ----------#
          $sql = "SELECT vorname,nachname,eintrittsjahr FROM team ORDER BY eintrittsjahr DESC";
          $result = mysqli_query($link,$sql);
          echo"<strong>Support-Team in Liste: </strong>"; 
          echo"<ul>";
          while($row=mysqli_fetch_assoc($result))
          {
            echo "<li>{$row['vorname']} {$row['nachname']}, {$row['eintrittsjahr']} </li>";
          }
          echo"</ul>";
        ?>
      </p>
        
		<p class="col-md-9 fs-5">
			<a class="btn btn-outline-secondary" href="index.php">zurück zur Startseite</a>
		</p>
        
      </div>
    </div>
    
    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2021 Mustermann GmbH - eine Demoseite Übungen (Modul Web-Technologien)
      <br/>
      <?php
        
        echo("Sie sind seit $zeit  Sekunden auf unserer Website und haben insgesamt $anz_Seiten Seiten aufgerfuen.");
        echo "<br/><br/>Zuletzt besuchte Seiten: <br/>";
        foreach($history as $zeile)
        {
          print "<a href='$zeile'>$zeile</a> <br/>";
        }
      ?>
    </footer>
  </div>
</main>

   <script src="bootstrap5.0.1/js/bootstrap.bundle.min.js"></script>    
  </body>
</html>
