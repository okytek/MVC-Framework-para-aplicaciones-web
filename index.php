<?php
define("SEPARADOR_DIRECTORIO", DIRECTORY_SEPARATOR);
define("RAIZ", realpath(dirname(__FILE__)) . SEPARADOR_DIRECTORIO);
define("RUTA_APLICACION", RAIZ . "aplication" . SEPARADOR_DIRECTORIO);
require_once(RUTA_APLICACION . "Configuration.php");
require_once(RUTA_APLICACION . "Request.php");
require_once(RUTA_APLICACION . "Bootstrap.php");
require_once(RUTA_APLICACION . "Controller.php");
require_once(RUTA_APLICACION . "Model.php");
require_once(RUTA_APLICACION . "View.php");
require_once(RUTA_APLICACION . "Database.php");
try {
    Bootstrap::ejecutar(new Request);
} catch(Exception $e) {
    echo $e->getMessage();
}
?>