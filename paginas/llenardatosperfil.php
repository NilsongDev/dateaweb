<?php
session_start();
include('conexion/database.php');

$identificador = $_SESSION['numeroIDlogin'];



$traerdatos = "SELECT oficio_user.nombre_oficio,perfilusuario.descripcionuser ,perfilusuario.iduser,perfilusuario.nombreuser, perfilusuario.apellidouser, perfilusuario.telefonouser, perfilusuario.tipouser, perfilusuario.comunausuario,loginuser.username FROM perfilusuario inner join loginuser on loginuser.idlogin = perfilusuario.codigologin inner join oficio_user on oficio_user.fk_oficio_user = loginuser.idlogin where loginuser.idlogin='$identificador' ";

$res = pg_query($conexion, $traerdatos);

$fila = pg_num_rows($res);

if ($fila) {


    if (pg_num_rows($res) > 0) {
        while ($row = pg_fetch_assoc($res)) {



            $nombreUsuario = $row["nombreuser"];
            $apellidoUsuario = $row["apellidouser"];
            $telefonoUsuario = $row["telefonouser"];
            $tipoUsuario = $row["tipouser"];
            $comunaUsuario = $row["comunausuario"];
            $emailUsuario = $row["username"];
            $descripcionUsuario = $row["descripcionuser"];
            $oficioUser=$row["nombre_oficio"];
            //header("refresh:1;url=llenardatosperfil.php");
            //header("refresh:1;url=userperfil.php");

        }
    }
} else {



    //echo "bad";





}



$oficio= $_SESSION['oficioUser'];


$oficioFinal= strval($oficio);





$ceramista="Ceramista";












?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido DATEA</title>
    <link rel="stylesheet" href="componentes/css/stylePublicidad.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.5.0/dist/css/splide.min.css">
</head>

<body>

    <nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900  w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="../index.php" class="flex items-center">
                <img src="../componentes/images/logooobueno.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">DATEA.CL</span>
            </a>
            <div class="flex md:order-2">

                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">

                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-default">
                <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="../index.php" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">INICIO</a>
                    </li>
                    <li>
                        <a href="../categorias.php?pagina=1" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">CATEGORIAS</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>











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
                    <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">Completar Datos Personales</a>

                </div>

            </div>



        </div>
        <!-- End of Navbar -->













        <div class="   relative p-20 flex flex-col sm:justify-center items-center">


            <div class="md:flex no-wrap  ">

                <!-- inicio formulario -->

                <form action="validarllenadoperfil.php" method="POST">


                    <div class="w-full md:w-9/12 mx-2">

                        <div class="w-full   md:grid-cols-5">
                            <!-- Profile Card -->
                            <div class="bg-white p-3 border-t-4  ">

                                <h3 class="text-gray-600 font-lg text-semibold  leading-10">Descripción breve : </h3>
                                <input type="text" placeholder="texto" class="w-full" name="descripcionusuario" maxlength="99" value="<?php echo ucfirst(rtrim(ltrim($descripcionUsuario))) ; ?>">

                            </div>
                            <!-- End of profile card -->
                            <div class="my-4"></div>
                            <!-- Friends card -->

                        </div>

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

                                <script>
                                    function soloLetras(e) {
                                        key = e.keyCode || e.which;
                                        tecla = String.fromCharCode(key).toLowerCase();
                                        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                                        especiales = [8, 37, 39, 46];

                                        tecla_especial = false
                                        for (var i in especiales) {
                                            if (key == especiales[i]) {
                                                tecla_especial = true;
                                                break;
                                            }
                                        }

                                        if (letras.indexOf(tecla) == -1 && !tecla_especial)
                                            return false;
                                    }

                                    function limpia() {
                                        var val = document.getElementById("miInput").value;
                                        var tam = val.length;
                                        for (i = 0; i < tam; i++) {
                                            if (!isNaN(val[i]))
                                                document.getElementById("miInput").value = '';
                                        }
                                    }
                                </script>



                                <div class="grid md:grid-cols-5 text-sm">
                                    <div class=" grid-cols-2">
                                        <div class="px-4 py-2 font-semibold"> NOMBRE</div>
                                        <div class="px-4 py-2"><input type="text" name="nombreusuario" maxlength="50" value="<?php echo trim($nombreUsuario);  ?>"        onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput"     > </div>
                                    </div>


                                    <div class="grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">APELLIDO</div>
                                        <div class="px-4 py-2"> <input type="text" name="apellidousuario" maxlength="50" value="<?php echo trim($apellidoUsuario);  ?>"     onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput"   ></div>
                                    </div>

                                  

                               


                                    <!-- 
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">TIPO USUARIO</div>
                                        <div class="px-4 py-2">

                                            <input name="intereses" type="radio" value="1" /> Con oficio
                                            <br /><br />
                                            <input name="intereses" type="radio" value="2" /> Sin oficio

                                        </div>
                                    </div>  -->

                                </div>


                                <div class="grid md:grid-cols-5 text-sm">

                                    <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">NÚMERO CONTACTO</div>
                                            <div class="px-4 py-2"><input type="text" name="telefonousuario" pattern="[0-9]+" minlength="8" maxlength="8" value="<?php echo $telefonoUsuario;  ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"> </div>
                                        </div>

                                  

                                </div>





















                            </div>

                        </div>
                        <!-- End of about section -->




                        <div class="comunas">
                            <h1>SELECCIONAR COMUNA</h1>
                            <select class="names regg container p-3 m-6" name="comunas">
                                <option name="comunausuario"  value="">Seleccionar Comuna</option>


                                    <?php  if( trim($comunaUsuario) =="Concepción" ){

                                        ?> <option name="comunausuario" selected value="Concepción">Concepción</option>   <?php

                                        }else{
                                               ?> <option name="comunausuario"  value="Concepción">Concepción</option><?php 

                                    }    ?>

                               



                                    <?php if(trim($comunaUsuario)=="Coronel" ){

                                       ?> <option name="comunausuario" selected value="Coronel">Coronel</option> <?php         
                                    }else{

                                        ?> <option name="comunausuario" value="Coronel">Coronel</option> <?php     
                                    }
                                    
                                    
                                    ?>

                               
                                    <?php if( trim($comunaUsuario)=="Chiguayante" ){

                                        ?> <option name="comunausuario" selected value="Chiguayante">Chiguayante</option><?php

                                    }else{

                                        ?>  <option name="comunausuario" value="Chiguayante">Chiguayante</option> <?php
                                    }
                                    
                                    
                                    ?>    


                                    <?php if(trim($comunaUsuario)=="Florida" ){

                                        ?> <option name="comunausuario" selected value="Florida">Florida</option>   <?php

                                    }else{


                                        ?>  <option name="comunausuario" value="Florida">Florida</option>  <?php

                                    } ?>
                               
                                




                                            <?php if(trim($comunaUsuario)=="Hualqui" ){

                                            ?>  <option name="comunausuario" selected value="Hualqui">Hualqui</option>   <?php

                                        }else{


                                            ?>  <option name="comunausuario" value="Hualqui">Hualqui</option>  <?php

                                        } ?>




                                            <?php if(trim($comunaUsuario)=="Lota" ){

                                            ?>  <option name="comunausuario" selected value="Lota">Lota</option>  <?php

                                            }else{


                                            ?>  <option name="comunausuario" value="Lota">Lota</option>  <?php

                                            } ?>



                                                <?php if(trim($comunaUsuario)=="Penco" ){

                                                ?>  <option name="comunausuario" selected value="Penco">Penco</option>  <?php

                                                }else{


                                                ?>  <option name="comunausuario" value="Penco">Penco</option>  <?php

                                                } ?>


                                                

                                                <?php if(trim($comunaUsuario)=="San_pedro" ){

                                                ?>  <option name="comunausuario" selected value="San_pedro">San Pedro</option> <?php

                                                }else{


                                                ?>  <option name="comunausuario" value="San_pedro">San Pedro</option>  <?php

                                                } ?>



                                                <?php if(trim($comunaUsuario)=="Santa_juana" ){

                                                ?>  <option name="comunausuario" selected value="Santa_juana">Santa juana</option> <?php

                                                }else{


                                                ?>  <option name="comunausuario" value="Santa_juana">Santa juana</option>  <?php

                                                } ?>




                                                <?php if(trim($comunaUsuario)=="Talcahuano" ){

                                                ?>  <option name="comunausuario" selected value="Talcahuano">Talcahuano</option> <?php

                                                }else{


                                                ?>  <option name="comunausuario" value="Talcahuano">Talcahuano</option>  <?php

                                                } ?>



                                                <?php if(trim($comunaUsuario)=="Tome" ){

                                                ?>  <option name="comunausuario" selected value="Tome">Tomé</option> <?php

                                                }else{


                                                ?>  <option name="comunausuario" value="Tome">Tomé</option>  <?php

                                                } ?>


                                                <?php if(trim($comunaUsuario)=="Hualpen" ){

                                                ?>  <option name="comunausuario" selected value="Hualpen">Hualpén</option> <?php

                                                }else{


                                                ?>  <option name="comunausuario" value="Hualpen">Hualpén</option> <?php

                                                } ?>
                                                                                
                                
                                
                                
                            
                                
                            </select>

                        </div>






                        <div class="bg-white p-3 shadow-sm rounded-sm">

                            <div class="grid grid-cols-2">
                                <div>
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                        <span clas="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide"> TIPO ESPECIALIDAD</span>
                                    </div>
                                    <ul class="list-inside space-y-2">
                                        <?php if (strcmp(trim($oficioFinal) , "Carpinteria") === 0) { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" checked name="oficio_user" id="" value="1"> CARPINTERIA</div>
                                            </li>
                                        <?php  } else { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" name="oficio_user" id="" value="1"> CARPINTERIA</div>
                                            </li>
                                        <?php  }  ?>   
                                        <?php if (strcmp(trim($oficioFinal) , "Soldador") === 0) { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" checked name="oficio_user" id="" value="2"> SOLDADOR</div>
                                            </li>
                                        <?php  } else { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" name="oficio_user" id="" value="2"> SOLDADOR</div>
                                            </li>
                                        <?php  }  ?>
                                        <?php if (strcmp(trim($oficioFinal) , "Electrico") === 0) { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" checked name="oficio_user" id="" value="3">  ELECTRICO</div>
                                            </li>
                                        <?php  } else { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" name="oficio_user" id="" value="3"> ELECTRICO</div>
                                            </li>
                                        <?php   }  ?>
                                        <?php if (strcmp(trim($oficioFinal) , "Gasfiter") === 0) { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" checked name="oficio_user" id="" value="4"> GASFITER</div>
                                            </li>
                                        <?php  } else { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" name="oficio_user" id="" value="4"> GASFITER</div>
                                            </li>
                                        <?php  }  ?>

                                        <?php if (strcmp(trim($oficioFinal) , "Pintor") === 0) { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" checked name="oficio_user" id="" value="5"> PINTOR</div>
                                            </li>
                                        <?php   } else { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" name="oficio_user" id="" value="5"> PINTOR</div>
                                            </li>
                                        <?php  }  ?>

                                        <?php if (strcmp(trim($oficioFinal) , "Albañil") === 0) { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" checked name="oficio_user" id="" value="6"> ALBAÑIL</div>
                                            </li>
                                        <?php  } else {  ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" name="oficio_user" id="" value="6"> ALBAÑIL</div>
                                            </li>
                                        <?php  }  ?>

                                        <?php if (strcmp(trim($oficioFinal) , "Ceramista") === 0) { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" checked name="oficio_user" id="" value="7"> CERAMISTA</div>
                                            </li>
                                        <?php  } else { ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" name="oficio_user" id="" value="7"> CERAMISTA</div>
                                            </li>
                                        <?php  }   ?>

                                        <?php if (strcmp(trim($oficioFinal) , "Estructurero") === 0) {  ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" checked name="oficio_user" id="" value="8"> ESTRUCTURERO</div>
                                            </li>
                                        <?php  } else {  ?>
                                            <li>
                                                <div class="text-teal-600"><input type="radio" name="oficio_user" id="" value="8"> ESTRUCTURERO</div>
                                            </li>
                                        <?php  }  ?>         

                                    </ul>

                                </div>

                            </div>
                            <!-- End of Experience and education grid -->
                        </div>


                    </div>
                    <br>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        ACTUALIZAR DATOS
                    </button>

                </form>


            </div>
        </div>
    </div>

















    <footer class="p-4 bg-white sm:p-6 dark:bg-gray-900 ">
        <div class="md:flex md:justify-between ">
            <div class="mb-6 md:mb-0">
                <a href="#" class="flex items-center">
                    <img src="../componentes/images/logooobueno.png" class="mr-3 h-8" alt="FlowBite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Datea.cl</span>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3 ">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Sobre Nosotros</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="../quienessomos.php" class="hover:underline">Quiénes somos</a>
                        </li>

                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Mesa de Ayuda</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="../contacto.php" class="hover:underline ">Contacto</a>
                        </li>

                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="../politicas.php" class="hover:underline">Política de Privacidad</a>
                        </li>
                        <li>
                            <a href="../terminos.php" class="hover:underline">Términos &amp; Condiciones</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between ">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="#" class="hover:underline">Datea.cl™</a>. Todos los derechos reservados.
            </span>
            <div class="flex mt-4 space-x-6 sm:justify-center  sm:mt-0">
                <a href="https://www.facebook.com/profile.php?id=100087575364005" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only ">Facebook page</span>
                </a>
                <a href="https://www.instagram.com/datea.cl/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Instagram page</span>
                </a>
                <a href="https://twitter.com/datea_cl" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                    <span class="sr-only">Twitter page</span>
                </a>

            </div>
        </div>
    </footer>







    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="componentes/js/scripSlider.js"></script>
    <!-- para iconos con font awesome -->
    <script src="https://kit.fontawesome.com/6d44736547.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

</body>

</html>