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
	<div id="app">
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
				<h4>Producto</h4>
				<div class="site-pagination">
					<a href="">Home</a> /
					<a href="">Shop</a>
				</div>
			</div>
		</div>
		<!-- Page info end -->


		<!-- product section -->
		<section class="product-section">
			<div class="container">
				<div class="back-link">
					<a href="./category.html"> &lt;&lt; Categorias</a>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="product-pic-zoom" id="imagenProducto">
							
						</div>
					</div>
					<div class="col-lg-6 product-details">
						<h2 class="p-title" id="nombre">{{producto.nombre}}</h2>
						<h3 class="p-price" id="precio" v-if="producto.descuento==0">${{producto.precio}}</h3>
						<h3 class="p-price tachar" id="precioTachado" v-if="producto.descuento!=0">${{producto.precio}}</h3>
						<h3 class="p-price" id="precio" v-if="producto.descuento!=0">${{producto.precio*(100-producto.descuento)/100}}</h3>
						<h4 class="p-stock" v-if="producto.stockActual>=producto.stockMinimo">Disponible: <span>En stock</span></h4>
						<h4 class="p-stock" v-if="producto.stockActual<producto.stockMinimo">Disponible: <span>No hay stock</span></h4>

						
						
						<div class="quantity" v-if="producto.stockActual>=producto.stockMinimo">
							<p>Cantidad</p>
							<div class="pro-qty"><input type="text" value="1"></div>
						</div>
						<a href="#" class="site-btn" v-if="producto.stockActual>=producto.stockMinimo">Comprar Ahora</a>
						<div id="accordion" class="accordion-area">
							<div class="panel">
								<div class="panel-header" id="headingOne">
									<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Informacion</button>
								</div>
								<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="panel-body">
										<p>{{producto.descripcionLarga}}</p>
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header" id="headingTwo">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Metodos de pago </button>
								</div>
								<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="panel-body">
										<img src="./img/cards.png" alt="">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header" id="headingThree">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Envios y devolucion</button>
								</div>
								<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="panel-body">
										<h4>7 Days Returns</h4>
										<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- product section end -->


		<!-- RELATED PRODUCTS section -->
		<section class="related-product-section">
			<div class="container">
				<div class="section-title">
					<h2>PRODUCTOS RELACIONADOS</h2>
				</div>
				<div class="product-slider owl-carousel">
					
				</div>
			</div>
		</section>
	</div>
		<!-- RELATED PRODUCTS section end -->



	<!-- Footer section -->
	<?php require_once("Footer.php") ?>

	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
	<script src="/admin/vendors/axios/axios.min.js"></script>
	<script src="js/app.js"></script>



	<script>

		(function($){
			$('.product-slider').owlCarousel({
				loop: false,
				rewind: true,
				nav: true,
				dots: false,
				margin : 30,
				autoplay: true,
				navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
				responsive : {
					0 : {
						items: 1,
					},
					480 : {
						items: 2,
					},
					768 : {
						items: 3,
					},
					1200 : {
						items: 4,
					}
				}
			});
		})(jQuery);

		function zoom(){
			$('.product-thumbs-track > .pt').on('click', function(){
			$('.product-thumbs-track .pt').removeClass('active');
			$(this).addClass('active');
			var imgurl = $(this).data('imgbigurl');
			var bigImg = $('.product-big-img').attr('src');
			if(imgurl != bigImg) {
				$('.product-big-img').attr({src: imgurl});
				$('.zoomImg').attr({src: imgurl});
				}
			});
			$('.product-pic-zoom').zoom();
		}
	</script>

	</body>
</html>
