
@extends('tienda.plantilla')

@section('content')
@if(session('Status'))			
<div class="container">
	<br>
	<div  class="tittle m-b-md alert alert-success">
	
		<h2 id="h1.-bootstrap-heading" class=" tittle">{{session('Status')}}</h2>
		
	
	</div>	
</div>
		@endif

	<div class="new-arrivals-w3agile">
					<div class="container">
						<h2 class="tittle">OFERTAS</h2>
						<div class="arrivals-grids">
						<?php $bandera1 = 0; ?>
						@foreach($promociones as $promocion)
								<?php $var = $promocion->idProducto; $bandera1=$bandera1+1;
								?>

									
									
								
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
												
												@foreach($imgproductos as $imgproducto)	
												<?php $var2 = $imgproducto->idProductos; ?>
													@if($var2==$var)
												<div class="grid-img">
													<img class="view_data2" name="view" value="view" id="{{$imgproducto->idProductos}}"style=""  src="complementos/images/{{$imgproducto->imagen}}" class="img-responsive" alt="">
													
												</div>
													@endif
												@endforeach
													
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="#" class="view_data2" name="view" value="view" id="{{$promocion->idProducto}}">{{$promocion->NombrePromocion}}</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$ {{number_format($promocion->precioAnterior,2)}}</del> <em class="item_price">$ {{number_format($promocion->precioActual,2)}}</em></p>
										@foreach($allproductos as $producto)	
												<?php $var3 = $producto->idProductos; ?>

													@if($var3==$var)
										<a href="carrito/add/{{$producto->url}}" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
										@endif
										@endforeach

									</div>
								</div>
							</div>
								
							@if($bandera1==4 || $bandera1 == 8)
							<div class="clearfix"></div>
										</div>
									</li>
										 
										<div class="caption">
							@endif
						@endforeach


							
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!--new-arrivals-->


	
<!--Products-->
			<div class="latest-w3">
				<div class="container">
					<h3 class="tittle1">CATEGORIAS</h3>
					<div class="latest-grids">
					<?php $bandera = 0; ?>
					@foreach($categorias as $categoria)
						<?php $bandera=$bandera+1; ?>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="complementos/images/l1.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>{{$categoria->Nombre}}</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-50%</h4>
								</div>
							</div>
						</div>
						@if($bandera==3 || $bandera == 6)
									<div class="clearfix"></div>
									</div>
									<div class="latest-grids">
						@endif
						@endforeach
						
					</div>
				</div>
			</div>



<!--Products-->
				<div class="product-agile">
					<div class="container">
						<h3 class="tittle1"> PRODUCTOS NUEVOS</h3>
						<div class="slider">
							<div class="callbacks_container">
								<ul class="rslides" id="slider">
									<li>	 
										<div class="caption">
											
												<?php $bandera2 = 0; ?>
											@foreach($productos as $producto)
												<?php $var = $producto->idProductos; $bandera2=$bandera2+1;?>

											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr">
													<div  class="grid-arrival">
														<figure>		
															<a href="detalle/{{$producto->url}}">
															@foreach($imgproductos as $imgproducto)	
																<?php $var2 = $imgproducto->idProductos; ?>
																@if($var2==$var)
																<div class="grid-img">
																	<img  style=""  src="complementos/images/{{$imgproducto->imagen}}" class="img-responsive" alt="">
																</div>
																@endif
															@endforeach

																			
															</a>		
														</figure>	
													</div>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="detalle/{{$producto->url}}">{{$producto->nombre}}</a></h6>
															<span class="size">XL / XXL / S </span>
															<p ><em class="item_price">$ {{number_format($producto->precio,2)}}</em></p>
															<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
															<a href="detalle/{{$producto->url}}" data-text="leer Mas" class="my-cart-b item_add">Leer Mas</a>
													</div>
												</div>
											</div>

											@if($bandera2==4 || $bandera2 == 8)
												<<div class="clearfix"></div>
												</div>
												<div class="latest-grids">
												@endif
											@endforeach


										
											
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>




<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3 class="tittle1">Nuestras Marcas</h3>
			<div class="sliderfig">
				<ul id="flexiselDemo1">			
					@foreach($marcas as $marca)
						<?php $var = $marca->idMarca; $bandera2=$bandera2+1;?>
							@foreach($imgmarcas as $imgmarca)	
								<?php $var2 = $imgmarca->idMarca; ?>
								@if($var2==$var)
									<li>
										<img src="complementos/images/{{$imgmarca->imagen}}" alt=" " class="img-responsive" />
									</li>
								@endif
							@endforeach


					@endforeach
				</ul>
			</div>
			<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					});
			</script>
			<script type="text/javascript" src="complementos/js/jquery.flexisel.js"></script>
		</div>
	</div>
	<!-- //top-brands --> 









	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body" id="nuevo">
							
						</div>
					</div>
				</div>
			</div>

<script type="text/javascript">
$(document).ready(function(){
 $(document).on('click', '.view_data2', function(){
	//alert("Hello! I am an alert box!!");
  //$('#dataModal').modal();
  var employee_id = $(this).attr("id");
	  	//alert(employee_id);
	  $.ajax({
	   url:"load",
	   method:"POST",
	   data:{id:employee_id},
	   success:function(data){
	   		//alert("exito");
	    $('#nuevo').html(data);
	    $('#myModal1').modal('show');
	   },
	   error: function(data) {alert("Error...");}
	  });
	 }

 );
});  

</script>
@stop