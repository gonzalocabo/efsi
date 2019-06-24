<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/models/clasecategoria.php');
class categoriaDao {

    public static function ObtenerPorID($id) {
        return 'entro a obtener por id con el id: '.$id;
    }// get

    public static function ObtenerTodos() {
        return 'entro a obtener todos';
        //devuelve un array de objetos de tipo categoria
    }

    public static function nuevo($item) {
        return 'entro a nuevo';
    }// nuevo    

    public static function modificar($item) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo categoria
    }// modificar

    public static function eliminar($id) {
        //aca va la logica para eliminar
    }// eliminar

}
?>