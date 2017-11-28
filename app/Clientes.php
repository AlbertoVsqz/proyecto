<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table='clientes';
    
    protected $primaryKey='idCli';
    
    public $timestamps=true;
    

    protected $fillable=[
    	'nombre',
    	'apellido',
    	'email',
    	'usuario',
    	'password',
    	'telefono',
    	'direccion',
    	'pais'
    	
    ];

    protected $guarded =[
    ];
}
