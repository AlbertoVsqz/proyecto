<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class LineasPedidos extends Model
{
    protected $table='lineaspedido';
    
    protected $primaryKey='idLineas';
    
    public $timestamps=true;
    

    protected $fillable=[
    	
    	'idPedido',
    	'idProducto',
    	'unidades',
    	'precio',
    	
    	
    	
    ];


}
