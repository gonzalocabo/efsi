<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/models/claseusuario.php');
class usuarioDao {

    public static function ObtenerPorID($id) {
        //devuelve un objeto de tipo usuario
    }// get

    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo usuario
    }

    public static function nuevo($item) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo usuario
    }// nuevo    

    public static function modificar($item) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo usuario
    }// modificar

    public static function eliminar($id) {
        //aca va la logica para eliminar
    }// eliminar

}
?>