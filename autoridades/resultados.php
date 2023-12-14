<?php
session_start();

if (!$_SESSION["login"]) {
    header("location:../autoridades");
}

include "../database/clases.php";

$objCandidatos = new candidatos();

function resultadoVotosTexto($cantVotos) {
    return ($cantVotos == 1) ? "$cantVotos VOTO" : "$cantVotos VOTOS";
}

?>

<?php include "../navbar/head-atd.php"; ?>


<div class="container card border-secondary mt-5">
    <div class="card-body">
        <h3 class="card-title user-select-none">Resultados de las votaciones.</h3>
        <div class="container">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1">
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/bregman.png" alt="">
                        <div class="progress border mb-2" style="height: 40px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example 20px label" style="width: <?php echo $objCandidatos->promedioVotosBregman; ?>%;" aria-valuenow="<?php echo $objCandidatos->promedioVotosBregman; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-evenly fs-5 user-select-none mt-2">
                            <span> <?php echo $objCandidatos->promedioVotosBregman; ?>% </span>
                            <span> <?php echo $objCandidatos->resultadoVotosTexto($objCandidatos->cantVotosBregman); ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/bullrich.png" alt="">
                        <div class="progress border mb-2" style="height: 40px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example 20px label" style="width: <?php echo $objCandidatos->promedioVotosBullrich; ?>%;" aria-valuenow="<?php echo $objCandidatos->promedioVotosBullrich; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-evenly fs-5 user-select-none mt-2">
                            <span> <?php echo $objCandidatos->promedioVotosBullrich; ?>% </span>
                            <span> <?php echo $objCandidatos->resultadoVotosTexto($objCandidatos->cantVotosBullrich); ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/massa.png" alt="">
                        <div class="progress border mb-2" style="height: 40px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example 20px label" style="width: <?php echo $objCandidatos->promedioVotosMassa; ?>%;" aria-valuenow="<?php echo $objCandidatos->promedioVotosMassa; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-evenly fs-5 user-select-none mt-2">
                            <span> <?php echo $objCandidatos->promedioVotosMassa; ?>% </span>
                            <span> <?php echo $objCandidatos->resultadoVotosTexto($objCandidatos->cantVotosMassa); ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/milei.png" alt="">
                        <div class="progress border mb-2" style="height: 40px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example 20px label" style="width: <?php echo $objCandidatos->promedioVotosMilei; ?>%;" aria-valuenow="<?php echo $objCandidatos->promedioVotosMilei; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-evenly fs-5 user-select-none mt-2">
                            <span> <?php echo $objCandidatos->promedioVotosMilei; ?>% </span>
                            <span> <?php echo $objCandidatos->resultadoVotosTexto($objCandidatos->cantVotosMilei); ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/schiaretti.png" alt="">
                        <div class="progress border mb-2" style="height: 40px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example 20px label" style="width: <?php echo $objCandidatos->promedioVotosSchiaretti; ?>%;" aria-valuenow="<?php echo $objCandidatos->promedioVotosSchiaretti; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-evenly fs-5 user-select-none mt-2">
                            <span> <?php echo $objCandidatos->promedioVotosSchiaretti; ?>% </span>
                            <span> <?php echo $objCandidatos->resultadoVotosTexto($objCandidatos->cantVotosSchiaretti); ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/blanco.png" alt="">
                        <div class="progress border mb-2" style="height: 40px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example 20px label" style="width: <?php echo $objCandidatos->promedioVotosBlanco; ?>%;" aria-valuenow="<?php echo $objCandidatos->promedioVotosBlanco; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-evenly fs-5 user-select-none mt-2">
                            <span> <?php echo $objCandidatos->promedioVotosBlanco; ?>% </span>
                            <span> <?php echo $objCandidatos->resultadoVotosTexto($objCandidatos->cantVotosBlanco); ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php $objCandidatos->desconectar(); ?>

<?php include "../navbar/footer-atd.php"; ?>