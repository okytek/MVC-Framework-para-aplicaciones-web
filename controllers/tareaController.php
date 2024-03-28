<?php
class TareaController extends AppController {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $instancia_modelo_tarea = $this->cargarModelo("tarea");
        $this->_vista->tareas = $instancia_modelo_tarea->seleccionar();
        $this->_vista->titulo = "Listado de tareas";
        $this->_vista->renderizar("index");
    }
    public function crear() {
        if ($_POST) {
            $instancia_modelo_tarea = $this->cargarModelo("tarea");
            $this->_vista->tareas = $instancia_modelo_tarea->insertar($_POST);
        }
        $instancia_modelo_categoria = $this->cargarModelo("categoria");
        $this->_vista->categorias = $instancia_modelo_categoria->seleccionar();
        $this->_vista->titulo = "Crear tarea";
        $this->_vista->renderizar("crear");
    }
    public function editar($id=null) {
        if ($_POST) {
            $instancia_modelo_tarea = $this->cargarModelo("tarea");
            if ($instancia_modelo_tarea->actualizar($_POST)) {
                header("Location: " . ENLACE_APLICACION . "tarea");
            } else {
                $e->getMessage();
            }
        }
        $instancia_modelo_tarea = $this->cargarModelo("tarea");
        $this->_vista->tarea = $instancia_modelo_tarea->buscarPorId($id);
        $instancia_modelo_categoria = $this->cargarModelo("categoria");
        $this->_vista->categorias = $instancia_modelo_categoria->seleccionar();
        $this->_vista->titulo = "Editar tarea";
        $this->_vista->renderizar("editar");
    }
    public function borrar($id){
        $instancia_modelo_tarea = $this->cargarModelo("tarea");
        $registro = $instancia_modelo_tarea->buscarPorId($id);
        if (!empty($registro)) {
            $instancia_modelo_tarea->eliminarPorId($id);
            header("Location: " . ENLACE_APLICACION . "tarea");
        }
    }
}
?>