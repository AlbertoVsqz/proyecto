<?php

namespace tienda;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
     protected $table='comentarios';
    
    protected $primaryKey='idComentario';
    
    public $timestamps=true;
    

    protected $fillable=[
    	'idCliente',
        'idProducto',
    	'nombre',
    	'email',
    	'Comentario',
    	'estado',
    	'email'
    	
    	
    ];

    protected $guarded =[
    ];

}
