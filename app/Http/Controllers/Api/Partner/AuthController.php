<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use App\Http\Requests\Auth\LoginRequest;
use Exception;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService) {
    }



    public function login(LoginRequest $request) {
        try {
            $response = $this->authService->login($request->validated());
            return $this->successResponse('Login successful', $response);
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), 422);
        }

    }

    public function register(RegisterRequest $request) {
        try {
            $response = $this->authService->register($request->validated());
            return $this->successResponse('Registration successful', $response);

        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage());
        }
    }

    function logout() {
    }
}
