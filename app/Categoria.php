<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categoria';
    
    protected $primaryKey='idCategoria';
    
    public $timestamps=true;
    

    protected $fillable=[
    	'Nombre',
    	'descripcion',
    	'estado'
       
    ];

    protected $guarded =[
    ];
}
