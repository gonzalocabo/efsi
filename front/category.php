<?php
if(isset($_GET['idCategoria'])){
    $id = $_GET['idCategoria'];
}else{
    $id = 0;
}

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Divisima | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/MiEstilo.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<?php require_once("Header.php") ?>
	<!-- Header section end -->


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>CATEGORIAS</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Categorias</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Vista</h2>
						<div class="row ml-2">
							<a class="fa fa-list" title="Lista" href="javascript:Renderizar('Lista');"></a>
							<a class="fa fa-th-large ml-5" title="Lista" href="javascript:Renderizar('Grilla');"></a>
						</div>
					</div>	
					<div class="filter-widget">
						<h2 class="fw-title">Categorias</h2>
						<ul class="category-menu" id="categorias">
							<li><a href="javascript:FiltrarPorCategoria('todas')">Todas</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row" id="productos">
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->


	<!-- Footer section -->
	<?php require_once("Footer.php") ?>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
	<script src="/admin/vendors/axios/axios.min.js"></script>


	<script>

		var _Productos;

		(function($){
			var idCategoria=<?php echo $id ?>;
			var formData=new FormData();

			formData.append('accion',"listarActivos");
			axios.post("http://localhost/controllers/categoriaController.php",formData).then(function(response){
				console.log(response.data);
				$.each(response.data,function(index,value){
					var aux="'"+value.nombre+"'";
					$('#categorias').append('<li><a href="javascript:FiltrarPorCategoria('+aux+')">'+value.nombre+'</a></li>')
				});
			}).catch(function(error){console.log(error);});

			if(idCategoria!=0){
				formData=new FormData();
				formData.append('accion','listarPorCategoria');
				formData.append('id',idCategoria);
				axios.post("http://localhost/controllers/productoController.php",formData).then(function(response){
					console.log(response.data);
					_Productos=response.data;
					$.each(response.data,function(index,value){
							RenderGrilla(value);					
					});
				}).catch(function(error){console.log(error);});
			}else{
				formData=new FormData();
				formData.append('accion','listar');
				axios.post("http://localhost/controllers/productoController.php",formData).then(function(response){
					console.log(response.data);
					_Productos=response.data;
					$.each(response.data,function(index,value){
							RenderGrilla(value);					
					});
				}).catch(function(error){console.log(error);});
			}
			

						


		})(jQuery);

		function Renderizar(forma){
			$('#productos').empty();
			if(forma=="Lista"){
				$.each(_Productos,function(index,value){
					RenderLista(value);
				});
			}else{
				$.each(_Productos,function(index,value){
					RenderGrilla(value);
				});
			}
		}

		function RenderGrilla(value){
			var append='<div class="col-lg-4 col-sm-6"><div class="product-item"><div class="pi-pic">';
					var precio;
					if(value.onSale==1){
						append+='<div class="tag-sale">ON SALE</div>';
					}else{
						if(value.descuento>0){
							append+='<div class="tag-sale>-'+value.descuento+'%</div>';
						}
					}

					if(value.descuento>0){
						precio='<div class="text-right"><h6 class="tachar">$'+value.precio+'</h6><h6>$'+value.precio*(100-value.descuento)/100+'</h6></div>';
					}else{
						precio='<h6>$'+value.precio+'</h6>';
					}
					append+='<img src="/uploads/fotos/productos/'+value.foto+'"alt=""><div class="pi-links"><a href="#" class="add-card"><i class="flaticon-bag"></i><span>AÑADIR AL CARRITO</span></a></div></div><div class="pi-text">';
					append+='<div><p >'+value.nombre+'</p>'+precio+'</div></div></div></div>';
					$('#productos').append(append);
		}

		function RenderLista(value){
			var append='<ul class="list-group shadow" style="width:100%"><li class="list-group-item"><div class="media align-items-lg-center flex-column flex-lg-row p-3"><div class="media-body order-2 order-lg-1"><h5 class="mt-0 font-weight-bold mb-2">'+value.nombre+'</h5><p class="font-italic text-muted mb-0 small">'+value.descripcionCorta+'<div class="d-flex align-items-center justify-content-between mt-1">';
            var precio;
			if(value.descuento>0){
				precio='<h6 class="font-weight-bold my-2 tachar">$'+value.precio+'</h6><h6 class="font-weight-bold my-2">$'+value.precio*(100-value.descuento)/100+'</h6>';
			}else{
				precio='<h6 class="font-weight-bold my-2">'+value.precio+'</h6>';
			}
			append+=precio+'</div></div><img src="/uploads/fotos/productos/'+value.foto+'" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2"></div></li></ul>';
			$('#productos').append(append);
		}

		function FiltrarPorCategoria(categoria){
			$('#productos').empty();
			if(categoria!="todas"){
				$.each(_Productos,function(index,value){
					if(value.categoria==categoria){
						RenderGrilla(value);
					}
				});
			}else{
				$.each(_Productos,function(index,value){
					RenderGrilla(value);
				});
			}
			
		}

	</script>

	</body>
</html>
