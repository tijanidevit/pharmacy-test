<?php


namespace App\Services;
use App\Traits\FileTrait;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\Hash;

class ModeratorService {
    use FileTrait;
    public $moderator;
    public function __construct(protected User $user) {
        $this->moderator = $this->user->where('role', UserRoleEnum::SUB_ADMIN);
    }

    public function getAllModerators() : array|Collection{
        return $this->moderator->orderBy('name')->get();
    }

    public function addModerator($data) : User {
        $data['image'] = $this->uploadFile('images/moderators/',$data['image']);
        $data['password'] = Hash::make('password');
        $data['role'] = UserRoleEnum::SUB_ADMIN;
        return $this->moderator->create($data);
    }

    public function getModerator($moderator) : User {
        return $moderator->load('products');
    }

    public function deleteModerator($moderator) : bool {
        return $moderator->delete();
    }
}
