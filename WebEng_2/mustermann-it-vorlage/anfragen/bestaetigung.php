<!doctype html>
<html lang="de">
  <head>
    <?php
      require('../phpFunctions/stats.php');
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
            <li><a class="dropdown-item" href="../support/support.php?thema=software">Software-Support</a></li>
            <li><a class="dropdown-item" href="../notebooks/notebooks.php">Notebooks-Leihen</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Impressum</a></li>
            <li><a class="dropdown-item" href="#">Datenschutz</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../anfragen/anfrage.php">Anfragen</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Feedback
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../feedback/feedback.php">Feedback geben</a></li>
            <li><a class="dropdown-item" href="../feedback/feedback_zeigen.php">Feedback zeigen</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Suche" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit"><img src="../bootstrap5.0.1/icons/search.svg"></button>
      </form>
    </div>
  </div>
</nav>

    <div class="p-4 mb-4 mt-4 bg-white rounded-3 border border-ligh">
      <div class="container-fluid py-5">
        
		<h1 class="display-5 fw-bold">Vorlage</h1>
		
        <p class="col-md-9 fs-4">Vielen dank f??r ihr Intresse an unseren Produkten, wir 
            senden Ihnen eine Preisliste an folgende Adresse:
            <?php
              $anrede = "";
              $vorname = "";
              $nachname = "";
              $land = "";
              $firma = "";
              $strassse = "";
              $plz = "";
              $ort = "";
              $interesseAn_1 = "";
              $interesseAn_2 = "";
              $interesseAn_3 = "";
              $interesseAn_4 = "";
              $mail = "";
              $anz_mit = "";
              $bemerkungen = "";
              $ausgewaelteProdukte = "";
              $angenommen = "";
              
              $fehler = "";



              //??berpr??fung Anrede
              if(isset($_POST["anrede"])){
                $anrede = htmlspecialchars($_REQUEST['anrede'], ENT_QUOTES);
                echo "<p>Anrede: " . $anrede . " </p>";
              }else{
                $fehler = $fehler . "Sie haben keine Anrede angegeben" . "<br/>";
              }
              //??berpr??fung Vorname
              if(isset($_POST["vorname"]) && $_POST["vorname"] != ""){
                $vorname = htmlspecialchars($_REQUEST['vorname'], ENT_QUOTES);
                echo "<p>Vorname: " . $vorname . "  </p>";
              }else{
                $fehler = $fehler . "Sie haben keinen Vorname angegeben" . "<br/>";
              }
              //??berpr??fung Nachname
              if(isset($_POST["nachname"]) && $_POST["nachname"] != ""){
                $nachname = htmlspecialchars($_REQUEST['nachname'], ENT_QUOTES);
                echo "<p>Nachname: " . $nachname . " </p>";
              }else{
                $fehler = $fehler . "Sie haben keinen Nachnamen angegeben" . "<br/>";
              }
              if(isset($_POST["mail"]) && $_POST["mail"] != ""){
                $mail = htmlspecialchars($_REQUEST['mail'], ENT_QUOTES);
                echo "<p>E-Mail: " . $mail . " </p>";
              }else{
                $fehler = $fehler . "Sie haben keine E-Mail angegeben" . "<br/>";
              }
              //??berpr??fung Land
              if(isset($_POST["land"]) && $_POST["land"] != ""){
                $land = htmlspecialchars($_REQUEST['land'], ENT_QUOTES);
                echo "<p>Land: " . $land . " </p>";
              }else{
                $fehler = $fehler . "Sie haben keine Land angegeben" . "<br/>";
              }
              //??berpr??fung Firma
              if(isset($_POST["firma"]) && $_POST["firma"] != ""){
                $firma = htmlspecialchars($_REQUEST['firma'], ENT_QUOTES);
                echo "<p>Firma: " . $firma . " </p>";
              }else{
                $fehler = $fehler . "Sie haben keine Firma angegeben" . "<br/>";
              }
              //??berpr??fung Anzahl Mitarbeiter
              if(isset($_POST["anz_mit"]) && $_POST["anz_mit"] != ""){
                $anz_mit = preg_replace("![^0-9]!", "", htmlspecialchars($_REQUEST['anz_mit']), ENT_QUOTES);
                echo "<p>Anzahl Mitarbeiter: " . $anz_mit . " </p>";
              }else{
                $fehler = $fehler . "Sie haben keine Anzahl von Mitarbeitern angegeben" . "<br/>";
              }
              //??berpr??fung Strassse
              if(isset($_POST["strassse"]) && $_POST["strassse"] != ""){
                $strassse = htmlspecialchars($_REQUEST['strassse'], ENT_QUOTES);
                echo "<p>Stra??e: " . $strassse . " </p>";
              }else{
                $fehler = $fehler . "Sie haben keine Stra??e angegeben" . "<br/>";
              }
              //??berpr??fung PLZ
              if(isset($_POST["plz"]) && $_POST["plz"] != ""){
                $plz = str_replace("D-","",htmlspecialchars($_REQUEST['plz']), ENT_QUOTES);
                if(strlen($plz) !=5)
                {
                  $fehler = $fehler . "Ihr PLZ ist falsch" . "<br/>";
                }else
                {
                  echo "<p>Platz: " . $plz  . " </p>";
                }
              }else{
                $fehler = $fehler . "Sie haben keinen PLZ angegeben" . "<br/>";
              }
              //??berpr??fung Ort
              if(isset($_POST["ort"]) && $_POST["ort"] != ""){
                $ort = htmlspecialchars($_REQUEST['ort'], ENT_QUOTES);
                echo "<p>Ort: " . $ort . " </p>";
              }else{
                $fehler = $fehler . "Sie haben keinen Ort angegeben" . "<br/>";
              }
              //??berpr??fung Bemerkungen
              if(isset($_POST["bemerkungen"])){
                $bemerkungen = htmlspecialchars($_REQUEST['bemerkungen'], ENT_QUOTES);
                echo "<p>Bemerkungen: " . $bemerkungen . " </p>";
              }
              
              //??berpr??fung interessaAn_1
              if(isset($_POST["interesseAn_1"])){
                $interesseAn_1 = $_POST["interesseAn_1"];
                $ausgewaelteProdukte = $ausgewaelteProdukte . " " . $interesseAn_1;
                echo $interesseAn_1 . " wurde ausgew??hlt <br>";
              }
              //??berpr??fung interessaAn_2
              if(isset($_POST["interesseAn_2"])){
                $interesseAn_2 = $_POST["interesseAn_2"];
                $ausgewaelteProdukte = $ausgewaelteProdukte . " " . $interesseAn_2;
                echo $interesseAn_2 . " wurde ausgew??hlt <br>";
              }
              //??berpr??fung interessaAn_3
              if(isset($_POST["interesseAn_3"])){
                $interesseAn_3 = $_POST["interesseAn_3"];
                $ausgewaelteProdukte = $ausgewaelteProdukte . " " . $interesseAn_3;
                echo $interesseAn_3 . " wurde ausgew??hlt <br>";
              }
              //??berpr??fung interessaAn_4
              if(isset($_POST["interesseAn_4"])){
                $interesseAn_4 = $_POST["interesseAn_4"];
                $ausgewaelteProdukte = $ausgewaelteProdukte . " " . $interesseAn_4;
                echo $interesseAn_4 . " wurde ausgew??hlt <br>";
              }

              if(isset($_POST['angenommen']))
              {
                $angenommen = $_POST['angenommen'];
              }else{
                $fehler = "Nicht angenommen";
              } 
              
              if($fehler != "")
              {
                echo"$fehler";
                echo"<a href='http://localhost/fefifef.github.io/WebEng_2/mustermann-it-vorlage/anfrage.php?anrede=$anrede&vorname=$vorname&nachname=$nachname&land=$land&firma=$firma&anz_mit=$anz_mit&strassse=$strassse&plz=$plz&ort=$ort&mail=$mail&bemerkungen=$bemerkungen&interesseAn_1=$interesseAn_1&interesseAn_2=$interesseAn_2&interesseAn_3=$interesseAn_3&interesseAn_4=$interesseAn_4&angenommen=$angenommen'>Korrigieren</a>";
              }else
              {
                echo"Ihre Daten wurden hinterlegt sie bekommen bald ihr Angebot:";

                $fileName = 'angebotean.csv';

                if(file_exists($fileName))
                {
                  $csvFile = fopen($fileName,'a');
                } 
                else
                {
                  $csvFile = fopen($fileName,'w');
                  $head = ['Anrede','Vorname','Nachname','Land','Firma','Anzahl Mitarbeiter', 'Strassse', 'Plz', 'Ort', 'Mail', 'Bemerkungen', 'Ausgew??hlte Produkte'];
                  fputcsv($csvFile,$head,';');
                }
                    
                

                $data = [$anrede, $vorname, $nachname, $land, $firma, $anz_mit, $strassse, $plz, $ort, $mail, $bemerkungen, $ausgewaelteProdukte];

                fputcsv($csvFile,$data,';');

                fclose($csvFile);
              }

            ?>
        </p>
		

        
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

   <script src="../bootstrap5.0.1/js/bootstrap.bundle.min.js"></script>    
  </body>
</html>
