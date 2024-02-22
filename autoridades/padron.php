<?php
session_start();

if (!$_SESSION["login"]) {
    header("location:../autoridades");
}

include "../navbar/head-atd.php";

$objConsultas = new consultas();
$personas = $objConsultas->consultar("SELECT * FROM `padron` ORDER BY `apellido` ASC");
$contador = 1;

?>

<div class="row justify-content-center mt-5">
    <div class="col-lg-8 col-md-10">

        <div class="table-responsive">
            <table class="table table-striped table-primary align-middle text-center">
                <thead class="table-light">
                    <caption>PADRÓN ELECTORAL 2023</caption>
                    <tr class="fs-6" style="cursor: default">
                        <th>Orden</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>DNI</th>
                        <th>Votó</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider border">
                    <?php foreach ($personas as $persona) { ?>
                        <tr class="table-light fs-6" style="cursor: default">
                            <td> <?php echo $contador; ?> </td>
                            <td> <?php echo $persona["apellido"]; ?> </td>
                            <td> <?php echo $persona["nombre"]; ?> </td>
                            <td> <?php echo number_format($persona["dni"], 0, '', '.'); ?> </td>
                            <td> <?php echo $persona["voto"] == 1 ? "SI" : "NO" ?> </td>
                        </tr>
                    <?php 
                    $contador += 1;
                    } 
                    ?>
                </tbody>
            </table>
        </div>


    </div>
</div>

<?php 

$objConsultas->desconectar();
include "../navbar/footer-atd.php";