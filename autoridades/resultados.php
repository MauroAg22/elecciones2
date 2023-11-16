<?php
session_start();

if (!$_SESSION["login"]) {
    header("location:../autoridades");
}

include "../database/clases.php";

$objConexion = new conexion();



?>

<?php include "../navbar/head-atd.php"; ?>


<div class="container card border-secondary mt-5">
    <div class="card-body">
        <h4 class="card-title user-select-none">Resultados de las votaciones.</h4>
        <div class="container">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1">
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none" src="../images/bregman.png" alt="">
                        <span> <strong> <?php echo $objConexion->conteo_votos("bregman"); ?> VOTOS </strong> </span>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none" src="../images/bullrich.png" alt="">
                        <span> <?php echo $objConexion->conteo_votos("bullrich"); ?> VOTOS</span>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none" src="../images/massa.png" alt="">
                        <span> <?php echo $objConexion->conteo_votos("massa"); ?> VOTOS</span>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none" src="../images/milei.png" alt="">
                        <span> <?php echo $objConexion->conteo_votos("milei"); ?> VOTOS</span>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none" src="../images/schiaretti.png" alt="">
                        <span> <?php echo $objConexion->conteo_votos("schiaretti"); ?> VOTOS</span>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none" src="../images/blanco.png" alt="">
                        <span> <?php echo $objConexion->conteo_votos("blanco"); ?> VOTOS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php $objConexion->desconectar(); ?>

<?php include "../navbar/footer-atd.php"; ?>