<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
 
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use tienda\Pedidos;
use tienda\LineasPedidos;
use tienda\Productos;


use tienda\Mail\UserMail;
use tienda\Mail\UserMail2;
use Illuminate\Support\Facades\Mail;

use Auth;


class PaypalController extends Controller
{
    private $_api_context;

    public function __construct(){
    	
    	$paypal_conf = \Config::get('paypal');
    	$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);;
    }

    public function postPayment(){
    	$payer = new Payer();
    	$payer->setPaymentMethod('paypal');

    	$items = array();
    	$subtotal = 0;
    	$carrito = \Session::get('carrito');
    	$currency = 'USD';

    	foreach ($carrito as $producto) {
    		if($producto->idpromo){
					$precio = number_format($producto->preciopromo);
    			}else{
	    			$precio = number_format($producto->precio);
				}
			$item = new Item();
    		$item->setName($producto->nombre)
    			->setCurrency($currency)
    			->setDescription($producto->extract)
    			->setQuantity($producto->cantidad)
    			->setPrice($precio);
    			

    			$items[] = $item;
    			$subtotal += $producto->cantidad * $precio;

    	}

    	$item_list = new ItemList();
    	$item_list->setItems($items);

    	$details = new Details();
    	$details->setSubtotal($subtotal)
    		->setShipping(0);//agregamos el precio de envio

    	$total = $subtotal + 0;//agregamos el precio de envio

    	$amount = new Amount();
    	$amount->setCurrency($currency)
    		->setTotal($total)
    		->setDetails($details);

    	$transaction = new Transaction();
    	$transaction->setAmount($amount)
    		->setItemList($item_list)
    		->setDescription('Pedido de Prueba en mi Tienda Laravel ');

    	$redirect_urls = new RedirectUrls();
    	$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));

    	$payment = new Payment();
    	$payment->setIntent('Sale')
    		->setPayer($payer)
    		->setRedirectUrls($redirect_urls)
    		->setTransactions(array($transaction));

    	try {
    		$payment->create($this->_api_context);
    	} catch (\PayPal\Exception\PPConnectionException $ex) {
    		if(\Config::get('app.debug')){
    			echo "Exception: " .$ex->getMessage() .PHP_EOL;
    			$err_data = json_decode($ex->getData(),true);
    			exit;
    		}else{
    			die('Ups, Algo Salio Mal');
    		}
   		
    	}

    	foreach ($payment->getLinks() as $link) {
    		if($link->getRel()=='approval_url'){
    			$redirect_url = $link->getHref();
    			break;
    		}
    	}


    	//add Payment ID to Session
    	\Session::put('paypal_payment_id', $payment->getId());

    	if(isset($redirect_url)){
    		//redirect de Paypal
    		return \Redirect::away($redirect_url);

    	}

    	return redirect('carrito/show')->with('message', 'Ups! Error Desconocido');

    }

    public function getPaymentStatus(Request $request){
    	//get the payment ID before session clear

    	$payment_id = \Session::get('paypal_payment_id');

    	//clear the session payment ID
    	\Session::forget('paypal_payment_id');

    	//$payerId = \Input::get('PayerID');
    	//$token = \Input::get('token');

    	//if(empty($payerId) || empty($token)){
    	//	return redirect('/')->with('message','Hubo un Problea al intentar pagar co Paypal');
    	//}
		if (empty($request->input('PayerID')) || empty($request->input('token'))) {
		      Session::flash('message', 'Payment failed');
		      Session::flash('message', 'danger no-auto-close');
		      return redirect('/');
		    }


    	$payment = Payment::get($payment_id, $this->_api_context);

    	$execution = new PaymentExecution();
    	$execution->setPayerId($request->input('PayerID'));

    	$result = $payment->execute($execution, $this->_api_context);

    	if($result->getState()=='approved'){

    		$this->saveOrder();
            
            
    		\Session::forget('carrito');
    		\Session::forget('total');

            \Session::flash('message',"Compra realizada de forma Correcta");
            return view('tienda.resultadopago', compact('total','categorias','subcategorias'));
    		//return redirect('/')->with('message','Compra realizada de forma Correcta');
    	}

    	return redirect('/')->with('message','La compra fue Cancelada');


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
        $this->enviarmail($pedido->idPedido);
        $this->enviarmail2($pedido->idPedido);
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

    public function enviarmail($idpedido){
        $carrito = \Session::get('carrito');
        //dd($idpedido);
        $content=$idpedido;
        $title="Notificacion de Pedido #".$idpedido;
        Mail::to(Auth::user()->email)->send(new UserMail($content,$title,$carrito,$idpedido));
        
        

    }
    public function enviarmail2($idpedido){
        $carrito = \Session::get('carrito');
        //dd($idpedido);
        $content=$idpedido;
        $title="Notificacion de Pedido #".$idpedido;
        Mail::to(Auth::user()->email)->send(new UserMail2($content,$title,$carrito,$idpedido));
        
        

    }

   


}
