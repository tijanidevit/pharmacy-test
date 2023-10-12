<?php


namespace App\Services;


use Illuminate\Support\Facades\Auth;


class AuthService {

    public function login($data) : bool {
        return (Auth::attempt($data));
    }
}
