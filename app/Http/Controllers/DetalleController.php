<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;
use tienda\Categoria;
use tienda\SubCategoria;
use tienda\Marcas;
use tienda\Productos;
use tienda\ImgProductos;
use tienda\Promociones;

class DetalleController extends Controller
{
    public function index()
    {
    	$categorias=Categoria::where('estado',1)->get();
    	$subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();
    	$marcas=Marcas::where('estado',1)->get();
    	$productos=Productos::all();
    	$imgproductos=ImgProductos::orderBy('idProductos', 'asc')->get();
    	$promociones=Promociones::all();
    	//return view('tienda.detalle',compact('categorias','subcategorias','marcas','productos','imgproductos','promociones'));
	}

	public function show($slug){
		//dd($slug);
		$categorias=Categoria::where('estado',1)->get();
    	$subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();
    	$marcas=Marcas::where('estado',1)->get();
    	
    	$productos = Productos::where('url',$slug)->get();
    	foreach ($productos as $producto) {
    		$id = $producto->idProductos;
    	}
    	$imgproductos=ImgProductos::orderBy('idProductos', 'asc')->where('idProductos',$id)->get();

        $productosnuevos=Productos::orderBy('existencias','desc')->take(2)->get();
        $imgn=ImgProductos::orderBy('idProductos', 'asc')->get();
        $promociones=Promociones::all();
		//dd($imgn);

		return view('tienda.detalles',compact('productos','categorias','subcategorias','imgproductos','productosnuevos','imgn','promociones'));	
	}
}
