<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/categoriaDao.php');
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion']; //RECIBO EL PARAMETRO ACCION

switch ($accion) {
    case 'nuevo':
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
		
		$item = new categoria();
		$item->nombre = $nombre;
		
		$resultado = categoriaDao::nuevo($item);
		
		echo json_encode($resultado);
        break;    
    case 'listar':
        $resultado = categoriaDao::ObtenerTodos();
		
		echo json_encode($resultado);
        break;    
}

?>