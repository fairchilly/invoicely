<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CustomerListDto;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function list()
    {
        return CustomerListDto::collection(Customer::all());
    }
}