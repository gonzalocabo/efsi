<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $accion = 'modificar';
}else{
    $id = 0;
    $accion = 'nuevo';
}

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="es">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title id="TituloPagina">Ver usuario - Mi Tienda Online  </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <!-- Left Panel -->

    <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Left-panel.php');
    ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
            <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . '/Header.php');
            ?>
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Categorias</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="">Modificaciones</a></li>
                            <li><a href="../ABM/ListadoUsuarios.php">Usuarios</a></li>
                            <li class="active" id="Actual">Modificar usuario</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="card">
                <div class="card-header">
                    <strong>Ingresar categoria</strong>
                </div>
                <div class="card-body card-block">
                    <form action="" method="post" class="form-horizontal" id="formulario">
                        <div class="row form-group">
                            <input type="hidden" name="accion" id="accion" value="<?php echo $accion; ?>" />
                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">ID:</label></div>
                            <div class="col-12 col-md-9"><label class="form-control-disabled"><?php echo $id; ?></label></div>

                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Nombre:</label></div>
                            <div class="col-12 col-md-9"><label id="nombre" class="form-control-disabled"></label></div>

                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Apellido:</label></div>
                            <div class="col-12 col-md-9"><label id="apellido" class="form-control-disabled"></label></div>

                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Email:</label></div>
                            <div class="col-12 col-md-9"><label id="email" class="form-control-disabled"></label></div>

                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Estado:</label></div>
                            <div class="col-12 col-md-9"><label id="estado" class="form-control-disabled"></label></div>

                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Categoria:</label></div>
                            <div class="col-12 col-md-9"><label id="categoria" class="form-control-disabled"></label></div>
                        </div>
                    </form>
                </div>
                <div class="card-footer"style="text-align:center">
                    <button type="submit" class="btn btn-success btn-sm" onclick="Validar();">
                        <i class="fa fa-dot-circle-o"></i> Aceptar
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm" onclick="Back();">
                        <i class="fa fa-ban"></i> Cancelar
                    </button>
                </div>
            </div>
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="../vendors/jquery/dist/jquery.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>

    

    <script src="../vendors/peity/jquery.peity.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/init-scripts/peitychart/peitychart.init.js"></script>
    <!-- scripit init-->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 

    <script src="../vendors/axios/axios.min.js"></script>

      

    <script>
            (function($){
                var id= <?php echo $id;?>;
                if(id!=0){
                    const formData = new FormData();
                    formData.append('id', id);
                    formData.append('accion', 'obtenerporid');
                    axios.post('../controllers/usuarioController.php',formData)
                    .then(function (response) {
                        console.log(response.data);
                        $('#nombre').text(response.data.nombre);
                        $('#apellido').text(response.data.apellido);
                        $('#email').text(response.data.mail);
                        if(response.data.estado==1){
                            $('#estado').text("Activo");
                        }else{
                            $('#estado').text("Inactivo");
                        }
                        
                        $('#categoria').text(response.data.categoria);
                    })
                    .catch(function (error) {
                    console.log(error);
                    });                
                }
            })(jQuery);

    		function Validar(){
                var categoria = $("#categoria").val();
                var accion=$('#accion').val();
                
                if(categoria==''){
                    alert('Debe completar la categoria');
                }
                else{
                    $.ajax({
                        async:true,
                        type: "POST",
                        url: "../controllers/categoriaController.php",                    
                        data:$('#formulario').serialize(),
                        beforeSend:function(){
                            
                        },
                        success:function(resultado) {
                            window.location="../ABM/Categorias.php"
                            return true;
                        },
                        timeout:8000,
                        error:function(){
                            alert('mensaje de error');
                            return false;
                        }
                    });
                }		
		    }

            function Back(){
                window.history.back();
            }
	</script>
</body>

</html>
