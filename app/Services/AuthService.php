<?php


namespace App\Services;

use App\Http\Resources\PharmacyResource;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService {
    public function __construct(protected User $user) {
    }

    public function register(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        $pharmacy = $this->user->create($data);
        auth()->loginUsingId($pharmacy->id);
        $token = $pharmacy->createToken('auth')->plainTextToken;
        $pharmacy = new PharmacyResource(auth()->user());
        return compact('pharmacy','token');
    }

    public function login(array $data)
    {
        if (auth()->attempt($data)) {
            $pharmacy = auth()->user();
            $token = $pharmacy->createToken('auth')->plainTextToken;
            $pharmacy = new PharmacyResource($pharmacy);
            return compact('pharmacy','token');
        }
        throw new Exception('Invalid Password');
    }
}
