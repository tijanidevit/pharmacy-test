<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(protected LoginService $loginService) {
    }

    function getLoginPage() : View {
        return view('admin/login');
    }

    function loginAction(LoginRequest $request) : RedirectResponse {
       if ($this->loginService->login($request->validated())) {
            return to_route('dashboard');
       }
       return redirect()->back()->withErrors(['password' => 'Invalid password']);
    }

    function logout() : RedirectResponse {
        Auth::logout();
        return to_route('login');
    }
}
