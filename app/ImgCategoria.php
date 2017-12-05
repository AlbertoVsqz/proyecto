<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class ImgCategoria extends Model
{
     protected $table='imgcategoria';
    
    protected $primaryKey='idImagen';
    
    public $timestamps=true;
    

    protected $fillable=[
    	'idCategoria',
    	'imagen',
    	'titulo',
    	'descripcion'
    	
    	
    	
    ];

    protected $guarded =[
    ];
}
