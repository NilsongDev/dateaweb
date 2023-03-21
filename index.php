<?php

session_start();




include('paginas/conexion/database.php');
$queryDatosPerfil = "SELECT * from perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin where perfilusuario.comunausuario='Hualqui' limit 16";
$queryDatosPerfilFinal = "SELECT * from perfilusuario inner join oficio_user on oficio_user.fk_oficio_user = perfilusuario.codigologin where nombreuser is not null   order by iduser desc limit 30 ";

$resultadoFinal = pg_query($conexion, $queryDatosPerfilFinal);
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
                        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none  md:text-5xl lg:text-6xl text-blue-600 dark:text-blue-500">BIENVENIDO A LA COMUNIDAD DE LA CONSTRUCCIÓN DEL</h1>
                        <h1 class="mb-4 text-4xl font-extrabold inline-block md:text-5xl lg:text-6xl  dark:text-blue-900 text-blue-900">BÍO-BÍO</h1>
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
                            Iniciar Sesión
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

                                                <!--
                                                <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Perdiste tu password?</a>-->
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
                            <?php echo ucfirst($nombreuser);  ?>
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
                                <a href="./paginas/cerrarsesion.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">CERRAR SESIÓN</a>
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
                        <a href="categorias.php?pagina=1" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">VER TODOS LOS OFICIOS</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>


    <script>
        function pruebaemail(valor) {
            re = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/
            if (!re.exec(valor)) {
                alert('email incompleto');
            } else {
                <?php $ruta = "validarformulario.php"; ?>
            }
        }
    </script>


<!-- 
    <div class="curvaUno">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1" d="M0,128L60,154.7C120,181,240,235,360,234.7C480,235,600,181,720,144C840,107,960,85,1080,74.7C1200,64,1320,64,1380,64L1440,64L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
        </svg>
    </div>
-->



    <style>




/* Slideshow container */
.slideshow-container {
 
  position: relative;
  margin: auto;
  
}



.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
 
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}


</style>

<br>



    <!-- Slideshow de las primeras imagenes publicidad -->
    <div class="">

        <div class="slideshow-container" >

            <!-- Full-width images with number and caption text -->


            <div class="mySlides fade " >

                <img class="imgPrincipal" src="componentes/images/img-construccion2.jpg" style="width:100%;  height: 500px; border-radius:10px; ">

            </div>

            <div class="mySlides fade ">

                <img class="imgPrincipal" src="componentes/images/img-construccion1.jpg" style="width:100%; height: 500px; border-radius:10px;">

            </div>
            <div class="mySlides fade ">

                <img class="imgPrincipal" src="componentes/images/img-construccion.jpg" style="width:100%; height: 500px; border-radius:10px;">

            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>

        </div>
    </div>




    <script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace("active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}


</script>


    <br>
    <hr><br>







    <div class=" slideshow-container mt-4">

        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none  md:text-5xl lg:text-6xl text-blue-600 dark:text-blue-500">Comuna Destacada</h1>
        <div class="splide bg-secondary">
            <div class="splide__slider">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php
                        if (pg_num_rows($resultado) > 0) {
                            while ($row = pg_fetch_assoc($resultado)) {
                                $row["nombreuser"];
                                $row["apellidouser"];
                                $row["comunausuario"];
                        ?>
                                <li class="splide__slide">
                                    <div class="cardperfil"><img src="componentes/images/perfil_user.jpg" alt="ichabod">
                                        <div class="cardperfil-detalles"><strong>Nombre: <?php echo ucfirst($row["nombreuser"])  . " " . ucfirst($row["apellidouser"]); ?></strong><span></span><br><span>Comuna: <?php echo $row["comunausuario"]; ?> <br> Oficio: <?php echo ucfirst($row["nombre_oficio"]); ?> <br> Telefono: <a target="_blank" href="https://api.whatsapp.com/send?phone=+569<?php echo $row["telefonouser"]; ?>&text=<?php echo "Hola " . trim(ucfirst($row["nombreuser"])) . " " . trim(ucfirst($row["apellidouser"])) . " de Datea.cl, consulto disponibilidad de trabajo."; ?>"> <?php echo "+569 " .  $row["telefonouser"]; ?></a> </span></div>
                                    </div>
                                </li>

                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="splide__progress">
                <div class="splide__progress__bar">
                </div>
            </div>
        </div>
    </div>

    <style>
        .splide__progress__bar {
            height: 10px;
            background: blue;
        }
    </style>







    <br>
    <hr><br>




    <div class="item-center">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none  md:text-5xl lg:text-6xl text-blue-600 dark:text-blue-500">Búsqueda de Oficio</h1>

        <div class="slideshow-container contenedorBusqueda">

            <form action="categoriaConsulta.php" method="POST">

                <div class=" perfilesBusqueda cards">




                    <div class="perfilselect">
                        <input type="radio" id="myCheckbox8" name="check" value="1" />
                        <label for="myCheckbox8"><img  src="componentes/images/logoTrabajador.png" /></label>
                        <strong>
                            <h1> Pintor</h1>
                        </strong>
                    </div>




                    <div class="perfilselect">
                        <input type="radio" id="myCheckbox7" name="check" value="2" />
                        <label for="myCheckbox7"><img src="componentes/images/logoTrabajador.png" /></label>
                        <strong>
                            <h1> Soldador</h1>
                        </strong>
                    </div>




                    <div class="perfilselect">
                        <input type="radio" id="myCheckbox6" name="check" value="3" />
                        <label for="myCheckbox6"><img src="componentes/images/logoTrabajador.png" /></label>
                        <strong>
                            <h1> Gasfiter</h1>
                        </strong>
                    </div>




                    <div class="perfilselect">
                        <input type="radio" id="myCheckbox5" name="check" value="4" />
                        <label for="myCheckbox5"><img src="componentes/images/logoTrabajador.png" /></label>
                        <strong>
                            <h1> Carpintero</h1>
                        </strong>
                    </div>
                </div>




                <div class=" perfilesBusqueda cards">



                    <div class="perfilselect card">
                        <input type="radio" id="myCheckbox4" name="check" value="5" />
                        <label for="myCheckbox4"><img src="componentes/images/logoTrabajador.png" /></label>
                        <strong>
                            <h1> Albañil</h1>
                        </strong>
                    </div>




                    <div class="perfilselect card">
                        <input type="radio" id="myCheckbox3" name="check" value="6" />
                        <label for="myCheckbox3"><img src="componentes/images/logoTrabajador.png" /></label>
                        <strong>
                            <h1> Ceramista</h1>
                        </strong>
                    </div>

                    <div class="perfilselect card">
                        <input type="radio" id="myCheckbox1" name="check" value="7" />

                        <label for="myCheckbox1"><img src="componentes/images/logoTrabajador.png" /></label>
                        <strong>
                            <h1>Eléctrico</h1>
                        </strong>


                    </div>

                    <div class="perfilselect card">

                        <input type="radio" id="myCheckbox2" name="check" value="8" />

                        <label for="myCheckbox2"><img src="componentes/images/logoTrabajador.png" /></label>
                        <strong>
                            <h1>Estructurero</h1>
                        </strong>
                    </div>


                </div>



                <div class="regiones">

                    <h1 class="mb-2 text-4xl  tracking-tight leading-none   md:text-5xl lg:text-6xl text-blue-600 dark:text-blue-500">Seleccionar Comuna</h1>

                    <select class="names regg container p-3 m-6" name="comunas">
                        <option value="Concepción"> Concepción</option>
                        <option value="Coronel">Coronel</option>
                        <option value="Chiguayante">Chiguayante</option>
                        <option value="Florida">Florida</option>
                        <option value="Hualqui">Hualqui</option>
                        <option value="Lota">Lota</option>
                        <option value="Penco">Penco</option>
                        <option value="San_pedro">San Pedro</option>
                        <option value="Santa_juana">Santa Juana</option>
                        <option value="Talcahuano">Talcahuano</option>
                        <option value="Tome">Tomé</option>
                        <option value="Hualpen">Hualpén</option>
                    </select>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">BUSCAR</button>
                </div>
            </form>


        </div>

    </div>


    





    <style>
        

        .perfilselect {
            padding: auto;
            margin: 30px;
        }

        h1 {
            text-align: center;
        }

        .cardperfil-detalles {
            text-align: center;
        }

       
    </style>


    <br><br>
    <hr><br><br>











    <div class=" mt-4 slideshow-container anchoprueba ">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none   md:text-5xl lg:text-6xl text-blue-600 dark:text-blue-500">PERSONAS REGISTRADAS</h1>
        <div class="splider bg-secondary ">

            <div class="splide__slider">
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="splide__arrow splide__arrow--next">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>

                <div class="splide__track">

                    <ul class="splide__list">
                        <?php

                        if (pg_num_rows($resultadoFinal) > 0) {
                            while ($row = pg_fetch_assoc($resultadoFinal)) {
                                $row["nombreuser"];
                                $row["apellidouser"];
                                $row["comunausuario"];
                                $row["nombre_oficio"];
                        ?>
                                <li class="splide__slide">
                                    <div class="cardperfil"><img src="componentes/images/perfil_user.jpg" alt="ichabod">
                                        <div class="cardperfil-detalles"><strong>Nombre: <?php echo ucfirst($row["nombreuser"])  . " " . ucfirst($row["apellidouser"]); ?> </strong><span><br> Comuna: <?php echo $row["comunausuario"]; ?> <br> Oficio: <?php echo ucfirst($row["nombre_oficio"]); ?> <br> <a target="_blank" href="https://api.whatsapp.com/send?phone=+569<?php echo $row["telefonouser"]; ?>&text=<?php echo "Hola " . trim(ucfirst($row["nombreuser"])) . " " . trim(ucfirst($row["apellidouser"])) . " de Datea.cl, consulto disponibilidad de trabajo."; ?>"> <strong> <?php echo "+569 " . $row["telefonouser"]; ?></strong> </a> </span></div>
                                    </div>
                                </li>

                        <?php
                            }
                        }
                        ?>
                    </ul>

                </div>

            </div>
            <div class="splide__progress">
                <div class="splide__progress__bar">
                </div>
            </div>

        </div>
    </div>



    <br>
    <?php

    //$consultaRegistros = "SELECT count(idlogin)  from loginuser";
    $consultaRegistros = "select estado_disponible from estado_user ";
    $totalRegistros = pg_query($conexion, $consultaRegistros);
    $res = pg_num_rows($totalRegistros);



    $consultaDisponibles = "select estado_disponible from estado_user where estado_disponible=1";
    $totalDisponible = pg_query($conexion, $consultaDisponibles);
    $resDisponible = pg_num_rows($totalDisponible);




    $consultaOcupados = "select estado_disponible from estado_user where estado_disponible=2";
    $totalOcupados = pg_query($conexion, $consultaOcupados);
    $resOcupados = pg_num_rows($totalOcupados);
    ?>








    <br><br>


    <hr>
    <br>


    <div class="">
        <div class="wrapper1">
            <div class="container1 dark:bg-gray-900">

                <i class="counticon fa-solid fa-user"></i>
                <span class="num" data-val="<?php echo $res; ?>">000</span>
                <span class="text">Total Registrados</span>
            </div>

            <!-- contador de visitas 
        <div class="container1 dark:bg-gray-900">

            <i class="counticon fa-solid fa-eye"></i>
            <span class="num" data-val="340">000</span>
            <span class="text">Total de visitas</span>
        </div>-->



            <div class="container1 dark:bg-gray-900">
                <i class="counticon fa-solid fa-mug-hot"></i>
                <span class="num" data-val="<?php echo $resDisponible; ?>">000</span>
                <span class="text">Total Disponibles</span>
            </div>
            <div class="container1 dark:bg-gray-900">

                <i class="counticon fa-solid fa-hammer"></i>
                <span class="num" data-val="<?php echo $resOcupados; ?>">000</span>
                <span class="text">Total Ocupados</span>
            </div>





        </div>
        <!-- Script -->
        <script src="script.js"></script>
        <br>


        <script>
            let valueDisplays = document.querySelectorAll(".num");
            let interval = 4000;
            valueDisplays.forEach((valueDisplay) => {
                let startValue = 0;
                let endValue = parseInt(valueDisplay.getAttribute("data-val"));
                let duration = Math.floor(interval / endValue);
                let counter = setInterval(function() {
                    startValue += 1;
                    valueDisplay.textContent = startValue;
                    if (startValue == endValue) {
                        clearInterval(counter);
                    }
                }, duration);
            });
        </script>

        <div class="curvaDos">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 300">
                <path fill="#0099ff" fill-opacity="1" d="M0,128L60,154.7C120,181,240,235,360,234.7C480,235,600,181,720,144C840,107,960,85,1080,74.7C1200,64,1320,64,1380,64L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
            </svg>
        </div>
    </div>


<?php include('footer.php');?>