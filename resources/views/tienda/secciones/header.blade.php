
	


<div class="header">

			<div class="header-top">
				<div class="container">
					 <div class="top-left">
						<a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
					</div>
						<div class="top-right">
							<ul>
								<li><a href="checkout">Mi Carrito</a></li>
								<li><a href="checkout">Finalizar Compra</a></li>
								
								@if (Auth::check())
					    	<li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						     {{ Auth::user()->name }}<b class="caret"></b>
						    </a>
						    <ul class="submenu dropdown-menu multi-column columns-3 ">
						      <ul class="multi-column-dropdown">
						      <li><a href="#"><h6>Mi perfil</h6></a></li>
						      
						      <li>
						         <a href="/logout"
						                onclick="event.preventDefault();
						                document.getElementById('logout-form').submit();">
						                <h6>Logout</h6>
						         </a>
						         <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
						                                    {{ csrf_field() }}
						                                </form>
						      </li>
						      </ul>
						    </ul>
						  </li>

									 




								    
								@else
								    <li><a href="login">Login</a></li>
									<li><a href="registro"> Registrarse</a></li> 
								@endif
							</ul>
						</div>
					<div class="clearfix"></div>
				</div>
			</div>



			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left">
							<h1><a href="index">Tienda <span> new laravel</span></a></h1>
						</div>


						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index" class="act">Inicio</a></li>	
									<li><a href="#">Short Codes</a></li>
									<li><a href="#">Short Codes</a></li>
									<li><a href="#">Short Codes</a></li>
									<li><a href="#">Contacto</a></li>
								</ul>
							</div>
							</nav>
						</div>

						<div class="logo-nav-right2">
							<ul class="cd-header-buttons">
								<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
							</ul> <!-- cd-header-buttons -->
							<div id="cd-search" class="cd-search">
								<form action="#" method="post">
									<input name="Search" type="search" placeholder="Search...">
								</form>
							</div>	
						</div>
						<div class="header-right2">
							@if(\Session::has('total'))
							<?php $total = \Session::get('total'); $carrito = \Session::get('carrito');?>
							<div class="cart box_1">
								<a href="#">
									<h3> <div class="total">
									
										<span class=""></span>$ {{number_format($total,2)}} (<span id="" class=""></span>{{count($carrito)}} items)</div>
										<img src="images/bag.png" alt="" />
									
									</h3>
								</a>
								<p><a href="#" class="simpleCart_empty">Vaciar Carrito</a></p>
								<div class="clearfix"> </div>
							</div>
							@else
								<div class="cart box_1">
								<a href="checkout.html">
									<h3> <div class="total">
										<span class=""></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
										<img src="images/bag.png" alt="" />
									</h3>
								</a>
								<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
								<div class="clearfix"> </div>
							</div>
							@endif	
						</div>


						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>


				<!--banner-->
		<div class="banner-w3">
			<div class="demo-1">            
				<div id="example1" class="core-slider core-slider__carousel example_1">
					<div class="core-slider_viewport">
						<div class="core-slider_list">
							<div class="core-slider_item">
								<img src="complementos/images/b1.jpg" class="img-responsive" alt="">
							</div>
							 <div class="core-slider_item">
								 <img src="complementos/images/b2.jpg" class="img-responsive" alt="">
							 </div>
							<div class="core-slider_item">
								  <img src="complementos/images/b3.jpg" class="img-responsive" alt="">
							</div>
							<div class="core-slider_item">
								  <img src="complementos/images/b4.jpg" class="img-responsive" alt="">
							</div>
						 </div>
					</div>
					<div class="core-slider_nav">
						<div class="core-slider_arrow core-slider_arrow__right"></div>
						<div class="core-slider_arrow core-slider_arrow__left"></div>
					</div>
					<div class="core-slider_control-nav"></div>
				</div>
			</div>
			<link href="./complementos/css/coreSlider.css" rel="stylesheet" type="text/css">
			<script src="./complementos/js/coreSlider.js"></script>
			<script>
			$('#example1').coreSlider({
			  pauseOnHover: false,
			  interval: 3000,
			  controlNavEnabled: true
			});

			</script>

		</div>	
		<!--banner-->


			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						


						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header nav_2">
									<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div> 
							
							
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									
									<!-- Mega Menu -->

								<!--comienzo de nav-->
									
									@foreach($categorias as $categoria)
									<li class="dropdown">
									@if($categoria->idCategoria=="1")
									
										<li class="active"><a href="index.html" class="act"><h4>{{$categoria->Nombre}}</h4></a></li>	
									@else
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><h4>{{$categoria->Nombre}} <b class="caret"></b></h4></a>
									@endif
									
										<ul class="submenu dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="col-sm-3  multi-gd-img">
													<ul class="multi-column-dropdown">
									
										
										@foreach($subcategorias as $subcategoria)
											@if($categoria->idCategoria==$subcategoria->idCategoria)
												
												<li><a href="products.html"><h6>{{$subcategoria->Nombre}}</h6></a></li>	
												@endif	
										@endforeach
												</ul>
											</div>
											</div>
										</ul>
									</li>
									@endforeach

								<!--fin de nav-->
								</ul>
								</div>
							</nav>
						</div>

						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>

		<!--header-->