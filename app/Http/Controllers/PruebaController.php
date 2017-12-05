<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;
use tienda\Productos;
use tienda\ImgProductos;
use tienda\Promociones;
use tienda\Categoria;
use tienda\SubCategoria;
use tienda\Marcas;
use tienda\Mail\UserMail;

use Illuminate\Support\Facades\Mail;




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
										   <a href="detalle/promo/'.$producto->url.'" data-text="leer Mas" class="my-cart-b item_add">Leer Mas</a>
										   
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

    public function busqueda(Request $request) {
    	$categorias=Categoria::where('estado',1)->get();
        	$subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();
        	$imgproductos=ImgProductos::orderBy('idProductos', 'asc')->get();
        	$promociones=Promociones::all();
        	$marcas=Marcas::where('estado',1)->get();
  
    	//dd($request->Search);
    	  $query = $request->Search;

		$messages = Productos::where('nombre','LIKE','%' . $query . '%')->orwhere('descripcion','LIKE','%' . $query . '%')->get();

		$messages2 = Promociones::where('NombrePromocion','LIKE','%' . $query . '%')->orwhere('url','LIKE','%' . $query . '%')->get();
		//dd($messages, $messages2);
		if(count($messages)>0 && count($messages2)>0){
			//dd($messages, $messages2);	
			return view('tienda.resultado', compact('messages','messages2','total','categorias','subcategorias','imgproductos','promociones','marcas','query'));
		}
		if(count($messages)>0 || count($messages2)>0){
			//return $messages;
			return view('tienda.resultado', compact('messages','messages2','total','categorias','subcategorias','imgproductos','promociones','marcas','query'));
		}
		
		\Session::flash('Nofind',"No se encontraron Resultados :(");
		
		
		return view('tienda.resultado', compact('messages','messages2','total','categorias','subcategorias','imgproductos','promociones','marcas','query'));
	
		

		

		
    }


     public function enviarmail(){
     	$carrito = \Session::get('carrito');
     	//dd($carrito);
        $content="pueba";
        $title="titulo";
        Mail::to('albert.avm2010@gmail.com')->send(new UserMail($content,$title));
     	
     	

    }



	

}
?>
