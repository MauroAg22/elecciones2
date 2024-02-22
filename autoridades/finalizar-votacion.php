<?php

include "../database/clases.php";
$objGestionElectoral = new GestionElectoral();
$objGestionElectoral->finalizarVotacion();
$objGestionElectoral->desconectar();
header("location:gestion.php");
exit;