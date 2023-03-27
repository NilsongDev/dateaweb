<?php
session_start();
error_reporting(0);
$idsesion =  $_SESSION['numeroIDlogin'];
include('conexion/database.php');
$consulta = "SELECT * from perfilusuario inner join especialidad_user on especialidad_user.fk_oficio_perfil = perfilusuario.codigologin inner join loginuser on loginuser.idlogin = perfilusuario.codigologin  where perfilusuario.codigologin='$idsesion' ";
$queryDatosUser = "SELECT * FROM perfilusuario WHERE codigologin= '$idsesion' ";
$consultaDatosUser = pg_query($conexion, $queryDatosUser);
$filaDatosUser = pg_num_rows($consultaDatosUser);
$queryconsulta = pg_query($conexion, $consulta);


$id = intval($idsesion);





$disponibilidad = "SELECT estado_disponible from estado_user inner join perfilusuario on perfilusuario.codigologin = estado_user.estado_fk where perfilusuario.codigologin='$id'";
$consultaEstado = pg_query($conexion, $disponibilidad);

if( $_SESSION['numeroIDlogin']==''){
    header("refresh:1;url=login.php");

}else{



if ($queryconsulta) {

?><script>
        //alert("BIENVENIDO") 
    </script><?php

                if (pg_num_rows($queryconsulta) > 0) {

                    while ($row = pg_fetch_assoc($queryconsulta)) {

                        $nombreusuario = $row["nombreuser"];
                        $apellidousuario = $row["apellidouser"];
                        $telefonousuario = $row["telefonouser"];
                        $usuarioTipoRespuesta = $row["tipouser"];
                        $comunauser = $row["comunausuario"];
                        $emailUser = $row["username"];
                        $descripcionuser = $row["descripcionuser"];
                        //$comunauser=$row["Comunausuario"];
                        $_SESSION['nombreusuario'] = $row["nombreuser"];

                        $_SESSION['emailuser'] = $row["username"];
                    }
                }
            } else {
                echo "" . $filaDatosUser;
                session_destroy();
                //header("refresh:1;url=login.php");
            }






                ?>


<?php include('../head.php');?>

<body>
<div id="primerAnuncio" class="anuncio">
        <div class="FollowUs" style="display: block;">
            <div class="Container">
                <div class="close-dv">
                    <button id="closesocial" class="close-social"><i class="fa-sharp fa-solid fa-circle-xmark fa-3x"> </i></button>
                </div>
                <aside style="text-align:center">
                    <div class="ttl">
                        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none  md:text-5xl lg:text-6xl text-blue-600 dark:text-blue-500">Recuerda Actualizar Tus Datos</h1>
                    </div>
                    <p class="text-lg font-bold dark:text-gray-400 text-gray-500">Forma Parte De Nuestra Comunidad de Datea.cl en nuestras Redes Sociales</p> <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" )> <a href="llenardatosperfil.php">Actualizar Datos</a> </button>
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


    <?php include('../navdatea.php');?>

    <style>
        :root {
            --main-color: #4a76a8;
        }

        .bg-main-color {
            background-color: var(--main-color);
        }

        .text-main-color {
            color: var(--main-color);
        }

        .border-main-color {
            border-color: var(--main-color);
        }

        .userperfil {
            flex-wrap: wrap;
        }
    </style>


    <div class="bg-gray-100 userperfil  ">

        <div class="w-full text-white bg-main-color">

            <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="p-4 flex flex-row items-center justify-between">
                    <a href="userperfil.php" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">Bienvenido a tu perfil de oficio</a>
                  
                </div>


                <!-- End of Navbar 
                <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex flex-row items-center space-x-2 w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent hover:bg-blue-800 md:w-auto md:inline md:mt-0 md:ml-4 hover:bg-gray-200 focus:bg-blue-800 focus:outline-none focus:shadow-outline">
                            <span></span>
                            <img class="inline h-6 rounded-full" src="https://w7.pngwing.com/pngs/852/10/png-transparent-computer-icons-laborer-others-miscellaneous-hat-logo.png">
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 transition-transform duration-200 transform">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="py-2 bg-white text-blue-800 text-sm rounded-sm border border-main-color shadow-sm">-->
                                <!--<a class="block px-4 py-2 mt-2 text-sm bg-white md:mt-0 focus:text-gray-900 hover:bg-indigo-100 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">CONFIGURACIÓN</a>-->
                                
                                <!-- End of Navbar 
                                <a class="block px-4 py-2 mt-2 text-sm bg-white md:mt-0 focus:text-gray-900 hover:bg-indigo-100 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="llenardatosperfil.php">ACTUALIZAR DATOS</a>
                                <div class="border-b"></div>
                                <a class="block px-4 py-2 mt-2 text-sm bg-white md:mt-0 focus:text-gray-900 hover:bg-indigo-100 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="cerrarsesion.php">CERRAR SESIÓN</a>

                            </div>
                        </div>
                    </div>
                </nav>-->


            </div>
        </div>
        <!-- End of Navbar -->
<br><br>

        <div class=" container mx-auto my-5 p-5 ">

            <div class="md:flex no-wrap md:-mx-2 ">

                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400">

                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1"><?php echo ucfirst($nombreusuario) , " ", ucfirst($apellidousuario); ?></h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">Descripción : </h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6"><?php echo ucfirst(ltrim(rtrim($descripcionuser) ) ) ; ?></p>
                        <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">

                            <ul class=" list-inside ">







                                <?php while ($estado = pg_fetch_assoc($consultaEstado)) {
                                    $estadoDisponible = $estado['estado_disponible'];
                                }

                                ?>

                                <?php


                                $estadoUSerDisponible = 1;
                                $estadoUSerNoDisponible = 2;
                                $resultadoEstado = intval($estadoDisponible);


                                $resul = isset($_POST['estado_user']);





                                // echo  "resultado while ".$resultadoEstado." resultado id".$idsesion ." resultado post ".$resul;

                                ?>


                                <h2>Tu estado es:<?php if ($estadoDisponible == 1) {
                                                        echo " DISPONIBLE";
                                                    } elseif ($estadoDisponible == 2) {
                                                        echo  " OCUPADO";
                                                    } ?> </h2>












                                <form action="estadouser.php" method="POST">



                                    <li>
                                        <div class="text-teal-600 "><input type="radio" class="text-green-500" name="estado_user" id="" value="1"> Disponible</div>
                                    </li>


                                    <li>
                                        <div class="text-teal-600"><input type="radio" class="text-red-500" name="estado_user" id="" value="2"> No Disponible</div>
                                    </li>







                                    <br>
                                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Actualizar Estado</button>
                                </form>






                            </ul>



                        </ul>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>
                    <!-- Friends card -->

                </div>
                <!-- Right Side -->



                <div class="w-full md:w-9/12 mx-2">
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">DATOS PERSONALES</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold"> NOMBRE</div>
                                    <div class="px-4 py-2"><span><?php echo ucfirst($nombreusuario); ?></span></div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">APELLIDO</div>
                                    <div class="px-4 py-2"><?php echo ucfirst($apellidousuario); ?></div>
                                </div>

                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">NÚMERO CONTACTO</div>
                                    <div class="px-4 py-2">+569 <?php echo  $telefonousuario; ?></div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">EMAIL</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800" href="mailto:jane@example.com"><?php echo  $emailUser; ?></a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold"></div> <!-- tipo de usuario-->
                                    <div class="px-4 py-2"><?php echo $usuarioTipoRespuesta; ?></div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">COMUNA</div>
                                    <div class="px-4 py-2"><?php echo $comunauser; ?></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End of about section -->


                    <?php

                    // $consultaOficios = "SELECT* from perfilusuario inner join especialidad_user on  especialidad_user.fk_oficio_perfil=perfilusuario.codigologin where perfilusuario.codigologin ='$idsesion'";
                    $consultaOficios = "SELECT* from oficio_user inner join perfilusuario on  perfilusuario.codigologin=fk_oficio_user where perfilusuario.codigologin ='$idsesion'";

                    $resultadoOficios = pg_query($conexion, $consultaOficios);

                    if (pg_num_rows($resultadoOficios) > 0) {

                        while ($row = pg_fetch_assoc($resultadoOficios)) {

                            $oficio = $row["nombre_oficio"];


                            $_SESSION['oficioUser'] = $oficio;
                        }
                    }


                



                    ?>

                    <br>

                    <div class="bg-white p-3 shadow-sm rounded-sm">

                        <div class="grid grid-cols-2">
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">EXPERIENCIA TRABAJO</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="text-teal-600"><?php
                                                                    echo $oficio;
                                                                    ?></div>

                                    </li>

                                </ul>
                            </div>

                        </div>
                       <!-- End of Experience and education grid -->
                    </div>
                </div>
            </div>
            <br><br>
            <script>
                $(function() {
                    $(document).ready(function() {
                        $('.fantasma').change(function() {
                            if (!$(this).prop('checked')) {
                                $('#dvOcultar').hide();

                            } else {

                                $('#dvOcultar').show();
                            }

                        })

                    })
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#dvOcultar').hide();
                });
            </script>
            <script>
                function eliminarcuenta(id) {
                    alert('Eliminando cuenta ahora.');

                    if (id === <?php echo $id ?>) {

                        alert('Muchas Gracias.');
                        


                    }else{
                        alert('no son iguales');
                    }


                }
            </script>







            <label for="cbmostrar">
                <input type="checkbox" name="cbmostrar" class="fantasma" />
                Desbloquear el boton para eliminar cuenta.


            </label>
            <div id="dvOcultar">

            <form action="../paginas/eliminarcuenta.php" method="post">

                <button type="submit" onclick="return eliminarcuenta(<?php echo $id ?>)" class=" float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"> ELIMINAR CUENTA</button>



            </form>









            </div>



        </div>
        <br><br>
    </div>
  














    <?php include('../footer.php');?> 
    
    <?php
}
    ?>
