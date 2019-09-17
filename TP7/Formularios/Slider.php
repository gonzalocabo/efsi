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
    <title>Nueva foto slider - Mi Tienda Online</title>
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
    <link rel="stylesheet" href="../assets/css/MiEstilo.css">

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
                        <h1>Slider</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Modificaciones</a></li>
                            <li><a href="#">Slider</a></li>
                            <li class="active">Ingresar slider</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="card">
                <div class="card-header">
                    <strong>Ingresar slider</strong>
                </div>
                <div class="card-body card-block">
                    <form action="" method="post" id="formulario" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Nombre:</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre" class="form-control"><span id="spanNombre" class="help-block">Por favor ingrese el nombre</span></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto:</label></div>
                            <div class="col-12 col-md-9"><input accept="image/x-png,image/jpeg" type="file" id="foto" name="foto" onChange="displayImage(this)" class="form-control-file"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label"></label></div>
                            <div class="col-12 col-md-9"><img id="imagen" class="ImagenUpload"/></div>
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

    <script src="../vendors/jquery/dist/jquery.min.js"></script>

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <script src="../vendors/peity/jquery.peity.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/init-scripts/peitychart/peitychart.init.js"></script>
    <!-- scripit init-->

    <script src="../vendors/axios/axios.min.js"></script>


    <script>
        (function($){
           var id= <?php echo $id;?>;
            if(id!=0){
                const formData = new FormData();
                formData.append('id', id);
                formData.append('accion', 'obtenerporid');
                axios.post('../controllers/sliderController.php',formData)
                .then(function (response) {
                    $('#nombre').val(response.data.nombre);
                    $('#spanNombre').hide();
                    $('#Actual').text('Modificar Categoria');
                    $('#imagen').attr('src',"/uploads/fotos/"+response.data.foto);
                })
                .catch(function (error) {
                console.log(error);
                });
            }
        })(jQuery);
        function Validar(){
            
            if(nombre==''||($("#foto").val()==""&&"<?php echo $accion; ?>"=="nuevo")){
				alert('Debe completar todos los campos');
			}else{
                var form=$('#formulario');
                const formData = new FormData(form[0]);
                formData.append('accion',"<?php echo $accion; ?>");
                formData.append('id',<?php echo $id;?>);
                axios.post('../controllers/sliderController.php', formData)
                .then(function (response) {
                    console.log(response);
                    window.location="../ABM/Slider.php"
                })
                .catch(function (error) {
                    console.log(error);
                });    
            }


            /*var nombre = $("#nombre").val();
            var foto = $("#foto").val();
            var accion= "<?php echo $accion; ?>";
            if(nombre==''||(foto==""&&accion=="nuevo")){
				alert('Debe completar todos los campos');
			}else{
                const formData = new FormData();
                formData.append('accion',accion);
                formData.append('id',<?php echo $id;?>);
                formData.append('nombre',nombre);
                if(accion=="modificar"&&foto==""){
                    formData.append('foto', "nofoto");
                }else{
                    formData.append('foto', foto);
                }
                axios.post('../controllers/sliderController.php', formData)
                .then(function (response) {
                    console.log(response);
                    window.location="../ABM/Slider.php"
                })
                .catch(function (error) {
                    console.log(error);
                });
            }*/
        }
        function Back(){
                window.history.back();
        }
        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(e.files[0]);
                reader.onload = function(e){
                    $('#imagen').attr('src', e.target.result);
                }          
            }else{
                $('#imagen').attr('src', "");
            }
        }
    </script>

</body>

</html>
