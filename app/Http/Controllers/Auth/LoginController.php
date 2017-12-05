<?php

namespace tienda\Http\Controllers\Auth;

use tienda\Http\Controllers\Controller;
use tienda\Categoria;
use tienda\SubCategoria;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function index()
    {
        $categorias=Categoria::where('estado',1)->get();
        $subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();

        return view('tienda.auth.login',compact('categorias','subcategorias'));
    }

     public function login()
    {
        $credenciales = $this->validate(request(),[
            $this->username()=>'required|string',
            'password'=>'required|string'
            ]);


        //return $credenciales;
       if(Auth::attempt($credenciales))
       {
            return redirect()->route('/');
        }

        return  back()->withErrors([$this->username()=>'Estas Credenciales no coinciden con nuestros registros'])
        ->withInput(request([$this->username()]));
    }

    public function logout(){
        Auth::logout();

            return redirect('/');

    }
    public function username(){
        return 'usuario';
    }
    
}
