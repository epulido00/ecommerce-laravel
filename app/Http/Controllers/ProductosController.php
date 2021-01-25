<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Productos;

class ProductosController extends Controller
{
    //

    public function index() {
    	return Productos::all();
    }

    public function getProducto(Productos $producto) {
    	return response()->json($producto->all(), 200);
    }

    public function createProducto(Request $request) {
    	return Productos::create($request->all());
    }

    public function deleteProducto(Productos $producto) {
    	$producto->delete();

    	return response()->json(null, 204);
    }
}
