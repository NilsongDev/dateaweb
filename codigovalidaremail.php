 <?php
    session_start();
    error_reporting(0);

    include('conexion/database.php');









    ?>
 <?php include('head.php'); ?>


 <style>
    .texto{
        text-align: center;
    }

    img{
       width: 200px;
    }
 </style>
 <body>
<br>

     <div class="item-center">
         <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none  md:text-5xl lg:text-6xl text-blue-600 dark:text-blue-500 texto">Ingresar el código para activar tu cuenta.</h1>

         <div class="slideshow-container contenedorBusqueda">

             <form action="validarcodigo.php" method="POST">






                 <div class="ds  ">










                     <div class="perfilselect card">



                         <img src="componentes/images/logoTrabajador.png" />

                         <div class="grid md:grid-cols-5 text-sm">

                             <div class="grid grid-cols-2">
                                 <div class="px-4 py-2 font-semibold">CODIGO</div>
                                 <div class="px-4 py-2"><input type="text" name="codigovalidacion"  pattern="[0-9]+" minlength="6" maxlength="6"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"> </div>
                             </div>



                         </div>
                     </div>


                 </div>



                 <div class="regiones">




                     <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Confirmar</button>
                 </div>
             </form>
             <br><br><br>


         </div>

     </div>



 </body>



