<?php
$usuario = $_POST['usuario'];
$password = $_POST['clave'];
session_start();
$_SESSION['user'] = $usuario;


$conexion = pg_connect("host=localhost dbname=postgres user=postgres password=0988");




$dato = $password;



 //Metodo de encriptaciÃ³n
 $method = 'aes-256-cbc';
 // Puedes generar una diferente usando la funcion $getIV()
 $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
 
 /*
 Encripta el contenido de la variable, enviada como parametro.
 */
 $encriptar = function ($valor) use ($method, $dato, $iv) {
     return openssl_encrypt ($valor, $method, $dato, false, $iv);
 };

 //Encripta informaciÃ³n:
 $dato_encriptado = $encriptar($dato);









$consulta = "SELECT * FROM loginuser WHERE username='$usuario' AND password1='$dato_encriptado'";

$rs = pg_query($conexion, $consulta);

$fila = pg_num_rows($rs);
if ($fila) {
  //header("location:index.php");

  

//aqui se busca la encryptacion del password que se paresca

//y se captura el password sin encryptar ingresado de manera numerica o string

//se transforma y encrypta para luego comparar con el ingresado.












  $consultaID = "SELECT idlogin from loginuser where username='$usuario'";
  $resultadoID = pg_query($conexion, $consultaID);
  if ($resultadoID) {

    if (pg_num_rows($resultadoID) > 0) {
      while ($row = pg_fetch_assoc($resultadoID)) {

        $numeroIDuser = $row["idlogin"];


        $_SESSION['numeroIDlogin'] = $numeroIDuser;



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
              title: 'Bienvenido',
              showConfirmButton: false,
              timer: 1500
            })
          </script>
        </body>

        </html>


  <?php


        //header("refresh:1;url=llenardatosperfil.php");


        header("refresh:1;url=userperfil.php");
      }
    }
  }
} else {

  //echo "ERROR";
  header("refresh:2;url=../index.php");
  ?>
  <html>

  <head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

  <body>
    <div wire:loading class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden bg-gray-700 opacity-75 flex flex-col items-center justify-center">
      <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-4"></div>
      <h2 class="text-center text-white text-xl font-semibold">Cargando...</h2>
      <p class="w-1/3 text-center text-white">Esto puede tardar unos segundos, por favor no cierre esta página.</p>
    </div>

    <style>
      .loader {
        border-top-color: #3498db;
        -webkit-animation: spinner 1.5s linear infinite;
        animation: spinner 1.5s linear infinite;
      }

      @-webkit-keyframes spinner {
        0% {
          -webkit-transform: rotate(0deg);
        }

        100% {
          -webkit-transform: rotate(360deg);
        }
      }

      @keyframes spinner {
        0% {
          transform: rotate(0deg);
        }

        100% {
          transform: rotate(360deg);
        }
      }
    </style>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '¡Algo salió mal!',
        showConfirmButton: false,

      })
    </script>


  </body>

  </html>




<?php
}

pg_free_result($rs);
pg_close($conexion);



?>