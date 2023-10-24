<?php
session_start();

if (!$_SESSION["success"]) {
    header("location:../votar");
} else {
    session_destroy();
}

?>

<?php include "../navbar/head-general.php"; ?>

<div class="alert alert-success text-center h3 pt-4 pb-4 user-select-none" role="alert">
    Su voto se ha cargado correctamente
</div>

<div class="d-flex justify-content-center">
    <a class="btn btn-primary" href="../votar" role="button">Continuar</a>
</div>

<?php include "../navbar/footer-general.php"; ?>