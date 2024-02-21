<?php

include "../database/clases.php";
$objGestionElectoral = new GestionElectoral();
$objGestionElectoral->finalizarVotacion();
header("location:gestion.php");
