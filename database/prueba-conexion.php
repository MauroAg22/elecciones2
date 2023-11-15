<?php

include "clases.php";

$objeto = new conexion();

$sql = 'select `dni` from `padron` where `dni` = "40319143";';

$respuesta = $objeto->consultar($sql);

// print_r($respuesta[0]["dni"]);

print_r($objeto->esta_dni("40319143"));

$objeto->desconectar();

?>

