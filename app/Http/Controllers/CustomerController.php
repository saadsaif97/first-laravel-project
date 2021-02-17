<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('customers')->get($columns = ['*']);

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store()
    {

        $data = request()->validate([
            'name' => 'required',
            'email' => 'bail|required|email|unique:customers'
        ]);

        \App\Models\Customer::create($data);

        return redirect('/customer');
    }

    // Route model binding
    public function show(\App\Models\Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function edit(\App\Models\Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(\App\Models\Customer $customer)
    {

        // email validation: ignore self in unique validation
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required','email',\Illuminate\Validation\Rule::unique('customers')->ignore($customer)]
        ]);

        $customer->update($data);

        return redirect('/customer');
    }
}
