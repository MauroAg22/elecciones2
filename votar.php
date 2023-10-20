<?php include "head.php"; ?>

<?php
session_start();

if (!$_SESSION["login"]) {
    header("location:verificar.php");
}

if ($_POST) {



    session_destroy();
    header("location:success.php");
}

?>


    <div class="container card border-secondary">
        <div class="card-body">
            <h4 class="card-title">Seleccione su candidato</h4>
            <form action="votar.php" method="post">
                <div class="container">
                    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1">
                        <div class="col d-flex justify-content-center">
                            <label class="d-flex flex-column align-items-center p-3">
                                <img class="img-voto img-personalizada mb-4" src="images/bregman.png" alt="">
                                <input class="form-check-input" type="radio" name="voto" value="bregman" required>
                            </label>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <label class="d-flex flex-column align-items-center p-3">
                                <img class="img-voto img-personalizada mb-4" src="images/bullrich.png" alt="">
                                <input class="form-check-input" type="radio" name="voto" value="bullrich">
                            </label>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <label class="d-flex flex-column align-items-center p-3">
                                <img class="img-voto img-personalizada mb-4" src="images/massa.png" alt="">
                                <input class="form-check-input" type="radio" name="voto" value="massa">
                            </label>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <label class="d-flex flex-column align-items-center p-3">
                                <img class="img-voto img-personalizada mb-4" src="images/milei.png" alt="">
                                <input class="form-check-input" type="radio" name="voto" value="milei">
                            </label>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <label class="d-flex flex-column align-items-center p-3">
                                <img class="img-voto img-personalizada mb-4" src="images/schiaretti.png" alt="">
                                <input class="form-check-input" type="radio" name="voto" value="schiaretti">
                            </label>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <label class="d-flex flex-column align-items-center p-3">
                                <img class="img-voto img-personalizada mb-4" src="images/blanco.png" alt="">
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

<?php include "footer.php"; ?>