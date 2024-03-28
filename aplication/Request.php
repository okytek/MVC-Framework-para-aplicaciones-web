<?php
class Request {
    private $_controlador;
    private $_metodo;
    private $_argumentos;
    public function __construct() {
        if (isset($_GET['enlace'])) {
            $enlace = filter_input(INPUT_GET, 'enlace', FILTER_SANITIZE_URL);
            $enlace = explode("/", $enlace);
            $enlace = array_filter($enlace);
            $this->_controlador = strtolower(array_shift($enlace));
            $this->_metodo = strtolower(array_shift($enlace));
            $this->_argumentos = $enlace;
        }
        if (!$this->_controlador) {
            $this->_controlador = CONTROLADOR_PREDETERMINADO;
        }
        if (!$this->_metodo) {
            $this->_metodo = "index";
        }
        if (!$this->_argumentos) {
            $this->_argumentos = array();
        }
    }
    public function obtenerControlador() {
        return $this->_controlador;
    }
    public function obtenerMetodo() {
        return $this->_metodo;
    }
    public function obtenerArgumentos() {
        return $this->_argumentos;
    }
}
?>