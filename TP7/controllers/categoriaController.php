<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/categoriaDao.php');

if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    

    switch ($accion) {
        case 'nuevo':
            if(isset($_POST['categoria'])){
                $nombre = $_POST['categoria'];
                $item = new categoria();
                $item->nombre = $nombre;
                $resultado = categoriaDao::nuevo($item);
                echo json_encode($resultado);
            }else{
                echo json_encode("error");
            }            
            break;    
        case 'listar':
            $resultado = categoriaDao::ObtenerTodos();
            echo json_encode($resultado);
            break;    
        case 'obtenerporid':
            if(isset($_POST['id'])){
                $id =$_POST['id'];
                $resultado = categoriaDao::ObtenerPorID($id);
                echo json_encode($resultado);
            }else{
                echo json_encode("Error, id nulo");
            }		
            break;    
        case 'modificar':
            //logica de modificacion
            break;
        case 'eliminar':
            if(isset($_POST['id'])){
                categoriaDao::eliminar($id);
                echo json_encode("true");
            }else{
                echo json_encode("Error, id nulo");
            }
            break;
    }
}else{
    echo json_encode("Accion nula");
}

?>