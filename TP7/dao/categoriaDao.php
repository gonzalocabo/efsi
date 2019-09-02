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
                $Objeto->activo=$row['estado'];
			}
        }
         return $Objeto;   
    }// get

    public static function ObtenerTodos() {
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'select * from categoriasproductos';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		$STH->execute();
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new categoria();
                $Objeto->id=$row['idcategoriasproductos'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->activo=$row['estado'];
                $arrayObjetos[]=$Objeto;
			}
        }
         return $arrayObjetos;   
        //devuelve un array de objetos de tipo categoria
    }

    public static function nuevo($item) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'INSERT INTO categoriasproductos (nombre,estado) values(:nombre,:activo)';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                      
            ":nombre" => $item->nombre,
            ":activo"=>$item->activo
		);
		$STH->execute($params);
        $id=$DBH->lastInsertId();
        $DBH=null;
        $STH=null;
        $item->id=$id;
        return $item;
    }// nuevo    

    public static function modificar($item) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo categoria
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
        $query = 'UPDATE categoriasproductos SET nombre=:nombre, estado=:activo where idcategoriasproductos=:id';
        $STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(      
            ":id"=>$item->id,                
            ":nombre" => $item->nombre,
            ":activo"=>$item->activo
		);
		$STH->execute($params);
        if ($STH->rowCount() < 1) {
            $item='';
        }
        $DBH=null;
        $STH=null;
        return $item;
    }// modificar

    public static function eliminar($id) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'DELETE FROM categoriasproductos where categoriasproductos.idcategoriasproductos= :idcategoriasproductos';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
            ":idcategoriasproductos" => $id
        );
        $STH->execute($params);
        if ($STH->rowCount() < 1) {
            $item=false;
        }else{
            $item=true;
        }
        $DBH=null;
        return $item;
        //aca va la logica para eliminar
    }// eliminar

    public static function ObtenerTodosActivos() {
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'select * from categoriasproductos where categoriasproductos.estado=1';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		$STH->execute();
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

    public static function activar($id) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
        $query = 'UPDATE categoriasproductos SET estado=1 where idcategoriasproductos=:id';
        $params = array( 
            ":id"=>$id
        );        
        $STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
        $STH->execute($params);
        if ($STH->rowCount() < 1) {
            $item='error consulta';
        }
        $DBH=null;
        $STH=null;
        return $item;
    }

    public static function desactivar($id) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
        $query = 'UPDATE categoriasproductos SET estado=0 where idcategoriasproductos=:id';
        $params = array( 
            ":id"=>$id
        );        
        $STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
        $STH->execute($params);
        if ($STH->rowCount() < 1) {
            $item='error consulta';
        }
        $DBH=null;
        $STH=null;
        return $item;
    }

}
?>