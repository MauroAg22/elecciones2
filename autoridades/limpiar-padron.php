<?php

include "../database/clases.php";
$objGestionElectoral = new GestionElectoral();

if ($objGestionElectoral->getSeEstaVotando()) {
    $objGestionElectoral->desconectar();
    header("location:gestion.php");
    exit;
} else {
    $objGestionElectoral->resetearPadron();
    $objGestionElectoral->resetearVotos();
    $objGestionElectoral->desconectar();
    header("location:gestion.php");
    exit;
}



