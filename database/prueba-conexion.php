<?php

include "clases.php";

$objeto = new conexion();

$resultado = $objeto->conteo_votos("milei");

print_r($resultado);

$objeto->desconectar();

?>

