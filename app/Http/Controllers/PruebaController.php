<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;
use tienda\Productos;
use tienda\ImgProductos;
     		 


class PruebaController extends Controller
{
    public function loadArchivo(Request $request)
    {
     
     	if($request->ajax()){
     		$msm = 'hola';
     		
     		 $productos=Productos::where('idProductos',$request['id'])->get();
     		 $imgproductos=ImgProductos::where('idProductos', $request['id'])->take(1)->get();
            //dd($productos);

     		 $msm ='';
     		 foreach ($productos as $producto) {
     		 	foreach ($imgproductos as $imgproducto) {
     		 
     		 $msm .='
     			
							<div class="news-gr">
								<div class="col-md-5 new-grid1">
								<img src="complementos/images/'.$imgproducto->imagen.'" class="img-responsive" alt="">
								</div>
									<div class="col-md-7 new-grid " id="nuevo">
										<h5>'.$producto->nombre.'</h5>
										<h6>DESCRIPCION</h6>
										<span>'.$producto->descripcion.'</span>
										
											
									<div class="women">
										<p ><em class="item_price">$'.number_format($producto->precio,2).'</em></p>
										<div class="add">
										   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="images/of2.png">Add to Cart</button>
										   <a href="detalle/'.$producto->url.'" data-text="leer Mas" class="my-cart-b item_add">Leer Mas</a>
										   
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
					
					';
				}
			}




           return $msm;
     	}       
           
            
      
    } 

	

}
?>
