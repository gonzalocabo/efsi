<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/categoriaDao.php');

if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    

    switch ($accion) {
        case 'nuevo':
            if(isset($_POST['categoria'])&&isset($_POST['activo'])){
                $nombre = $_POST['categoria'];
                $item = new categoria();
                $item->nombre = $nombre;
                $item->activo=$_POST['activo'];
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
            if(isset($_POST['id'])&&isset($_POST['categoria'])){
                $cat=new categoria();
                $cat->id=$_POST['id'];
                $cat->nombre=$_POST['categoria'];
                $resultado = categoriaDao::modificar($cat);
                echo json_encode($resultado);
            }
            //logica de modificacion
            break;
        case 'eliminar':
            if(isset($_POST['id'])){
                categoriaDao::eliminar($_POST['id']);
                echo json_encode("true");
            }else{
                echo json_encode("Error, id nulo");
            }
            break;
        case 'listarActivos':
            $resultado = categoriaDao::ObtenerTodosActivos();
            echo json_encode($resultado);
            break;
        case 'activar':
            if(isset($_POST['id'])){
                categoriaDao::activar($_POST['id']);
                echo json_encode("true");
            }else{
                echo json_encode("Error, id nulo");
            }
            break;
        case 'desactivar':
        if(isset($_POST['id'])){
            categoriaDao::desactivar($_POST['id']);
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