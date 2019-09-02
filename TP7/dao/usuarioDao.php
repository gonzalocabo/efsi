<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/models/claseusuario.php');
class usuarioDao {

    public static function ObtenerPorID($id) {
        $Objeto=new usuario();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'select usuarios.idusuario, usuarios.nombre, usuarios.apellido, usuarios.mail, usuarios.estado, categoriasusuarios.nombrecategoria from usuarios inner join categoriasusuarios on categoriasusuarios.idcategoriasusuario=usuarios.idcategoria where usuarios.idusuario= :idusuario';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":idusuario" => $id
		);
		$STH->execute($params);
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto->id=$row['idusuario'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->apellido=$row['apellido'];
                $Objeto->mail=$row['mail'];
                $Objeto->estado=$row['estado'];
                $Objeto->categoria=$row['nombrecategoria'];
			}
        }
         return $Objeto;   
        
        //devuelve un objeto de tipo usuario
    }// get

    public static function ObtenerTodos() {
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'select usuarios.idusuario, usuarios.nombre, usuarios.apellido, usuarios.apellido, usuarios.mail, usuarios.estado, categoriasusuarios.nombrecategoria from usuarios inner join categoriasusuarios on categoriasusuarios.idcategoriasusuario=usuarios.idcategoria';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new usuario();
                $Objeto->id=$row['idusuario'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->apellido=$row['apellido'];
                $Objeto->mail=$row['mail'];
                $Objeto->estado=$row['estado'];
                $Objeto->categoria=$row['nombrecategoria'];
                $arrayObjetos[]=$Objeto;
			}
        }
         return $arrayObjetos; 
        //devuelve un array de objetos de tipo usuario
    }

    public static function nuevo($item) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'INSERT INTO usuarios (nombre,apellido,mail,estado,idcategoria) values(:nombre,:apellido,:mail,:estado,:idcategoria)';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
            ":nombre" => $item->nombre,
            ":apellido" => $item->apellido,
            ":mail" => $item->mail,
            ":estado" => $item->estado,
            ":idcategoria" => $item->categoria
		);
		$STH->execute($params);
        $item->id=$DBH->lastInsertId();
        $DBH=null;
         return $item;
        //aca va la logica para crear. Recibe por parametro un objeto de tipo usuario
    }// nuevo    

    public static function modificar($item) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo usuario
    }// modificar

    public static function eliminar($id) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'DELETE FROM usuarios where usuarios.idusuario= :idusuario';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
            ":idusuario" => $id
        );
		$STH->execute($params);
        $DBH=null;
        return $item;
        //aca va la logica para eliminar
    }// eliminar

    public static function activar($id) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
        $query = 'UPDATE usuarios SET estado=1 where idusuario=:id';
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
        $query = 'UPDATE usuarios SET estado=0 where idusuario=:id';
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