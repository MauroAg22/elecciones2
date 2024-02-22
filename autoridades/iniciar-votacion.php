<?php

include "../database/clases.php";
$objGestionElectoral = new GestionElectoral();
$objGestionElectoral->iniciarVotacion();
$objGestionElectoral->desconectar();
header("location:gestion.php");
exit;