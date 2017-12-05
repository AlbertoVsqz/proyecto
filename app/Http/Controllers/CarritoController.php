<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;
use tienda\Productos;
use tienda\Categoria;
use tienda\SubCategoria;
use tienda\ImgProductos;
use tienda\Promociones;


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
        	$promociones=Promociones::all();

			$carrito = \Session::get('carrito');
			
			//return $carrito;
			$total = $this->total();
			\Session::put('total',$total);
			return view('tienda.carrito',compact('carrito','categorias','subcategorias','imgproductos','total','promociones'));
			
		}

    //Add item
		public function add(Productos $producto){

			//dd($producto);
			$carrito = \Session::get('carrito');
			$producto->cantidad=1;
			$carrito[$producto->url]=$producto;

			\Session::put('carrito',$carrito);
			$total = $this->total();
			\Session::put('total',$total);
			
			
			//dd($total1);
			//return redirect('carrito/show');
			return back()->with('Status','Su Producto Fue Agregado Exitosamente al Carrito');
		}

	public function addpromo(Promociones $promocion){
			$carrito = \Session::get('carrito');
			

			
			$idProducto=$promocion->idProducto;
			$idPromocion=$promocion->idPromociones;
			$precioPromocion=$promocion->precioActual;
			
			$producto=Productos::where('idProductos',$idProducto)->first();
			$producto->cantidad=1;
			$producto->idpromo=$idPromocion;
			$producto->preciopromo=$precioPromocion;
			
			$carrito[$producto->url]=$producto;
			\Session::put('carrito',$carrito);
			
			$total = $this->total();
			\Session::put('total',$total);
			

			
			//dd($carrito);
			//return redirect('carrito/show');
			return back()->with('Status','Su Producto Fue Agregado Exitosamente al Carrito');
		}

		

    //Delete item
		public function delete(Productos $producto){
			$carrito = \Session::get('carrito');

			unset($carrito[$producto->url]);

			\Session::put('carrito',$carrito);

			//return redirect('carrito/show');
			return back()->with('Status','Su Producto Fue Eliminado exitosamente al Carrito');
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
			\Session::forget('total');
		
		return redirect('carrito/show');
		}

		public function vaciarlink(){
			\Session::forget('carrito');
			\Session::forget('total');
		
		return redirect('/');
		}
    //Total
		private function total(){
			$carrito = \Session::get('carrito');
			$total=0;

			foreach ($carrito as $car) {
				if($car->idpromo){
					$total += $car->preciopromo * $car->cantidad;
				}else{
				$total += $car->precio * $car->cantidad;
			}

			}
			return $total;
		}

		public function detalle_orden(){

			if(count(\Session::get('carrito'))<=0) return back()->with('sincarrito','No exite ningun producto en su Carrito');

			$carrito = \Session::get('carrito');
			$total = $this->total();

			$categorias=Categoria::where('estado',1)->get();
        	$subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();
        	$imgproductos=ImgProductos::orderBy('idProductos', 'asc')->get();
        	$promociones=Promociones::all();
        	//return($carrito);
			return view('tienda.detalles-orden', compact('carrito','total','categorias','subcategorias','imgproductos','promociones'));
		}
}
