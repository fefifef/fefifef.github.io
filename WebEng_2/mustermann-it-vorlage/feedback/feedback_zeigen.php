<!doctype html>
<html lang="de">
  <head>
    <?php
      require('phpFunctions/stats.php');
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mustermann IT-Systeme</title>
    <link href="../bootstrap5.0.1/css/bootstrap.min.css" rel="stylesheet">
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
          <a class="nav-link" aria-current="page" href="../index.php">Startseite</a>
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
            <li><a class="dropdown-item" href="../support/support.php">Hardware-Support</a></li>
            <li><a class="dropdown-item" href="../support/support.php?thema=software">Software-Support</li>
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
        
		<h1 class="display-5 fw-bold">Kunden Feedback</h1>

        <p class="col-md-9 fs-4">
          <?php
            $link = mysqli_connect("localhost","root","","webeng2_1")
            or die("Die DB-Verbindung geht nicht!");

            #---------- ---------- ---------- ---------- ----------#
            #echo"<br/><br/>";
            #---------- ---------- ---------- ---------- ----------#
                      
            echo "<button type='button' class='btn btn-primary' onclick=\"window.location.href = 'feedback_zeigen.php?wahl=0'\">Alle</button>  ";
            echo "<button type='button' class='btn btn-primary' onclick=\"window.location.href = 'feedback_zeigen.php?wahl=1'\">Sterne 4 oder besser</button>  ";
            echo "<button type='button' class='btn btn-primary' onclick=\"window.location.href = 'feedback_zeigen.php?wahl=2'\">Letzter Monat</button>  ";
            echo "<br/>";

              $wahl = 0;
              if(isset($_GET['wahl']))
              {
                $wahl = $_GET['wahl'];
              }
              if($wahl == 0)
              {
                echo "<h1>Alle Feedbacks</h1>";
                $sql = "SELECT note,name,bewertung,mail,beitragsdatum FROM feedback WHERE freigegeben = 1";
              }else
              {
                if($wahl == 1)
                {
                  echo "<h1>Mit 4 oder mehr Sternen</h1>";
                  $sql = "SELECT note,name,bewertung,mail,beitragsdatum FROM feedback WHERE note > 3  AND freigegeben = 1";
                }else
                {
                  echo "<h1>Letzer Monat</h1>";
                  $sql = "SELECT note,name,bewertung,mail,beitragsdatum FROM feedback WHERE beitragsdatum >DATE_SUB(NOW(), INTERVAL 1 MONTH) AND freigegeben = 1";
                }
              }
              $result = mysqli_query($link,$sql); 
              
              while($row=mysqli_fetch_assoc($result))
              {
                echo "Am {$row['beitragsdatum']} von {$row['name']} <br/>";
                echo "Bewertung: ";
                for($k = 0; $k < $row['note']; $k++)
                {
                  echo "<svg xmlns='http://www.w3.org/2000/svg' viewBox='-2 -2 24 24' width='24' height='24' preserveAspectRatio='xMinYMin' class='icon__icon'><path d='M10 16.207l-6.173 3.246 1.179-6.874L.01 7.71l6.902-1.003L10 .453l3.087 6.254 6.902 1.003-4.995 4.869 1.18 6.874z'></path></svg>";
                }
                for($k = 0; $k < (5 - $row['note']); $k++)
                {
                  echo "<svg xmlns='http://www.w3.org/2000/svg' viewBox='-2 -2.5 24 24' width='24' height='24' preserveAspectRatio='xMinYMin' class='icon__icon'><path d='M10 13.554l3.517 1.85-.672-3.917 2.846-2.774-3.932-.571L10 4.579 8.241 8.142l-3.932.571 2.846 2.774-.672 3.916L10 13.554zm0 2.26L3.827 19.06l1.179-6.875L.01 7.317l6.902-1.003L10 .06l3.087 6.254 6.902 1.003-4.995 4.868 1.18 6.875L10 15.814z'></path></svg>";
                }
                echo "({$row['note']}) \"{$row['bewertung']}\"";
                echo "<br/><br/>";
              }
            
            ?>
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
