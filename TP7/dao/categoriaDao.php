<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/models/clasecategoria.php');
class categoriaDao {

    public static function ObtenerPorID($id) {
        $Objeto=new categoria();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'select * from categoriasproductos where categoriasproductos.idcategoriasproductos= :idcategoriasproductos';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":idcategoriasproductos" => $id
		);
		$STH->execute($params);
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto->id=$row['idcategoriasproductos'];
                $Objeto->nombre=$row['nombre'];
			}
        }
         return $Objeto;   
    }// get

    public static function ObtenerTodos() {
        $arrayObjetos=new array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'select * from categoriasproductos';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":idcategoriasproductos" => $id
		);
		$STH->execute($params);
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new categoria();
                $Objeto->id=$row['idcategoriasproductos'];
                $Objeto->nombre=$row['nombre'];
                $arrayObjetos[]=$Objeto;
			}
        }
         return $arrayObjetos;   
        //devuelve un array de objetos de tipo categoria
    }

    public static function nuevo($item) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'INSERT INTO categoriasproductos (nombre) values(:nombre)';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
            ":nombre" => $item->nombre;
		);
		$STH->execute($params);
        $id=$DBH->lastInsertId();
        $DBH=null;
        $STH=null;
        return $id;
    }// nuevo    

    public static function modificar($item) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo categoria
    }// modificar

    public static function eliminar($id) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'DELETE FROM categoriasproductos where categoriasproductos.idcategoriasproductos= :idcategoriasproductos';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
            ":idcategoriasproductos" => $id;
        )
		$STH->execute($params);
        $DBH=null;
        return $item;
        //aca va la logica para eliminar
    }// eliminar

}
?>