<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Productos;

class TiendaController extends Controller
{
    //

    public function getDestacados() {
    	$destacados = Productos::where("destacado", true)->get();

    	return $destacados;
    }

    public function getProducto(Productos $producto) {
    	return $producto;
    }
}
