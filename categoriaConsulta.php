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
                $select2 = "SELECT * from perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin inner join estado_user on estado_user.estado_fk=perfilusuario.codigologin where perfilusuario.comunausuario = '$resultadoComuna' and oficio_user.nombre_oficio like'%$electro%'";
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

        .contenedorli {
           
          
           
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
         <h1 class="mb-8  font-extrabold tracking-tight leading-none  md:text-8xl lg:text-8xl text-blue-600 dark:text-blue-500 textSinResultado"> Sin Resultados</h1>
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
                        <h1 class="mb-4  tracking-tight  leading-none text-white"><i class='fas fa-portrait' style='font-size:36px;color:white ;float: left;'></i> <strong class="textNombre"> <?php echo ucfirst($nombreuser ) . " " . ucfirst($apellidouser) ; ?> </strong></h1><br>
                        <h3 class="mb-4  tracking-tight leading-none   text-white"><i class="fa fa-whatsapp" style="font-size:36px;color:green;float: left;"></i> <a target="_blank" href="https://api.whatsapp.com/send?phone=+569<?php  echo $telefonouser;?>&text=<?php echo "hola, ".trim(ucfirst($nombreuser))." ".trim(ucfirst($apellidouser))."de Datea.cl, consulto si tiene disponibilidad de trabajar."; ?>."> <strong> <?php echo"+569 ".  $telefonouser; ?></strong></a></h3><br>
                        <h3 class="mb-4   tracking-tight leading-none   text-white"><i class='fas fa-map-marker-alt' style='font-size:36px;color:orange ;float: left;'></i> <strong class="textNombre"><?php echo $comunauser; ?></strong></h3><br>
                      
                    </div>

                    <div class="relative perfilselect " style="background-color: #FEFCF3; padding: 10px 10px; border-radius: 10px; opacity: 0.8;">
                    <?PHP if($estado==1){ ?><img class="  rounded-full imagenAvatar" src="./componentes/images/logoTrabajadordisponible.png"  alt=""> <?php } elseif($estado==2){ ?><img class=" rounded-full imagenAvatar" src="./componentes/images/logoTrabajadorocupado.png"  alt=""><?php }  ?>

                        <figure id="photo" title="<?PHP if($estado==1){ echo "Disponible";}elseif($estado==2){ echo "Ocupado";}  ?>" tooltip-dir="left">

                        <?php if(intval($estado)==1 ){  ?>
                        <span class=" top-5  absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full estadoUser"></span>
                        <?php   }else{    ?>

                            <span class="top-5  absolute  w-3.5 h-3.5 bg-red-400 border-2 border-white dark:border-gray-800 rounded-full estadoUser"></span>   
                        
                            <?php }?><br>
                            </figure> 
                        <h3 class="mb-4 text-xl tracking-tight leading-none   text-blue-600 dark:text-blue-500" style="opacity: 1;" >Descripción: <?php echo ucfirst(ltrim(rtrim($descripcionUser) ) ); ?></h3>
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