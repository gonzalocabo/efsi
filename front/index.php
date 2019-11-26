<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Mi tienda web | Index</title>
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

	<section class="hero-section">
		<div class="hero-slider owl-carousel" id="sliderBanner">

		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>

	<!-- Features section -->
	<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/1.png" alt="#">
						</div>
						<h2>PAGOS RAPIDOS Y SEGUROS</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/2.png" alt="#">
						</div>
						<h2>PRODUCTOS PREMIUM</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/3.png" alt="#">
						</div>
						<h2>ENVIO RAPIDO</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>ULTIMOS PRODUCTOS</h2>
			</div>
			<div class="product-slider owl-carousel" id="productosSlider">
				
			</div>
		</div>
	</section>
	<!-- letest product section end -->



	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>BUSCA EN LOS MAS VENDIDOS</h2>
			</div>
			<ul class="product-filter-menu text-center" id="filtroCategorias">
				<li><a href="javascript:FiltrarPorCategoria('todas');">Todas</a></li>
			</ul>
			<div class="row" id="productosHome">
				
			</div>
			<div class="text-center pt-5">
				<button class="site-btn sb-line sb-dark" onclick="CargarMas();">CARGAR MAS</button>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->


	<!-- Banner section -->
	<section class="banner-section">
		
	</section>
	<!-- Banner section end  -->


	<!-- Footer section -->
	<?php require_once("Footer.php") ?>
	<!-- Footer section end -->



	<script>
		
	</script>


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
		var i=0;
		(function($){

			var formData = new FormData();
			formData.append('accion', 'listarOwlCarousel');
			axios.post('http://localhost/controllers/sliderController.php',formData)
            .then(function (response) {
				console.log(response.data);
				$.each(response.data,function(index,value)
                {
					$('#sliderBanner').append('<div class="hs-item set-bg" data-setbg="/uploads/fotos/'+value+'"></div>')
				});
				InicializarSliderPrincipal();
			}).catch(function(error){console.log(error);});

			formData=new FormData();
			formData.append('accion','listarDestacados');
			axios.post('http://localhost/controllers/productoController.php',formData).then(function(response){
				console.log(response.data);
				$.each(response.data,function(index,value){
					$('#productosSlider').append(BindearProductos(value));
				});
				Productos=response.data;
				IniciarlizarSliderProductos();
			}).catch(function(error){console.log(error);});

			formData=new FormData();
			formData.append("accion","listarActivos");
			axios.post('http://localhost/controllers/categoriaController.php',formData).then(function(response){
				console.log(response.data);
				$.each(response.data,function(index,value){
					var a="'"+value.nombre+"'";
					$('#filtroCategorias').append('<li><a href="javascript:FiltrarPorCategoria('+a+');">'+value.nombre+'</a></li>');
				});
			}).catch(function(error){console.error(error);});
			
			formData=new FormData();
			formData.append('accion','listarMostrarHome');
			axios.post('http://localhost/controllers/productoController.php',formData).then(function(response){
				console.log(response.data);
				_Productos=response.data;
				while(i<response.data.length&&i<8){
					var value=response.data[i];
					$('#productosHome').append('<div class="col-lg-3 col-sm-6">'+BindearProductos(value)+'</div>');
					i++;
				}

			}).catch(function(error){console.error(error);})

			
				
		})(jQuery);

		function InicializarSliderPrincipal(){
			var hero_s = $(".hero-slider");
				hero_s.owlCarousel({
				loop: true,
				margin: 0,
				nav: true,
				items: 1,
				dots: true,
				animateOut: 'fadeOut',
				animateIn: 'fadeIn',
				navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
				smartSpeed: 1200,
				autoHeight: false,
				autoplay: true,
				onInitialized: function() {
					var a = this.items().length;
					$("#snh-1").html("<span>1</span><span>" + a + "</span>");
				}
				}).on("changed.owl.carousel", function(a) {
					var b = --a.item.index, a = a.item.count;
					$("#snh-1").html("<span> "+ (1 > b ? b + a : b > a ? b - a : b) + "</span><span>" + a + "</span>");
				});

				hero_s.append('<div class="slider-nav-warp"><div class="slider-nav"></div></div>');
				$(".hero-slider .owl-nav, .hero-slider .owl-dots").appendTo('.slider-nav');

				$('.set-bg').each(function() {
					var bg = $(this).data('setbg');
					$(this).css('background-image', 'url(' + bg + ')');
					});
		}
		function IniciarlizarSliderProductos(){
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
		}

		function BindearProductos(value){
			var binded='<div class="product-item"><div class="pi-pic">';
			if(value.onSale==1){
				binded+='<div class="tag-sale">ON SALE</div>';
			}else{
				if(value.descuento>0){
					binded+='<div class="tag-sale" style="font-size: 15px">-'+value.descuento+'%</div>';
				}
			}
			binded+='<img src="/uploads/fotos/productos/'+value.foto+'" alt="imagen"><div class="pi-links"><a href="#" class="add-card"><i class="flaticon-bag"></i><span>AÑADIR AL CARRITO</span></a></div></div><div class="pi-text"><h6>$'+(value.precio*(100-value.descuento))/100+'</h6><p>'+value.nombre+' </p></div></div>';
			return binded;
		}

		function CargarMas(){
			while(i<_Productos&&i<8){
				var value=response.data[i];
				$('#productosHome').append('<div class="col-lg-3 col-sm-6"><div class="product-item"><div class="pi-pic"><img src="/uploads/fotos/productos/'+value.foto+'" alt=""><div class="pi-links"><a href="#" class="add-card"><i class="flaticon-bag"></i><span>AÑADIR AL CARRITO</span></a></div></div><div class="pi-text"><h6>$'+(value.precio*(100-value.descuento))/100+'</h6><p>'+value.nombre+' </p></div></div></div>');
				i++;
			}
			
		}
		function FiltrarPorCategoria(nombre){
			$('#productosHome').empty();
			if(nombre=="todas"){
				$.each(_Productos,function(index,value){
					$('#productosHome').append('<div class="col-lg-3 col-sm-6">'+BindearProductos(value)+'</div>');
				});
			}else{
				$.each(_Productos,function(index,value){
					if(value.categoria==nombre){
						$('#productosHome').append('<div class="col-lg-3 col-sm-6">'+BindearProductos(value)+'</div>');
					}
				});
			}
			return;
		}

	</script>


	</body>
</html>
