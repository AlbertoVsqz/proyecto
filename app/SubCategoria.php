<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table='subcategorias';
    
    protected $primaryKey='idSubCategoria';
    
    public $timestamps=true;
    

    protected $fillable=[
    	'idCategoria',
    	'Nombre',
    	'descripcion',
    	'estado'
       
    ];

    protected $guarded =[
    ];
}
