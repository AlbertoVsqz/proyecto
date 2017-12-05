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
use tienda\ImgCategoria;

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
        $categorias2=Categoria::where('idCategoria','<>',1)->get();
        $imgcategoria=ImgCategoria::orderBy('idCategoria', 'asc')->take(6)->get();

    	//dd($categorias2);
    	return view('tienda.index',compact('categorias','subcategorias','promociones','imgproductos','productos','marcas','imgmarcas','allproductos','imgcategoria','categorias2'));
    }
    
}
