<?php

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';





$emailUsuario = $_POST['emailUser'];
$passUsuario1 = $_POST['password1'];
$passUsuario2 = $_POST['password2'];


include('conexion/database.php');

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
                title: 'Cuenta creada',
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



                    $codigoEmail  = random_int(100000, 999999); 

                    
                    
                    
                    

                    $mail = new PHPMailer(true);

                    $mail->isSMTP();
                
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth=true;
                    $mail ->Username='datea.conce@gmail.com';
                    $mail ->Password='jpcgvryhzcmsreyt';
                    $mail->SMTPSecure ='ssl';
                    $mail->Port=465;
                
                    $mail->setFrom('datea.conce@gmail.com');
                    $mail->CharSet = 'UTF-8';
                    $mail->addAddress($_POST['emailUser']);
                    $mail->isHTML(true);
                    $mail->Subject = "Validar email en Datea.cl";
                   // $mail->Body = "El código para validar el email es : ".$codigoEmail;


                    $mail->Body='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
                    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <title>Código Datea.cl</title>
                <style type="text/css">
                    h1{
                        color: #8bc34a;
                    }
                    p{
                        font-size: 1rem;
                    }
                    img{
                        width: 10rem;
                        height: 10rem;
                    }
                </style>
            </head>
            <body>
            <h1>Gracias por registrarte en Datea.cl </h1>
            <p>Hola, usuario/a. Ingresa este código para validar tu cuenta : <h1>'.$codigoEmail.'</h1></p>
            <p>
            Inicia sesión para validar cuenta en : <a href="http://localhost/sistemawebtesis/index.php"> Datea.cl</a>
            </p>
            
            <img src="https://i.postimg.cc/DZZMGWkD/logo-Trabajador.png">
            </body>';





                
                    $mail->send();


                    $estadoEmail='no';




                    $emailValidacion= "INSERT INTO validar_email (estado_email,codigo_email,pkuser_email,email_user) Values ('$estadoEmail',' $codigoEmail ','$numeroIDuser ','$emailUsuario ')";
                    $resultado = pg_query($conexion, $emailValidacion);


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