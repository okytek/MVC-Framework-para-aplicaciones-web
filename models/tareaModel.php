<?php
class TareaModel extends AppModel {
    public function __construct() {
        parent::__construct();
    }
    public function seleccionar() {
        $tarea = $this->_base_datos->query("SELECT * FROM tarea");
        return $tarea->fetchall();
    }
    public function insertar($datos = array()) {
        $consulta = $this->_base_datos->prepare("INSERT INTO tarea (nombre, descripcion, fecha, prioridad, categoria_id) VALUES (:nombre, :descripcion, :fecha, :prioridad, :categoria_id)");
        $consulta->bindParam(":nombre", $datos["nombre"]);
        $consulta->bindParam(":descripcion", $datos["descripcion"]);
        $consulta->bindParam(":fecha", $datos["fecha"]);
        $consulta->bindParam(":prioridad", $datos["prioridad"]);
        $consulta->bindParam(":categoria_id", $datos["categoria_id"]);
        if ($consulta->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function buscarPorId($id){
        $tareas = $this->_base_datos->prepare("SELECT * FROM tarea WHERE id=:id");
        $tareas->bindParam(":id", $id);
        $tareas->execute();
        $registro = $tareas->fetch();
        if ($registro){
            return $registro;
        }else{
            return false;
        }
    }
    public function actualizar($dato){
        $consulta = $this->_base_datos->prepare("UPDATE tarea SET nombre=:nombre, descripcion=:descripcion, fecha=:fecha, prioridad=:prioridad, categoria_id=:categoria_id WHERE id=:id");
        $consulta->bindParam(":id", $dato["id"]);
        $consulta->bindParam(":nombre", $dato["nombre"]);
        $consulta->bindParam(":descripcion", $dato["descripcion"]);
        $consulta->bindParam(":fecha", $dato["fecha"]);
        $consulta->bindParam(":prioridad", $dato["prioridad"]);
        $consulta->bindParam(":categoria_id", $dato["categoria_id"]);
        if ($consulta->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function eliminarPorId($id){
        $consulta = $this->_base_datos->prepare("DELETE FROM tarea WHERE id=:id");
        $consulta->bindParam(":id", $id);
        if ($consulta->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>