<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/sliderDao.php');

if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    
    

    switch ($accion) {
        case 'nuevo':
            if(isset($_POST['nombre'])){
                $nombre = $_POST['nombre'];
                $item = new slider();
                $item->nombre = $nombre;
                $item->foto=$_POST['foto'];
                $resultado = sliderDao::nuevo($item);
                echo json_encode($resultado);
            }else{
                echo json_encode("error");
            }            
            break;    
        case 'listar':
            $resultado = sliderDao::ObtenerTodos();
            echo json_encode($resultado);
            break;    
        case 'obtenerporid':
            if(isset($_POST['id'])){
                $id =$_POST['id'];
                $resultado = sliderDao::ObtenerPorID($id);
                echo json_encode($resultado);
            }else{
                echo json_encode("Error, id nulo");
            }		
            break;    
        case 'modificar':
            if(isset($_POST['id'])&&isset($_POST['nombre'])&&isset($_POST['foto'])){
                $cat=new slider();
                $cat->id=$_POST['id'];
                $cat->nombre=$_POST['nombre'];
                $cat->foto=$_POST['foto'];
                $resultado = sliderDao::modificar($cat);
                echo json_encode($resultado);
            }
            //logica de modificacion
            break;
        case 'eliminar':
            if(isset($_POST['id'])){
                sliderDao::eliminar($_POST['id']);
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