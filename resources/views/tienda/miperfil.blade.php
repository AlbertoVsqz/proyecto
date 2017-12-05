@extends('tienda.plantillaproducto2')

@section('content')
	
	<!--content-->
		<div class="content">
				<!--login-->
			<div class="login">
		<div class="main-agileits grid_3 grid_5">
				<div class="form-w3agile form1 register-box ">
				@if(count($errors)>0)
					@foreach($errors->all() as $error)
						<p class="alert alert-danger">{{$error}}</p>
					@endforeach
				@endif
					<h3>Mi Perfil</h3>
					<form action="miperfil" method="post">
						<div class="col-md-12">
					{{csrf_field()}}

						@foreach($user as $us)
						<label>Correo Electronico:</label>
						<div class="key">

							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="{{$us->email}}" name="email" placeholder="Email">
							<div class="clearfix"></div>
						</div>
						
						
						<label>Nombre:</label>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="{{$us->name}}" name="name" placeholder="Ingrese su Nombre">
							<div class="clearfix"></div>
						</div>
						<label>Apellidos:</label>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="{{$us->apellido}}" name="apellido" placeholder="Ingrese su Apellido">
							<div class="clearfix"></div>
						</div>
						<label>Telefono</label>
						<div class="key">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<input  type="text" value="{{$us->telefono}}" name="telefono" placeholder="Escriba su Telefono">
							<div class="clearfix"></div>
						</div>
						<label>Direccion: </label>
						<div class="key">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<input  type="text" value="{{$us->direccion}}" name="direccion" placeholder="Ingrese su Direccion">
							<div class="clearfix"></div>
						</div>
						<label>Pais</label>
						<div class="key">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<input  type="text" value="{{$us->pais}}" name="pais" placeholder="Escriba su Pais">
							<div class="clearfix"></div>
						</div>
						@endforeach
							<input  type="hidden" value="0" name="tipo" >
							<input  type="hidden" value="{{$us->id}}" name="id" >
						</div>
						
						
						<a href="{{route('/')}}" class="btn btn-primary " style="margin-right: 35px; margin-bottom: 10px;">
						<i class="fa fa-home"></i><span></span>Seguir Comprando   
						</a>

						<button class="btn btn-warning " type="submit" style="margin-left: 25px; margin-bottom: 10px;">Actualizar Datos</button>
					</form>
				</div>
				
			</div>
		</div>
				<!--login-->
		</div>
		<!--content-->
	


@stop
