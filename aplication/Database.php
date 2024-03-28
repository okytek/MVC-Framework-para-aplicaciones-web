<?php
class Database extends PDO {
    public function __construct() {
        parent::__construct('mysql:host=' . ANFITRION_BASE_DATOS . ';' . 'dbname=' . NOMBRE_BASE_DATOS, USUARIO_BASE_DATOS, CONTRASENIA_BASE_DATOS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . JUEGO_CARACTERES_BASE_DATOS));
    }
}
?>