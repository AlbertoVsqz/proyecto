<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;
use tienda\Categoria;
use tienda\SubCategoria;
use tienda\Promociones;
use tienda\ImgProductos;
use tienda\Productos;
use tienda\Marcas;
use tienda\imgMarcas;

class IndexController extends Controller
{
    public function index()
    {
    	$categorias=Categoria::where('estado',1)->get();
    	$subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();
    	$promociones=Promociones::all();
        $allproductos=Productos::all();
        
        
    	$imgproductos=ImgProductos::orderBy('idProductos', 'asc')->get();
    	$productos=Productos::orderBy('existencias','desc')->take(2)->get();
    	$marcas=Marcas::where('estado',1)->get();
    	$imgmarcas=imgMarcas::orderBy('idMarca', 'asc')->get();

    	//dd($promociones);
    	return view('tienda.index',compact('categorias','subcategorias','promociones','imgproductos','productos','marcas','imgmarcas','allproductos'));
    }
    
}
