<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService) {
    }

    function login(LoginRequest $request) {

       if ($this->authService->login($request->validated())) {
       }
    }

    function register(LoginRequest $request) {

       if ($this->authService->register($request->validated())) {
       }
    }

    function logout() {
    }
}
