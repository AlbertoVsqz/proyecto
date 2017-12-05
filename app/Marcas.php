<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
     protected $table='marca';
    
    protected $primaryKey='idMarca';
    
    public $timestamps=true;
    

    protected $fillable=[
    	'Nombre',
    	'estado',
    	'url'
       
    ];

    protected $guarded =[
    ];
}
