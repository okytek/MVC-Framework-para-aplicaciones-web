<?php
class AppModel {
    protected $_base_datos;
    public function __construct() {
        $this->_base_datos = new Database();
    }
}
?>