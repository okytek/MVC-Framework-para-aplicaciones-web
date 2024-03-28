<?php
class View {
    private $_controlador;
    public function __construct(Request $peticion) {
        $this->_controlador = $peticion->obtenerControlador();
    }
    public function renderizar($vista, $item = false) {
        $_parametros_disenio = array("ruta_css" => ENLACE_APLICACION . "views/layouts/" . DISENIO_PREDETERMINADO . "/css/", "ruta_media" => ENLACE_APLICACION . "views/layouts/" . DISENIO_PREDETERMINADO . "/media/", "ruta_js" => ENLACE_APLICACION . "views/layouts/" . DISENIO_PREDETERMINADO . "/js/");
        $ruta_vista = RAIZ . "views" . SEPARADOR_DIRECTORIO . $this->_controlador . SEPARADOR_DIRECTORIO . $vista . ".phtml";
        if (is_readable($ruta_vista)) {
            include_once(RAIZ . "views" . SEPARADOR_DIRECTORIO . "layouts" . SEPARADOR_DIRECTORIO . DISENIO_PREDETERMINADO . SEPARADOR_DIRECTORIO . "header.php");
            include_once($ruta_vista);
            include_once(RAIZ . "views" . SEPARADOR_DIRECTORIO . "layouts" . SEPARADOR_DIRECTORIO . DISENIO_PREDETERMINADO . SEPARADOR_DIRECTORIO . "footer.php");
        } else {
            throw new Exception("Vista no encontrada");
        }
    }
}
?>