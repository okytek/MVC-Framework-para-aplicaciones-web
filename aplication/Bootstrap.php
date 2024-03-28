<?php
class Bootstrap {
    public static function ejecutar(Request $peticion) {
        $controlador = $peticion->obtenerControlador() . "Controller";
        $ruta_controlador = RAIZ . "controllers" . SEPARADOR_DIRECTORIO . $controlador . ".php";
        $metodo = $peticion->obtenerMetodo();
        $argumentos = $peticion->obtenerArgumentos();
        if (is_readable($ruta_controlador)) {
            require_once $ruta_controlador;
            $controlador = new $controlador;
            if (is_callable(array($controlador, $metodo))) {
                $metodo = $peticion->obtenerMetodo();
            } else {
                $metodo = "index";
            }
            if (isset($argumentos)) {
                call_user_func_array(array($controlador, $metodo), $peticion->obtenerArgumentos());
            } else {
                call_user_func(array($controlador, $metodo));
            }
        } else {
            throw new Exception("Controlador no encontrado");
        }
    }
}
?>