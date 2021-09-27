<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mustermann IT-Systeme</title>
    <link href="bootstrap5.0.1/css/bootstrap.min.css" rel="stylesheet">
  </head>

<body>
    <?php
      $laptops = array(
        "1" => array(
          "model" => "Surface Pro (12,3 Zoll)",
          "preis_netto" => 19.8,
        ),
        "2" => array(
          "model" => "Surface Laptop (13,5 Zoll)",
          "preis_netto" => 29,
        ),
        "3" => array(
          "model" => "Mac Book Pro (13 Zoll",
          "preis_netto" => 34.99,
        )
      );
    ?>
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
        
		<h1 class="display-5 fw-bold">Leih-Notebooks</h1>
		
        <p class="col-md-9 fs-4">
          Sie benötigen Notebooks für ihre Schulung, Veranstaltung oder als Ersatzgerät für Ihre Mitarbeiter*innen? Wir 
          verleihen folgende Geräte (inkl. Office 365 und Win 10 Pro bzw. aktuelles Mac OS):
        </p>
        
        <?php
          define("UMST", 1.19);
          //Tabelle ausgeben
          echo("
          <p>
            <table class=\"table table-striped\">
              <tbody>
                <tr>
                  <td> <strong> Notebook </strong> </td>
                  <td> <strong> Tagesmietpreis <br/> (netto, zzgl. UmSt. </strong> </td>
                  <td> <strong> Tagesmietpreis <br/> (brutto, zzgl. UmSt. </td>
                </tr>
          ");
          for($i = 1; $i <= sizeof($laptops); $i++)
            {
              echo("<tr>");
                echo("<td>". $laptops[$i]["model"] ."</td>");
                echo("<td>". $laptops[$i]["preis_netto"] ." Euro</td>");
                echo("<td> <strong>". number_format(berechneBruttPreis($laptops[$i]["preis_netto"]),2,",",".") ." Euro </strong> </td>");
              echo("</tr>");
            }
          echo("      
              </tbody>
            </table>
          </p>"); 



          function berechneBruttPreis($einzelpreis)
          {
            $ergebnis = floatval($einzelpreis) * UMST;
            return $ergebnis;
          }
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
