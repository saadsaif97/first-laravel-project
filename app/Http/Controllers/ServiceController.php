<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index(){

    $services = DB::select('SELECT * FROM services');

    return view('service.index', compact('services'));
    }

    public function store(){

        $validated = request()->validate([
            'name' => 'bail|required|unique:services'
        ]);

        DB::table('services')->insert([
            'name' => $validated
        ]);

        return redirect()->back();
    }
}
