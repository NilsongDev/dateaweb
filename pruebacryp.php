<?php
//ConfiguraciÃ³n del algoritmo de encriptaciÃ³n
//Debes cambiar esta cadena, debe ser larga y unica
//nadie mas debe conocerla

$numerocel = "74054660";
$texto = "texto de prueba";


?>
<link rel="stylesheet" href="componentes/css/stylePublicidad.css">


<figure id="photo" title="¿Qué hay, bro?" tooltip-dir="left">
  <img src="https://s-media-cache-ak0.pinimg.com/564x/c0/f0/9f/c0f09f6c4d59f94f60f27ba6a05b8f57.jpg"/>
</figure>



<script>
    document.addEventListener('DOMContentLoaded', function () {
  let figure = document.getElementById('photo');
  let directions = document.getElementById('directions');

  directions.addEventListener('change', function () {
    figure.setAttribute('tooltip-dir', this.value);
  });
});
</script>