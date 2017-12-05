@extends('tienda.plantillaproducto2')

@section('content')

	<div class="new-arrivals-w3agile">
		<div class="container">
						<h2 class="tittle"><i class="fa fa-shopping-cart"></i>  DETALLES DEL PEDIDO</h2>
					

			<div class="arrivals-grids">
				<div class=" main-agileits">
					<div class="col-md-12 simpleCart_shelfItem form-w3agile table-responsive">
					
					
						<h3>Datos del Usuario</h3>
						<table class="table table-striped table-hover table-bordered" >
							<tr><th>Nombre:</th><td>{{Auth::user()->name ." ". Auth::user()->apellido}}</td></tr>
							<tr><th>Usuario:</th><td>{{Auth::user()->usuario}}</td></tr>
							<tr><th>Correo:</th><td>{{Auth::user()->email}}</td></tr>
							<tr><th>Telefono:</th><td>{{Auth::user()->telefono}}</td></tr>
							<tr><th>Direccion:</th><td>{{Auth::user()->direccion}}</td></tr>
							<tr><th>Pais:</th><td>{{Auth::user()->pais}}</td></tr>
							
							
							
						</table>

						<div class="clearfix"></div>
						
					
					<br>
					<h3>Datos del Pedido</h3>
					<table class="table table-striped table-hover table-bordered">
						<tr>
							<th>Producto</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Subtotal</th>
							
						</tr>
						@foreach($carrito as $items)
							<tr>
								<td>{{$items->nombre}}</td>
								@if($items->idpromo)
								<td>{{number_format($items->preciopromo,2)}}</td>
								@else
									<td>{{number_format($items->precio,2)}}</td>
								@endif
									<td>{{$items->cantidad}}</td>
								@if($items->idpromo)
									<td>{{number_format($items->preciopromo * $items->cantidad,2)}}</td>
								@else
									<td>{{number_format($items->precio * $items->cantidad,2)}}</td>
								@endif

							</tr>


						@endforeach
						
						
					</table>
					</div>
						<br>
						<br>
							<h3 style="text-align: center;"><span class="label label-success tittle">
							Total A Pagar: $ {{number_format($total,2)}}
							</span></h3>
						<br><br>

						<div class="clearfix"></div>
							
						
							<p style="text-align: center;">
								<a href="{{route('/')}}" class="btn btn-primary ">
									<i class="fa fa-home"></i><span>  </span>Seguir Comprando   
								</a>
								<br>
								<br>
								<h3>Seleccione el Metodo de Pago</h3><br>
								<a href="{{route('/')}}/payment" class="btn btn-success " style="margin-right: 15px; margin-bottom: 5px;">
									<span></span>Pagar con Paypal<i class="fa fa-paypal" aria-hidden="true"></i>
								</a>


								<a href="{{route('/')}}/paybank" class="btn btn-success " style="margin-right:  15px; margin-bottom: 5px;">
									<span></span>Pagar Transaccion Bancaria<i class="fa fa-paypal" aria-hidden="true"></i>
								</a>
								<a href="{{route('/')}}/reservar" class="btn btn-success " style="margin-right:  15px; margin-bottom: 5px;">
									<span></span>Reservar Productos<i class="fa fa-paypal" aria-hidden="true"></i>
								</a>
							</p>
						<div class="clearfix"></div>

					</div>
				</div>
				<div class="clearfix"></div>
			</div>

	</div>
<div class="clearfix"></div>


<br><br>

@stop