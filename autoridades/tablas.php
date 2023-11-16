<?php
session_start();

if (!$_SESSION["login"]) {
    header("location:../autoridades");
}

include "../database/clases.php";

$objConexion = new conexion();
$personas = $objConexion->consultar("SELECT * FROM `padron` ORDER BY `apellido` ASC");

?>

<?php include "../navbar/head-atd.php"; ?>

    <div class="table-responsive mt-5">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <caption>PADRÓN ELECTORAL 2023</caption>
                <tr>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>DNI</th>
                    <th>Votó</th>
                </tr>
            </thead>
            <tbody class="table-group-divider border">
                <?php foreach ($personas as $persona) { ?>
                    <tr class="table-light">
                        <td> <?php echo $persona["apellido"]; ?> </td>
                        <td> <?php echo $persona["nombre"]; ?> </td>
                        <td> <?php echo $persona["dni"]; ?> </td>
                        <td> <?php echo $persona["voto"] == 1 ? "SI" : "NO" ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>





<?php $objConexion->desconectar(); ?>

<?php include "../navbar/footer-atd.php"; ?>