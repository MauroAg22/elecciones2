<?php
session_start();

if (isset($_SESSION["login"])) {
    header("location:gestion.php");
}

?>

<?php include "../navbar/head.php"; ?>

<form action="index.php" method="post">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-5 col-md-7">
            <div class="card">
                <div class="card-header">
                    Gestión de mesa
                </div>
                <div class="card-body">
                    <div class="container d-grid gap-4 mb-3">
                        <div>
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" autocomplete="off" required>
                        </div>
                        <div>
                            <label for="contrasenia" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="contrasenia" id="contrasenia" autocomplete="off" required>
                        </div>
                        <div class="d-grid gap-2 pt-3">
                            <button type="submit" name="" id="" class="btn btn-success">Login</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php

            if ($_POST) {
                $usuario = $_POST["usuario"];
                $contrasenia = $_POST["contrasenia"];

                if ($usuario == "MauroLucero" && $contrasenia == "12345") {

                    session_start();
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["contrasenia"] = $contrasenia;
                    $_SESSION["login"] = true;

                    header("location:gestion.php");
                } else {
                    include "incorrecto.php";
                }
            }

            ?>

        </div>
    </div>
</form>

<?php include "../navbar/footer.php"; ?>