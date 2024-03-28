<?php
abstract class AppController {
    protected $_vista;
    public function __construct() {
        $this->_vista = new View(new Request);
    }
    abstract function index();
    protected function cargarModelo($modelo) {
        $modelo = $modelo . "Model";
        $ruta_modelo = RAIZ . "models" . SEPARADOR_DIRECTORIO . $modelo . ".php";
        if (is_readable($ruta_modelo)) {
            require_once($ruta_modelo);
            $modelo = new $modelo;
            return $modelo;
        } else {
            throw new Exception("Error al cargar el modelo");
        }
    }
}
?>