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
        
		<h1 class="display-5 fw-bold">Vorlage</h1>
		
        <p class="col-md-9 fs-4">Vielen dank für ihr Intresse an unseren Produkten, wir 
            senden Ihnen eine Preisliste an folgende Adresse:
            <?php
              $anrede = "";
              $vorname = "";
              $nachname = "";
              $land = "";
              $firma = "";
              $anz = "";
              $strassse = "";
              $plz = "";
              $ort = "";
              $interesseAn_1 = "";
              $interesseAn_2 = "";
              $interesseAn_3 = "";
              $interesseAn_4 = "";
              $fehler = 0;
              if(isset($_POST["anrede"])){
                $anrede = htmlspecialchars($_REQUEST['anrede']);
                echo "<p>Anrede: " . $anrede . " </p>";
              }else{
                $fehler = 1;
              }
              if(isset($_POST["vorname"])){
                $vorname = htmlspecialchars($_REQUEST['vorname']);
                echo "<p>Vorname: " . $vorname . "  </p>";
              }
              if(isset($_POST["nachname"])){
                $nachname = htmlspecialchars($_REQUEST['nachname']);
                echo "<p>Nachname: " . $nachname . " </p>";
              }
              if(isset($_POST["land"])){
                $land = htmlspecialchars($_REQUEST['land']);
                echo "<p>Land: " . $land . " </p>";
              }
              if(isset($_POST["firma"])){
                $firma = htmlspecialchars($_REQUEST['firma']);
                echo "<p>Firma: " . $firma . " </p>";
              }
              if(isset($_POST["anz_mit"])){
                $anz = preg_replace("![^0-9]!", "", htmlspecialchars($_REQUEST['anz_mit']));
                echo "<p>Anzahl Mitarbeiter: " . $anz . " </p>";
              }
              if(isset($_POST["strassse"])){
                $strassse = htmlspecialchars($_REQUEST['strassse']);
                echo "<p>Straße: " . $strassse . " </p>";
              }
              if(isset($_POST["plz"])){
                $plz = str_replace("D-","",htmlspecialchars($_REQUEST['plz']));
                if(strlen($plz) !=5)
                {
                  echo "<a href='anfrage.php?anrede=$anrede'>zurück, erneut versuchen</a>";
                }
                echo "<p>Platz: " . $plz  . " </p>";
              }
              if(isset($_POST["ort"])){
                $ort = htmlspecialchars($_REQUEST['ort']);
                echo "<p>Ort: " . $ort . " </p>";
              }
              
              if(isset($_POST["interesseAn_1"])){
                $interesseAn_1 = $_POST["interesseAn_1"];
                echo $interesseAn_1 . " wurde ausgewählt <br>";
              }
              if(isset($_POST["interesseAn_2"])){
                $interesseAn_2 = $_POST["interesseAn_2"];
                echo $interesseAn_2 . " wurde ausgewählt <br>";
              }
              if(isset($_POST["interesseAn_3"])){
                $interesseAn_4 = $_POST["interesseAn_4"];
                echo $interesseAn_3 . " wurde ausgewählt <br>";
              }
              if(isset($_POST["interesseAn_4"])){
                $interesseAn_4 = $_POST["interesseAn_4"];
                echo $interesseAn_4 . " wurde ausgewählt <br>";
              }
              
              if($fehler == 1)
              {
                
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
