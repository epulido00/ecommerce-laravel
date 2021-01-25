<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //

	public $primaryKey = 'id_producto';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'precio_descuento', 'imagen', 'estatus', 'destacado'];
}
