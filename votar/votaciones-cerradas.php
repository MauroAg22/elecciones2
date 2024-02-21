<?php
session_start();

include "../database/clases.php";
$objGestionElectoral = new GestionElectoral();
$estadoVotaciones = $objGestionElectoral->getSeEstaVotando();

if ($estadoVotaciones) {
    header("location:index.php");
}


if (isset($_SESSION["login"])) {
    header("location:votar.php");
}

include "../navbar/head-general.php";

?>

<div class="alert alert-danger text-center fs-1" role="alert">
    Las votaciones están cerradas.
</div>

<?php include "../navbar/footer-general.php"; ?>