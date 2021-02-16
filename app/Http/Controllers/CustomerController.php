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
}
