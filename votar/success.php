<?php
session_start();

if (!$_SESSION["success"]) {
    header("location:index.php");
} else {
    session_destroy();
}

?>

<?php include "../navbar/head.php"; ?>

<div class="alert alert-success text-center h3 pt-4 pb-4" role="alert">
    Su voto se ha cargado correctamente
</div>

<div class="d-flex justify-content-center">
    <a class="btn btn-primary" href="index.php" role="button">Continuar</a>
</div>

<?php include "../navbar/footer.php"; ?>