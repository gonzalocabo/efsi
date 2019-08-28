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
                        <h1>Usuarios</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a>Usuarios</a></li>
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
                                <th scope="col" class="text-center">Nombre</th>
                                <th scope="col" class="text-center">Apellido</th>
                                <th scope="col" class="text-center">Categoria</th>
                                <th scope="col" class="text-center">Enlace</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th scope="row">1</th>
                                <td>Ricardo</td>
                                <td>Fort</td>
                                <td>Administrador</td>
                                <td><a href="#">Modificar</a><a href="#" class="ml-3">Eliminar</a><a href="#" class="ml-3">Desactivar</a></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Juan</td>
                                <td>Perez</td>
                                <td>Usuario</td>
                                <td><a href="#">Eliminar</a><a href="#" class="ml-3">Desactivar</a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Roberto</td>
                                <td>Pereira</td>
                                <td>Usuario</td>
                                <td><a href="#">Eliminar</a><a href="#" class="ml-3">Activar</a></td>
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