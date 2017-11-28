@extends('tienda.plantilladetalle')

@section('content')

	
	<!--content-->
		<div class="content">
			<div class="cart-items">
				@if(count($carrito))
				<div class="container">
				<p style="text-align: center;">
					<a href="vaciar" class="btn btn-danger tittle">
						Vaciar Carrito   <span></span><i class="fa fa-trash-o"></i>
					</a>
				</p>


				<br>
					 <h2>Mi Carrito de Compras ({{count($carrito)}})</h2>
						<script>$(document).ready(function(c) {
							$('.close1').on('click', function(c){
								$('.cart-header').fadeOut('slow', function(c){
									$('.cart-header').remove();
								});
								});	  
							});
					   </script>
					
							@foreach($carrito as $items)
							 <div class="cart-header">
								 <a href="delete/{{$items->url}}" class="closenew"> </a>
								 <div class="cart-sec simpleCart_shelfItem">
										
										<?php $var = $items->idProductos;?>
											
												
												@foreach($imgproductos as $imgproducto)	
													<?php $var2 = $imgproducto->idProductos; ?>
														
														@if($var2==$var)

														<div class="cart-item cyc">
											 			<img src="../complementos/images/{{$imgproducto->imagen}}" class="img-responsive" alt="">
														</div>
														@break
													@endif

													@endforeach	

									   <div class="cart-item-info">
										<h3><a href="#"> {{$items->nombre}}</a><span>Descripcion: {{$items->descripcion}}</span></h3>
										<ul class="qty">
											<li><p>Precion: {{number_format($items->precio,2)}}</p></li>
											<li><p>Cantidad: {{$items->cantidad}}</p></li>
										</ul>
											 <div class="delivery">
											 <p>Service Charges : $10.00</p>
											 <span>Sub Total: {{number_format($items->precio * $items->cantidad,2)}}</span>
											 <div class="clearfix"></div>
										</div>	
									   </div>	
									   <input type="number" min="1" max="100"
									   value="{{$items->cantidad}}" id='producto_{{$items->idProductos}}'>
									   
									   <a href="#" class="btn btn-warning btn-update-item"
									   data-href="update/{{$items->url}}"
									   data-id="{{$items->idProductos}}"> <i class="fa fa-refresh"></i></a>


									   <div class="clearfix"></div>
											

								  </div>
							 </div>
							 <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
							 @endforeach

					 <script>$(document).ready(function(c) {
							$('.close2').on('click', function(c){
									$('.cart-header2').fadeOut('slow', function(c){
								$('.cart-header2').remove();
							});
							});	  
							});
					 </script>
					 <h3 style="text-align: center;"><span class="label label-success tittle">
							Total A Pagar: $ {{number_format($total,2)}}
						</span></h3>
						<br><br>
					@else
						<div class="container">
							<br>
							<div  class="tittle m-b-md alert alert-warning">
								<h2 id="h1.-bootstrap-heading" class="tittle btn btn-warning btn-block">No Hay Productos en el Carrito</h2>
													
							</div>	
						</div>
					@endif
						
					<p style="text-align: center;">
					<a href="/" class="btn btn-primary ">
						<i class="fa fa-home"></i><span></span>Seguir Comprando   
					</a>

					<a href="/" class="btn btn-success ">
						<i class="fa fa-home"></i><span></span>Confirmar Compra  
					</a>
				</p>


				</div>
			</div>
	<!-- checkout -->	
		</div>




@stop