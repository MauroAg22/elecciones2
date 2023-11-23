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
            <div class="col">
                <div class="d-grid gap-2">
                    <button style="height: 80px;" type="button" name="" id="" class="btn btn-success btn-lg">Iniciar votación</button>
                </div>
            </div>
            <div class="col">
                <div class="d-grid gap-2">
                    <button style="height: 80px;" type="button " name="" id="" class="btn btn-danger btn-lg">Finalizar votación</button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="d-grid gap-2">
                    <button style="height: 80px;" type="button " name="" id="" class="btn btn-info btn-lg">Limpiar padrón y votos</button>
                </div>
            </div>
        </div>
    </div>
</div>





<?php include "../navbar/footer-atd.php"; ?>