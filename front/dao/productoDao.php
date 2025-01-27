<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/models/claseproducto.php');
class productoDao {

    public static function ObtenerPorID($id) {
        $Objeto=new producto();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'SELECT productos.idproductos,productos.nombre,productos.codigo,productos.precio,productos.descuento,productos.stockminimo,productos.stockactual,productos.foto,productos.video,productos.descripcioncorta,productos.descripcioncorta,productos.descripcionlarga,productos.destacado,productos.onsale,productos.mostrarhome,categoriasproductos.nombre as nombrecategoria FROM `productos` inner join categoriasproductos on productos.idcategoria=categoriasproductos.idcategoriasproductos  where productos.idproductos= :idproductos';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$params = array(                                
			":idproductos" => $id
		);
		$STH->execute($params);
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto->id=$row['idproductos'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->codigo=$row['codigo'];
                $Objeto->precio=$row['precio'];
                $Objeto->descuento=$row['descuento'];
                $Objeto->categoria=$row['nombrecategoria'];
                $Objeto->stockMinimo=$row['stockminimo'];
                $Objeto->stockActual=$row['stockactual'];
                $Objeto->foto=$row['foto'];
                $Objeto->video=$row['video'];
                $Objeto->descripcionCorta=$row['descripcioncorta'];
                $Objeto->descripcionLarga=$row['descripcionlarga'];
                $Objeto->destacado=$row['destacado'];
                $Objeto->onSale=$row['onsale'];
                $Objeto->mostrarHome=$row['mostrarhome'];
			}
        }
         return $Objeto;   
        //devuelve un objeto de tipo producto
    }// get

    public static function ObtenerTodos() {
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'SELECT productos.idproductos,productos.nombre,productos.codigo,productos.precio,productos.descuento,productos.stockminimo,productos.stockactual,productos.foto,productos.video,productos.descripcioncorta,productos.descripcioncorta,productos.descripcionlarga,productos.destacado,productos.onsale,productos.mostrarhome,categoriasproductos.nombre as nombrecategoria FROM `productos` inner join categoriasproductos on productos.idcategoria=categoriasproductos.idcategoriasproductos';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new producto();
                $Objeto->id=$row['idproductos'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->codigo=$row['codigo'];
                $Objeto->precio=$row['precio'];
                $Objeto->descuento=$row['descuento'];
                $Objeto->stockMinimo=$row['stockminimo'];
                $Objeto->stockActual=$row['stockactual'];
                $Objeto->foto=$row['foto'];
                $Objeto->video=$row['video'];
                $Objeto->categoria=$row['nombrecategoria'];
                $Objeto->descripcionCorta=$row['descripcioncorta'];
                $Objeto->descripcionLarga=$row['descripcionlarga'];
                $Objeto->destacado=$row['destacado'];
                $Objeto->onSale=$row['onsale'];
                $Objeto->mostrarHome=$row['mostrarhome'];
                $arrayObjetos[]=$Objeto;
			}
        }
         return $arrayObjetos; 
        //devuelve un array de objetos de tipo producto
    }

    public static function nuevo($item) {
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'INSERT INTO productos (nombre,codigo,precio,descuento,stockMinimo,stockActual,idcategoria,foto,video,descripcionCorta,descripcionLarga,destacado,onSale,mostrarHome) values(:nombre,:codigo,:precio,:descuento,:stockMinimo,:stockActual,:categoria,:foto,:video,:descripcionCorta,:descripcionLarga,:destacado,:onSale,:mostrarHome)';
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
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
        $query = 'UPDATE productos SET nombre=:nombre,codigo=:codigo,precio=:precio,descuento=:descuento,stockminimo=:stockMinimo,stockactual=:stockActual,idcategoria=:categoria,foto=:foto,video=:video,descripcioncorta=:descripcionCorta,descripcionlarga=:descripcionLarga,destacado=:destacado,onsale=:onSale,mostrarhome=:mostrarHome WHERE idproductos=:id';
        $params = array(
            ":id" => $item->id,
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
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $STH->execute($params);
        if ($STH->rowCount() < 1) {
            $item='error consulta';
        }
        $DBH=null;
        $STH=null;
        return $item;
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
        return 'true';
        //aca va la logica para eliminar
    }// eliminar

    public static function ListarDestacados(){
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'SELECT productos.idproductos,productos.nombre,productos.codigo,productos.precio,productos.descuento,productos.stockminimo,productos.stockactual,productos.foto,productos.video,productos.descripcioncorta,productos.descripcioncorta,productos.descripcionlarga,productos.destacado,productos.onsale,productos.mostrarhome,categoriasproductos.nombre as nombrecategoria FROM `productos` inner join categoriasproductos on productos.idcategoria=categoriasproductos.idcategoriasproductos where productos.destacado=1';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new producto();
                $Objeto->id=$row['idproductos'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->codigo=$row['codigo'];
                $Objeto->precio=$row['precio'];
                $Objeto->descuento=$row['descuento'];
                $Objeto->stockMinimo=$row['stockminimo'];
                $Objeto->stockActual=$row['stockactual'];
                $Objeto->foto=$row['foto'];
                $Objeto->video=$row['video'];
                $Objeto->categoria=$row['nombrecategoria'];
                $Objeto->descripcionCorta=$row['descripcioncorta'];
                $Objeto->descripcionLarga=$row['descripcionlarga'];
                $Objeto->destacado=$row['destacado'];
                $Objeto->onSale=$row['onsale'];
                $Objeto->mostrarHome=$row['mostrarhome'];
                $arrayObjetos[]=$Objeto;
			}
        }
         return $arrayObjetos; 
    }
    public static function ListarMostrarHome(){
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'SELECT productos.idproductos,productos.nombre,productos.codigo,productos.precio,productos.descuento,productos.stockminimo,productos.stockactual,productos.foto,productos.video,productos.descripcioncorta,productos.descripcioncorta,productos.descripcionlarga,productos.destacado,productos.onsale,productos.mostrarhome,categoriasproductos.nombre as nombrecategoria FROM `productos` inner join categoriasproductos on productos.idcategoria=categoriasproductos.idcategoriasproductos where productos.mostrarhome=1';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new producto();
                $Objeto->id=$row['idproductos'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->codigo=$row['codigo'];
                $Objeto->precio=$row['precio'];
                $Objeto->descuento=$row['descuento'];
                $Objeto->stockMinimo=$row['stockminimo'];
                $Objeto->stockActual=$row['stockactual'];
                $Objeto->foto=$row['foto'];
                $Objeto->video=$row['video'];
                $Objeto->categoria=$row['nombrecategoria'];
                $Objeto->descripcionCorta=$row['descripcioncorta'];
                $Objeto->descripcionLarga=$row['descripcionlarga'];
                $Objeto->destacado=$row['destacado'];
                $Objeto->onSale=$row['onsale'];
                $Objeto->mostrarHome=$row['mostrarhome'];
                $arrayObjetos[]=$Objeto;
			}
        }
         return $arrayObjetos; 
    }

    public static function ObtenerPorCategoria($id){
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'SELECT productos.idproductos,productos.nombre,productos.codigo,productos.precio,productos.descuento,productos.stockminimo,productos.stockactual,productos.foto,productos.video,productos.descripcioncorta,productos.descripcioncorta,productos.descripcionlarga,productos.destacado,productos.onsale,productos.mostrarhome,categoriasproductos.nombre as nombrecategoria FROM `productos` inner join categoriasproductos on productos.idcategoria=categoriasproductos.idcategoriasproductos where productos.idcategoria=:id';
		$STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $params=array(
            ":id" => $id
        );
		$STH->execute($params);
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new producto();
                $Objeto->id=$row['idproductos'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->codigo=$row['codigo'];
                $Objeto->precio=$row['precio'];
                $Objeto->descuento=$row['descuento'];
                $Objeto->stockMinimo=$row['stockminimo'];
                $Objeto->stockActual=$row['stockactual'];
                $Objeto->foto=$row['foto'];
                $Objeto->video=$row['video'];
                $Objeto->categoria=$row['nombrecategoria'];
                $Objeto->descripcionCorta=$row['descripcioncorta'];
                $Objeto->descripcionLarga=$row['descripcionlarga'];
                $Objeto->destacado=$row['destacado'];
                $Objeto->onSale=$row['onsale'];
                $Objeto->mostrarHome=$row['mostrarhome'];
                $arrayObjetos[]=$Objeto;
			}
        }
         return $arrayObjetos; 
    }

    public static function BuscarPorPatron($patron){
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
        $query ='SELECT productos.idproductos,productos.nombre,productos.codigo,productos.precio,productos.descuento,productos.stockminimo,productos.stockactual,productos.foto,productos.video,productos.descripcioncorta,productos.descripcioncorta,productos.descripcionlarga,productos.destacado,productos.onsale,productos.mostrarhome,categoriasproductos.nombre as nombrecategoria FROM `productos` inner join categoriasproductos on productos.idcategoria=categoriasproductos.idcategoriasproductos where productos.nombre LIKE "%":patron"%" and categoriasproductos.nombre LIKE "%":patron"%"';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $params=array(
            ":patron" => $patron
        );
        $STH->execute($params);
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new producto();
                $Objeto->id=$row['idproductos'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->codigo=$row['codigo'];
                $Objeto->precio=$row['precio'];
                $Objeto->descuento=$row['descuento'];
                $Objeto->stockMinimo=$row['stockminimo'];
                $Objeto->stockActual=$row['stockactual'];
                $Objeto->foto=$row['foto'];
                $Objeto->video=$row['video'];
                $Objeto->categoria=$row['nombrecategoria'];
                $Objeto->descripcionCorta=$row['descripcioncorta'];
                $Objeto->descripcionLarga=$row['descripcionlarga'];
                $Objeto->destacado=$row['destacado'];
                $Objeto->onSale=$row['onsale'];
                $Objeto->mostrarHome=$row['mostrarhome'];
                $arrayObjetos[]=$Objeto;
			}
        }else{
            return 404;
        }
         return $arrayObjetos; 
    }

    public static function ListarRelacionados($id,$cat){
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
        $query ='SELECT productos.idproductos,productos.nombre,productos.codigo,productos.precio,productos.descuento,productos.stockminimo,productos.stockactual,productos.foto,productos.video,productos.descripcioncorta,productos.descripcioncorta,productos.descripcionlarga,productos.destacado,productos.onsale,productos.mostrarhome,categoriasproductos.nombre as nombrecategoria FROM `productos` inner join categoriasproductos on productos.idcategoria=categoriasproductos.idcategoriasproductos where productos.idproductos!=:id and categoriasproductos.nombre=:categoria';
        $params=array(
            ":id"=>$id,
            ":categoria"=>$cat
        );
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $STH->execute($params);
        $DBH=null;
        if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new producto();
                $Objeto->id=$row['idproductos'];
                $Objeto->nombre=$row['nombre'];
                $Objeto->codigo=$row['codigo'];
                $Objeto->precio=$row['precio'];
                $Objeto->descuento=$row['descuento'];
                $Objeto->stockMinimo=$row['stockminimo'];
                $Objeto->stockActual=$row['stockactual'];
                $Objeto->foto=$row['foto'];
                $Objeto->video=$row['video'];
                $Objeto->categoria=$row['nombrecategoria'];
                $Objeto->descripcionCorta=$row['descripcioncorta'];
                $Objeto->descripcionLarga=$row['descripcionlarga'];
                $Objeto->destacado=$row['destacado'];
                $Objeto->onSale=$row['onsale'];
                $Objeto->mostrarHome=$row['mostrarhome'];
                $arrayObjetos[]=$Objeto;
            }
        }
        return $arrayObjetos;
    }

}
?>