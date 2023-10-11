<?php


namespace App\Services;
use App\Traits\FileTrait;
use App\Models\User;
use App\Notifications\Customer\NewlyAddedNotification;
use Illuminate\Database\Eloquent\Collection;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\Hash;

class CustomerService {
    use FileTrait;
    public $customer;
    public function __construct(protected User $user) {
        $this->customer = $this->user->where('role', UserRoleEnum::CUSTOMER);
    }

    public function getAllCustomers() : array|Collection{
        return $this->customer->orderBy('name')->get();
    }

    public function addCustomer($data) : User {
        $data['image'] = $this->uploadFile('images/customers/',$data['image']);
        $plainPassword = rand(11111111,88888888);
        $data['password'] = Hash::make($plainPassword);
        $data['role'] = UserRoleEnum::CUSTOMER;

        $user = $this->customer->create($data);
        $user->notify(new NewlyAddedNotification($user, $plainPassword));
        return $user;
    }

    public function getCustomer($id) : User|null {
        return $this->customer->with('sales')->whereId($id)->first();
    }

    public function deleteCustomer($id) : bool {
        return $this->customer->whereId($id)->delete();
    }
}
