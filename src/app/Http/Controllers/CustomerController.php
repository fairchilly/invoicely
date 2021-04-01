<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\CustomerListDto;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function list()
    {
        return CustomerListDto::collection(Customer::all());
    }

    public function create(StoreCustomerRequest $request)
    {

    }

    public function update(string $customerId)
    {

    }

    public function delete(string $customerId)
    {

    }
}
