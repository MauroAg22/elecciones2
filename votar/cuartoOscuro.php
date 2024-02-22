<?php
session_start();
include "../database/clases.php";
$objGestionElectoral = new GestionElectoral();
$estadoVotaciones = $objGestionElectoral->getSeEstaVotando();
if (isset($_SESSION["dni"])) {
    if ($objGestionElectoral->getSeEstaVotando()) {
        $_SESSION["votar"] = true;
        $objGestionElectoral->desconectar();
        header("location:votar.php");
        exit;
    } else {
        $objGestionElectoral->desconectar();
        header("location:index.php");
        exit;
    }
} else {
    $objGestionElectoral->desconectar();
    header("location:index.php");
    exit;
}