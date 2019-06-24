<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/models/clasepedido.php');
class pedidoDao {

    public static function ObtenerPorID($id) {
        //devuelve un objeto de tipo pedido
    }// get

    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo pedido
    }

    public static function nuevo($item) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo pedido
    }// nuevo    

    public static function modificar($item) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo pedido
    }// modificar

    public static function eliminar($id) {
        //aca va la logica para eliminar
    }// eliminar

}
?>