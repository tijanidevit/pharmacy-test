<?php


namespace App\Services\Api;

use Illuminate\Support\Facades\Auth;

class AuthService {


    public function login($data) : bool {
        if (Auth::attempt($data)){

        }
    }
}
