<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/productoDao.php');

if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    

    switch ($accion) {
        case 'nuevo':
            if(isset($_POST['producto'])){
                $nombre = $_POST['producto'];
                $item = new producto();
                $item->nombre = $nombre;
                $resultado = productoDao::nuevo($item);
                echo json_encode($resultado);
            }else{
                echo json_encode("error");
            }            
            break;    
        case 'listar':
            $resultado = productoDao::ObtenerTodos();
            echo json_encode($resultado);
            break;    
        case 'obtenerporid':
            if(isset($_POST['id'])){
                $id =$_POST['id'];
                $resultado = productoDao::ObtenerPorID($id);
                echo json_encode($resultado);
            }else{
                echo json_encode("Error, id nulo");
            }		
            break;    
        case 'modificar':
            if(isset($_POST['id'])&&isset($_POST['producto'])){
                $cat=new producto();
                $cat->id=$_POST['id'];
                $cat->nombre=$_POST['producto'];
                $resultado = productoDao::modificar($cat);
                echo json_encode($resultado);
            }
            //logica de modificacion
            break;
        case 'eliminar':
            if(isset($_POST['id'])){
                productoDao::eliminar($_POST['id']);
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