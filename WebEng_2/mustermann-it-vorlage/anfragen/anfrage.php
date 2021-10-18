<!doctype html>
<html lang="de">
  <head>
    <?php
      require('phpFunctions/stats.php');
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
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
          <a class="nav-link active" aria-current="page" href="../index.php">Startseite</a>
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
        <button class="btn btn-outline-dark" type="submit"><img src="bootstrap5.0.1/bootstrap-icons-1.5.0/search.svg"></button>
      </form>
    </div>
  </div>
</nav>

    <div class="p-4 mb-4 mt-4 bg-white rounded-3 border border-ligh">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Preisliste anfordern</h1>
        <p class="col-md-9 fs-4">Sie interssieren Sie für IT-Dienstleistungen? Nutzen Sie 
            das folgende Formular für eine unverbindliche Anfrage, wir senden Ihnen umgehend
            unsere Preislisten oder erstellen Ihnen ein unverbindliches Angebot.
        </p>
        <?php
           $anrede = "";
           $vorname = "";
           $nachname = "";
           $land = "";
           $firma = "";
           $strassse = "";
           $plz = "";
           $ort = "";
           $mail = "";
           $anz_mit = "";
           $bemerkungen = "";
           $interesseAn_1 = "";
           $interesseAn_2 = "";
           $interesseAn_3 = "";
           $interesseAn_4 = "";
           $angenommen = "";
           
          if(isset($_GET['anrede']))
          {
            $anrede = $_GET['anrede'];
          }
          if(isset($_GET['vorname']))
          {
            $vorname = $_GET['vorname'];
          }
          if(isset($_GET['nachname']))
          {
            $nachname = $_GET['nachname'];
          }
          if(isset($_GET['land']))
          {
            $land = $_GET['land'];
          }
          if(isset($_GET['firma']))
          {
            $firma = $_GET['firma'];
          }
          if(isset($_GET['anz_mit']))
          {
            $anz_mit = $_GET['anz_mit'];
          }
          if(isset($_GET['strassse']))
          {
            $strassse = $_GET['strassse'];
          }
          if(isset($_GET['plz']))
          {
            $plz = $_GET['plz'];
          }
          if(isset($_GET['ort']))
          {
            $ort = $_GET['ort'];
          }
          if(isset($_GET['mail']))
          {
            $mail = $_GET['mail'];
          }
          if(isset($_GET['anz_mit']))
          {
            $anz_mit = $_GET['anz_mit'];
          }
          if(isset($_GET['bemerkungen']))
          {
            $bemerkungen = $_GET['bemerkungen'];
          }
          if(isset($_GET['interesseAn_1']))
          {
            $interesseAn_1 = $_GET['interesseAn_1'];
          }
          if(isset($_GET['interesseAn_2']))
          {
            $interesseAn_2 = $_GET['interesseAn_2'];
          }
          if(isset($_GET['interesseAn_3']))
          {
            $interesseAn_3 = $_GET['interesseAn_3'];
          }
          if(isset($_GET['interesseAn_4']))
          {
            $interesseAn_4 = $_GET['interesseAn_4'];
          }
          if(isset($_GET['angenommen']))
          {
            $angenommen = $_GET['angenommen'];
          }
        ?>



        <form method="POST" action="bestaetigung.php">

            <div class="mb-3">
              <label for="" class="form-label">Anrede:</label><br/>
              <input type="radio" name="anrede" value="Herr"   <?php if($anrede == "Herr"){echo"checked";}?>> Herr<br/>
              <input type="radio" name="anrede" value="Frau"   <?php if($anrede == "Fraur"){echo"checked";}?>> Frau<br/>
              <input type="radio" name="anrede" value="Divers" <?php if($anrede == "Divers"){echo"checked";}?>> Divers<br/>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Vorname:</label>
                <input type='text' class='form-control' name='vorname' value='<?php echo $vorname ?>'>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Nachname:</label>
                <input type="text" class="form-control" name="nachname" value='<?php echo $nachname ?>'>
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Wo kommen sie her?</label>
              <select name="land">
                <option value="Deutschland">Deutschland</option>
                <option value="Österreich">Österreich</option>
                <option value="Schweiz">Schweiz</option>
              </select>
          </div>

            <div class="mb-3">
                <label for="" class="form-label">Firma:</label>
                <input type="text" class="form-control" name="firma" value='<?php echo $firma ?>'>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Straße:</label>
                <input type="text" class="form-control" name="strassse" value='<?php echo $strassse ?>'>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">PLZ:</label>
                <input type="text" class="form-control" name="plz" value='<?php echo $plz ?>'>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Ort:</label>
                <input type="text" class="form-control"name="ort" value='<?php echo $ort ?>'>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">E-Mail:</label>
                <input type="text" class="form-control" name="mail" value='<?php echo $mail ?>'>
            </div>
			
			      <div class="mb-3">
                <label for="" class="form-label">Anzahl Mitarbeiter*innen:</label>
                <input type="text" class="form-control" name="anz_mit" value='<?php echo $anz_mit ?>'>
            </div>			
            
          
            <div class="mb-3">
                <label for="" class="form-label">Raum für Ihr Bemerkung:</label>
                <textarea class="form-control" rows="3" name="bemerkungen"><?php echo $bemerkungen ?></textarea>
            </div>
            
            <div class="mb-3">
              <label for="" class="form-label">Für welche Produkte oder Dienstleistungen besteht Interesse?</label> <br/>
              <input type="checkbox" name="interesseAn_1" value="Hardware" id="check_1" <?php if($interesseAn_1 == "Hardware"){echo"checked";}?>>
              <label for="check_1">Hardware</label>
              <input type="checkbox" name="interesseAn_2" value="Software" id="check_2" <?php if($interesseAn_2 == "Software"){echo"checked";}?>>
              <label for="check_2">Software</label>
              <input type="checkbox" name="interesseAn_3" value="Software-Support" id="check_3" <?php if($interesseAn_3 == "Software-Support"){echo"checked";}?>>
              <label for="check_3">Software-Support</label>
              <input type="checkbox" name="interesseAn_4" value="Schulungen" id="check_4" <?php if($interesseAn_4 == "Schulung"){echo"checked";}?>>
              <label for="check_4">Schulungen</label>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="angenommen" value="angenommen" <?php if($angenommen == "angenommen"){echo"checked";}?>>
                <label class="form-check-label" for="">Ich stimme zu, dass meine Angaben aus dem Formular 
                    zur Beantwortung der Angebots-Anfrage
                    erhoben und verarbeitet werden. Die Daten werden nach abgeschlossener Bearbeitung 
                    der Anfrage gelöscht. Hinweis: Sie können Ihre Einwilligung 
                    jederzeit für die Zukunft per E-Mail an mail@mustermann.de widerrufen. 
                    Detaillierte Informationen zum Umgang mit Nutzerdaten finden Sie in unserer 
                    <a href='#'>Datenschutzerklärung</a>.</label>
            </div>

            
            
            <button type="submit" class="btn btn-primary">unverbindliche Anfrage senden</button>

            </form>

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
