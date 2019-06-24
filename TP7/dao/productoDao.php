<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/models/claseproducto.php');
class productoDao {

    public static function ObtenerPorID($id) {
        //devuelve un objeto de tipo producto
    }// get

    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo producto
    }

    public static function nuevo($item) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo producto
    }// nuevo    

    public static function modificar($item) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo producto
    }// modificar

    public static function eliminar($id) {
        //aca va la logica para eliminar
    }// eliminar

}
?>