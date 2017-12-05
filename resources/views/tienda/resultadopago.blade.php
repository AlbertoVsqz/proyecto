
@extends('tienda.plantillaproducto2')

@section('content')

		<div class="new-arrivals-w3agile">
		<div class="container">
						<h2 class="tittle"><i class="fa fa-shopping-cart"></i>  NOTIFICACION DEL PEDIDO</h2>
					

			<div class="arrivals-grids">
				<div class=" main-agileits">
					<div class="col-md-12 simpleCart_shelfItem form-w3agile">
					<p>
						<h2>Su Pedido ha sido recibido</h2>
						<br><br>

						<h1 class="tittle">¡Gracias por su Compra!</h1>
						<br>
						<br>
						<br>
						<h4>Recibiras un correo con los detalle de tu orden.<br>
						<br>Tu pedido aun no ha sido procesado, nos estaremos contactando en las proximas horas contigo.<br><br>Puedes comunicarte con nostros al (503)2133-0100 o al correo soporte_sv@empresa.com</h4>

					</p>
						<br><br>
					<a href="{{route('/')}}" class="btn btn-primary ">
						<i class="fa fa-home"></i><span></span>Seguir Comprando   
					</a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>


@stop