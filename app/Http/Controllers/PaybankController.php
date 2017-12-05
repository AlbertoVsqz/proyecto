<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;

use tienda\Categoria;
use tienda\SubCategoria;

use tienda\Pedidos;
use tienda\LineasPedidos;
use tienda\Productos;

use tienda\Mail\UserMail3;
use tienda\Mail\UserMail4;
use Illuminate\Support\Facades\Mail;

use Auth;

class PaybankController extends Controller
{

    public function pago(){
    	
    	$categorias=Categoria::where('estado',1)->get();
    	$subcategorias=SubCategoria::where('estado',1)->orderBy('idCategoria','asc')->get();
    	
    	$this->saveOrder();
            
   		\Session::forget('carrito');
   		\Session::forget('total');

		\Session::flash('message',"Su Pedido fue realizado de forma Correcta");
		return view('tienda.resultadopago', compact('total','categorias','subcategorias'));
		//return redirect('/resultadopago')->with('message','Su Pedido fue realizada de forma Correcta');

    	

    }


    private function saveOrder(){
    	$subtotal = 0;
    	$carrito = \Session::get('carrito');
    	$cargoEnvio = 0;

    	foreach ($carrito as $producto) {
    			if($producto->idpromo){
					$precio = number_format($producto->preciopromo);
    			}else{
	    			$precio = number_format($producto->precio);
				}
    		$subtotal +=$producto->cantidad * $precio;

    	}

    	$date = new \DateTime();
    	
    	$pedido = Pedidos::create([
    		'subtotal'=>$subtotal,
    		'idCliente'=>\Auth::user()->id,
    		'estado'=>0,
    		'created_at'=>$date,
    		'updated_at'=>$date,
    		'GastosEnvio'=>$cargoEnvio
    		]);

    	foreach ($carrito as $producto) {
    		$this->saveLineasPedidos($producto, $pedido->idPedido);
    	}
        $this->enviarmail3($pedido->idPedido);
        $this->enviarmail4($pedido->idPedido);
    }

    private function saveLineasPedidos($producto, $pedido_id){
    	
    	
    	$idPro=$producto->idProductos;
    	$getproducto = Productos::where('idProductos', $idPro)->first();
    	
    	if(count($getproducto)>=1){
			$getexitencias = $getproducto->existencias;
			$extenciafinal = number_format($getexitencias) - number_format($producto->cantidad);
			$getproducto->existencias = $extenciafinal;
	   	$getproducto->save();
		}
		if($producto->idpromo){
					$precio = number_format($producto->preciopromo);
    			}else{
	    			$precio = number_format($producto->precio);
				}
    	
    	LineasPedidos::create([
    		'idPedido'=>$pedido_id,
    		'idProducto'=>$producto->idProductos,
    		'unidades'=>$producto->cantidad,
    		'precio'=>$precio
    		]);
    	
    	
    }

 	public function enviarmail3($idpedido){
        
        //dd($idpedido);
        $content=$idpedido;
        $title="Notificacion de Pedido #".$idpedido;
        Mail::to(Auth::user()->email)->send(new UserMail3($content,$title,$idpedido));
        
        

    }
    public function enviarmail4($idpedido){
        $carrito = \Session::get('carrito');
        //dd($idpedido);
        $content=$idpedido;
        $title="Notificacion de Pedido #".$idpedido;
        Mail::to(Auth::user()->email)->send(new UserMail4($content,$title,$idpedido,$carrito));
        
        

    }

}
