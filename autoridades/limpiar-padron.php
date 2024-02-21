<?php

include "../database/clases.php";
$objGestionElectoral = new GestionElectoral();

if ($objGestionElectoral->getSeEstaVotando()) {
    header("location:gestion.php");
} else {
    $objGestionElectoral->resetearPadron();
    $objGestionElectoral->resetearVotos();
    header("location:gestion.php");
}



