<?php

class BaseDatos {
    private $bd;
    protected $mensajes = array();
    private $server     = 'localhost';
    /* Configuración de la base de datos */
    private $user       = "root"; // Cambia si es necesario
    private $pass       = "";     // Cambia si es necesario
    private $base_datos = "iga_parcial4"; // Nombre de tu base de datos
    /* Propiedades adicionales */
    protected $campos = array();
    protected $llaveprimaria;
    protected $existenelementos;
    protected $cuatoselementos;

    /**
     * Método para conectar con la base de datos usando mysqli_connect
     */
    public function conectar() {
        $conexion = mysqli_connect($this->server, $this->user, $this->pass);

        if (!$conexion) {
            die("Error al conectar al servidor: " . mysqli_connect_error());
        }

        $seleccion = mysqli_select_db($conexion, $this->base_datos);

        if (!$seleccion) {
            die("Error al seleccionar la base de datos: " . mysqli_error($conexion));
        }

        return $conexion;
    }

    /**
     * Método para obtener una conexión con la base de datos usando la clase mysqli
     */
    public function getBd() {
        try {
            $this->bd = new mysqli(
                $this->server,
                $this->user,
                $this->pass,
                $this->base_datos
            );
            $this->bd->set_charset("utf8");

            if ($this->bd->connect_errno) {
                throw new Exception("No es posible establecer una conexión con la base de datos: " . $this->bd->connect_error);
            }

            return $this->bd;
        } catch (Exception $e) {
            $this->mensajes['BD_conexion'] = $e->getMessage();
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>
