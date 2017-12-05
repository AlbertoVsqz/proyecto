@extends('tienda.plantillaproducto2')

@section('content')

		<!--content-->
			<div class="content">
				<div class="products-agileinfo">
						<h2 class="tittle">CATALOGO</h2>
					<div class="container">
						<div class="product-agileinfo-grids w3l">
							<div class="col-md-3 product-agileinfo-grid">
								<div class="categories">
									<h3>Filtro por Categorias</h3>


									<ul class="tree-list-pad">
										<?php $bandera1 = 0; ?>
									@foreach($categorias as $categoria)
									<?php $bandera1=$bandera1+1;?>
										@if($categoria->idCategoria=="1")
										
										@else
										<li><input type="checkbox" checked="checked" id="item-{{$bandera1}}" /><label for="item-{{$bandera1}}"><span></span>{{$categoria->Nombre}}</label>
										@endif
											<ul>
											@foreach($subcategorias as $subcategoria)
											@if($categoria->idCategoria==$subcategoria->idCategoria)
												<li><a class="btn-show"
									   data-href="{{route('/')}}/productos/subcategoria/{{$subcategoria->url}}"><h6> {{$subcategoria->Nombre}}</h6></a></li>

													
												
												@endif	
										@endforeach
										</ul>
										@endforeach

											</li>	
								</ul>
										
									
								</div>
								

								<div class="brand-w3l">
									<h3>Flitro por Marcas</h3>
									<ul>
									@foreach($marcas as $marca)
										<li><a href="{{route('/')}}/productos/marcas/{{$marca->url}}">{{$marca->Nombre}}</a></li>
									@endforeach
										
									</ul>
								</div>

								<div class="top-rates">
									<h3>Promociones</h3>
										<?php $bandera3 = 0; ?>
											@foreach($promociones as $promocion)
										<?php $var = $promocion->idProducto; $bandera3=$bandera3+1;?>

									<div class="recent-grids">
									@foreach($imgproductos as $imgproducto)	
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
											<p><del>$ {{number_format($promocion->precioAnterior,2)}}</del> <em class="item_price">${{number_format($promocion->precioActual,2)}}</em></p>
										</div>	


										<div class="clearfix"> </div>
									</div>
								
						@endforeach


									
								</div>
								
								
								<div class="cat-img">
									<img class="img-responsive " src="{{route('/')}}/images/45.jpg" alt="">
								</div>
							</div>

							<div class="col-md-9 product-agileinfon-grid1 w3l">
								<!--<div class="product-agileinfon-top">
									<div class="col-md-6 product-agileinfon-top-left">
										<img class="img-responsive " src="images/img1.jpg" alt="">
									</div>
									<div class="col-md-6 product-agileinfon-top-left">
										<img class="img-responsive " src="images/img2.jpg" alt="">
									</div>
									<div class="clearfix"></div>
								</div>
								
								<div class="mens-toolbar">
									<p >Showing 1–9 of 21 results</p>
									 <p class="showing">Sorting By
										<select>
											  <option value=""> Name</option>
											  <option value="">  Rate</option>
												<option value=""> Color </option>
												<option value=""> Price </option>
										</select>
									  </p> 
									  <p>Show
										<select>
											  <option value=""> 9</option>
											  <option value="">  10</option>
												<option value=""> 11 </option>
												<option value=""> 12 </option>
										</select>
									  </p>
									<div class="clearfix"></div>		
								</div>-->
								<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
									<ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
										<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
									<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><img src="{{route('/')}}/complementos/images/menu1.png"></a></li>
									<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><img src="{{route('/')}}/complementos/images/menu.png"></a></li>
									</ul>

									<div id="myTabContent" class="tab-content">
									@if(count($promocionespro)>0)

									  	<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
											<div class="product-tab">
												
											<?php $bandera2 = 0; ?>
											@foreach($promocionespro as $producto)
												<?php $var = $producto->idProducto; $bandera2=$bandera2+1;?>

												<div class="col-md-4 product-tab-grid simpleCart_shelfItem">
													<div class="grid-arr">
														<div  class="grid-arrival">
															<figure>		
																<a href="{{route('/')}}/detalle/{{$producto->url}}" class="new-gri" data-toggle="modal" data-target="#myModal1">
															@foreach($imgproductos as $imgproducto)	
																<?php $var2 = $imgproducto->idProductos; ?>
																@if($var2==$var)
																	<div class="grid-img">
																		<img  src="{{route('/')}}/complementos/images/{{$imgproducto->imagen}}" class="img-responsive" alt="">
																	</div>
																@endif
															@endforeach	
																</a>		
															</figure>	
														</div>
														<div class="ribben">
															<p>NUEVO</p>
														</div>
														<div class="ribben1">
															<p>OFERTA</p>
														</div>
														<div class="women">
															<h6><a href="{{route('/')}}/detalle/{{$producto->url}}">{{$producto->NombrePromocion}}</a></h6>
															
															<p ><span class=" price-in1"><del>$ {{number_format($promocion->precioAnterior,2)}}</del> <em class="item_price">${{number_format($promocion->precioActual,2)}}</em></span></p>
															<a href="{{route('/')}}/carrito/promo/add/{{$producto->url}}" data-text="" class="my-cart-b item_add">Agregar al Carrito</a>
															<br><br>
															<a href="{{route('/')}}/detalle/{{$producto->url}}" data-text="Add To Cart" class="my-cart-b item_add">Leer Mas</a>
														</div>
													</div>
												</div>
													@if($bandera2==3)
													<div class="clearfix"> </div>
													<br>
													@endif

												@endforeach
												<div class="clearfix"> </div>
												
											</div>

											
											
										</div>
										<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
											<div class="product-tab1">
												<?php $bandera2 = 0; ?>
											@foreach($promociones as $producto)
												<?php $var = $producto->idProducto; $bandera2=$bandera2+1;?>

												<div class="col-md-4 product-tab1-grid">
													<div class="grid-arr">
														<div  class="grid-arrival">
															<figure>		
																<a href="{{route('/')}}/detalle/{{$producto->url}}" class="new-gri" data-toggle="modal" data-target="#myModal1">
																	@foreach($imgproductos as $imgproducto)	
																<?php $var2 = $imgproducto->idProductos; ?>
																@if($var2==$var)

																	<div class="grid-img">
																		<img  src="{{route('/')}}/complementos/images/{{$imgproducto->imagen}}" class="img-responsive" alt="">
																	</div>
																	@endif
															@endforeach			
																</a>		
															</figure>	
														</div>
													</div>
												</div>
												<div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="{{route('/')}}/detalle/{{$producto->url}}">{{$producto->NombrePromocion}}</a></h6>
														
														<p>{{$producto->desripcion}}</p>
														<p ><em class="item_price">Precio: ${{$producto->precio}}</em></p>
														<a href="{{route('/')}}/carrito/add/{{$producto->url}}" data-text="Add To Cart" class="">Agregar al Carrito</a>
														<br><br>
															<a href="{{route('/')}}/detalle/{{$producto->url}}" data-text="Add To Cart" class="">Leer Mas</a>
													</div>
												</div>
												<div class="clearfix"></div>
												<hr style="width: 100%; color: black; height: 1px; background-color:black;" />
											@endforeach
											</div>
											
											
										</div>


									@endif

									@if(count($productos)>0)
									
										<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
											<div class="product-tab">
												
											<?php $bandera2 = 0; ?>
											@foreach($productos as $producto)
												<?php $var = $producto->idProductos; $bandera2=$bandera2+1;?>

												<div class="col-md-4 product-tab-grid simpleCart_shelfItem">
													<div class="grid-arr">
														<div  class="grid-arrival">
															<figure>		
																<a href="{{route('/')}}/detalle/{{$producto->url}}" class="new-gri" data-toggle="modal" data-target="#myModal1">
															@foreach($imgproductos as $imgproducto)	
																<?php $var2 = $imgproducto->idProductos; ?>
																@if($var2==$var)
																	<div class="grid-img">
																		<img  src="{{route('/')}}/complementos/images/{{$imgproducto->imagen}}" class="img-responsive" alt="">
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
															<h6><a href="{{route('/')}}/detalle/{{$producto->url}}">{{$producto->nombre}}</a></h6>
															
															<p ><em class="item_price">Precio: $ {{$producto->precio}}</em></p>
															<a href="{{route('/')}}/carrito/add/{{$producto->url}}" data-text="" class="my-cart-b item_add">Agregar al Carrito</a>
															<br><br>
															<a href="{{route('/')}}/detalle/{{$producto->url}}" data-text="Add To Cart" class="my-cart-b item_add">Leer Mas</a>
														</div>
													</div>
												</div>
													@if($bandera2==3)
													<div class="clearfix"> </div>
													<br>
													@endif

												@endforeach
												<div class="clearfix"> </div>
												
											</div>

											
											
										</div>
										<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
											<div class="product-tab1">
												<?php $bandera2 = 0; ?>
											@foreach($productos as $producto)
												<?php $var = $producto->idProductos; $bandera2=$bandera2+1;?>

												<div class="col-md-4 product-tab1-grid">
													<div class="grid-arr">
														<div  class="grid-arrival">
															<figure>		
																<a href="{{route('/')}}/detalle/{{$producto->url}}" class="new-gri" data-toggle="modal" data-target="#myModal1">
																	@foreach($imgproductos as $imgproducto)	
																<?php $var2 = $imgproducto->idProductos; ?>
																@if($var2==$var)

																	<div class="grid-img">
																		<img  src="{{route('/')}}/complementos/images/{{$imgproducto->imagen}}" class="img-responsive" alt="">
																	</div>
																	@endif
															@endforeach			
																</a>		
															</figure>	
														</div>
													</div>
												</div>
												<div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="{{route('/')}}/detalle/{{$producto->url}}">{{$producto->nombre}}</a></h6>
														
														<p>{{$producto->desripcion}}</p>
														<p ><em class="item_price">Precio: ${{$producto->precio}}</em></p>
														<a href="{{route('/')}}/carrito/add/{{$producto->url}}" data-text="Add To Cart" class="">Agregar al Carrito</a>
														<br><br>
															<a href="{{route('/')}}/detalle/{{$producto->url}}" data-text="Add To Cart" class="">Leer Mas</a>
													</div>
												</div>
												<div class="clearfix"></div>
												<hr style="width: 100%; color: black; height: 1px; background-color:black;" />
											@endforeach
											</div>
											
											
										</div>
									
									@endif
									@if(count($productos)==null && count($promocionespro)==null)
										<div class="">
											<br>
											<div  class="tittle m-b-md alert alert-warning">
												<h2 id="h1.-bootstrap-heading" class="tittle btn btn-warning btn-block">No Se encontraron productos en esta filtro!!!<br><br>
												Intente con otra</h2>
																	
											</div>	
										</div>
									@endif
								</div>
								</div>
								
								
							
								</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>

		<!--content-->










@stop