<?php 
include('datosConexion.php');

class CConexion{
    function ConexionBD(){
        try{
            $conexion = new PDO("pgsql:host=".SERVER."; dbname=".DBNAME,USER,PASSWORD);
           // echo "se conecto correctamente a la base de datos";
            return $conexion;
        }
        catch(PDOException $exp){
            die("no se pudo conectar a la base de datos, error es : ". $exp->getMessage());
        }

    }
}

?>