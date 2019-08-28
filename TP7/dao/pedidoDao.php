<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/models/clasepedido.php');
class pedidoDao {

    public static function ObtenerPorID($id) {
        //devuelve un objeto de tipo pedido
    }// get

    public static function ObtenerTodos() {
        //devuelve un array de objetos de tipo pedido
        $arrayObjetos= array();
        $DBH = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
		$query = 'select pedidos.idpedidos, usuarios.nombre, pedidos.codigocompra, pedidos.estadoenvio, pedidos.estadopago from pedidos inner join usuarios on pedidos.idusuario=usuarios.idusuario';
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		$STH->execute();
		$DBH=null;
		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
                $Objeto=new pedido();
                $Objeto->id=$row['idpedidos'];
                $Objeto->nombreDelUsuario=$row['nombre'];
                $Objeto->codigoCompra=$row['codigocompra'];
                $Objeto->estadoEnvio=$row['estadoenvio'];
                $Objeto->estadoPago=$row['estadopago'];
                $arrayObjetos[]=$Objeto;
			}
        }
         return $arrayObjetos; 
    }

    public static function nuevo($item) {
        //aca va la logica para crear. Recibe por parametro un objeto de tipo pedido
    }// nuevo    

    public static function modificar($item) {
        //aca va la logica para modificar. Recibe por parametro un objeto de tipo pedido
    }// modificar

    public static function eliminar($id) {
        //aca va la logica para eliminar
    }// eliminar

}
?>