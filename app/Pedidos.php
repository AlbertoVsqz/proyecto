<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table='pedidos';
    
    protected $primaryKey='idPedido';
    
    public $timestamps=true;
    

    protected $fillable=[
    	
    	'idCliente',
    	'estado',
    	'subtotal',
    	'GastosEnvio',
    	'created_at',
    	'updated_at'
    	
    	
    ];
}
