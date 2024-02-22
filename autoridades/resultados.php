<?php
session_start();

if (!$_SESSION["login"]) {
    header("location:../autoridades");
    exit;
}

include "../navbar/head-atd.php";
$objGestionElectoral = new GestionElectoral();
$estadoVotaciones = $objGestionElectoral->getSeEstaVotando();

if ($estadoVotaciones) {
    header("location:../autoridades");
    exit;
}

$candidato1 = new Candidato("bregman");
$candidato2 = new Candidato("bullrich");
$candidato3 = new Candidato("massa");
$candidato4 = new Candidato("milei");
$candidato5 = new Candidato("schiaretti");
$blanco = new Candidato("blanco");

$totalVotos =   
    $candidato1->getCantVotos() + 
    $candidato2->getCantVotos() +
    $candidato3->getCantVotos() + 
    $candidato4->getCantVotos() + 
    $candidato5->getCantVotos() + 
    $blanco->getCantVotos()
;

$candidato1->setPromedioVotos($totalVotos);
$candidato2->setPromedioVotos($totalVotos);
$candidato3->setPromedioVotos($totalVotos);
$candidato4->setPromedioVotos($totalVotos);
$candidato5->setPromedioVotos($totalVotos);
$blanco->setPromedioVotos($totalVotos);

?>


<div class="container card border-secondary mt-5">
    <div class="card-body">
        <h3 class="card-title user-select-none">Resultados de las votaciones.</h3>
        <div class="container">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1">
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/bregman.png" alt="">
                        <div class="progress border mb-2" style="height: 40px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example 20px label" style="width: <?php echo $candidato1->getPromedioVotos(); ?>%;" aria-valuenow="<?php echo $candidato1->getPromedioVotos(); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-evenly fs-5 user-select-none mt-2">
                            <span> <?php echo floatval($candidato1->getPromedioVotos()); ?> % </span>
                            <span> <?php echo ($candidato1->getCantVotos() == 1) ? "{$candidato1->getCantVotos()} VOTO" : "{$candidato1->getCantVotos()} VOTOS"; ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/bullrich.png" alt="">
                        <div class="progress border mb-2" style="height: 40px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example 20px label" style="width: <?php echo $candidato2->getPromedioVotos(); ?>%;" aria-valuenow="<?php echo $candidato2->getPromedioVotos(); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-evenly fs-5 user-select-none mt-2">
                            <span> <?php echo floatval($candidato2->getPromedioVotos()); ?> % </span>
                            <span> <?php echo ($candidato2->getCantVotos() == 1) ? "{$candidato2->getCantVotos()} VOTO" : "{$candidato2->getCantVotos()} VOTOS"; ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/massa.png" alt="">
                        <div class="progress border mb-2" style="height: 40px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example 20px label" style="width: <?php echo $candidato3->getPromedioVotos(); ?>%;" aria-valuenow="<?php echo $candidato3->getPromedioVotos(); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-evenly fs-5 user-select-none mt-2">
                            <span> <?php echo floatval($candidato3->getPromedioVotos()); ?> % </span>
                            <span> <?php echo ($candidato3->getCantVotos() == 1) ? "{$candidato3->getCantVotos()} VOTO" : "{$candidato3->getCantVotos()} VOTOS"; ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/milei.png" alt="">
                        <div class="progress border mb-2" style="height: 40px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example 20px label" style="width: <?php echo $candidato4->getPromedioVotos(); ?>%;" aria-valuenow="<?php echo $candidato4->getPromedioVotos(); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-evenly fs-5 user-select-none mt-2">
                            <span> <?php echo floatval($candidato4->getPromedioVotos()); ?> % </span>
                            <span> <?php echo ($candidato4->getCantVotos() == 1) ? "{$candidato4->getCantVotos()} VOTO" : "{$candidato4->getCantVotos()} VOTOS"; ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/schiaretti.png" alt="">
                        <div class="progress border mb-2" style="height: 40px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example 20px label" style="width: <?php echo $candidato5->getPromedioVotos(); ?>%;" aria-valuenow="<?php echo $candidato5->getPromedioVotos(); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-evenly fs-5 user-select-none mt-2">
                            <span> <?php echo floatval($candidato5->getPromedioVotos()); ?> % </span>
                            <span> <?php echo ($candidato5->getCantVotos() == 1) ? "{$candidato5->getCantVotos()} VOTO" : "{$candidato5->getCantVotos()} VOTOS"; ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center p-3">
                        <img class="img-personalizada urgencia mb-4 user-select-none border" src="../images/blanco.png" alt="">
                        <div class="progress border mb-2" style="height: 40px; width:100%">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example 20px label" style="width: <?php echo $blanco->getPromedioVotos(); ?>%;" aria-valuenow="<?php echo $blanco->getPromedioVotos(); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="width: 100%;" class="d-flex justify-content-evenly fs-5 user-select-none mt-2">
                            <span> <?php echo floatval($blanco->getPromedioVotos()); ?> % </span>
                            <span> <?php echo ($blanco->getCantVotos() == 1) ? "{$blanco->getCantVotos()} VOTO" : "{$blanco->getCantVotos()} VOTOS"; ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

$candidato1->desconectar();
$candidato2->desconectar();
$candidato3->desconectar();
$candidato4->desconectar();
$candidato5->desconectar();
$blanco->desconectar();

include "../navbar/footer-atd.php";