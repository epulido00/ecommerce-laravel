<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;

use App\User;
use Auth;


class LoginController extends Controller
{
    //

    public function registro(Request $request) {
    	return User::create([
    		'nombre' => $request->nombre,
    		'apellido' => $request->apellido,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    	]);
    }

    public function ingresar(Request $request) {
    	if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

    		$user = Auth::user();

    		$user->generateToken();

    		return Auth::user();
    	} else {
			return response()->json(["error" => "Hubo un error al tratar de ingresar"]);
    	}
    }

    public function logout() {

    	$user = Auth::user();

    	if($user) {
    		$user->api_token = null;
    		$user->save();
    	}

    	return response()->json(["response" => "User Logged out."], 200);

    }
}
