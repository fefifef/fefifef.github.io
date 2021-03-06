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
          <a class="nav-link active" aria-current="page" href="index.php">Startseite</a>
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
            <li><a class="dropdown-item" href="support/support.php">Hardware-Support</a></li>
            <li><a class="dropdown-item" href="support/support.php?thema=software">Software-Support</a></li>
            <li><a class="dropdown-item" href="notebooks/notebooks.php">Notebooks-Leihen</a></li>
            <li><a class="dropdown-item" href="notebooks/beamer.php">Beamer-Leihen</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Impressum</a></li>
            <li><a class="dropdown-item" href="#">Datenschutz</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="anfragen/anfrage.php">Anfragen</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Feedback
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="feedback/feedback.php">Feedback geben</a></li>
            <li><a class="dropdown-item" href="feedback/feedback_zeigen.php">Feedback zeigen</a></li>
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

    <!-- Bildquelle: https://de.wikipedia.org/wiki/Server#/media/Datei:Wikimedia_Foundation_Servers-8055_35.jpg -->
    <div class="p-4 mb-4 mt-4 bg-white rounded-3 border border-ligh" style="background-image:url(img/server.jpg)">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold text-light">Mustermann GmbH - Ihr Partner f??r IT</h1>
        <p class="col-md-9 fs-4 text-light">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
		sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
        <a class="btn btn-outline-light btn-lg text-light" href="vorlage.html">weitere Informationen</a>
      </div>
    </div>
    
    <div class="row align-items-md-stretch">
      <div class="col-md-4 mb-3">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>Hardware-Support</h2>
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
		  sed diam nonumy eirmod tempor invidunt ut labore et dolore 
		  magna aliquyam erat.</p>
          <a class="btn btn-outline-secondary" href="support/support.php">zum Hardware-Support</a>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>Software-Support</h2>
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
		  sed diam nonumy eirmod tempor invidunt ut labore et dolore 
		  magna aliquyam erat.</p>
          <a class="btn btn-outline-secondary" href="support/support.php?thema=software">zum Software-Support</a>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>Preisliste anfordern</h2>
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod 
		  tempor invidunt ut labore et dolore magna aliquyam erat.</p>
          <a class="btn btn-outline-secondary" href="anfragen/anfrage.php">Preisliste anfordern</a>
        </div>
      </div>
    </div>

    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2021 Mustermann GmbH - eine Demoseite ??bungen (Modul Web-Technologien)
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
