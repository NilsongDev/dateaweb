


<?php




$servername = "localhost";
$database = "postgres";
$username = "postgres";
$password = "0988";

$conexion = pg_connect("host=$servername dbname=$database user=$username password=$password"); // Check connection

if (!$conexion) {
   die("Connection failed: ");
}



?>


