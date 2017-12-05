<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;
use tienda\Categoria;
use tienda\SubCategoria;
use tienda\Mail\UserMail7;

use Illuminate\Support\Facades\Mail;

use Auth;

class ContactanosController extends Controller
{

	public function index(){
		$categorias=Categoria::where('estado',1)->get();
    	$subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();

		return view('tienda.contacto',compact('categorias','subcategorias'));
	}

	public function enviarmail(Request $request){

//		dd($request->nombre);
		//return $request->all();
		$this->validation($request);
        
       
		$this->domail($request->nombre, $request->email, $request->message, $request->telefono);
        return redirect('/')->with('Status','Gracias Por Contactarnos');
}
	public function domail($nom, $em, $mes, $tel){
      
        //dd($idpedido);
        

	        $title="Mesaje de Contactos";
        Mail::to('alberto.avm2010@gmail.com')->send(new UserMail7($nom,$title,$em,$mes,$tel));
        
        

    }
	
   

    public function validation($request){

        return $this->validate($request,[
            'email'=>'required|email|max:255',
            'nombre'=>'required|max:255',
            'telefono'=>'required|max:8',
            'message'=>'required|max:255',
           

            ]);
    }


}
