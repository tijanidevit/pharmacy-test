<?php


namespace App\Services;

use Illuminate\Support\Facades\Auth;

class LoginService {


    public function login($data) : bool {
        return Auth::attempt($data);
    }
}
