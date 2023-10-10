<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use App\Utils\AuthUtil;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService) {
    }

    function loginAction(LoginRequest $request) : RedirectResponse {

       if ($this->authService->login($request->validated())) {
            AuthUtil::getUserLoginRoute();
       }
       return redirect()->back()->withErrors(['password' => 'Invalid password']);
    }

    function logout() : RedirectResponse {
        Auth::logout();
        return to_route('login');
    }
}
