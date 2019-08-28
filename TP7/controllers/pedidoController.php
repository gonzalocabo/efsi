<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/pedidoDao.php');

if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    

    switch ($accion) {
        case 'nuevo':
            if(isset($_POST['nombreDelUsuario'])&&isset($_POST['codigoCompra'])&&isset($_POST['estadoEnvio'])&&isset($_POST['estadoPago'])){
                $item = new pedido();
                $item->nombreDelUsuario = $_POST['nombreDelUsuario'];
                $item->codigoCompra = $_POST['codigoCompra'];
                $item->estadoEnvio = $_POST['estadoEnvio'];
                $item->estadoEnvio = $_POST['estadoPago'];
                $resultado = pedidoDao::nuevo($item);
                echo json_encode($resultado);
            }else{
                echo json_encode("error");
            }            
            break;    
        case 'listar':
            $resultado = pedidoDao::ObtenerTodos();
            echo json_encode($resultado);
            break;    
        case 'obtenerporid':
            if(isset($_POST['id'])){
                $id =$_POST['id'];
                $resultado = pedidoDao::ObtenerPorID($id);
                echo json_encode($resultado);
            }else{
                echo json_encode("Error, id nulo");
            }		
            break;    
        case 'modificar':
            if(isset($_POST['id'])&&isset($_POST['nombreDelUsuario'])&&isset($_POST['codigoCompra'])&&isset($_POST['estadoEnvio'])&&isset($_POST['estadoPago'])){
                $cat=new pedido();
                $cat->id=$_POST['id'];
                $cat->nombre=$_POST['nombreDelUsuario'];
                $item->codigoCompra = $_POST['codigoCompra'];
                $item->estadoEnvio = $_POST['estadoEnvio'];
                $item->estadoEnvio = $_POST['estadoPago'];
                $resultado = pedidoDao::modificar($cat);
                echo json_encode($resultado);
            }
            //logica de modificacion
            break;
        case 'eliminar':
            if(isset($_POST['id'])){
                pedidoDao::eliminar($_POST['id']);
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