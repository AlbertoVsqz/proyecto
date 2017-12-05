<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use tienda\Categoria;
use tienda\SubCategoria;
use tienda\User;
use Auth;

class MyPerfilController extends Controller
{
         protected $redirectTo = '/home';

          public function __construct()
    {
        $this->middleware('auth');
    }


 

    public function index()
    {
        $categorias=Categoria::where('estado',1)->get();
        $subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();

        $id= Auth::user()->id;
        $user=User::where('id',$id)->get();

        return view('tienda.miperfil',compact('categorias','subcategorias','user'));
    }


    public function update(Request $request){
        $this->validation($request);
        //return $request->all();

        $request['password']=bcrypt($request['password']);

        $id= Auth::user()->id;
        $getuser=User::where('id',$id)->first();
        $getuser->name = $request->name;
        $getuser->apellido = $request->apellido;
        $getuser->email = $request->email;
        $getuser->telefono = $request->telefono;
        $getuser->direccion = $request->direccion;
        $getuser->pais = $request->pais;
	   	$getuser->save();
	   	//dd($getuser);


        
        return redirect('/')->with('Status','Usuario Actualizado Correctamente');
        
    }

    public function validation($request){

        return $this->validate($request,[
            'name'=>'required|max:255',
            'apellido'=>'required|max:255',
            'telefono'=>'required|max:8',
            'direccion'=>'required|max:255',
            'pais'=>'required|max:255',
            'tipo'=>'required',
            'id'=>'required',

            ]);
    }
}
