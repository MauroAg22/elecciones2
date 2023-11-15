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

    public function consultar($sql, $parametros = [])
    {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute($parametros);
        return $sentencia->fetchAll();
    }

    public function esta_dni($un_dni)
    {
        $sql = 'SELECT `dni` FROM `padron` WHERE `dni` = :dni';
        $parametros = [':dni' => $un_dni];
        $respuesta = $this->consultar($sql, $parametros);

        return !empty($respuesta);
    }
}

?>