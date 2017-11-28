<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table='productos';
    
    protected $primaryKey='idProductos';
    
    public $timestamps=true;
    

    protected $fillable=[
    	'idProveedor',
    	'nombre',
    	'descripcion',
    	'precio',
    	'peso',
    	'existencias',
    	'idMarca',
    	'idCategoria',
        'url'
    	
    ];

    protected $guarded =[
    ];
}
