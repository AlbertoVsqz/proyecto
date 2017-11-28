<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class Promociones extends Model
{
    protected $table='promociones';
    
    protected $primaryKey='idPromociones';
    
    public $timestamps=true;
    

    protected $fillable=[
    	'NombrePromocion',
    	'precioAnterior',
    	'precioActual',
    	'idProducto',
    	'fechaVencimiento'
    	
    	
    ];

    protected $guarded =[
    ];
}
