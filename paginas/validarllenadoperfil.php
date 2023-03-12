<?php
session_start();
error_reporting(0);
$iduser= $_SESSION['numeroIDlogin'];


$conexion = pg_connect("host=localhost dbname=postgres user=postgres password=0988");

//$descripcionDeUsuario = $_POST['descripcionusuario'];

$nombreDeUsuario = $_POST['nombreusuario'];
$apellidoDeUsuario = $_POST['apellidousuario'];
$telefonoDeUsuario = $_POST['telefonousuario'];
$comunaDeUsuario = $_POST['comunausuario'];
$tipoDeUsuario = $_POST['intereses'];
$descripcion= $_POST['descripcionusuario'];








switch($_POST['oficio_user']){

    case 1:
        $oficioCarpinteria="Carpinteria";
        $actualizarOficio="UPDATE oficio_user SET  nombre_oficio =' $oficioCarpinteria' where fk_oficio_user='$iduser' ";
        $resultadoOficio=pg_query($conexion,$actualizarOficio);
        break;


    case 2:
        $oficioSoldadura="Soldador";
        $actualizarOficio="UPDATE oficio_user SET  nombre_oficio =' $oficioSoldadura' where fk_oficio_user='$iduser' ";
        $resultadoOficio=pg_query($conexion,$actualizarOficio);
        break;
        
    case 3:
        $oficioElectrico="Electrico";
        $actualizarOficio="UPDATE oficio_user SET  nombre_oficio =' $oficioElectrico' where fk_oficio_user='$iduser' ";
        $resultadoOficio=pg_query($conexion,$actualizarOficio);
        break;

    case 4:
        $oficioGasfiter="Gasfiter";
        $actualizarOficio="UPDATE oficio_user SET  nombre_oficio =' $oficioGasfiter' where fk_oficio_user='$iduser' ";
        $resultadoOficio=pg_query($conexion,$actualizarOficio);
        break;

    case 5:
        $oficioPintor="Pintor";
        $actualizarOficio="UPDATE oficio_user SET  nombre_oficio =' $oficioPintor' where fk_oficio_user='$iduser' ";
        $resultadoOficio=pg_query($conexion,$actualizarOficio);
        break;

    case 6:
        $oficioAlbanil="Albañil";
        $actualizarOficio="UPDATE oficio_user SET  nombre_oficio =' $oficioAlbanil' where fk_oficio_user='$iduser' ";
        $resultadoOficio=pg_query($conexion,$actualizarOficio);
        
        break;

    case 7:
        $oficioCeramista="Ceramista";
        $actualizarOficio="UPDATE oficio_user SET  nombre_oficio = '$oficioCeramista' where fk_oficio_user='$iduser' ";
        $resultadoOficio=pg_query($conexion,$actualizarOficio);
        $_SESSION['return']=1;
        break;

    case 8:
        $oficioEstructurero="Estructurero";
        $actualizarOficio="UPDATE oficio_user SET  nombre_oficio =' $oficioEstructurero' where fk_oficio_user='$iduser' ";
        $resultadoOficio=pg_query($conexion,$actualizarOficio);
        break;
}


if($_REQUEST['comunas']== "Concepción"){
   $resultadoComuna=$_REQUEST['comunas'];
}

if($_REQUEST['comunas']== "Coronel"){
    $resultadoComuna=$_REQUEST['comunas'];
}

if($_REQUEST['comunas']== "Chiguayante"){
    $resultadoComuna=$_REQUEST['comunas'];
}

if($_REQUEST['comunas']== "Florida"){
    $resultadoComuna=$_REQUEST['comunas'];
}

if($_REQUEST['comunas']== "Hualqui"){
    $resultadoComuna=$_REQUEST['comunas'];
}

if($_REQUEST['comunas']== "Lota"){
    $resultadoComuna=$_REQUEST['comunas'];
}

if($_REQUEST['comunas']== "Penco"){
    $resultadoComuna=$_REQUEST['comunas'];
}

if($_REQUEST['comunas']== "San_pedro"){
    $resultadoComuna=$_REQUEST['comunas'];
}

if($_REQUEST['comunas']== "Santa_juana"){
    $resultadoComuna=$_REQUEST['comunas'];
}

if($_REQUEST['comunas']== "Talcahuano"){
    $resultadoComuna=$_REQUEST['comunas'];
}

if($_REQUEST['comunas']== "Tome"){
    $resultadoComuna=$_REQUEST['comunas'];
}

if($_REQUEST['comunas']== "Hualpen"){
    $resultadoComuna=$_REQUEST['comunas'];
}




$actualizarDatos = "UPDATE perfilusuario SET nombreuser='$nombreDeUsuario', apellidouser='$apellidoDeUsuario', telefonouser='$telefonoDeUsuario', comunausuario='$resultadoComuna', descripcionuser=' $descripcion' where codigologin='$iduser' ";

//$actualizarOficios = "UPDATE especialidad_user SET oficio_pintor='$oficioPIN', oficio_carpintero='$oficioCAR', oficio_albanil='$oficioALB', oficio_soldador='$oficioSOL', oficio_gasfiter='$oficioGAS', oficio_electrico='$oficioELEC', oficio_estructura='$oficioESTR', oficio_ceramica='$oficioCERA' WHERE fk_oficio_perfil='$iduser'";



//$resultado=pg_query($conexion,$actualizarOficios);
$res = pg_query($conexion,$actualizarDatos);



?>

<html>
<head>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    



<?php




if($res ){

    ?>
         <script>
            Swal.fire({
              
              icon: 'success',
              title: 'Actualizado correctamente',
              showConfirmButton: false,
              timer: 1500
            })
          </script>
    
    
    <?php
    header("refresh:1;url=userperfil.php");

}else{



    
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: 'algo ocurrio!',
            showConfirmButton: false,
            
            
        })
    </script>
    
<?php
header("refresh:1;url=userperfil.php");



}








?>
</body>
</html>