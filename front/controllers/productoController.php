<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/productoDao.php');

if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    

    switch ($accion) {
        case 'nuevo':
            if(isset($_POST['nombre'])&&isset($_POST['codigo'])&&isset($_POST['precio'])&&isset($_POST['descuento'])&&isset($_POST['stockMinimo'])&&isset($_POST['stockActual'])&&isset($_POST['categoria'])&&isset($_POST['descripcionCorta'])&&isset($_POST['descripcionLarga'])&&isset($_POST['destacado'])&&isset($_POST['onSale'])&&isset($_POST['mostrarHome'])&&$_FILES['foto']['name']!=""){
                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
                $path = '../uploads/fotos/productos/';
                if($_FILES['foto']['name']!="")
                {
                    $img = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];

                    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                    $final_image = rand(1000,1000000).$img;

                    if(in_array($ext, $valid_extensions)) 
                    {
                        $path = $path.strtolower($final_image); 
                        if(move_uploaded_file($tmp,$path)) 
                        {
                            $item = new producto();
                            $item->nombre = $_POST['nombre'];
                            $item->codigo=$_POST['codigo'];
                            $item->precio=$_POST['precio'];
                            $item->descuento=$_POST['descuento'];
                            $item->stockMinimo=$_POST['stockMinimo'];
                            $item->stockActual=$_POST['stockActual'];
                            $item->categoria=$_POST['categoria'];
                            $item->foto=$final_image;
                            $item->video=$_POST['video'];
                            $item->descripcionCorta=$_POST['descripcionCorta'];
                            $item->descripcionLarga=$_POST['descripcionLarga'];
                            $item->destacado=$_POST['destacado'];
                            $item->onSale=$_POST['onSale'];
                            $item->mostrarHome=$_POST['mostrarHome'];
                            
                            $resultado = productoDao::nuevo($item);
                        
                            echo json_encode($resultado);
                        }else{
                            echo json_encode("Error de subida");
                        }
                    }else{
                        echo json_encode("Extension invalida");
                    }
                }
                
                
                
                
            }else{
                var_dump($_POST['categoria']);
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
            if(isset($_POST['id'])&&isset($_POST['nombre'])&&isset($_POST['codigo'])&&isset($_POST['precio'])&&isset($_POST['descuento'])&&isset($_POST['stockMinimo'])&&isset($_POST['stockActual'])&&isset($_POST['categoria'])&&isset($_POST['descripcionCorta'])&&isset($_POST['descripcionLarga'])&&isset($_POST['destacado'])&&isset($_POST['onSale'])&&isset($_POST['mostrarHome'])){               
                $item = productoDao::ObtenerPorID($_POST['id']);
                $item->nombre = $_POST['nombre'];
                $item->codigo=$_POST['codigo'];
                $item->precio=$_POST['precio'];
                $item->descuento=$_POST['descuento'];
                $item->stockMinimo=$_POST['stockMinimo'];
                $item->stockActual=$_POST['stockActual'];
                $item->categoria=$_POST['categoria'];
                if($_FILES['foto']['name']!="") {
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
                    $path = '../uploads/fotos/productos/';

                    $img = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];

                    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                    $final_image = rand(1000,1000000).$img;

                    if(in_array($ext, $valid_extensions)) 
                    {
                        $path = $path.strtolower($final_image); 
                        if(move_uploaded_file($tmp,$path)) 
                        {                            
                            if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/uploads/fotos/productos/" . $item->foto)) {
                                unlink($_SERVER["DOCUMENT_ROOT"] . "/uploads/fotos/productos/" . $item->foto);
                                $item->foto=$final_image;
                            }else{
                                echo json_encode("Imagen no encontrada");        
                            }
                        }
                    }else{
                        echo json_encode("Extension invalida");
                    }
                }
                $item->video=$_POST['video'];
                $item->descripcionCorta=$_POST['descripcionCorta'];
                $item->descripcionLarga=$_POST['descripcionLarga'];
                $item->destacado=$_POST['destacado'];
                $item->onSale=$_POST['onSale'];
                $item->mostrarHome=$_POST['mostrarHome'];
                $resultado = productoDao::modificar($item);
                echo json_encode($resultado);
            }
            //logica de modificacion
            break;
        case 'eliminar':
            if(isset($_POST['id'])){
                $producto=productoDao::ObtenerPorID($_POST['id']);
                if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/uploads/fotos/productos/" . $producto->foto)) {
                    unlink($_SERVER["DOCUMENT_ROOT"] . "/uploads/fotos/productos/" . $producto->foto);
                    productoDao::eliminar($_POST['id']);
                    echo json_encode("true");
                }else{
                    echo json_encode("No existe foto");
                }
            }else{
                echo json_encode("Error, id nulo");
            }
            break;
        case 'listarDestacados':
            $resultado=productoDao::ListarDestacados();
            echo json_encode($resultado);
            break;
        case 'listarMostrarHome':
            $resultado=productoDao::ListarMostrarHome();
            echo json_encode($resultado);
            break;
        case 'listarPorCategoria':
            if(isset($_POST['id'])){
                $resultado = productoDao::ObtenerPorCategoria($_POST['id']);
                echo json_encode($resultado);        
            }else{
                echo json_encode("Error, no pasa ID");
            }
            break; 
        case 'buscarPorPatron':
            if(isset($_POST['patron'])){
                $resultado=productoDao::BuscarPorPatron($_POST['patron']);
                echo json_encode($resultado);
            }else{
                echo json_encode("error, patron no definido");
            }
            break;
        case 'listarRelacionados':
            if(isset($_POST['id'])){
                $producto=productoDao::ObtenerPorID($_POST['id']);
                $resultado=productoDao::ListarRelacionados($_POST['id'],$producto->categoria);
                echo json_encode($resultado);
            }else{
                echo json_encode("no id");
            }
            break;
    }
}else{
    echo json_encode("Accion nula");
}



?>