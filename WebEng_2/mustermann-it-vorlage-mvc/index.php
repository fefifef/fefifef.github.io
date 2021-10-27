<?php 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

// Daten-"Model"
require "classes/ShopData.php";
$model = new ShopData();

// Shop-"Controller"
require "classes/ShopActions.php";
$controller = new ShopActions($model);

//"Vorlagen" für Views
require "views/Seite.php";  // Eltern-Klasse "Seite"
require "views/ISeite.php"; // Interface "ISeite"

// View
if(isset($_REQUEST['page']))
{
    $page = $_REQUEST['page'];
}else
{
    $page = "Startseite";
}
$page = str_replace(".","",$page);
$page = str_replace("/","",$page);

$pagePath = "views/$page.php";
if(!file_exists($pagePath))
{
    $page = "Startseite";
}




require "views/$page.php";
$view = new $page($controller,$model);




// Ausgabe
echo $view->output();
