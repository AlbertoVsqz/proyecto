@extends('tienda.plantilla2')

@section('content')

		<!--content-->
			<div class="content">
				<div class="products-agileinfo">
						<h2 class="tittle">CATALOGO</h2>
					<div class="container">
						<div class="product-agileinfo-grids w3l">
							<div class="col-md-3 product-agileinfo-grid">
								<div class="categories">
									<h3>Categorias</h3>


									<ul class="tree-list-pad">
										<?php $bandera1 = 0; ?>
									@foreach($categorias as $categoria)
									<?php $bandera1=$bandera1+1;?>
										<li><input type="checkbox" checked="checked" id="item-{{$bandera1}}" /><label for="item-{{$bandera1}}"><span></span>{{$categoria->Nombre}}</label>
											<ul>
											@foreach($subcategorias as $subcategoria)
											@if($categoria->idCategoria==$subcategoria->idCategoria)
												<li><a href="products.html">{{$subcategoria->Nombre}}</a></li>

													
												
												@endif	
										@endforeach
										</ul>
										@endforeach

											</li>	
								</ul>
										
									
								</div>
								<div class="price">
									<h3>Price Range</h3>
									<ul class="dropdown-menu6">
										<li>                
											<div id="slider-range"></div>							
											<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
										</li>			
									</ul>
									<script type='text/javascript'>//<![CDATA[ 
									$(window).load(function(){
									 $( "#slider-range" ).slider({
												range: true,
												min: 0,
												max: 9000,
												values: [ 1000, 7000 ],
												slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
												}
									 });
									$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

									});//]]>  

									</script>
									<script type="text/javascript" src="complementos/js/jquery-ui.js"></script>
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
											<a href="single.html"><img class="img-responsive " src="complementos/images/{{$imgproducto->imagen}}" alt=""></a>	
										</div>
										@break
										@endif
												@endforeach


										<div class="recent-right">
											<h6 class="best2"><a href="single.html">{{$promocion->NombrePromocion}}</a></h6>
											<p><del>$ {{number_format($promocion->precioAnterior,2)}}</del> <em class="item_price">${{number_format($promocion->precioActual,2)}}</em></p>
										</div>	


										<div class="clearfix"> </div>
									</div>
								
						@endforeach


									
								</div>
								<div class="brand-w3l">
									<h3>Flitro por Marcas</h3>
									<ul>
									@foreach($marcas as $marca)
										<li><a href="#">{{$marca->Nombre}}</a></li>
									@endforeach
										
									</ul>
								</div>

								
								<div class="cat-img">
									<img class="img-responsive " src="images/45.jpg" alt="">
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
									<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><img src="complementos/images/menu1.png"></a></li>
									<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><img src="complementos/images/menu.png"></a></li>
									</ul>
									<div id="myTabContent" class="tab-content">
										<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
											<div class="product-tab">
												
												<?php $bandera2 = 0; ?>
											@foreach($productos as $producto)
												<?php $var = $producto->idProductos; $bandera2=$bandera2+1;?>

												<div class="col-md-4 product-tab-grid simpleCart_shelfItem">
													<div class="grid-arr">
														<div  class="grid-arrival">
															<figure>		
																<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
																@foreach($imgproductos as $imgproducto)	
																<?php $var2 = $imgproducto->idProductos; ?>
																@if($var2==$var)
																	<div class="grid-img">
																		<img  src="complementos/images/{{$imgproducto->imagen}}" class="img-responsive" alt="">
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
															<h6><a href="single.html">{{$producto->nombre}}</a></h6>
															<span class="size">XL / XXL / S </span>
															<p ><em class="item_price">$ {{number_format($producto->precio,2)}}</em></p>
															<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
															<a href="detalle/{{$producto->url}}" data-text="Add To Cart" class="my-cart-b item_add">Leer Mas</a>
														</div>
													</div>
												</div>

											@if($bandera2==3 || $bandera2 == 6)
												<div class="clearfix"></div>
												</div>
												
												@endif
											@endforeach
												
											</div>
										
										<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
											

											<?php $bandera2 = 0; ?>
											@foreach($productos as $producto)
												<?php $var = $producto->idProductos; $bandera2=$bandera2+1;
														?>
												<div class="product-tab1">
												<div class="col-md-4 product-tab1-grid">
													<div class="grid-arr">
														<div  class="grid-arrival">
															<figure>		
																<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
																@foreach($imgproductos as $imgproducto)	
																<?php $var2 = $imgproducto->idProductos; ?>
																@if($var2==$var)
																	<div class="grid-img">
																		<img  src="complementos/images/{{$imgproducto->imagen}}" class="img-responsive" alt="">
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
														<h6><a href="single.html">{{$producto->nombre}}</a></h6>
														<span class="size">XL / XXL / S </span>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
														<p ><em class="item_price">$ {{number_format($producto->precio,2)}}</em></p>
														<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
													</div>
												</div>
												<div class="clearfix"> </div>
												<hr style="width: 100%; color: black; height: 1px; background-color:black;" />
												

												
											</div>

											@endforeach	

											</div>
											</div>
											</ul>
										</div>
								
							
								</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>

		<!--content-->










@stop