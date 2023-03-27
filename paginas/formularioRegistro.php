<?php

session_start();


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


<?php include('../head.php');?>

<body>



    <style>
        li {
            list-style: none
        }
    </style>


    <!-- navbar con tailwild-->

    <?php include('../navdatea.php');?>








    <br><br><br>



    <script>
        function pruebaemail(valor) {
            re = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/
            if (!re.exec(valor)) {
                alert('email incompleto');


               
                return false;
            } else {
               <?php $ruta = "validarformulario.php"; ?>
               return true;
            }
        }
    </script>
    

  

    <div class="font-sans">
        <div class="relative p-20 flex flex-col sm:justify-center items-center ">
            <div class="relative sm:max-w-sm w-full">
                <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                    <label for="" class="block mt-3 text-sm text-gray-700 text-center font-semibold">
                        Registrate
                    </label>
                    
                    <form method="POST" action="<?php echo $ruta; ?>" class="mt-10">



                        <div class="mt-7">
                            <input type="email" placeholder="Correo electronico" required name="emailUser" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                        </div>

                        <div class="mt-7">
                            <input type="password" placeholder="Contraseña" name="password1" required maxlength="10" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                        </div>

                        <div class="mt-7">
                            <input type="password" name="password2" required maxlength="10" placeholder="Confirmar contraseña" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                        </div>



                        <div class="mt-7">
                            <button type="submit" onClick="return pruebaemail(emailUser.value);" class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Registrar
                            </button>
                        </div>





                    
                    </form>
                    <div class="mt-7">
                            <div class="flex justify-center items-center">
                                <label class="mr-2">¿Ya tienes una cuenta?</label>
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
                                                    <form class="space-y-6" action="validarformulario.php" method="POST">
                                                        <div>
                                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EMAIL</label>
                                                            <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="usuario" id="username" placeholder="ejemplo@gmail.com" required>
                                                        </div>
                                                        <div>
                                                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PASSWORD</label>
                                                            <input type="password" name="clave" id="password" type="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                                        </div>
                                                        <div class="flex justify-between">

                                                            <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Perdiste tu password?</a>
                                                        </div>
                                                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ingresar a tu cuenta</button>
                                                        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                                            No estas registrado? <a href="formularioRegistro.php" class="text-blue-700 hover:underline dark:text-blue-500">Crear cuenta</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>


    <br><br>



    <?php include('../footer.php');?>