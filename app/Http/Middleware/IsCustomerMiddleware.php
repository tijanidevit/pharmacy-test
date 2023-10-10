<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsCustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role !== UserRoleEnum::CUSTOMER) {
            abort(401, 'Unauthorized access! You must be a customer to access this page');
            // return redirect()->to('login')->with('error', 'You must be a customer to access this page');
        }
        return $next($request);
    }
}
