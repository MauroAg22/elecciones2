<?php
session_start();

if (!$_SESSION["login"]) {
    header("location:../autoridades");
}

?>

<?php include "../navbar/head-atd.php"; ?>


<div class="row justify-content-center align-items-center mt-5">
    <div class="col-lg-8 col-md-10">
        <div class="row">
            <div class="col mt-3">
                <div class="d-grid gap-2">
                    <a class="btn btn-success btn-lg btnGestion disabled" href="#" role="button">Iniciar votación</a>
                </div>
            </div>
            <div class="col mt-3">
                <div class="d-grid gap-2">
                    <a class="btn btn-danger btn-lg btnGestion disabled" href="#" role="button">Finalizar votación</a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="d-grid gap-2">
                    <a class="btn btn-info btn-lg btnGestion disabled" href="#" role="button">Finalizar votación</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "../navbar/footer-atd.php"; ?>