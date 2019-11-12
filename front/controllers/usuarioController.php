<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/usuarioDao.php');

if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    

    switch ($accion) {
        case 'nuevo':
            if(isset($_POST['nombre'])&&isset($_POST['apellido'])&&isset($_POST['mail'])&&isset($_POST['estado'])&&isset($_POST['categoria'])){
                $item = new usuario();
                $item->nombre = $_POST['nombre'];
                $item->apellido = $_POST['apellido'];
                $item->mail = $_POST['mail'];
                $item->estado = $_POST['estado'];
                $item->estado = $_POST['categoria'];
                $resultado = usuarioDao::nuevo($item);
                echo json_encode($resultado);
            }else{
                echo json_encode("error");
            }            
            break;    
        case 'listar':
            $resultado = usuarioDao::ObtenerTodos();
            echo json_encode($resultado);
            break;    
        case 'obtenerporid':
            if(isset($_POST['id'])){
                $id =$_POST['id'];
                $resultado = usuarioDao::ObtenerPorID($id);
                echo json_encode($resultado);
            }else{
                echo json_encode("Error, id nulo");
            }		
            break;    
        case 'modificar':
            if(isset($_POST['id'])&&isset($_POST['nombre'])&&isset($_POST['apellido'])&&isset($_POST['mail'])&&isset($_POST['estado'])&&isset($_POST['categoria'])){
                $cat=new usuario();
                $cat->id=$_POST['id'];
                $cat->nombre=$_POST['nombre'];
                $item->apellido = $_POST['apellido'];
                $item->mail = $_POST['mail'];
                $item->estado = $_POST['estado'];
                $item->categoria = $_POST['categoria'];
                $resultado = usuarioDao::modificar($cat);
                echo json_encode($resultado);
            }
            //logica de modificacion
            break;
        case 'eliminar':
            if(isset($_POST['id'])){
                usuarioDao::eliminar($_POST['id']);
                echo json_encode("true");
            }else{
                echo json_encode("Error, id nulo");
            }
            break;
        case 'activar':
            if(isset($_POST['id'])){
                usuarioDao::activar($_POST['id']);
                echo json_encode("true");
            }else{
                echo json_encode("Error, id nulo");
            }
            break;
        case 'desactivar':
        if(isset($_POST['id'])){
            usuarioDao::desactivar($_POST['id']);
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