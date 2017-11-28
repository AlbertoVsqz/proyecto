<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class ImgMarcas extends Model
{
    protected $table='imgmarca';
    
    protected $primaryKey='idImagen';
    
    public $timestamps=true;
    

    protected $fillable=[
    	'idMarca',
    	'imagen',
    	'titulo',
    	'descripcion'
    	
    	
    	
    ];

    protected $guarded =[
    ];
}
