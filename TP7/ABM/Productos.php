<!doctype html>
<html class="no-js" lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sufee Admin - HTML5 Admin Template</title>
        <meta name="description" content="Sufee Admin - HTML5 Admin Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="/apple-icon.png">
        <link rel="shortcut icon" href="/favicon.ico">


        <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
        <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="../assets/css/style.css">

        <link rel="stylesheet" href="../vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">


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
                        <h1>Productos</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Modificaciones</a></li>
                            <li class="active"><a>Productos</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
        <div class="card">
                <div class="card-body">
                    <table id="mi-grilla" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Codigo</th>
                                <th scope="col" class="text-center">Nombre</th>
                                <th scope="col" class="text-center">Categoria</th>
                                <th scope="col" class="text-center">Enlaces</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <button type="button" class="btn btn-danger col-md-12 col-sm-12" onclick="NuevoProducto();">Nuevo producto</button>
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <script src="../vendors/peity/jquery.peity.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/init-scripts/peitychart/peitychart.init.js"></script>
    <!-- scripit init-->


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="../assets/js/init-scripts/data-table/datatables-init.js"></script>
    <script src="../vendors/axios/axios.min.js"></script>


    <script>
        (function ($) {  
            const formData = new FormData();
            formData.append('accion', 'listar');
            axios.post('../controllers/productoController.php',formData)
            .then(function (response) {
                $('#mi-grilla').DataTable({
                    data: response.data,
                    columns: [
                        {"data": "id", className: "text-center"},
                        {"data": "codigo", className: "text-center"},
                        {"data": "nombre", className: "text-center"},
                        {"data": "categoria", className: "text-center"},
                        {
                            data: null,
                            className: "text-center",                            
                            render: function (data){
                            return '<a class="fa fa-edit mr-5" href="javascript:editar('+ data.id +');"></a><a class="fa fa-trash" href="javascript:eliminar('+ data.id +');"></a>';
                            }
                        }
                    ],
                    "language": {
                        "lengthMenu": "Mostrando _MENU_ registros por pagina",
                        "zeroRecords": "Nada para mostrar",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                        "search": "Buscar:",
                        "paginate": {
                            "previous": "Anterior",
                            "next": "Siguiente"
                        }
                    }
                });
                console.log(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
                
        })(jQuery);

        function NuevoProducto(){
            window.location="../Formularios/Productos.php";
        }

        function editar(id){
            window.location="../Formularios/Productos.php?id="+id;
        }

    </script>

</body>
      
</html>