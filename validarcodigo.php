<?php
session_start();
include('paginas/conexion/database.php');

$idsesion =  $_SESSION['numeroIDlogin'];
$codigo = $_POST['codigovalidacion'];









?>
<?php

$consultaEstadoUser = "SELECT codigo_email from validar_email where pkuser_email =' $idsesion'";
$estadoUsuario = pg_query($conexion,  $consultaEstadoUser);


while ($row = pg_fetch_assoc($estadoUsuario)) {
    $estadoActual = $row["codigo_email"];


    if (trim($codigo) === trim($estadoActual)) {

?>
        <html>

        <head>
            <script src="https://cdn.tailwindcss.com"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>

        <body>
            <script>
                Swal.fire({

                    icon: 'success',
                    title: 'Aprobado',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        </body>

        </html>




    <?php






        $estadoAprobado='si';
        $actualizarDatos = "UPDATE validar_email SET estado_email='$estadoAprobado' where pkuser_email='   $idsesion' ";
        $estadoAprobadoUsuario = pg_query($conexion,  $actualizarDatos);
        header("refresh:1;url=/sistemawebtesis/paginas/userperfil.php");

    } else {


    ?>
        <html>

        <head>
            <script src="https://cdn.tailwindcss.com"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>

        <body>
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Error',

                    showConfirmButton: false,

                })
            </script>
        </body>

        </html>




<?php







        header("refresh:1;url=/sistemawebtesis/codigovalidaremail.php");
    }
}





?>