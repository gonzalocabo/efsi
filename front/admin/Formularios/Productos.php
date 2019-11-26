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
        require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/Left-panel.php');
    ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
            <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/Header.php');
            ?>
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Productos</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Modificar</a></li>
                            <li>Productos</li>
                            <li class="active" id="Actual">Insertar productos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="card">
                <div class="card-header">
                    <strong>Insertar productos</strong>
                </div>
               <div class="card-body card-block">
                    <form action="" method="post" id="formulario" name="formulario" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control"><small class="form-text text-muted">Ingrese el nombre</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Codigo</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="codigo" name="codigo" placeholder="Codigo" class="form-control"><small class="form-text text-muted">Ingrese el codigo</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Precio</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="precio" name="precio" placeholder="Precio" class="form-control"><small class="form-text text-muted">Ingrese el precio</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Descuento en %</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="descuento" name="descuento" placeholder="Descuento" class="form-control"><small class="form-text text-muted">Ingrese el descuento en %</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Stock minimo</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="stockMinimo" name="stockMinimo" placeholder="Stock minimo" class="form-control"><small class="form-text text-muted">Ingrese el stock minimo</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Stock actual</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="stockActual" name="stockActual" placeholder="Stock actual" class="form-control"><small class="form-text text-muted">Ingrese el stock actual</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="categoria" class=" form-control-label">Categoria</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="categoria" id="categoria" class="form-control">
                                            <option value="0">Seleccionar</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="foto" name="foto" class="form-control-file" onChange="displayImage(this)"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="hf-email" class=" form-control-label"></label></div>
                                <div class="col-12 col-md-9"><img id="imagen" class="ImagenUpload"/></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Video</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="video" name="video" class="form-control-file"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Descripcion corta</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="descripcionCorta" name="descripcionCorta" placeholder="Descripcion corta" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Descripcion larga</label></div>
                                <div class="col-12 col-md-9"><textarea name="descripcionLarga" id="descripcionLarga" rows="7" placeholder="Descripcion.." class="form-control"></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label"></label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="checkbox1" class="form-check-label ">
                                                <input type="checkbox" id="destacado" name="destacado" class="form-check-input">Destacado
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox2" class="form-check-label ">
                                                <input type="checkbox" id="onSale" name="onSale" class="form-check-input">OnSale
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox2" class="form-check-label ">
                                                <input type="checkbox" id="mostrarHome" name="mostrarHome" class="form-check-input">Mostrar en home
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </form>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success btn-sm" onclick="Validar();">
                                <i class="fa fa-dot-circle-o"></i> Aceptar
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm" onclick="Back();">
                                <i class="fa fa-ban"></i> Cancelar
                            </button>
                        </div>
                    </div>
                </div>
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <script src="../vendors/peity/jquery.peity.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/init-scripts/peitychart/peitychart.init.js"></script>
    <!-- scripit init-->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/jquery/dist/jquery.formHelper.js"></script>
    <script src="../vendors/axios/axios.min.js"></script>
    <script src="../js/app.js"></script>


    <script>
        (function($){
            var id= <?php echo $id;?>;
            if(id!=0){
                const formData = new FormData();
                formData.append('id', id);
                formData.append('accion', 'obtenerporid');
                axios.post('http://localhost/controllers/productoController.php',formData)
                .then(function (response) {
                    console.log(response.data);
                    $('formulario').populateForm(response.data);
                    //$('#nombre').val(response.data.nombre);
                    $('#spanNombre').hide();
                    $('#Actual').text('Modificar Producto');
                })
                .catch(function (error) {
                console.log(error);
                });
            }
            const formData = new FormData();
            formData.append('accion', 'listarActivos');
            axios.post('http://localhost/controllers/categoriaController.php',formData)
            .then(function (response) {
                $.each(response.data,function()
                {
                    var option = $('<option />');
                    option.attr('value', this.id).text(this.nombre);

                    $('#categoria').append(option);
                });
            })
            .catch(function (error) {
                console.log(error);
            });
        })(jQuery);

        function Validar(){
            var foto = $("#foto").val();
            var video = $("#video").val();
            var accion= "<?php echo $accion; ?>";
            if(nombre==''||(foto==""&&accion=="nuevo")){
				alert('Debe completar todos los campos');
			}else{
                var form=$("#formulario");
                const formData = new FormData(form[0]);
                formData.append('accion',accion);
                formData.append('id',<?php echo $id;?>);
                if(accion=="modificar"&&foto==""){
                    formData.append('foto', "nofoto");
                }else{
                    console.log("entro a set");
                    formData.set('video', video);
                }
                if($('#destacado').is(':checked')){
                    formData.set('destacado', 1);
                }else{
                    formData.set('destacado', 0);
                }
                if($('#onSale').is(':checked')){
                    formData.set('onSale', 1);
                }else{
                    formData.set('onSale', 0);
                }
                if($('#mostrarHome').is(':checked')){
                    formData.set('mostrarHome', 1);
                }else{
                    formData.set('mostrarHome', 0);
                }
                
                axios.post('http://localhost/controllers/productoController.php', formData)
                .then(function (response) {
                    console.log(response.data);
                    alert(response.data);
                    window.location="http://localhost/admin/ABM/Productos.php"
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
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

