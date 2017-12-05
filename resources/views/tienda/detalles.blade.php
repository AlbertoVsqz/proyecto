@extends('tienda.plantillaproducto2')

@section('content')




<div class="content">
			<!--single-->
			<div class="single-wl3">
				<div class="container">
					<div class="single-grids">
						<div class="col-md-9 single-grid">
							@if(count($productos)>0)
							<div clas="single-top">

								<div class="single-left">

									<div class="flexslider">
									<ul class="slides">
							
							<?php $bandera2 = 0; ?>

							@foreach($productos as $producto)
								<?php $vart = $producto->idProductos; $bandera2=$bandera2+1;?>
									
										
										@foreach($imgproductos as $imgproducto)	
											<?php $var2 = $imgproducto->idProductos; ?>
												
												@if($var2==$vart)

											<li data-thumb="{{route('/')}}/complementos/images/{{$imgproducto->imagen}}">
												<div class="thumb-image"> <img src="{{route('/')}}/complementos/images/{{$imgproducto->imagen}}" data-imagezoom="true" class="img-responsive"> </div>
											</li>
											
											@endif
											
										@endforeach
									
										
									
									</ul>
								</div>
								</div>

								<div class="single-right simpleCart_shelfItem">
									<h4>{{$producto->nombre}}</h4>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<p class="price item_price">$ {{number_format($producto->precio,2)}}</p>
									<div class="description">
										<p><span>Descripcion : </span>{{$producto->descripcion}}</p>
									</div>
									
									@endforeach
									<br>
									<br>
									<div class="women">
										
										<a href="{{route('/')}}/carrito/add/{{$producto->url}}" data-text="Add To Cart" class="my-cart-b item_add">Agregar al Carrito</a>
									</div>
									<div class="social-icon">
										<a href="#"><i class="icon"></i></a>
										<a href="#"><i class="icon1"></i></a>
										<a href="#"><i class="icon2"></i></a>
										<a href="#"><i class="icon3"></i></a>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>

							@endif


							@if(count($productospromo)>0)
							<div clas="single-top">

								<div class="single-left">

									<div class="flexslider">
									<ul class="slides">
							<?php $bandera2 = 0; ?>

							@foreach($productospromo as $producto)
								<?php $vart = $producto->idProducto; $bandera2=$bandera2+1;?>
									
										
										@foreach($imgproductos as $imgproducto)	
											<?php $var2 = $imgproducto->idProductos; ?>
												
												@if($var2==$vart)

											<li data-thumb="../complementos/images/{{$imgproducto->imagen}}">
												<div class="thumb-image"> <img src="{{route('/')}}/complementos/images/{{$imgproducto->imagen}}" data-imagezoom="true" class="img-responsive"> </div>
											</li>
											
											@endif
											
										@endforeach
									
										
									
									</ul>
								</div>
								</div>

								<div class="single-right simpleCart_shelfItem">
									<h4>{{$producto->NombrePromocion}}</h4>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<p ><del>$ {{number_format($producto->precioAnterior,2)}}</del> <em class="item_price">$ {{number_format($producto->precioActual,2)}}</em></p>
									<div class="description">
										<p><span>Descripcion : </span>{{$producto->descripcion}}</p>
									</div>
									
									@endforeach
									<br>
									<br>
									<div class="women">
										
										<a href="{{route('/')}}/carrito/promo/add/{{$producto->url}}" data-text="Add To Cart" class="my-cart-b item_add">Agregar al Carrito</a>
									</div>
									<div class="social-icon">
										<a href="#"><i class="icon"></i></a>
										<a href="#"><i class="icon1"></i></a>
										<a href="#"><i class="icon2"></i></a>
										<a href="#"><i class="icon3"></i></a>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>



							@endif



						</div>
						<div class="col-md-3 single-grid1">
							<h3>PRODUCTOS RECIENTES</h3>
							
								<?php $bandera2 = 0; ?>
							@foreach($productosnuevos as $productonuevo)
								<?php $var = $productonuevo->idProductos; $bandera2=$bandera2+1;?>
									<div class="recent-grids">
										
										@foreach($imgn  as $imgproducton)	
											<?php $var2 = $imgproducton->idProductos; ?>
												
												@if($var2==$var)
										<div class="recent-left">
											<a href="{{route('/')}}/detalle/{{$productonuevo->url}}"><img class="img-responsive " src="{{route('/')}}/complementos/images/{{$imgproducton->imagen}}" alt=""></a>	
										</div>
										@break
										@endif

										@endforeach
								<div class="recent-right">
									<h6 class="best2"><a href="{{route('/')}}/detalle/{{$productonuevo->url}}">{{$productonuevo->nombre}}</a></h6>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<span class=" price-in1"> $ {{number_format($productonuevo->precio,2)}}</span>
								</div>	
								<div class="clearfix"> </div>
							</div>
							@endforeach

							
						</div>
						<div class="clearfix"> </div>
					</div>
					<!--Product Description-->
						<div class="product-w3agile">
							<h3 class="tittle1">Product Description</h3>
							<div class="product-grids">
								<div class="col-md-4 product-grid">
								<h3>PROMOCIONES</h3>
								<br>
									<div id="owl-demo" class="owl-carousel">
										<div class="item">
											<?php $bandera1 = 0; ?>
												@foreach($promociones as $promocion)
														<?php $var = $promocion->idProducto; $bandera1=$bandera1+1;?>
											<div class="recent-grids">
												@foreach($imgn as $imgproducto)	
												<?php $var2 = $imgproducto->idProductos; ?>
													@if($var2==$var)
												<div class="recent-left">
													<a href="{{route('/')}}/detalle/promo/{{$promocion->url}}"><img class="img-responsive " src="{{route('/')}}/complementos/images/{{$imgproducto->imagen}}" alt=""></a>	
												</div>
												@break
												@endif
												@endforeach
												<div class="recent-right">
													<h6 class="best2"><a href="{{route('/')}}/detalle/promo/{{$promocion->url}}">{{$promocion->NombrePromocion}}</a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"><del>$ {{number_format($promocion->precioAnterior,2)}}</del> <em class="item_price">${{number_format($promocion->precioActual,2)}}</em></span>
												</div>	
												<div class="clearfix"> </div>
											</div>
											@endforeach

										</div>
										




										</div>
									</div>
									<img class="img-responsive " src="{{route('/')}}/images/woo2.jpg" alt="">
								</div>
								<div class="col-md-8 product-grid1">
									<div class="tab-wl3">
										<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
											<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
												<li role="presentation"><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Comentarios ({{count($comentario)}})</a></li>

											</ul>
											<div id="myTabContent" class="tab-content">
												
												<div role="tabpanel" class="tab-pane fade in active" id="reviews" aria-labelledby="reviews-tab">
													<div class="descr">
													@if(count($comentario)>0)
													@foreach($comentario as $coment)
														<div class="reviews-top">
															<div class="reviews-left">
																<img src="{{route('/')}}/complementos/images/men3.jpg" alt=" " class="img-responsive">
															</div>

															<div class="reviews-right">
																<ul>
																	<li><a href="#">{{$coment->nombre}}</a></li>
																	
																</ul>
																<p class="quote">{{$coment->Comentario}}</p>
															</div>
															<div class="clearfix"></div>

														</div>
														<br>
														<br>
														@endforeach

													@else
															 <div class="">
																	<br>
																
																		<h3 style="text-align: center;"><span class="label label-success tittle">No Se encontraron Comentarios, Se de los primeros en dar tu Opinion!!!</span></h3>				
																
															</div>
														@endif
														<div class="reviews-bottom">
															<h4>Agregar Comentarios</h4>
															<p>Su dirección de correo electrónico no será publicada. Los campos obligatorios están marcados *</p>
															
															@if(Auth::check())
															
															<form action="{{route('/')}}/addcomentario" method="get">
															{{csrf_field()}}
																<label>Tu Comentario *</label>
																<textarea type="text" Name="Comentario" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Comentario...</textarea>
																<div class="row">
																	<div class="col-md-6 row-grid">
																		<label>Nombre *</label>
																		<input type="text" value="Nombre" Name="nombre" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nombre';}" required="">
																	</div>
																	<div class="col-md-6 row-grid">
																		<label>Email *</label>
																		<input type="email" value="Email" Name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
																	</div>
																	<input  type="hidden" value="1" name="estado" >
																	<input  type="hidden" value="{{Auth::user()->id}}" name="idCliente" >
																	<input  type="hidden" value="{{$vart}}" name="idProducto" >
																	<div class="clearfix"></div>
																</div>
																<input type="submit" value="SEND">
															</form>
															@else
															<div>
																<br>
																<div  class=" m-b-md alert alert-warning">
																	<h3 style="text-align: center;"><span class="label label-success tittle">Para Agregar Comentarios se tiene que <a href="{{route('/')}}/login" >Iniciar Sesion</a> o <a href="{{route('/')}}/registro" >Registrarse</a>
																	
																</span></h3>
																						
																</div>	
															</div>
															@endif

														</div>
													</div>
												</div>
												<div role="tabpanel" class="tab-pane fade" id="custom" aria-labelledby="custom-tab">
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					<!--Product Description-->
				</div>
			</div>
			<!--single-->
			<div class="new-arrivals-w3agile">
					<div class="container">
						<h3 class="tittle1">Best Sellers</h3>
						<div class="arrivals-grids">
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="{{route('/')}}/images/p28.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{route('/')}}/images/p27.jpg" class="img-responsive"  alt="">
												</div>			
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
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="{{route('/')}}/images/p30.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{route('/')}}/images/p29.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben2">
										<p>OUT OF STOCK</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="i{{route('/')}}/mages/s2.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{route('/')}}/images/s1.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="images/s4.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="images/s3.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!--new-arrivals-->
		</div>






@stop