<!doctype html>
<html lang="de">
  <head>
    <?php
      require('../phpClass/ClassBeamer.php');
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
                    
                    <h1 class="display-5 fw-bold">Leih-Beamer</h1>
                    
                    <p class="col-md-9 fs-4">

                    </p>
                    
                    <?php
                        $acer_H65_Pro = new Beamer("Acer","H65 Pro", 19.00, 1000.00);
                        
                        $beamer = array($acer_H65_Pro,$acer_H65_Pro,$acer_H65_Pro);

                        foreach($beamer as $value)
                        {
                            $value -> getHersteller();
                        }
                        echo("
                        <p>
                          <table class=\"table table-striped\">
                            <tbody>
                              <tr>
                                <td> <strong> Hersteller </strong> </td>
                                <td> <strong> Modell </strong> </td>
                                <td> <strong> Tagespreis </strong> </td>
                                <td> <strong> Lumen </strong> </td>
                                <td> <strong> Wlan </strong> </td>
                                <td> <strong> Wochenpreis </strong> </td>
                              </tr>
                        ");
                        foreach($beamer as $value)
                        {
                            echo("<tr>");
                                echo("<td>" . $value -> getHersteller() . "</td>");
                                echo("<td>" . $value -> getModell() . "</td>");
                                echo("<td>" . $value -> getTagespreis() . " Euro </td>");
                                echo("<td>" . $value -> getLumen() . "</td>");
                                if($value -> getWlan() == false)
                                {
                                    echo("<td> Kein Wlan </td>");
                                }
                                echo("<td>" . $value -> getWochenpreis() . " Euro </td>");
                            echo("</tr>");
                            
                        }
                        echo("      
                            </tbody>
                          </table>
                        </p>"); 
                    ?>
                    
                    <p class="col-md-9 fs-5">
                        <a class="btn btn-outline-secondary" href="../index.php">zurück zur Startseite</a>
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

   <script src="../bootstrap5.0.1/js/bootstrap.bundle.min.js"></script>    
  </body>
</html>
