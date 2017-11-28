<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class ImgProductos extends Model
{
    protected $table='imgproductos';
    
    protected $primaryKey='idImagen';
    
    public $timestamps=true;
    

    protected $fillable=[
    	'idProductos',
    	'imagen',
    	'titulo',
    	'descripcion'
    	
    	
    	
    ];

    protected $guarded =[
    ];
}
