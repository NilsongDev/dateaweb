<?php


$rut='17614599-4';






$url = 'https://rutificador.porsilapongo.cl/api/v1/persona/rut/'.$rut;
$response = file_get_contents($url);

if ($response != false) {
    $data = json_decode($response, true);
    //var_dump($data);
     $data['Nombre'];
    $nombre = $data['Nombre'];
    

    //echo $data['RUT'];
    //echo $data['Direccion'];
    //echo $data['Ciudad'];
} else {
    echo 'Error al hacer la solicitud';
}



$nombreCompleto = explode(" ",$nombre);

$apellidoPaterno = $nombreCompleto[0];
$apellidoMaterno=$nombreCompleto[1];
$nombreUno=$nombreCompleto[2];
$nombreDos=$nombreCompleto[3];

echo "El nombre del usuario es : ".$nombreUno." ".$nombreDos." ".$apellidoPaterno." ".$apellidoMaterno;

?>

