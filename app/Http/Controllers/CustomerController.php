<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('customers')->where('active', request('active', 1))->get();

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        $customer = new Customer();
        return view('customer.create', compact('customer'));
    }

    public function store()
    {

        $data = request()->validate([
            'name' => 'required',
            'email' => 'bail|required|email|unique:customers'
        ]);

        $customer = Customer::create($data);

        return redirect('/customer/' . $customer->id);
    }

    // Route model binding
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Customer $customer)
    {

        // email validation: ignore self in unique validation
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required','email',\Illuminate\Validation\Rule::unique('customers')->ignore($customer)]
        ]);

        $customer->update($data);

        return redirect('/customer');
    }

    public function destroy(Customer $customer)
    {
        DB::table('customers')->delete($customer->id);
        return redirect()->back();
    }
}
