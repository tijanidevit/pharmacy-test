<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Customer\AddCustomerRequest;

class CustomerController extends Controller
{
    public function __construct(protected CustomerService $customerService) {}

    public function index() : View
    {
        $customers = $this->customerService->getAllCustomers();
        return view('admin.customers.index', compact('customers'));
    }

    public function create() : View
    {
        return view('admin.customers.create');
    }

    public function store(AddCustomerRequest $request): RedirectResponse
    {
        $this->customerService->addCustomer($request->validated());
        return to_route('admin.customer.index')->with('success', 'Customer added successfully!');
    }

    public function destroy($id)
    {
        $this->customerService->deleteCustomer($id);
        return to_route('admin.customer.index')->with('success', 'Customer deleted successfully!');
    }
}
