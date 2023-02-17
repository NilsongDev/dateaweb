<?php 
session_start();
$idsesion =  $_SESSION['numeroIDlogin'];
$conexion = pg_connect("host=localhost dbname=postgres user=postgres password=0988");
$id = intval($idsesion);






$consulta2 = "DELETE FROM oficio_user WHERE fk_oficio_user = $id";
pg_query($conexion, $consulta2);


$consulta3 = "DELETE FROM tipo_user WHERE fk_login_tipo = $id";
pg_query($conexion, $consulta3);


$consulta4 = "DELETE FROM especialidad_user WHERE fk_oficio_perfil = $id";
pg_query($conexion, $consulta4);


$consulta5 = "DELETE FROM estado_user WHERE estado_fk = $id";
pg_query($conexion, $consulta5);
 


$consulta6 = "DELETE FROM extra_datos_user WHERE fk_extra_perfil = $id";
pg_query($conexion, $consulta6);



$consulta7 = "DELETE FROM perfilusuario WHERE codigologin = $id";
pg_query($conexion, $consulta7);


$consulta1 = "DELETE FROM loginuser WHERE idlogin = $id";
 pg_query($conexion, $consulta1);

session_destroy();
header("refresh:0;url=../index.php");



























?>