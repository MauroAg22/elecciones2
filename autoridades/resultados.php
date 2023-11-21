<?php
session_start();

if (!$_SESSION["login"]) {
    header("location:../autoridades");
}

include "../database/clases.php";

$objConexion = new conexion();

$cantVotosBregman = $objConexion->conteo_votos("bregman");
$cantVotosBullrich = $objConexion->conteo_votos("bullrich");
$cantVotosMassa = $objConexion->conteo_votos("massa");
$cantVotosMilei = $objConexion->conteo_votos("milei");
$cantVotosSchiaretti = $objConexion->conteo_votos("schiaretti");
$cantVotosBlanco = $objConexion->conteo_votos("blanco");

$cantVotosTotales = $cantVotosBregman + $cantVotosBullrich + $cantVotosMassa + $cantVotosMilei + $cantVotosSchiaretti + $cantVotosBlanco;

$promedioVotosBregman = number_format($cantVotosBregman / $cantVotosTotales * 100);
$promedioVotosBullrich = number_format($cantVotosBullrich / $cantVotosTotales * 100);
$promedioVotosMassa = number_format($cantVotosMassa / $cantVotosTotales * 100);
$promedioVotosMilei = number_format($cantVotosMilei / $cantVotosTotales * 100);
$promedioVotosSchiaretti = number_format($cantVotosSchiaretti / $cantVotosTotales * 100);
$promedioVotosBlanco = number_format($cantVotosBlanco / $cantVotosTotales * 100);



?>

<?php include "../navbar/head-atd.php"; ?>


<div class="container card border-secondary mt-5">
    <div class="card-body">
        <h4 class="card-title user-select-none">Resultados de las votaciones.</h4>
        <div class="container">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1">
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/bregman.png" alt="">
                        <div class="progress border mb-2" style="height: 30px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example with label" style="width: <?php echo $promedioVotosBregman; ?>%;" aria-valuenow="<?php echo $promedioVotosBregman; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $promedioVotosBregman; ?>%</div>
                        </div>
                        <span> <strong> <?php echo $cantVotosBregman; ?> VOTOS </strong> </span>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/bullrich.png" alt="">
                        <div class="progress border mb-2" style="height: 30px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example with label" style="width: <?php echo $promedioVotosBullrich; ?>%;" aria-valuenow="<?php echo $promedioVotosBullrich; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $promedioVotosBullrich; ?>%</div>
                        </div>
                        <span> <?php echo $cantVotosBullrich; ?> VOTOS</span>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/massa.png" alt="">
                        <div class="progress border mb-2" style="height: 30px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example with label" style="width: <?php echo $promedioVotosMassa; ?>%;" aria-valuenow="<?php echo $promedioVotosMassa; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $promedioVotosMassa; ?>%</div>
                        </div>
                        <span> <?php echo $cantVotosMassa; ?> VOTOS</span>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/milei.png" alt="">
                        <div class="progress border mb-2" style="height: 30px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example with label" style="width: <?php echo $promedioVotosMilei; ?>%;" aria-valuenow="<?php echo $promedioVotosMilei; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $promedioVotosMilei; ?>%</div>
                        </div>
                        <span> <?php echo $cantVotosMilei; ?> VOTOS</span>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/schiaretti.png" alt="">
                        <div class="progress border mb-2" style="height: 30px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example with label" style="width: <?php echo $promedioVotosSchiaretti; ?>%;" aria-valuenow="<?php echo $promedioVotosSchiaretti; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $promedioVotosSchiaretti; ?>%</div>
                        </div>
                        <span> <?php echo $cantVotosSchiaretti; ?> VOTOS</span>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/blanco.png" alt="">
                        <div class="progress border mb-2" style="height: 30px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example with label" style="width: <?php echo $promedioVotosBlanco; ?>%;" aria-valuenow="<?php echo $promedioVotosBlanco; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $promedioVotosBlanco; ?>%</div>
                        </div>
                        <span> <?php echo $cantVotosBlanco; ?> VOTOS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php $objConexion->desconectar(); ?>

<?php include "../navbar/footer-atd.php"; ?>