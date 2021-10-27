<?php 
  class Impressum extends Seite implements ISeite
  {
    public function output() : string
    {
      $html="
            <html>
              <head>
                <title>Impressum</title>
              </head>
          
              <body>
                <h1>Mustermann IT-Service</h1>
                <h2>Impressum</h2>
                <p>
                  Willkommen auf der Website von Mustermann IT-Service
                </p>
                <p>Zurück zur Startseite <a href='index.php'>Startseite</a> </p>
              </body>
            </html>
          ";
      
      return $html;
    }
  }
?>