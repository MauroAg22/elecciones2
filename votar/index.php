<?php
session_start();

if (isset($_SESSION["login"])) {
    header("location:votar.php");
}

?>

<?php include "../navbar/head-general.php"; ?>

<form action="index.php" method="post">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-5 col-md-7">
            <div class="card">
                <div class="card-header user-select-none">
                    Verificación padrón electoral
                </div>
                <div class="card-body">
                    <div class="container d-grid gap-1 mb-3">
                        <div>
                            <label for="dni" class="form-label user-select-none">Ingresar DNI</label>
                            <input type="text" class="form-control" name="dni" id="dni" aria-describedby="helpId" pattern="^[1-9][0-9]{6,7}$" autocomplete="off" required>
                            <small id="helpId" class="form-text text-muted user-select-none">ej: 12345678</small>
                        </div>
                        <div class="d-grid gap-2 pt-3">
                            <button type="submit" name="" id="" class="btn btn-success user-select-none">Validar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            if ($_POST) {

                include "../database/clases.php";
                $objConsultas = new consultas();

                $dni = $_POST["dni"];
                $_SESSION["dni"] = $dni;

                
                // $sql = 'select `dni` from `padron` where `dni` = "' . $dni . '";';

                $respuesta = $objConsultas->esta_dni($dni);

                if ($respuesta) {
                    if (!($objConsultas->voto_dni($dni))) {
                        include "puede-votar.php";
                    } else {
                        include "ya-voto.php";
                    }
                } else {
                    include "no-puede-votar.php";
                }


                
                // if ($dni == $respuesta) {
                //     include "puede-votar.php";
                // } else {
                //     include "no-puede-votar.php";
                // }

                $objConsultas->desconectar();
            }
            ?>
        </div>
    </div>
</form>

<?php include "../navbar/footer-general.php"; ?>