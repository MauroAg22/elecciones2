<?php
session_start();

if (!$_SESSION["votar"]) {
    header("location:../votar");
}

if ($_POST) {
    $dni = $_SESSION["dni"];
    $mi_voto = $_POST["voto"];

    include "../database/clases.php";

    $objConsultas = new consultas();
    $objConsultas->insertar_voto($mi_voto);
    $objConsultas->registrar_votante($dni);
    $objConsultas->desconectar();

    session_destroy();
    session_start();
    
    $_SESSION["success"] = true;
    unset($_SESSION["votar"]);
    header("location:success.php");
}

?>

<?php include "../navbar/head-general.php"; ?>

    <div class="container card border-secondary">
        <div class="card-body">
            <h4 class="card-title user-select-none">Seleccione su candidato para presidente</h4>
            <form action="votar.php" method="post">
                <div class="container">
                    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1">
                        <div class="col d-flex justify-content-center">
                            <label class="d-flex flex-column align-items-center p-3">
                                <img class="img-voto img-personalizada mb-4 user-select-none" src="../images/bregman.png" alt="">
                                <input class="form-check-input" type="radio" name="voto" value="bregman" required>
                            </label>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <label class="d-flex flex-column align-items-center p-3">
                                <img class="img-voto img-personalizada mb-4 user-select-none" src="../images/bullrich.png" alt="">
                                <input class="form-check-input" type="radio" name="voto" value="bullrich">
                            </label>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <label class="d-flex flex-column align-items-center p-3">
                                <img class="img-voto img-personalizada mb-4 user-select-none" src="../images/massa.png" alt="">
                                <input class="form-check-input" type="radio" name="voto" value="massa">
                            </label>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <label class="d-flex flex-column align-items-center p-3">
                                <img class="img-voto img-personalizada mb-4 user-select-none" src="../images/milei.png" alt="">
                                <input class="form-check-input" type="radio" name="voto" value="milei">
                            </label>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <label class="d-flex flex-column align-items-center p-3">
                                <img class="img-voto img-personalizada mb-4 user-select-none" src="../images/schiaretti.png" alt="">
                                <input class="form-check-input" type="radio" name="voto" value="schiaretti">
                            </label>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <label class="d-flex flex-column align-items-center p-3">
                                <img class="img-voto img-personalizada mb-4 user-select-none" src="../images/blanco.png" alt="">
                                <input class="form-check-input" type="radio" name="voto" value="blanco">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="d-grid gap-2 pt-3">
                            <button type="submit" name="" id="" class="btn btn-success">VOTAR</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php include "../navbar/footer-general.php"; ?>