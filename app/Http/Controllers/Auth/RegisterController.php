<?php

namespace tienda\Http\Controllers\Auth;

use tienda\User;
use tienda\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use tienda\Categoria;
use tienda\SubCategoria;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telefono' => 'required|string|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \tienda\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'telefono' => $data['telefono'],
        ]);
    }

    public function index()
    {
        $categorias=Categoria::where('estado',1)->get();
        $subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();

        return view('tienda.auth.registro',compact('categorias','subcategorias'));
    }
    public function register(Request $request){
        $this->validation($request);
        //return $request->all();
        $request['password']=bcrypt($request['password']);
        User::create($request->all());
        return redirect('/')->with('Status','Usuario Registrado Correctamente');
        
    }

    public function validation($request){

        return $this->validate($request,[
            'email'=>'required|email|unique:users|max:255',
            'usuario'=>'required|max:255',
            'name'=>'required|max:255',
            'apellido'=>'required|max:255',
            'password'=>'required|confirmed|min:6',
            'telefono'=>'required|max:8',
            'direccion'=>'required|max:255',
            'pais'=>'required|max:255',
            'tipo'=>'required',

            ]);
    }
}
