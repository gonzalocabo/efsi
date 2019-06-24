<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/models/claseslider.php');
class sliderDao {

    public static function ObtenerPorID($id) {
        //devuelve un objeto de tipo slider
    }// get

    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo slider
    }

    public static function nuevo($item) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo slider
    }// nuevo    

    public static function modificar($item) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo slider
    }// modificar

    public static function eliminar($id) {
        //aca va la logica para eliminar
    }// eliminar

}
?>