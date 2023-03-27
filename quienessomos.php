<?php

session_start();
include('paginas/conexion/database.php');
$queryDatosPerfil = "SELECT * from perfilusuario limit 16";
$resultado = pg_query($conexion, $queryDatosPerfil);

if (isset($_SESSION['nombreusuario'])) {

    $nombreuser = $_SESSION['nombreusuario'];
} else {
    $nombreuser = "Usuario";
}

if (isset($_SESSION['emailuser'])) {
    $emailuser = $_SESSION['emailuser'];
} else {
    $emailuser = "ejemplo@gmail.com";
}





?>

<?php include('head.php');?>

<body>

    <!-- propaganda tipo PopUp de bienvenida y boton de registro -->
    <div id="primerAnuncio" class="anuncio">
        <div class="FollowUs" style="display: block;">
            <div class="Container">
                <div class="close-dv">
                    <button id="closesocial" class="close-social"><i class="fa-sharp fa-solid fa-circle-xmark fa-3x"> </i></button>
                </div>
                <aside style="text-align:center">
                    <div class="ttl">
                        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none  md:text-5xl lg:text-6xl text-blue-600 dark:text-blue-500">BIENVENIDO A LA COMUNIDAD DE LA CONSTRUCCIÓN DEL</h1><h1 class="mb-4 text-4xl font-extrabold inline-block md:text-5xl lg:text-6xl  dark:text-blue-900 text-blue-900">BIO-BÍO</h1>
                    </div>
                    <p class="text-lg font-bold dark:text-gray-400 text-gray-500">Regístrate o sigue nuestras Redes Sociales</p> <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" )> <a href="paginas/formularioRegistro.php">REGISTRATE</a> </button>
                </aside>
                <ul>
                    <li class="fcb">
                        <a href="https://www.facebook.com/profile.php?id=100087575364005" target="_blank">
                            <i class="fa-brands fa-facebook"></i>
                            <span>Datea.cl</span>
                        </a>
                    </li>
                    <li class="twt">
                        <a href="https://twitter.com/datea_cl" target="_blank">
                            <i class="fa-brands fa-square-twitter"></i>
                            <span>Datea.cl</span>
                        </a>
                    </li>
                    <li class="nst">
                        <a href="https://www.instagram.com/datea.cl/" target="_blank">
                            <i class="fa-brands fa-square-instagram"></i>
                            <span>Datea.cl</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <script>
        window.onload = function() {
            document.getElementById('closesocial').onclick = function() {
                this.parentNode.parentNode.parentNode
                    .removeChild(this.parentNode.parentNode);
                return false;
            };
        };
    </script>



    <style>
        li {
            list-style: none
        }
    </style>


    <!-- navbar con tailwild-->

    <?php include('navdatea.php');?>


    <br>





    <br>
    <div class="flex justify-center">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none  md:text-5xl lg:text-6xl text-blue-600 dark:text-blue-500">QUIÉNES SOMOS</h1>
    </div>

    <div class=" flex justify-center  h-screen">


        <br>
        <div>
            <h4 class="mb-4 text-2xl tracking-tight p-24 md:text-2xl lg:text-2xl text-blue-600 dark:text-blue-500">Este pequeño sitio web es una prototipo de publicador de perfiles de oficio de trabajo del area de la construcción, el cual desempeña el rol de publicar información de manera de un usuario,  con la finalidad de poder llegar a una mayor cantidad de gente posible. </h4>





        </div>






    </div>



    <br>




    <?php include('footer.php');?>