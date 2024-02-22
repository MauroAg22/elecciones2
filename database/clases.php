<?php

class conexion {
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $dbname = "elecciones2023";
    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->dbname", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            return "Conexion erronea $error";
        }
    }

    // Ejecutar - Actualizar - Borrar
    public function ejecutar($sql) {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    // Consultar
    public function consultar($sql) {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    // Se desconecta de la base de datos
    public function desconectar() {
        $this->conexion = null;
    }
}

class Consultas extends Conexion {
    public function __construct() {
        parent::__construct();
    }

    // Pregunta si el dni se encuentra en el padrón
    public function esta_dni($un_dni) {
        $sql = "SELECT CASE WHEN EXISTS (SELECT 1 FROM `padron` where `dni` = '$un_dni') THEN '1' ELSE '0' END AS resultado;";
        $existeDNI = $this->consultar($sql);

        return $existeDNI[0][0];
    }

    // Pregunta si el dni ya ha votado
    public function voto_dni($un_dni) {
        $sql2 = 'SELECT `voto` FROM `padron` WHERE `dni` = "' . $un_dni . '";';
        $respuesta1 = $this->consultar($sql2);
        return $respuesta1[0][0];
    }

    // Inserta el voto en la base de datos
    public function insertar_voto($mi_voto) {
        $sql = "INSERT INTO `urna` (`" . $mi_voto . "`) VALUES ('1');";
        $this->ejecutar($sql);
    }

    // Se le asigna que ya votó al dni ingresado
    public function registrar_votante($un_dni) {
        $sql = "UPDATE `padron` SET `voto` = '1' WHERE `id` = (SELECT `id` FROM `padron` WHERE `dni` = '" . $un_dni . "');";
        $this->ejecutar($sql);
    }

    // Cuenta cuantos votos tiene un candidato
    public function  conteo_votos($candidato) {
        $sql = 'SELECT COUNT(' . $candidato . ') AS total FROM urna;';
        return $this->consultar($sql)[0][0];
    }
}

class GestionElectoral extends Conexion {
    private bool $seEstaVotando;

    public function __construct() {
        parent::__construct();
        $sql = 'select `estado` from `votacion`;';
        $this->seEstaVotando = $this->consultar($sql)["0"]["0"];
    }

    public function getSeEstaVotando() {
        return $this->seEstaVotando;
    }

    // Las personas que votaron se resetean para que puedan votar otra vez
    public function resetearPadron() {
        $sql = 'UPDATE `padron` SET `voto` = 0;';
        $this->ejecutar($sql);
    }

    // Se eliminan todos los votos cargados
    public function resetearVotos() {
        $sql = 'DELETE FROM `urna`;';
        $this->ejecutar($sql);
    }

    // Inicia el periodo de votaciones
    public function iniciarVotacion() {
        $sql = 'UPDATE `votacion` SET `estado` = 1 WHERE `id` = 1;';
        $this->ejecutar($sql);
    }

    // Finaliza el periodo de votaciones
    public function finalizarVotacion() {
        $sql = 'UPDATE `votacion` SET `estado` = 0 WHERE `id` = 1;';
        $this->ejecutar($sql);
    }
}

class Candidato extends Consultas {
    private $nombre;
    private $cantVotos;
    private $promedioVotos;

    public function __construct($nombre) {
        parent::__construct();
        $this->nombre = $nombre;
        $this->cantVotos = $this->conteo_votos($this->nombre);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCantVotos() {
        return $this->cantVotos;
    }

    public function getPromedioVotos() {
        return $this->promedioVotos;
    }

    public function setPromedioVotos($cantVotosTotales) {
        $this->promedioVotos = $this->promedioVotos = ($cantVotosTotales != 0) ? number_format($this->cantVotos / $cantVotosTotales * 100, 2) : 0;
    }
}