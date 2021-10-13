<?php
ini_set("session.use_trans_sid","1");
ini_set("session.use_cookies","0");
ini_set("session.use_only_cookies","0");
session_start();
if(isset($_SESSION['zaehler']))
{
    $z = $_SESSION['zaehler'];
}else
{
    $z = 0;
}

$z++;
$_SESSION['zaehler']=$z;

echo "Zaehler: $z";
echo "<a href='session_test.php'>Neu laden</a>";
?>