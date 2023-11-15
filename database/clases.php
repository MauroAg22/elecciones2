<?php

class conexion
{

    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $dbname = "elecciones2023";
    private $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->dbname", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            return "Conexion erronea $error";
        }
    }

    public function desconectar()
    {
        $this->conexion = null;
    }

    // Ejecutar - Actualizar - Borrar
    public function ejecutar($sql)
    {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultar($sql)
    {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function esta_dni($un_dni)
    {
        $sql = "SELECT CASE WHEN EXISTS (SELECT 1 FROM `padron` where `dni` = '$un_dni') THEN '1' ELSE '0' END AS resultado;";
        $existeDNI = $this->consultar($sql);

        return $existeDNI[0][0];
    }

    public function voto_dni($un_dni)
    {
        $sql2 = 'SELECT `voto` FROM `padron` WHERE `dni` = "' . $un_dni . '";';
        $respuesta1 = $this->consultar($sql2);
        return $respuesta1[0][0];
    }

    public function efectuar_voto($mi_voto)
    {
        $sql = "INSERT INTO `urna` (`" . $mi_voto . "`) VALUES ('1');";
        $this->ejecutar($sql);
    }

    public function registrar_votante($un_dni) {
        $sql = "UPDATE `padron` SET `voto` = '1' WHERE `id` = (SELECT `id` FROM `padron` WHERE `dni` = '" . $un_dni . "');";
        $this->ejecutar($sql);
    }

    public function  conteo_votos($candidato) {
        $sql = 'SELECT COUNT("' . $candidato . '") AS total FROM urna;';
        return $this->consultar($sql)[0][0];
    }
}
