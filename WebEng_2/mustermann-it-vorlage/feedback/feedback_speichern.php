<!doctype html>
<html lang="de">
  <head>
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
          <a class="nav-link" aria-current="page" href="../index.html">Startseite</a>
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
        
		<h1 class="display-5 fw-bold">Kunden-Feedback</h1>
		
      <h1>Feedback erfollgreich abgegeben</h1>

      <?php
        if(isset($_POST["name"])){
          $name = htmlspecialchars($_REQUEST['name']);
          echo "<p>Name: " . $name . " </p>";
        }
        if(isset($_POST["zufriedenheit"])){
          $zufriedenheit = htmlspecialchars($_REQUEST['zufriedenheit']);
          echo "<p>Sterne:: " . $zufriedenheit . " </p>";
        }
        if(isset($_POST["mail"])){
          $mail = htmlspecialchars($_REQUEST['mail']);
          echo "<p>Mail: " . $mail . " </p>";
        }
        if(isset($_POST["bemerkungen"])){
          $bemerkungen = htmlspecialchars($_REQUEST['bemerkungen']);
          echo "<p>Bemerkungen: " . $bemerkungen . " </p>";
        }

        insertFeedbackIntoDB($zufriedenheit,$bemerkungen,$name,$mail);
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
  <?php
    function insertFeedbackIntoDB($note, $bewertung, $name, $mail)
    {
      $link = mysqli_connect("localhost","root","","webeng2_1")
      or die("Die DB-Verbindung geht nicht!");
      
      $heute = date("Y/m/d");
      $sql = "INSERT INTO feedback (note, bewertung, name, mail, beitragsdatum) VALUES ('$note','$bewertung','$name','$mail','$heute')";
      $result = mysqli_query($link, $sql);
    }
  ?>
</main>

   <script src="bootstrap5.0.1/js/bootstrap.bundle.min.js"></script>    
  </body>
</html>