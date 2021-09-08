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
            <li><a class="dropdown-item" href="#">Hardware-Support</a></li>
            <li><a class="dropdown-item" href="#">Software-Support</li>
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
          switch(date("l"))
          {
            case "Monday":
              $day = "Montag";
              break;
            case "Tuesday":
              $day = "Dienstag";
              break;
            case "Wednesday":
              $day = "Mittwoch";
              break;
            case "Thursday":
              $day = "Donnerstag";
              break;
            case "Friday":
              $day = "Freitag";
              break;
            case "Saturday":
              $day = "Samstag";
              break;
            case "Sunday":
              $day = "Sonntag";
              break;
          }

          $timeInterval = "";
          $by = "";

          switch(date("w")) 
          {
            case 1:
              $timeInterval = "8 bis 16 Uhr";
              $by = "Herr Müller";
              break;
            case 2:
              $timeInterval = "8 bis 17 Uhr";
              $by = "Herr Meier";
              break;
            case 3:
              $timeInterval = "8 bis 17 Uhr";
              $by = "Frau Unger";
              break;
            case 4:
              $timeInterval = "8 bis 19 Uhr";
              $by = "Herr Peters";
              break;
            case 5:
              $timeInterval = "8 bis 13 Uhr";
              $by = "Frau Schmid";
              break;    
          }

          echo "Am heutigen $day erreichen Sie unsere Hardware-Support-Hotline von $timeInterval , Ihre Fragen beantwortet $by unter der Telefonnummer ...";       
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
