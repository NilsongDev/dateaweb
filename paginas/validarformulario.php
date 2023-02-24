<?php

$emailUsuario = $_POST['emailUser'];
$passUsuario1 = $_POST['password1'];
$passUsuario2 = $_POST['password2'];


$conexion = pg_connect("host=localhost dbname=postgres user=postgres password=0988");

$consultaEmail = "SELECT username FROM loginuser WHERE username ='$emailUsuario'";
$res = pg_query($conexion, $consultaEmail);

$ress = pg_num_rows($res);


if(pg_num_rows($res)>0){
    while($row = pg_fetch_assoc($res)){
       $emailrespuesta= $row["username"];

    }



}

//comenzar aqui con el inicio de encryptacion del password 1 y 2
















?> <html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>


    <?php

    if ($ress >= 1) {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'CORREO YA REGISTRADO INTENTE CON OTRO.',
                showConfirmButton: false,

            })
        </script>


    <?php
        //echo $ress;
        
        header("refresh:2;url=formularioRegistro.php");
    } elseif ($passUsuario1 == $passUsuario2) {

    ?>
        <script>
            Swal.fire({

                icon: 'success',
                title: 'Bienvenido, USUARIO AGREGADO',
                showConfirmButton: false,
                timer: 1500
            })
        </script>



        <?php

            //aqui se cambia los valores de cryp
                        $dato = $passUsuario1;

            //Metodo de encriptaciÃ³n
            $method = 'aes-256-cbc';
            // Puedes generar una diferente usando la funcion $getIV()
            $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
            
            /*
            Encripta el contenido de la variable, enviada como parametro.
            */
            $encriptar = function ($valor) use ($method, $dato, $iv) {
                return openssl_encrypt ($valor, $method, $dato, false, $iv);
            };

            //Encripta informaciÃ³n:
            $dato_encriptado = $encriptar($dato);
            







        echo "USUARIO AGREGADO";
        $consulta = "INSERT INTO loginuser (username,password1,password2) Values ('$emailUsuario','$dato_encriptado ','$dato_encriptado ')";
        $resultado = pg_query($conexion, $consulta);



        $consultaID = "SELECT * FROM loginuser WHERE username='$emailUsuario' AND password1='$dato_encriptado '";
        $respuestaID = pg_query($conexion, $consultaID);

        if ($respuestaID) {

            if (pg_num_rows($respuestaID) > 0) {
                while ($row = pg_fetch_assoc($respuestaID)) {

                    $numeroIDuser = $row["idlogin"];


                    $agregar = "INSERT INTO perfilusuario (codigologin) VALUES ('$numeroIDuser')";
                    $agregar_especialidad_user="INSERT INTO especialidad_user (fk_oficio_perfil) VALUES ('$numeroIDuser')" ;
                    $agregar_estado_user="INSERT INTO estado_user (estado_fk) VALUES ('$numeroIDuser')";
                    $agregar_extra_dato_user="INSERT INTO extra_datos_user (fk_extra_perfil) VALUES ('$numeroIDuser')";
                    $agrega_tipo_user = "INSERT INTO tipo_user (fk_login_tipo) VALUES ('$numeroIDuser')";


                    $agrega_oficio_user= "INSERT INTO oficio_user (fk_oficio_user) VALUES ('$numeroIDuser')";



                    $ingreso = pg_query($conexion, $agregar);
                    $ingreso = pg_query($conexion, $agregar_especialidad_user);
                    $ingreso = pg_query($conexion, $agregar_estado_user);
                    $ingreso = pg_query($conexion, $agregar_extra_dato_user);
                    $ingreso = pg_query($conexion, $agrega_tipo_user);
                    
                    $ingreso = pg_query($conexion, $agrega_oficio_user);
                    header("refresh:1;url=login.php");
                }
            }
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'intente nuevamente!',
                    showConfirmButton: false,

                })
            </script>

        <?php

        }
    } else {

        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'ERROR, Password No Son iguales',
                showConfirmButton: false,

            })
        </script>

    <?php


        header("refresh:2;url=formularioRegistro.php");
    }









    ?>
</body>

</html>