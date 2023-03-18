<?php 
header('Cache-Control: no cache'); //no cache

session_start();
error_reporting(0);
include('paginas/conexion/database.php');
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
$comuna = strval($_POST['comunas']);




if(isset($_POST['check'])){


    if($comuna == "Concepción" || $comuna== "Coronel" || $comuna== "Chiguayante" ||$comuna== "Florida" || $comuna== "Hualqui" || $comuna== "Lota" || $comuna== "Penco" || $comuna== "San_pedro" ||$comuna== "Santa_juana" || $comuna== "Talcahuano" || $comuna== "Tome" ||$comuna== "Hualpen" ){
        $resultadoComuna= trim($comuna) ;
        

        switch($_POST['check']){

            case 1:
                $pintor="Pintor";
                $select2 = "SELECT * from perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin inner join estado_user on estado_user.estado_fk=perfilusuario.codigologin where perfilusuario.comunausuario like '%$resultadoComuna%' and oficio_user.nombre_oficio like'%$pintor%'";
                $resultado1 = pg_query($conexion, $select2);
                break;
    
     
            case 2:
                $soldador="Soldador";
                $select2 = "SELECT * from perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin inner join estado_user on estado_user.estado_fk=perfilusuario.codigologin where perfilusuario.comunausuario = '$resultadoComuna' and oficio_user.nombre_oficio like'%$soldador%'";
                $resultado1 = pg_query($conexion, $select2);
                break;
                
            case 3:
                $gasfiter="Gasfiter";
                $select2 = "SELECT * from perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin inner join estado_user on estado_user.estado_fk=perfilusuario.codigologin where perfilusuario.comunausuario = '$resultadoComuna' and oficio_user.nombre_oficio like '%$gasfiter%'";
                $resultado1 = pg_query($conexion, $select2);
                break;
    
            case 4:
                $carpintero="Carpin";
                $select2 = "SELECT * from perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin inner join estado_user on estado_user.estado_fk=perfilusuario.codigologin where perfilusuario.comunausuario = '$resultadoComuna' and oficio_user.nombre_oficio like '%$carpintero%'";
                $resultado1 = pg_query($conexion, $select2);
                break;
    
            case 5:
                $albanil="Albañil";
                $select2 = "SELECT * from perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin inner join estado_user on estado_user.estado_fk=perfilusuario.codigologin where perfilusuario.comunausuario = '$resultadoComuna' and oficio_user.nombre_oficio like'%$albanil%'";
                $resultado1 = pg_query($conexion, $select2);
                break;
    
            case 6:
                $ceramica="Ceramista";
                $select2 = "SELECT * from perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin inner join estado_user on estado_user.estado_fk=perfilusuario.codigologin where perfilusuario.comunausuario = '$resultadoComuna' and oficio_user.nombre_oficio like '%$ceramica%'";
                $resultado1 = pg_query($conexion, $select2);
                
                break;
    
            case 7:
                $electro1="Electrico";
                $electro=trim($electro1);
                $select2 = "SELECT * from perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin inner join estado_user on estado_user.estado_fk=perfilusuario.codigologin where perfilusuario.comunausuario = '$resultadoComuna' and oficio_user.nombre_oficio like'%$electrico%'";
                $resultado1 = pg_query($conexion, $select2);
                break;
    
            case 8:
                $estructura = "Estructurero";
                $select2 = "SELECT * from perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin inner join estado_user on estado_user.estado_fk=perfilusuario.codigologin where perfilusuario.comunausuario = '$resultadoComuna' and oficio_user.nombre_oficio like'%$estructura%'";
                $resultado1 = pg_query($conexion, $select2);
                break;
        }


    }

    



}elseif($_POST['comunas']== "Concepción" || $_POST['comunas']== "Coronel" || $_POST['comunas']== "Chiguayante" ||$_POST['comunas']== "Florida" || $_POST['comunas']== "Hualqui" || $_POST['comunas']== "Lota" || $_POST['comunas']== "Penco" || $_POST['comunas']== "San_pedro" ||$_POST['comunas']== "Santa_juana" || $_POST['comunas']== "Talcahuano" || $_POST['comunas']== "Tome" ||$_POST['comunas']== "Hualpen"){
    $resultadoComuna=$_POST['comunas'];
        
    $select2 = "SELECT * from perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin inner join estado_user on estado_user.estado_fk=perfilusuario.codigologin where comunausuario like '%$resultadoComuna%' ";
    $resultado1 = pg_query($conexion, $select2);

    //header("refresh:1;url=index.php");
}else{
    header("refresh:1;url=categoriaConsulta.php");
}

















//$select1 = "SELECT nombreuser,apellidouser,telefonouser,descripcionuser,comunausuario,oficio_pintor,oficio_carpintero,oficio_albanil,oficio_soldador,oficio_gasfiter,oficio_electrico,oficio_estructura,oficio_ceramica from perfilusuario inner join especialidad_user on especialidad_user.fk_oficio_perfil=perfilusuario.codigologin where comunausuario = '$resultadoComuna' and oficio_pintor=' $pintor' and oficio_carpintero=' $carpintero' and oficio_albanil=' $albanil' and oficio_soldador=' $soldador' and oficio_gasfiter=' $gasfiter' and oficio_electrico=' $electro' and oficio_estructura=' $estructura' and oficio_ceramica=' $ceramica' ";


//$select = "SELECT * from perfilusuario inner join especialidad_user on especialidad_user.fk_oficio_perfil=perfilusuario.codigologin where perfilusuario.comunausuario = '$resultadoComuna' and especialidad_user.oficio_electrico != $electro union
//SELECT * from perfilusuario inner join especialidad_user on especialidad_user.fk_oficio_perfil=perfilusuario.codigologin where perfilusuario.comunausuario = '$resultadoComuna' and especialidad_user.oficio_soldador != $soldador union
//SELECT * from perfilusuario inner join especialidad_user on especialidad_user.fk_oficio_perfil=perfilusuario.codigologin where perfilusuario.comunausuario = '$resultadoComuna' and especialidad_user.oficio_carpintero != $carpintero  ";






?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATEA.cl</title>
    <link rel="stylesheet" href="componentes/css/stylePublicidad.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.5.0/dist/css/splide.min.css">
</head>

<body>

    <style>
        li {
            list-style: none
        }
    </style>


    <!-- navbar con tailwild-->

    <nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900  w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="index.php" class="flex items-center">
                <img src="componentes/images/logooobueno.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">DATEA.CL</span>
            </a>
            <div class="flex md:order-2">
                <?php
                if (isset($_SESSION['numeroIDlogin']) != true) {

                ?>
                    <div>
                        <!-- boton para iniciar sesion en el navbar-->

                        <!-- Modal toggle -->
                        <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
                            iniciar sesión
                        </button>

                        <!-- Main modal -->
                        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
                            <div class="relative w-full max-w-md h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Regístrate en nuestra plataforma</h3>
                                        <form class="space-y-6" action="./paginas/validar.php" method="POST">
                                            <div>
                                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EMAIL</label>
                                                <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="usuario" id="username" placeholder="ejemplo@gmail.com" required>
                                            </div>
                                            <div>
                                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PASSWORD</label>
                                                <input type="password" name="clave" id="password" type="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            </div>
                                            <div class="flex justify-between">

                                                
                                            </div>
                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ingresar a tu cuenta</button>
                                            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                                No estas registrado? <a href="../sistemaWebTesis/paginas/formularioRegistro.php" class="text-blue-700 hover:underline dark:text-blue-500">Crear cuenta</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                <?php

                } else {

                ?>

                    <li>
                        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm font-medium text-gray-900 dark:bg-green-700 rounded-full hover:text-black-600 dark:hover:text-blue-900 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white" type="button">
                            <span class="sr-only">Open user menu</span>
                            <img class="mr-2 w-8 h-8 rounded-full" src="./componentes/images/logoTrabajador.png" alt="">
                            <?php echo $nombreuser ?>
                            <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatarName" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                                <div class="font-medium ">Usuario</div>
                                <div class="truncate"><?php echo $emailuser; ?></div>
                            </div>
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                                <li>
                                    <a href="./paginas/userperfil.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">MI PERFIL</a>
                                </li>
                                <li>
                                    <a href="../sistemaWebTesis/paginas/llenardatosperfil.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">ACTUALIZAR DATOS</a>
                                </li>

                            </ul>
                            <div class="py-1">
                                <a href="./paginas/cerrarsesion.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">CERRAR SESION</a>
                            </div>
                        </div>


                    </li>



                <?php } ?>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">

                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-default">
                <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="index.php" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page"></a>
                    </li>
                    <li>
                        <a href="index.php" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">INICIO</a>
                    </li>
                    <li>
                        <a href="categorias.php?pagina=1" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">CATEGORIAS</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>



    <style>
        .auto-grid {
            --auto-grid-min-size: 16rem;

            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(var(--auto-grid-min-size), 1fr));
            grid-gap: 1rem;
            margin: 2rem;
            padding-bottom: 2rem;
        }


        .containerperfil {

            margin: 5rem;
        }

        .contenedorli {
            margin-bottom: 4rem;
            background-color: #FFF1DC;
            text-align: center;
            padding: 1rem;
            border-radius: 25px;
        }

        .perfiluser {
            padding: 5rem 5rem;
            text-align: center;
            font-size: 1.2rem;
            background: #eb4d4b;
            color: #ffffff;
        }
    </style>
<br><br>
<?php
if(pg_num_rows($resultado1)==0){   
    ?>




    <style>
        #imagenSinResultado{
          width: 54rem;
            padding: 1rem;  
        }
      
      .imgContainer{
        display: block;
  width: 60%;
  margin-left: auto;
  margin-right: auto;
      }
    </style>




    <div style="text-align:center">
         <h1 class="mb-8 text-8xl font-extrabold tracking-tight leading-none  md:text-8xl lg:text-8xl text-blue-600 dark:text-blue-500"> Sin Resultados</h1>
    <br>
        <span class="img-container">
            <img class="imgContainer" src="../sistemaWebTesis/componentes/images/sinresultado.png"  id="imagenSinResultado"/>   
        </span>    
   <br>
    </div>




    <?php
 }else{
 ?> 

    <div class="containerperfil">
        <ul class="auto-grid">
        <?php

        if(isset($resultado1)){

            while ($fila = pg_fetch_assoc($resultado1)) {

                $nombreuser = $fila["nombreuser"];
                $apellidouser = $fila["apellidouser"];
                $telefonouser = $fila["telefonouser"];
                $comunauser = $fila["comunausuario"];
                $descripcionUser = $fila["descripcionuser"];
                $oficio = $fila["nombre_oficio"];
                $estado =$fila["estado_disponible"];   

            ?>
          
                <li class="contenedorli">
                    <div class="textoperfil">
                        <h1 class="mb-4 text-xl tracking-tight leading-none   text-blue-600 dark:text-blue-500"><i class='fas fa-portrait' style='font-size:36px;color:#33B2FF ;float: left;'></i> <strong> <?php echo ucfirst($nombreuser ) . " " . ucfirst($apellidouser) ; ?> </strong></h1><br>
                        <h3 class="mb-4 text-xl tracking-tight leading-none   text-blue-600 dark:text-blue-500"><i class="fa fa-whatsapp" style="font-size:36px;color:green;float: left;"></i> <a target="_blank" href="https://api.whatsapp.com/send?phone=+569<?php  echo $telefonouser;?>&text=<?php echo "hola, ".trim(ucfirst($nombreuser))." ".trim(ucfirst($apellidouser))."de Datea.cl, consulto si tiene disponibilidad de trabajar."; ?>."> <strong> <?php echo"+569 ".  $telefonouser; ?></strong></a></h3><br>
                        <h3 class="mb-4 text-xl  tracking-tight leading-none   text-blue-600 dark:text-blue-500"><i class='fas fa-map-marker-alt' style='font-size:36px;color:#33B2FF ;float: left;'></i> <strong><?php echo $comunauser; ?></strong></h3><br>
                      
                    </div>

                    <div class="relative perfilselect " style="background-color: #FEFCF3; padding: 10px 10px; border-radius: 10px;">
                    <?PHP if($estado==1){ ?><img class="w-36 h-36  rounded-full" src="./componentes/images/logoTrabajadordisponible.png" style="margin-left: 40px;" alt=""> <?php } elseif($estado==2){ ?><img class="w-36 h-36  rounded-full" src="./componentes/images/logoTrabajadorocupado.png" style="margin-left: 40px;" alt=""><?php }  ?>

                        <figure id="photo" title="<?PHP if($estado==1){ echo "Disponible";}elseif($estado==2){ echo "Ocupado";}  ?>" tooltip-dir="left">

                        <?php if(intval($estado)==1 ){  ?>
                        <span class="estado top-5 left-12 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                        <?php   }else{    ?>

                            <span class="top-5 left-12 absolute  w-3.5 h-3.5 bg-red-400 border-2 border-white dark:border-gray-800 rounded-full"></span>   
                        
                            <?php }?><br>
                            </figure> 
                        <h3 class="mb-4 text-xl tracking-tight leading-none   text-blue-600 dark:text-blue-500">Descripción: <?php echo ucfirst(ltrim(rtrim($descripcionUser) ) ); ?></h3>
                        <h3 class="mb-4 text-xl tracking-tight leading-none   text-blue-600 dark:text-blue-500"><i class='fas fa-hard-hat' style='font-size:24px;color:#F2CD5C;float: left;'></i>  <strong><?php echo $oficio; ?></strong></h3>
                    </div>


                </li>

            <?php

            } 


        }else{
            header("refresh:0;url=index.php");

        }
            
            
            
            
        }?>




        </ul>
    </div>



  





    
   

    <footer class="p-4 bg-white sm:p-6 dark:bg-gray-900 ">
        <div class="md:flex md:justify-between ">
            <div class="mb-6 md:mb-0">
                <a href="#" class="flex items-center">
                    <img src="componentes/images/logooobueno.png" class="mr-3 h-8" alt="FlowBite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Datea.cl</span>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3 ">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Sobre Nosotros</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="quienessomos.php" class="hover:underline">Quiénes somos</a>
                        </li>

                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Mesa de ayuda</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="contacto.php" class="hover:underline ">Contacto</a>
                        </li>

                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="politicas.php" class="hover:underline">política de privacidad</a>
                        </li>
                        <li>
                            <a href="terminos.php" class="hover:underline">Términos &amp; Condiciones</a>
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







    <script src="path-to-the-script/splide-extension-auto-scroll.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.5.0/dist/js/splide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="componentes/js/scripSlider.js"></script>
    <!-- para iconos con font awesome -->
    <script src="https://kit.fontawesome.com/6d44736547.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

</body>

</html>