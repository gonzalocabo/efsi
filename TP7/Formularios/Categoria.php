<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
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
                            <li><a href="#">Modificaiones</a></li>
                            <li><a href="#">Categorias</a></li>
                            <li class="active">Ingresar categoria</li>
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
                            <input type="hidden" name="accion" id="accion" value="nuevo" />
                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Categoria:</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="categoria" name="categoria" placeholder="Ingrese categoria..." class="form-control"><span class="help-block">Por favor ingrese la categoria</span></div>
                        </div>
                    </form>
                </div>
                <div class="card-footer"style="text-align:center">
                    <button type="submit" class="btn btn-success btn-sm" onclick="Validar();">
                        <i class="fa fa-dot-circle-o"></i> Aceptar
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
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

    <script>
		function Validar(){
			var categoria = $("#categoria").val();
            var accion=$('#accion').val();
            
			if(categoria==''){
				alert('Debe completar ls categoria');
			}
			else{
				$.ajax({
                    async:true,
                    type: "POST",
                    url: "../controllers/categoriaController.php",                    
                    data:$('#formulario').serialize(),
                    beforeSend:function(){
                        alert('comienzo a procesar');
                    },
                    success:function(resultado) {
                        alert(resultado);
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
	</script>
</body>

</html>
