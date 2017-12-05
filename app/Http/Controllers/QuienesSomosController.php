<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;
use tienda\Categoria;
use tienda\SubCategoria;

class QuienesSomosController extends Controller
{
    public function index(){

    	$categorias=Categoria::where('estado',1)->get();
    	$subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();

    	return view('tienda.quienes-somos',compact('categorias','subcategorias'));
    }

}
