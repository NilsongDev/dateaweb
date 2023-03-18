<?php 
session_start();

include('conexion/database.php');
$idsesion =  $_SESSION['numeroIDlogin'];

$estado= $_POST['estado_user'];

$id=intval($idsesion);



if($estado == 1 ){



   
$actualizarEstado="UPDATE estado_user SET  estado_disponible =1 where estado_fk='$id' ";
$queryEstadoD=pg_query($conexion,$actualizarEstado);

}elseif($estado ==2){




$actualizarEstado="UPDATE estado_user SET  estado_disponible =2 where estado_fk='$id' ";
$queryEstadoD=pg_query($conexion,$actualizarEstado);

}




header("refresh:0;url=userperfil.php");
?>