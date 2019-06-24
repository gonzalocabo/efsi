<!doctype html>
<html class="no-js" lang="en">
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
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Codigo</th>
                                <th scope="col" class="text-center">Nombre</th>
                                <th scope="col" class="text-center">Categoria</th>
                                <th scope="col" class="text-center">Enlaces</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th scope="row">1</th>
                                <td>CF45HK</td>
                                <td>Maiameee</td>
                                <td>Maiameee</td>
                                <td><a href="#">Modificar</a><a href="#" class="ml-3">Eliminar</a><a href="#" class="ml-3">Desactivar</a></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>CJHHAH33</td>
                                <td>Ricardo Fort</td>
                                <td>Maiameee</td>
                                <td><a href="#">Modificar</a><a href="#" class="ml-3">Eliminar</a><a href="#" class="ml-3">Activar</a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>JHA9IUV2</td>
                                <td>Administrador</td>
                                <td>Maiameee</td>
                                <td><a href="#">Modificar</a><a href="#" class="ml-3">Eliminar</a><a href="#" class="ml-3">Desactivar</a></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
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

</body>
      
</html>