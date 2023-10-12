<?php

namespace App\Utils;

use App\Enums\UserRoleEnum;

class AuthUtil{

    public static function getUserLoginRoute(){
        $role = auth()->user()->role;

        return match ($role) {
            UserRoleEnum::ADMIN => to_route('admin.dashboard'),
            UserRoleEnum::CUSTOMER => to_route('customer.product.index'),
        };
    }
}
