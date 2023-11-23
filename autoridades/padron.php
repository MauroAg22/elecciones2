<?php
session_start();

if (!$_SESSION["login"]) {
    header("location:../autoridades");
}

include "../database/clases.php";

$objConsultas = new consultas();
$personas = $objConsultas->consultar("SELECT * FROM `padron` ORDER BY `apellido` ASC");

?>

<?php include "../navbar/head-atd.php"; ?>


<div class="row justify-content-center mt-5">
    <div class="col-lg-8 col-md-10">

        <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-primary align-middle text-center">
                <thead class="table-light">
                    <caption>PADRÓN ELECTORAL 2023</caption>
                    <tr class="fs-5">
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>DNI</th>
                        <th>Votó</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider border">
                    <?php foreach ($personas as $persona) { ?>
                        <tr class="table-light fs-5">
                            <td> <?php echo $persona["apellido"]; ?> </td>
                            <td> <?php echo $persona["nombre"]; ?> </td>
                            <td> <?php echo number_format($persona["dni"], 0, '', '.'); ?> </td>
                            <td> <?php echo $persona["voto"] == 1 ? "SI" : "NO" ?> </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>


    </div>
</div>





<?php $objConsultas->desconectar(); ?>

<?php include "../navbar/footer-atd.php"; ?>