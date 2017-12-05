
@extends('tienda.plantillaproducto2')

@section('content')

		<!--content-->
			<div class="content">
				<!--contact-->
					<div class="mail-w3ls">
						<div class="container">
							<h2 class="tittle">Mail Us</h2>
							<div class="mail-grids">
								<div class="mail-top">
									<div class="col-md-4 mail-grid">
										<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
										<h5>Direccion</h5>
										<p>9th floor - Palace Building - 221B Walk of Fame - USA</p>
									</div>
									<div class="col-md-4 mail-grid">
										<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
										<h5>Telefono</h5>
										<p>Telephone:  +1 800 603 6035</p>
									</div>
									<div class="col-md-4 mail-grid">
										<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
										<h5>E-mail</h5>
										<p>E-mail:<a href="mailto:example@mail.com"> example@mail.com</a></p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="map-w3">

								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d62078.85301817377!2d-88.2041089142017!3d13.478514874230315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ssv!4v1512451070856"  allowfullscreen></iframe>

								
								

								</div>
								<div class="mail-bottom">
									<h4>Pongase en Contacto con Nosotros</h4>
									@if(count($errors)>0)
										@foreach($errors->all() as $error)
											<p class="alert alert-danger">{{$error}}</p>
										@endforeach
									@endif
									<form action="formcontacto" method="post">
									{{csrf_field()}}
										<input type="text" name="nombre" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
										<input type="email" name = "email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
										<input type="text" name="telefono" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
										<textarea type="text" name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
										<input type="submit" value="Enviar" >
										<input type="reset" value="Limpiar" >

									</form>
								</div>
							</div>
						</div>
					</div>
				<!--contact-->
			</div>
		<!--content-->




@stop