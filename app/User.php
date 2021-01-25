<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'id_user';
    protected $fillable = [
        'nombre', 'apellido', 'email', 'password',
    ];

    public function generateToken() {
    	$this->api_token = str_random(60);
    	$this->save();

    	return $this->api_token;
    }
}
