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
    public function index() {
        return User::all();
    }

    public function registro(Request $request) {
    	User::create([
    		'nombre' => $request->nombre,
    		'apellido' => $request->apellido,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    	]);

        return $this->ingresar($request);
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

        Auth::logout();

    	return response()->json(["response" => "User Logged out."], 200);

    }
}
