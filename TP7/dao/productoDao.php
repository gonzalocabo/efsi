<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/models/claseproducto.php');
class productoDao {

    public static function ObtenerPorID($id) {
        $Objeto=new producto();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'select * from productos where productos.idproductos= :idproductos';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":idproductos" => $id
		);
		$STH->execute($params);
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto->id=$row['idusuario'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->codigo=$row['codigo'];
                $Objeto->precio=$row['precio'];
                $Objeto->descuento=$row['descuento'];
                $Objeto->stockMinimo=$row['stockMinimo'];
                $Objeto->stockActual=$row['stockActual'];
                $Objeto->foto=$row['foto'];
                $Objeto->video=$row['video'];
                $Objeto->descripcionCorta=$row['descripcionCorta'];
                $Objeto->descripcionLarga=$row['descripcionLarga'];
                $Objeto->destacado=$row['destacado'];
                $Objeto->onSale=$row['onSale'];
                $Objeto->mostrarHome=$row['mostrarHome'];
			}
        }
         return $Objeto;   
        //devuelve un objeto de tipo producto
    }// get

    public static function ObtenerTodos() {
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'select * from productos';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new producto();
                $Objeto->id=$row['idusuario'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->codigo=$row['codigo'];
                $Objeto->precio=$row['precio'];
                $Objeto->descuento=$row['descuento'];
                $Objeto->stockMinimo=$row['stockMinimo'];
                $Objeto->stockActual=$row['stockActual'];
                $Objeto->foto=$row['foto'];
                $Objeto->video=$row['video'];
                $Objeto->descripcionCorta=$row['descripcionCorta'];
                $Objeto->descripcionLarga=$row['descripcionLarga'];
                $Objeto->destacado=$row['destacado'];
                $Objeto->onSale=$row['onSale'];
                $Objeto->mostrarHome=$row['mostrarHome'];
                $arrayObjetos[]=$Objeto;
			}
        }
         return $arrayObjetos; 
        //devuelve un array de objetos de tipo producto
    }

    public static function nuevo($item) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'INSERT INTO productos (nombre,codigo,precio,descuento,stockMinimo,stockActual,categoria,foto,video,descripcionCorta,descripcionLarga,destacado,onSale,mostrarHome) values(:nombre,:codigo,:precio,:descuento,:stockMinimo,:stockActual,:categoria,:foto,:video,:descripcionCorta,:descripcionLarga,:destacado,:onSale,:mostrarHome)';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
            ":nombre" => $item->nombre,
            ":codigo" => $item->codigo,
            ":precio" => $item->precio,
            ":descuento" => $item->descuento,
            ":stockMinimo" => $item->stockMinimo,
            ":stockActual" => $item->stockActual,
            ":categoria" => $item->categoria,
            ":foto" => $item->foto,
            ":video" => $item->video,
            ":descripcionCorta" => $item->descripcionCorta,
            ":descripcionLarga" => $item->descripcionLarga,
            ":destacado" => $item->destacado,
            ":onSale" => $item->onSale,
            ":mostrarHome" => $item->mostrarHome
		);
		$STH->execute($params);
        $item->id=$DBH->lastInsertId();
        $DBH=null;
        return $item;
        //aca va la logica para crear. Recibe por parametro un objeto de tipo producto
    }// nuevo    

    public static function modificar($item) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo producto
    }// modificar

    public static function eliminar($id) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'DELETE FROM productos where productos.idproductos= :idproductos';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
            ":idproductos" => $id
        );
		$STH->execute($params);
        $DBH=null;
        return $item;
        //aca va la logica para eliminar
    }// eliminar

}
?>