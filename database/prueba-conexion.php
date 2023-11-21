<?php

include "clases.php";

$objeto = new conexion();

$resultado = $objeto->conteo_votos("milei");

print_r($resultado);

print_r($objeto->conteo_votos("massa"));

$objeto->desconectar();


?>

