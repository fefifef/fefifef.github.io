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
        
		<h1 class="display-5 fw-bold">Hardware-Support</h1>
		

        <p class="col-md-9 fs-4">
        <?php
          $work = array(
            "1" => array(
              "day" => "Montag",
              "startTime" => 8,
              "stopTime" => 16,
              "worker" => "Herr Müller"
            ),
            "2" => array(
              "day" => "Dienstag",
              "startTime" => 8,
              "stopTime" => 17,
              "worker" => "Herr Meier"
            ),
            "3" => array(
              "day" => "Mittwoch",
              "startTime" => 8,
              "stopTime" => 17,
              "worker" => "Frau Unger"
            ),
            "4" => array(
              "day" => "Donnerstag",
              "startTime" => 8,
              "stopTime" => 19,
              "worker" => "Herr Peters"
            ),
            "5" => array(
              "day" => "Freitag",
              "startTime" => 8,
              "stopTime" => 13,
              "worker" => "Frau Schmid"
            )
          );
          $hrsp_hour = date('h', time());
          $hrsp_dayNumber = date("w");

          if(isset($_GET['thema']) && $_GET['thema'] == "software")
          {
            for($i = 1; $i <= 5; $i++)
            {
              $work[$i]["startTime"] = 9;
            }
            $work[4]["worker"] = "Frau Schmid";  
            $work[5]["worker"] = "Herr Gates";  
          }
          //Uhrzeit anzeigen
          echo ('<p>Am heutigen <strong>' . $work[$hrsp_dayNumber]["day"] . '</strong> erreichen Sie unsere Hardware-Support-Hotline von <strong>' . $work[$hrsp_dayNumber]["startTime"] . ' bis '. $work[$hrsp_dayNumber]["stopTime"] .' Uhr</strong>, Ihre Fragen beantwortet '. $work[$hrsp_dayNumber]["worker"] . ' unter der Telefonnummer</p>');
        
          //Telefon Nummer anzeigen
          echo("
          <p style=\"font-size:24px\">  
            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"-6 -2 24 24\" width=\"24\" height=\"24\" preserveAspectRatio=\"xMinYMin\" class=\"icon__icon\"><path d=\"M3 0h6a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V3a3 3 0 0 1 3-3zm0 2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3zm3 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2z\"></path></svg>
            0711 - 123 456 789
          </p>");

          //Wenn auserhalb arbeitszeit
          if($hrsp_hour < $work[$hrsp_dayNumber]["startTime"] || $hrsp_hour > $work[$hrsp_dayNumber]["stopTime"])
          {
            echo("
            <p>
              Leider können Sie uns derzeit nicht erreichen
            </p>
            ");
          }

          //Tabelle ausgeben
          echo("
          <p>
            <table class=\"table table-striped\">
              <tbody>
          ");
            for($i = 1; $i <= 5; $i++)
            {
              echo("<tr>");
                echo("<td>". $work[$i]["day"] ."</td>");
                echo('<td>'. $work[$i]["startTime"] . ' bis '. $work[$i]["stopTime"] .' Uhr</td>');
                echo("<td>". $work[$i]["worker"] . "</td>");
              echo("</tr>");
            }
          echo("      
              </tbody>
            </table>
          </p>");
        ?>
        
       
		<p class="col-md-9 fs-5">
			<a class="btn btn-outline-secondary" href="index.html">zurück zur Startseite</a>
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
