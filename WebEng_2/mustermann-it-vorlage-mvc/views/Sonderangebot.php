<?php 
  class Sonderangebot extends Seite implements ISeite
  {

    public function output() : string
    {
      $tempSonderangebot = $this->model->getSpecialOffer();
      $tempSonderPreis = $this->controller->calcSpecialOfferPrice($tempSonderangebot['preis'], $this -> model -> currencyRate);
      $title = "Sonderangebot";
      $content_Block_1 = "Willkomen auf der Website von Mustermann IT-Service";
      $content_Block_2 = "Sonderangebot: {$tempSonderangebot['produktname'] }
                          zum Preis von nur {$tempSonderPreis} ". $this -> model -> currencySymbol;
      $content_Block_3 = "";


      //aktiviert die Ausgabepufferung - "echo" wird nicht ausgegeben
      ob_start();
      require "templates/default.php";
      // Ausgabepuffer auslesen
      $html = ob_get_contents();
      //deaktiviert die Ausgabepufferung
      ob_end_clean();

      return $html;
    }
  }
?>