<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;
use tienda\Categoria;
use tienda\SubCategoria;
use tienda\Marcas;
use tienda\Productos;
use tienda\ImgProductos;
use tienda\Promociones;

class ProductosController extends Controller
{
    
    public function index()
    {
    	$categorias=Categoria::where('estado',1)->get();
    	$subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();
    	$marcas=Marcas::where('estado',1)->get();
    	$productos=Productos::all();
    	$imgproductos=ImgProductos::orderBy('idProductos', 'asc')->get();
    	$promociones=Promociones::all();
    	return view('tienda.productos',compact('categorias','subcategorias','marcas','productos','imgproductos','promociones'));
	}
}
