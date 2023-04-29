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
<body">

    <style>
        li {
            list-style: none
        }
    </style>


    <!-- navbar con tailwild-->

    <?php include('navdatea.php');?>





<style>
    .containerCards {
        max-width: 26rem;
        padding: 0.2rem;
        display: inline-flex;

    }

    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
        grid-gap: 2.5rem;
    }

    .card {
        background: red;
        background: rgb(59, 153, 255);
        color: white;
        padding: 1.5rem;
        overflow: hidden;
        border-radius: 0.8rem;
    }

    .card-title-large {
        font-family: fantasy;
        font-size: 2.5rem;
        letter-spacing: 0.2rem;
        color: black;
        transform: translate(7rem);
        transition: transform 2.5s;
    }

    .card-title-oficio {
        font-family: fantasy;
        font-size: 2.5rem;
        letter-spacing: 0.5rem;
        color: black;
        transform: translate(-1rem);
        transition: transform 2.5s;
    }




    .card-title-small {
        margin-bottom: 0.5rem;
    }

    .card-description {
        font-size: 1.4rem;
        line-height: 1.5;
    }

    .card-cta {
        display: inline-block;
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 50%;
        display: grid;
        place-items: center;
        margin-left: 9rem;


    }





    .card:hover .card-cta {
        background-color: #ffffff10;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .card:hover .card-title-large {
        transform: translate(-2%);
        color: white;
    }

    .card:hover .card-title-oficio {
        transform: translate(22%);
        color: white;

    }
</style>
































<style>
    .transition,
    .ulDescripcion li i:before,
    .ulDescripcion li i:after,
    p {
        transition: all 0.25s ease-in-out;
    }

    .flipIn,
    .ulDescripcion li,
    h1 {
        animation: flipdown 0.5s ease both;

    }





    @media (max-width: 550px) {
        body {
            box-sizing: border-box;
            transform: translate(0, 0);
            max-width: 100%;
            min-height: 100%;
            margin: 0;
            left: 0;
        }
    }

    h1,
    h2 {
        color: white;
    }

    h1 {
        text-transform: uppercase;
        font-size: 36px;
        line-height: 42px;
        letter-spacing: 3px;
        font-weight: 100;
    }

    h2 {
        font-size: 26px;
        line-height: 34px;
        font-weight: 200px;
        letter-spacing: 1px;
        display: block;

        margin: 0;
        cursor: pointer;
    }

    p {
        color: rgba(48, 69, 92, 0.8);
        font-size: 17px;
        line-height: 26px;
        letter-spacing: 1px;
        position: relative;
        overflow: hidden;
        max-height: 800px;
        width: 350px;
        opacity: 1;
        transform: translate(0, 0);
        margin-top: 14px;
        z-index: 2;

        background-color: #ffffff10;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .ulDescripcion {
        list-style: none;
        perspective: 900;
        padding: 0;
        margin: 0;

    }

    .ulDescripcion li {
        position: relative;
        padding: 0;
        margin: 0;
        padding-bottom: 4px;
        padding-top: 18px;

    }

    .ulDescripcion li:nth-of-type(1) {
        animation-delay: 0.5s;
    }

    .ulDescripcion li:nth-of-type(2) {
        animation-delay: 0.75s;
    }

    .ulDescripcion li:nth-of-type(3) {
        animation-delay: 1s;
    }

    .ulDescripcion li:last-of-type {
        padding-bottom: 0;
    }

    .ulDescripcion li i {
        position: absolute;
        transform: translate(-6px, 0);
        margin-top: 16px;
        right: 0;
    }

    .ulDescripcion li i:before,
    .ulDescripcion li i:after {
        content: "";
        position: absolute;
        background-color: black;
        width: 3px;
        height: 9px;
    }

    .ulDescripcion li i:before {
        transform: translate(-2px, 0) rotate(45deg);

    }

    .ulDescripcion li i:after {
        transform: translate(2px, 0) rotate(-45deg);
    }

    .ulDescripcion li input[type=checkbox] {
        position: absolute;
        cursor: pointer;
        width: 90%;
        height: 100%;
        z-index: 1;
        opacity: 0;


    }

    .ulDescripcion li input[type=checkbox]:checked~p {
        margin-top: 0;
        max-height: 0;
        opacity: 0;
        transform: translate(0, 50%);


    }

    .ulDescripcion li input[type=checkbox]:checked~i:before {
        transform: translate(2px, 0) rotate(45deg);
    }

    .ulDescripcion li input[type=checkbox]:checked~i:after {
        transform: translate(-2px, 0) rotate(-45deg);
    }

    @keyframes flipdown {
        0% {
            opacity: 0;
            transform-origin: top center;
            transform: rotateX(-90deg);
        }

        5% {
            opacity: 1;
        }

        80% {
            transform: rotateX(8deg);
        }

        83% {
            transform: rotateX(6deg);
        }

        92% {
            transform: rotateX(-3deg);
        }

        100% {
            transform-origin: top center;
            transform: rotateX(0deg);
        }
    }
</style>














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

while ($fila = pg_fetch_assoc($resultado)) {


    $nombreuser = $fila["nombreuser"];
    $apellidouser = $fila["apellidouser"];
    $telefonouser = $fila["telefonouser"];
    $comunauser = $fila["comunausuario"];
    $descripcionUser = $fila["descripcionuser"];
    $oficio = $fila["nombre_oficio"];
    $estado = $fila["estado_disponible"];
?>


    <div class="containerCards containerperfil ">

        <div class="cards ">
            <div class="card">
                <h2 class="card-title-large"><?php echo ucfirst($nombreuser)  . " " . ucfirst($apellidouser); ?></h2>
                <br>
                <h2 class="card-title-oficio"><?php echo $oficio; ?></h2>

                <!--<p class="card-description">Descripción: electrico certificado por la CGE de concepcion para trabajos de todo tipo en cualquier parte de la octaba region.</p>-->

                <ul class="ulDescripcion">
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2>Descripción</h2>
                        <p><?php echo ucfirst(ltrim(rtrim($descripcionUser))); ?></p>
                        <p>Comuna: <?php echo $comunauser; ?></p>
                        <p>Telefono: +569-<?php echo $telefonouser; ?></p>
                        <?PHP if ($estado == 1) { ?><img class=" rounded-full  " style=" width: 100px; margin-left: 40%;" src="./componentes/images/logoTrabajadordisponible.png" alt=""> <?php } elseif ($estado == 2) { ?><img class=" rounded-full " style=" width: 100px; margin-left: 40%;" src="./componentes/images/logoTrabajadorocupado.png" alt=""><?php }  ?>



                    </li>

                </ul>
                <figure id="photo" title="<?PHP if ($estado == 1) {
                                                echo "Disponible";
                                            } elseif ($estado == 2) {
                                                echo "Ocupado";
                                            }  ?>" tooltip-dir="left">

                    <?php if (intval($estado) == 1) { ?>

                        <span style="color: black;" class=" absolute   w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full relative perfilselect m-2 p-1">Disponible</span>
                    <?php   } else {    ?>

                        <span style="color: black;" class="  absolute  w-3.5 h-3.5 bg-red-400 border-2 border-white dark:border-gray-800 rounded-full relative perfilselect m-2 p-1">Ocupado</span>

                    <?php } ?>
                </figure>
                <br>
                <a target="_blank" class="card-cta" href="https://api.whatsapp.com/send?phone=+569<?php echo $telefonouser; ?>; &text=<?php echo "Hola, " . trim(ucfirst($nombreuser)) . " " . trim(ucfirst($apellidouser)) . " de Datea.cl, consulto si tiene disponibilidad de trabajar."; ?>"><i class="fa fa-whatsapp" style="font-size:36px;color:green;float: left;"></i></a>
            </div>
        </div>







    </div>

<?php } ?>



<style>
    .containerperfil {

        margin: 1rem;




    }

    /* div para editar perfil de usuario */
</style>




























<div>

    <?php

    $consulta = "SELECT * from perfilusuario";

    $resultadouno = pg_query($conexion, $consulta);

    $total_registros = pg_num_rows($resultadouno);

    $total_paginas = ceil($total_registros / $porpaginas);




    ?>



    <nav aria-label="Page navigation " class="">
        <ul class="flex justify-center  " style="">
            <li>
                <a href="categoriasDemo.php?pagina=1" class="px-3 py-2  leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Inicio</a>
            </li>

            <?php for ($i = 1; $i <= $total_paginas; $i++) {         ?>

                <li>
                    <a href="categoriasDemo.php?pagina= <?php echo $i ?>" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?php echo $i ?> </a>
                </li>

            <?php    }       ?>


            <li>
                <a href="categoriasDemo.php?pagina=<?php echo $total_paginas ?>" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Final</a>
            </li>
        </ul>
    </nav>

























</div>






















































<br>

<?php include('footer.php');?>