<?php

include "../database/clases.php";
$objGestionElectoral = new GestionElectoral();
$objGestionElectoral->iniciarVotacion();
header("location:gestion.php");
