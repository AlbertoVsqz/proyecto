@extends('tienda.plantillaproducto2')

@section('content')



	<!--content-->
		<div class="content">
				<!--login-->
			<div class="login">
				<div class="main-agileits">
					<div class="form-w3agile">
						<h3>Login</h3>
						
						<form action="login" method="post">
							{{csrf_field()}}
							<div class="key  {{$errors->has('usuario') ? 'has-error' :''}}">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<input  type="text" value="{{old('usuario')}}" name="usuario" placeholder="Escriba su Nombre de Usuario">
								

								<div class="clearfix"></div>
							</div>
							{!! $errors->first('usuario','<span class="help-block">:message</span>')!!}
							
							<div class="key  {{$errors->has('password') ? 'has-error' : ''}}">
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input  type="password" value="" name="password" placeholder="Escriba su Contraseña" >
								

								<div class="clearfix"></div>
							</div>
							{!! $errors->first('password','<span class="help-block">:message</span>')!!}
							<input type="submit" value="Login">
						</form>

					</div>
					<div class="forg">
						
						<a href="{{route('/')}}/registro" class="forg-right">Register</a>
					<div class="clearfix"></div>
					</div>
				</div>
			</div>
				<!--login-->
		</div>
		<!--content-->



@stop
