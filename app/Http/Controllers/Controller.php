<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use View;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public $user;

    public function __construct() {
    	
    	if(Auth::attempt(['email' => 'edwin@hotmail.com', 'password' => '1234qwer'])) {
            if(Auth::user()) {
                $this->user = json_decode(Auth::user());

                View::share('data', $this->user);
            }
        }
    }
}
