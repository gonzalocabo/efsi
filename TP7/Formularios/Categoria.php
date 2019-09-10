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
    <title id="TituloPagina">Nueva categoria - Mi Tienda Online</title>
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
                            <li><a href="../ABM/Categorias.php">Categorias</a></li>
                            <li class="active" id="Actual">Ingresar categoria</li>
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
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                            <input type="hidden" name="accion" id="accion" value="<?php echo $accion; ?>" />
                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Categoria:</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="categoria" name="categoria"  placeholder="Ingrese categoria..." class="form-control"><span class="help-block" id="spanPorfavor">Por favor ingrese la categoria</span></div>
                            <div class="col col-md-3 mt-1"><label for="hf-email" class=" form-control-label">Activo:</label></div>
                            <div class="col-12 col-md-9 mt-2"><input type="checkbox" id="activo" name="activo" checked></div>
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
                    $.ajax({
                        async:true,
                        type: "POST",
                        url: "../controllers/categoriaController.php",
                        data: 'accion=obtenerporid&id='+id,
                        success:function(resultado) {
                            var o=JSON.parse(resultado);
                            $('#categoria').val(o.nombre);
                            $('#spanPorfavor').hide();
                            if(o.activo=='0'){
                                $('#activo').removeAttr("checked");
                            }
                            $('#Actual').text('Modificar Categoria');
                            $('#TituloPagina').text('Modificar categoria - Mi Tienda Online');
                        },
                        timeout:8000,
                        error:function(){
                            alert('mensaje de error');
                            return false;
                        }
                    });
                }
                
            })(jQuery);

    		function Validar(){
                var categoria = $("#categoria").val();
                var accion=$('#accion').val();
                var activo=$('#activo').is(':checked');
                var id=$('#id').val();
                if(categoria==''){
                    alert('Debe completar la categoria');
                }
                else{
                    const formData = new FormData();
                    formData.append('accion', accion);
                    formData.append('categoria',categoria);
                    formData.append('id',id);
                    if(activo){
                        formData.append('activo',1);
                    }else{
                        formData.append('activo',0);
                    }
                    axios.post('../controllers/categoriaController.php',formData)
                    .then(function (response) {
                        window.location="../ABM/Categorias.php"
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }		
		    }

            function Back(){
                window.history.back();
            }
	</script>
</body>

</html>
