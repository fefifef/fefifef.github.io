<?php 
  class Impressum extends Seite implements ISeite
  {
    public function output() : string
    {
      $title = "Impressum";
      $content_Block_1 = "Willkomen auf der Website von Mustermann IT-Service";
      $content_Block_2 = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
      sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.";
      $content_Block_3 = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
      sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.";


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