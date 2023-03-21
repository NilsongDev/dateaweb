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




<?php include('head.php');?>

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
                            <?php echo ucfirst($nombreuser); ?>
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
        <div class="cards">
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
    </div>



  





    
   

    <?php include('footer.php');?>