<?php
session_start();
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




?>


<?php include('head.php');?>
<body>

    <style>
        li {
            list-style: none
        }
    </style>


    <!-- navbar con tailwild-->

    <?php include('navdatea.php');?>


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
/* div para editar perfil de usuario */
     

        .perfiluser {
            padding: 5rem 5rem;
            text-align: center;
            font-size: 1.2rem;

 
            
            
          
        }
    </style>











    <div class="containerperfil">
        <div class="cards cardsUno">
        <ul class="auto-grid">

            <?php

            $porpaginas = 12;
            if (isset($_GET['pagina'])) {
                $pagina = $_GET['pagina'];
            } else {
                $pagina = 1;
            }

            $empieza = ($pagina - 1) * $porpaginas;
            $query = "SELECT * FROM perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin inner join estado_user on estado_user.estado_fk=perfilusuario.codigologin where nombreuser is not null  order by comunausuario limit $porpaginas offset $empieza";
            $resultado = pg_query($conexion, $query);










            ?>


            <?php

            while ($fila = pg_fetch_assoc($resultado)) {


                $nombreuser = $fila["nombreuser"];
                $apellidouser = $fila["apellidouser"];
                $telefonouser = $fila["telefonouser"];
                $comunauser = $fila["comunausuario"];
                $descripcionUser = $fila["descripcionuser"];
                $oficio = $fila["nombre_oficio"];
                $estado = $fila["estado_disponible"];
            ?>



            
                <li class="contenedorli">
                    <div class="textoperfil">
                        <h1 class="mb-4  tracking-tight leading-none   text-white "><i class='fas fa-portrait' style='font-size:36px;color:white ;float: left;'></i> <strong class="textNombre"> <?php echo ucfirst($nombreuser)  . " " . ucfirst($apellidouser) ; ?></strong> </h1><br>
                        <h3 class="mb-4  tracking-tight leading-none   text-white "><i class="fa fa-whatsapp" style="font-size:36px;color:green;float: left;"></i> <a target="_blank" href="https://api.whatsapp.com/send?phone=+569<?php echo $telefonouser;?>; &text=<?php echo "Hola, ".trim(ucfirst($nombreuser)) ." ".trim(ucfirst($apellidouser))." de Datea.cl, consulto si tiene disponibilidad de trabajar."; ?>."> <strong > +569-<?php echo $telefonouser;?></strong></a></h3><br>
                        <h3 class="mb-4   tracking-tight leading-none   text-white "><i class='fas fa-map-marker-alt' style='font-size:36px;color:orange ;float: left;'></i><strong class="textNombre"> <?php echo $comunauser; ?></strong></h3><br>
                    </div>

                    <div class="relative perfilselect" style="background-color: #FEFCF3; padding: 10px 10px; border-radius: 10px; opacity: 0.8;">
                        
                                <?PHP if($estado==1){ ?><img class=" rounded-full imagenAvatar" src="./componentes/images/logoTrabajadordisponible.png"  alt=""> <?php } elseif($estado==2){ ?><img class=" rounded-full imagenAvatar" src="./componentes/images/logoTrabajadorocupado.png"  alt=""><?php }  ?>
                    
                        



                        <figure id="photo" title="<?PHP if($estado==1){ echo "Disponible";}elseif($estado==2){ echo "Ocupado";}  ?>" tooltip-dir="left">

                        <?php if (intval($estado) == 1) { ?>
                            <span class="top-5  absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full estadoUser" style=""></span>
                        <?php   } else {    ?>

                            <span class="top-5  absolute  w-3.5 h-3.5 bg-red-400 border-2 border-white dark:border-gray-800 rounded-full estadoUser"></span>

                        <?php } ?>

                            <br>
                            </figure> 
                        <h3 class="mb-4 text-xl tracking-tight leading-none   text-blue-800 dark:text-blue-500 descripcionUser" style="opacity: 1;">Descripción: <?php echo ucfirst(ltrim(rtrim($descripcionUser) ) ); ?></h3>
                        <h3 class="mb-4 text-xl tracking-tight leading-none   text-blue-600 dark:text-blue-500"><i class='fas fa-hard-hat' style='font-size:24px;color:#F2CD5C;float: left; opacity: 1;'></i> <strong><?php echo $oficio; ?></strong></h3>
                    </div>


                </li>

            <?php


            }

            ?>




        </ul>
        </div>
    </div>











    <div>

        <?php

        $consulta = "SELECT * from perfilusuario";

        $resultadouno = pg_query($conexion, $consulta);

        $total_registros = pg_num_rows($resultadouno);

        $total_paginas = ceil($total_registros / $porpaginas);

            


        ?>


            
        <nav aria-label="Page navigation example" class="">
            <ul class="flex justify-center items-center  ">
                <li>
                    <a href="categorias.php?pagina=1" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Inicio</a>
                </li>

            <?php  for ($i = 1; $i <= $total_paginas; $i++) {         ?>

                <li>
                    <a href="categorias.php?pagina= <?php echo $i ?>" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?php echo $i ?> </a>
                </li>
            
            <?php    }       ?>


                <li>
                    <a href="categorias.php?pagina=<?php echo $total_paginas ?>" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Final</a>
                </li>
            </ul>
        </nav>

























    </div>
<br>
<?php include('footer.php');?>