<?php

$pagActual = basename($_SERVER['PHP_SELF']);

function active($pagActual, $url)
{
    echo ($pagActual == $url) ? "active" : "";
}

?>


<!doctype html>
<html lang="es">

<head>
    <title>Elecciones 2</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Font de google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400&display=swap" rel="stylesheet">
    <!-- Mis estilos -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">
</head>

<body>
    <header id="miHeader">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <!-- <a class="navbar-brand fs-4" href="gestion.php">Gestión Electoral</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link fs-5 <?php active($pagActual, "gestion.php") ?>" href="gestion.php">Administración</a>
                        <a class="nav-link fs-5 <?php active($pagActual, "padron.php") ?>" href="padron.php">Padrón</a>
                        <a class="nav-link fs-5 <?php active($pagActual, "resultados.php") ?>" href="resultados.php">Resultados</a>
                        <a class="nav-link fs-5" href="cerrar-session.php">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container main pt-5 pb-5">