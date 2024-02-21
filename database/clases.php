<?php

class conexion {
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $dbname = "elecciones2023";
    protected $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->dbname", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            return "Conexion erronea $error";
        }
    }

    public function desconectar() {
        $this->conexion = null;
    }
}

class consultas extends conexion {
    protected $conexion;

    public function __construct() {
        // Llama al constructor de la clase base
        parent::__construct();
    }

    // Ejecutar - Actualizar - Borrar
    public function ejecutar($sql) {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultar($sql) {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function esta_dni($un_dni) {
        $sql = "SELECT CASE WHEN EXISTS (SELECT 1 FROM `padron` where `dni` = '$un_dni') THEN '1' ELSE '0' END AS resultado;";
        $existeDNI = $this->consultar($sql);

        return $existeDNI[0][0];
    }

    public function voto_dni($un_dni) {
        $sql2 = 'SELECT `voto` FROM `padron` WHERE `dni` = "' . $un_dni . '";';
        $respuesta1 = $this->consultar($sql2);
        return $respuesta1[0][0];
    }

    public function insertar_voto($mi_voto) {
        $sql = "INSERT INTO `urna` (`" . $mi_voto . "`) VALUES ('1');";
        $this->ejecutar($sql);
    }

    public function registrar_votante($un_dni) {
        $sql = "UPDATE `padron` SET `voto` = '1' WHERE `id` = (SELECT `id` FROM `padron` WHERE `dni` = '" . $un_dni . "');";
        $this->ejecutar($sql);
    }

    public function  conteo_votos($candidato) {
        $sql = 'SELECT COUNT(' . $candidato . ') AS total FROM urna;';
        return $this->consultar($sql)[0][0];
    }

    public function alertaPuedeVotar($dni) {
        if ($this->esta_dni($dni)) {
            if (!($this->voto_dni($dni))) {
                include "../votar/puede-votar.php";
            } else {
                include "../votar/ya-voto.php";
            }
        } else {
            include "../votar/no-puede-votar.php";
        }
    }
}



class candidatos extends consultas {
    public $cantVotosBregman, $cantVotosBullrich, $cantVotosMassa, $cantVotosMilei, $cantVotosSchiaretti, $cantVotosBlanco, $cantVotosTotales;
    public $promedioVotosBregman, $promedioVotosBullrich, $promedioVotosMassa, $promedioVotosMilei, $promedioVotosSchiaretti, $promedioVotosBlanco;

    public function __construct() {
        parent::__construct();

        // Inicializa las propiedades en el constructor
        $this->cantVotosBregman = $this->conteo_votos("bregman");
        $this->cantVotosBullrich = $this->conteo_votos("bullrich");
        $this->cantVotosMassa = $this->conteo_votos("massa");
        $this->cantVotosMilei = $this->conteo_votos("milei");
        $this->cantVotosSchiaretti = $this->conteo_votos("schiaretti");
        $this->cantVotosBlanco = $this->conteo_votos("blanco");

        $this->cantVotosTotales = $this->cantVotosBregman + $this->cantVotosBullrich + $this->cantVotosMassa + $this->cantVotosMilei + $this->cantVotosSchiaretti + $this->cantVotosBlanco;

        if ($this->cantVotosTotales != 0) {
            $this->promedioVotosBregman = number_format($this->cantVotosBregman / $this->cantVotosTotales * 100, 2);
            $this->promedioVotosBullrich = number_format($this->cantVotosBullrich / $this->cantVotosTotales * 100, 2);
            $this->promedioVotosMassa = number_format($this->cantVotosMassa / $this->cantVotosTotales * 100, 2);
            $this->promedioVotosMilei = number_format($this->cantVotosMilei / $this->cantVotosTotales * 100, 2);
            $this->promedioVotosSchiaretti = number_format($this->cantVotosSchiaretti / $this->cantVotosTotales * 100, 2);
            $this->promedioVotosBlanco = number_format($this->cantVotosBlanco / $this->cantVotosTotales * 100, 2);
        } else {
            $this->promedioVotosBregman = 0;
            $this->promedioVotosBullrich = 0;
            $this->promedioVotosMassa = 0;
            $this->promedioVotosMilei = 0;
            $this->promedioVotosSchiaretti = 0;
            $this->promedioVotosBlanco = 0;
        }
    }

    public function resultadoVotosTexto($cantVotos) {
        return ($cantVotos == 1) ? "$cantVotos VOTO" : "$cantVotos VOTOS";
    }
}

class GestionElectoral extends consultas {
    private bool $seEstaVotando;

    public function __construct() {
        parent::__construct();
        $sql = 'select `estado` from `votacion`;';
        $this->seEstaVotando = $this->consultar($sql)["0"]["0"];
    }

    public function getSeEstaVotando() {
        return $this->seEstaVotando;
    }

    public function resetearPadron() {
        $sql = 'UPDATE `padron` SET `voto` = 0;';
        $this->ejecutar($sql);
    }

    public function resetearVotos() {
        $sql = 'DELETE FROM `urna`;';
        $this->ejecutar($sql);
    }

    public function iniciarVotacion() {
        $sql = 'UPDATE `votacion` SET `estado` = 1 WHERE `id` = 1;';
        $this->ejecutar($sql);
    }

    public function finalizarVotacion() {
        $sql = 'UPDATE `votacion` SET `estado` = 0 WHERE `id` = 1;';
        $this->ejecutar($sql);
    }
}