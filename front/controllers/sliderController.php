<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/sliderDao.php');

if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    
    

    switch ($accion) {
        case 'nuevo':
            if(isset($_POST['nombre'])&&$_FILES['foto']['name']!=""){
                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
                $path = '../uploads/fotos/';
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
                            $item = new slider();
                            $item->nombre = $_POST['nombre'];
                            $item->foto=$final_image;
                            $resultado = sliderDao::nuevo($item);
                            echo json_encode($resultado);
                        }else{
                            echo json_encode("Error de subida");
                        }
                    }else{
                        echo json_encode("Error de extension");
                    }
                }
                
            }else{
                echo json_encode("Error de parametros");
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
            if(isset($_POST['id'])&&isset($_POST['nombre'])){                
                $slider=sliderDao::ObtenerPorID($_POST['id']);
                if($_FILES['foto']['name']!="") {
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
                    $path = '../uploads/fotos/';

                    $img = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];

                    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

                    $final_image = rand(1000,1000000).$img;

                    if(in_array($ext, $valid_extensions)) 
                    {
                        $path = $path.strtolower($final_image); 
                        if(move_uploaded_file($tmp,$path)) 
                        {                            
                            if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/uploads/fotos/" . $slider->foto)) {
                                unlink($_SERVER["DOCUMENT_ROOT"] . "/uploads/fotos/" . $slider->foto);
                                $slider->foto=$final_image;
                            }else{
                                echo json_encode("Imagen no encontrada");        
                            }
                        }
                    }else{
                        echo json_encode("Extension invalida");
                    }
                }                
                $slider->nombre=$_POST['nombre'];
                var_dump($slider);
                $resultado = sliderDao::modificar($slider);
            
                echo json_encode($resultado);
            }
            //logica de modificacion
            break;
        case 'eliminar':
            if(isset($_POST['id'])){
                $slider=sliderDao::ObtenerPorID($_POST['id']);
                if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/admin/uploads/fotos/" . $slider->foto)) {
                    unlink($_SERVER["DOCUMENT_ROOT"] . "/admin/uploads/fotos/" . $slider->foto);
                    sliderDao::eliminar($_POST['id']);
                    echo json_encode("true");
                }else{
                    echo json_encode("No existe foto");
                }
            }else{
                echo json_encode("Error, id nulo");
            }
            break;
    }
}else{
    echo json_encode("Accion nula");
}




?>