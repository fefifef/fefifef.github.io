<!doctype html>
<html lang="de">
  <head>
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
          <a class="nav-link" aria-current="page" href="index.html">Startseite</a>
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
        
        <h1 class="display-5 fw-bold">Support-Mitarbeiter*in suchen:</h1>
        
          <h2 class="display-7 fw-bold">Über den Nachnamen</h2>
          <p class="col-md-9 fs-4">
            <form method="get" action="support_suche.php">
              <input type="text" name="suche">
              <button type="submit">Suche starten</button>
            </form>
          </p>
          <p class="col-md-9 fs-4">
            <?php
              $link = mysqli_connect("localhost","root","","webeng2_1")
              or die("Die DB-Verbindung geht nicht!");
              $stmt = mysqli_prepare($link, "SELECT vorname,nachname,bereich FROM team where nachname=?");
              if(isset($_REQUEST['suche']))
              {
                $suchwort = htmlspecialchars(($_REQUEST['suche']));
                echo "<br/> Suche nach '$suchwort' <br/>";
                mysqli_stmt_bind_param($stmt,"s", $suchwort);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt,$vorname,$nachname,$bereich);
                while(mysqli_stmt_fetch($stmt))
                {
                  echo"Vorname: '$vorname' <br/>";
                  echo"Nachname: '$nachname' <br/>";
                  echo"Bereich: '$bereich' <br/>";
                }
                mysqli_stmt_close($stmt);
              }
            ?>
          </p>
          <!-- -------------------------------------------------- -->
          <h2 class="display-7 fw-bold">Über den Bereich</h2>
          <p class="col-md-9 fs-4">
            <form method="get" action="support_suche.php">
              <input type="text" name="suche">
              <button type="submit">Suche starten</button>
            </form>
          </p>
          <p class="col-md-9 fs-4">
            <?php
              $link = mysqli_connect("localhost","root","","webeng2_1")
              or die("Die DB-Verbindung geht nicht!");
              $stmt = mysqli_prepare($link, "SELECT vorname,nachname,bereich FROM team WHERE bereich LIKE ?");
              if(isset($_REQUEST['suche']))
              {
                $suchwort = htmlspecialchars(($_REQUEST['suche']));
                echo "<br/> Suche nach '$suchwort' <br/>";
                $suchwort = "%" . $suchwort . "%";
                mysqli_stmt_bind_param($stmt,"s", $suchwort);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt,$vorname,$nachname,$bereich);
                while(mysqli_stmt_fetch($stmt))
                {
                  echo"Vorname: '$vorname' <br/>";
                  echo"Nachname: '$nachname' <br/>";
                  echo"Bereich: '$bereich' <br/><br/>";
                }
                mysqli_stmt_close($stmt);
              }
            ?>
          </p>
          <!-- -------------------------------------------------- -->
          <h2 class="display-7 fw-bold">Über den Bereich</h2>
          <p class="col-md-9 fs-4">
            <form method="get" action="support_suche.php">
              <label>Bereich</label><input type="text" name="suche"> <br/>
              <label>Eintrittsjahr</label><input type="text" name="suche_2">
              <button type="submit">Suche starten</button>
            </form>
          </p>
          <p class="col-md-9 fs-4">
            <?php
              $link = mysqli_connect("localhost","root","","webeng2_1")
              or die("Die DB-Verbindung geht nicht!");
              $stmt = mysqli_prepare($link, "SELECT vorname,nachname,bereich,eintrittsjahr FROM team WHERE bereich LIKE ? AND eintrittsjahr >= ?");
              if(isset($_REQUEST['suche']) && isset($_REQUEST['suche_2']))
              {
                $suchwort = htmlspecialchars(($_REQUEST['suche']));
                $suchwort_2 = htmlspecialchars(($_REQUEST['suche_2']));
                echo "<br/> Suche nach '$suchwort' mit eintrittsjahr >= '$suchwort_2'<br/>";
                $suchwort = "%" . $suchwort . "%";
                mysqli_stmt_bind_param($stmt,"si", $suchwort, $suchwort_2);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt,$vorname,$nachname,$bereich,$eintrittsjahr);
                while(mysqli_stmt_fetch($stmt))
                {
                  echo"Vorname: '$vorname' <br/>";
                  echo"Nachname: '$nachname' <br/>";
                  echo"Bereich: '$bereich' <br/>";
                  echo"Eintrittsjahr: '$eintrittsjahr' <br/> <br/>";

                }
                mysqli_stmt_close($stmt);
              }
            ?>
          </p>      
          <!-- -------------------------------------------------- -->
          <h2 class="display-7 fw-bold">Über den Bereich</h2>
          <p class="col-md-9 fs-4">
            <form method="get" action="support_suche.php">
              <label>Bereich</label><input type="text" name="suche"> <br/>
              <label>Eintrittsjahr</label><input type="text" name="suche_2">
              <button type="submit">Suche starten</button>
            </form>
          </p>
          <p class="col-md-9 fs-4">
            <?php

              

              

              if(isset($_REQUEST['suche']) && isset($_REQUEST['suche_2']))
              {
                $dbh = new PDO('mysql:host=localhost;dbname=webeng2_1','root','')  or die("1");
              
                $stmt = $dbh->prepare("SELECT vorname,nachname,bereich,eintrittsjahr FROM team WHERE bereich LIKE :bereich AND eintrittsjahr >= :jahr") or die("2");
                
                $suchwort = htmlspecialchars(($_REQUEST['suche']));
                $suchwort_2 = htmlspecialchars(($_REQUEST['suche_2']));

                
                $suchwort = "%" . $suchwort . "%";

                $stmt->bindParam(':bereich', $suchwort) or die("3");
                $stmt->bindParam(':jahr', $suchwort_2) or die("4");

                $stmt->execute() or die("5");
                
                
                while($row = $stmt->fetch())
                {
                  echo "Vorname: " .$row['vorname'] . "<br/>";
                  echo "Nachname: " .$row['nachname'] . "<br/>";
                  echo "Bereich: " .$row['bereich'] . "<br/>";
                  echo "Eintrittsjahr: " .$row['eintrittsjahr'] . "<br/><br/>";
                }
              }
            ?>
          </p>      
      </div>
    </div>
    
    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2021 Mustermann GmbH - eine Demoseite Übungen (Modul Web-Technologien)
    </footer>
  </div>
</main>

   <script src="bootstrap5.0.1/js/bootstrap.bundle.min.js"></script>    
  </body>
</html>
