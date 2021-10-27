<?php 
  class Sonderangebot extends Seite implements ISeite
  {
    public function output() : string
    {
      $tempSonderangebot = $this->model->getSpecialOffer();
      $tempSonderPreis = $this->controller->calcSpecialOfferPrice($tempSonderangebot['preis']);

      $html="
            <html>
              <head>
                <title>Sonderangebot</title>
              </head>
          
              <body>
                <h1>Mustermann IT-Service</h1>
                <h2>Sonderangebot</h2>
                <p>
                  Sonderangebot: {$tempSonderangebot['produktname'] }
                  zum Preis von nur {$tempSonderPreis} Euro
                </p>
                <p>Zurück zur Startseite <a href='index.php'>Startseite</a> </p>
              </body>
            </html>
          ";
      
      return $html;
    }
  }
?>