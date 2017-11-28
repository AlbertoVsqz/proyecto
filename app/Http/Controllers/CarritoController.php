<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;
use tienda\Productos;
use tienda\Categoria;
use tienda\SubCategoria;
use tienda\ImgProductos;

class CarritoController extends Controller
{
	public function __construct(){
		if(!\Session::has('carrito'))\Session::put('carrito',array());
		if(!\Session::has('total'))\Session::put('total',array());

	}

    //show Carrito
		public function show(){
			$categorias=Categoria::where('estado',1)->get();
        	$subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();
        	$imgproductos=ImgProductos::orderBy('idProductos', 'asc')->get();

			$carrito = \Session::get('carrito');
			
			//return $carrito;
			$total = $this->total();
			\Session::put('total',$total);
			return view('tienda.carrito',compact('carrito','categorias','subcategorias','imgproductos','total'));
			
		}

    //Add item
		public function add(Productos $producto){
			$carrito = \Session::get('carrito');
			$producto->cantidad=1;
			$carrito[$producto->url]=$producto;

			

			\Session::put('carrito',$carrito);
			
			//dd($total1);
			return redirect('carrito/show');
		}

		

    //Delete item
		public function delete(Productos $producto){
			$carrito = \Session::get('carrito');

			unset($carrito[$producto->url]);

			\Session::put('carrito',$carrito);

			return redirect('carrito/show');
		}

    //Update item

		public function update( Productos $producto, $cant)
		{
			$carrito = \Session::get('carrito');
			$carrito[$producto->url]->cantidad= $cant;
			\Session::put('carrito',$carrito);
			return redirect('carrito/show');
		}

    //Trash Carrit
		public function vaciar(){
			\Session::forget('carrito');
		
		return redirect('carrito/show');
		}
    //Total
		private function total(){
			$carrito = \Session::get('carrito');
			$total=0;

			foreach ($carrito as $car) {
				$total += $car->precio * $car->cantidad;

			}
			return $total;
		}
}
