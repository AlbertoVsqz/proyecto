@extends('tienda.plantilla2')

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
					<h3>Registro</h3>
					<form action="registro" method="post">
						<div class="col-md-6">
					{{csrf_field()}}

						
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="{{old('email')}}" name="email" placeholder="Email">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="{{old('usuario')}}" name="usuario" placeholder="Ingrese su Usuario">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="" name="password" placeholder="Password";  >
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="" name="password_confirmation" placeholder="Confirmacion Password" >
							<div class="clearfix"></div>
						</div>
						</div>
						<div class="col-md-6">
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="{{old('name')}}" name="name" placeholder="Ingrese su Nombre">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="{{old('apellido')}}" name="apellido" placeholder="Ingrese su Apellido">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<input  type="text" value="{{old('telefono')}}" name="telefono" placeholder="Escriba su Telefono">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<input  type="text" value="{{old('direccion')}}" name="direccion" placeholder="Ingrese su Direccion">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<input  type="text" value="{{old('pais')}}" name="pais" placeholder="Escriba su Pais">
							<div class="clearfix"></div>
						</div>
							<input  type="hidden" value="0" name="tipo" >
						</div>
						
						<button class="btn btn-warning btn-block" type="submit">Registrarse</button>
					</form>
				</div>
				
			</div>
		</div>
				<!--login-->
		</div>
		<!--content-->
	


@stop
