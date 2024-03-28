<?php
class CategoriaModel extends AppModel {
    private static $nombre = "categoria";
    public function seleccionar() {
        $categoria = $this->_base_datos->query("SELECT * FROM categoria");
        return $categoria->fetchall();
    }
}
?>