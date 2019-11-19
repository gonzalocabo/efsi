<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/productoDao.php');

if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    

    switch ($accion) {
        case 'nuevo':
            if(isset($_POST['nombre'])&&isset($_POST['codigo'])&&isset($_POST['precio'])&&isset($_POST['descuento'])&&isset($_POST['stockMinimo'])&&isset($_POST['stockActual'])&&isset($_POST['categoria'])&&isset($_POST['descripcionCorta'])&&isset($_POST['descripcionLarga'])&&isset($_POST['destacado'])&&isset($_POST['onSale'])&&isset($_POST['mostrarHome'])){
                $item = new producto();
                $item->nombre = $_POST['nombre'];
                $item->codigo=$_POST['codigo'];
                $item->precio=$_POST['precio'];
                $item->descuento=$_POST['descuento'];
                $item->stockMinimo=$_POST['stockMinimo'];
                $item->stockActual=$_POST['stockActual'];
                $item->categoria=$_POST['categoria'];
                $item->foto=$_POST['foto'];
                $item->video=$_POST['video'];
                $item->descripcionCorta=$_POST['descripcionCorta'];
                $item->descripcionLarga=$_POST['descripcionLarga'];
                $item->destacado=$_POST['destacado'];
                $item->onSale=$_POST['onSale'];
                $item->mostrarHome=$_POST['mostrarHome'];
                
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
        case 'listarProductosSlider':
            $productos=productoDao::listarSlider();
            foreach($productos as $item){
                $aux['title']="a";
                $aux['image']="/uploads/fotos/aaaa.jpeg";
                $json[]=$aux;
            }
            echo json_encode($json);
            break;
    }
}else{
    echo json_encode("Accion nula");
}



?>