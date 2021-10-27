<?php 
  class Startseite extends Seite implements ISeite
  {
    public function output() : string
    {
      $title = "Mustermann IT-Service";
      $content_Block_1 = "Willkomen auf der Website von Mustermann IT-Service";
      $content_Block_2 = "<a href='?page=Impressum'>Impressum</a>";
      $content_Block_3 = "<a href='?page=Sonderangebot'>Sonderangebot in Euro</a> <br/>
                          <a href='?page=Sonderangebot&action=setCurrencyToUsd'>Sonderangebot in USD</a>";


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
