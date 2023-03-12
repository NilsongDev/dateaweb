


<?php


function conectar(){

$servername = "localhost";
$database = "postgres";
$username = "postgres";
$password = "0988";
// Create connection
$conexion  = pg_connect($servername, $username, $password, $database);
// Check connection
if (!$conexion) {
   die("Connection failed: "  );
}
echo "Connected successfully";



}
?>