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

    public function create()
    {
        return view('service.create');
    }

    public function store(){

        $validated = request()->validate([
            'name' => 'bail|required|unique:services'
        ]);

        $service = \App\Models\Service::create($validated);

        return redirect('/service/' . $service->id);
    }

    public function show(\App\Models\Service $service)
    {
        return view('service.show', compact('service'));
    }

    public function edit(\App\Models\Service $service)
    {
        return view('service.edit', compact('service'));
    }

    public function update(\App\Models\Service $service)
    {

        $data = request()->validate([
            'name' => ['bail', 'required', \Illuminate\Validation\Rule::unique('services')->ignore($service)]
        ]);

        $service->update($data);

        return redirect('/service');
    }

    public function destroy(\App\Models\Service $service)
    {
        DB::table('services')->delete($service->id);

        return redirect('/service');
    }
}
