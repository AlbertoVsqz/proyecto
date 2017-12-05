<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;
use tienda\Categoria;
use tienda\SubCategoria;
use tienda\Marcas;
use tienda\Productos;
use tienda\ImgProductos;
use tienda\Promociones;
use tienda\Comentarios;

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
    	
        $productospromo=null;
    	$productos = Productos::where('url',$slug)->get();
    	foreach ($productos as $producto) {
    		$id = $producto->idProductos;
    	}
        $comentario = Comentarios::where('idProducto',$id)->get();
        //dd($productos);
    	$imgproductos=ImgProductos::orderBy('idProductos', 'asc')->where('idProductos',$id)->get();

        $productosnuevos=Productos::orderBy('existencias','desc')->take(2)->get();
        $imgn=ImgProductos::orderBy('idProductos', 'asc')->get();
        $promociones=Promociones::all();
		//dd($imgn);

		return view('tienda.detalles',compact('productos','productospromo','categorias','subcategorias','imgproductos','productosnuevos','imgn','promociones','comentario'));	
	}
    public function showpromo($slug){
        //dd($slug);
        $categorias=Categoria::where('estado',1)->get();
        $subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();
        $marcas=Marcas::where('estado',1)->get();
        
        $productos=null;
        $productospromo = Promociones::where('url',$slug)->get();
        foreach ($productospromo as $producto) {
            $id = $producto->idProducto;
        }
        $comentario = Comentarios::where('idProducto',$id)->get();
        //dd($productos);
        $imgproductos=ImgProductos::orderBy('idProductos', 'asc')->where('idProductos',$id)->get();

        $productosnuevos=Productos::orderBy('existencias','desc')->take(2)->get();
        $imgn=ImgProductos::orderBy('idProductos', 'asc')->get();
        $promociones=Promociones::all();
        //dd($imgn);

        return view('tienda.detalles',compact('productos','productospromo','categorias','subcategorias','imgproductos','productosnuevos','imgn','promociones','comentario'));    
    }
    public function addcomentario(Request $request){
        $this->validation($request);
        //return $request->all();
        
        Comentarios::create($request->all());
        return back()->with('Status','Comentario Registrado Correctamente');
        
        
    }

    public function validation($request){

        return $this->validate($request,[
            'Comentario'=>'required|max:255',
            'nombre'=>'required|max:255',
            'email'=>'required|email',
            
            ]);
    }

}
