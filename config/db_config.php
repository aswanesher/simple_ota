<?php 

$host		= "localhost";
$user		= "root";
$passw		= "";
$db			= "ota_db";

$conn = mysql_connect($host, $user, $passw);
mysql_select_db($db, $conn);

?>
