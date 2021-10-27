<?php
class ShopData
{
    private $link;
    function __construct()
    {
        $this -> link = mysqli_connect("localhost","root","","webeng2_1") or die("Die DB Verbindung geht nicht");
    }
    public function getSpecialOffer()
    {
        $sql = "SELECT produktname, preis FROM shop WHERE sonderangebot = 1 LIMIT 1";
        $result = mysqli_query($this->link,$sql);
        $temp = mysqli_fetch_assoc($result);

    	return $temp;
    }

    
}