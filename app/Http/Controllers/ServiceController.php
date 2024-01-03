<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchInput = $request->input('input');
        $selectItem = $request->input('select') ?? 20;
        
        $services = Service::SearchByName($searchInput)->orderByDesc('id')->paginate($selectItem)->withQueryString();

        return Inertia::render('Services/ServiceList',[
            'services' => $services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Services/CreateService');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|unique:services',
            'code'          => 'required|unique:services',
            'description'   => 'max:120'
        ]);

        Service::create([
            'name'          => $request->name,
            'code'          => $request->code,
            'slug'          => Str::slug($request->code),
            'description'   => $request->description,
        ]);

        return to_route('service.index')->with('success', 'Service created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service  = Service::where('slug', $id)->first();

        return Inertia::render('Services/EditService',[
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'          => 'required|unique:services,name,'.$id,
            'code'          => 'required|unique:services,code,'.$id,
            'description'   => 'max:120'
        ]);

        Service::find($id)->update([
            'name'          => $request->name,
            'code'          => $request->code,
            'slug'          => Str::slug($request->code),
            'description'   => $request->description,
            'status'        => $request->status
        ]);

        return to_route('service.index')->with('success', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Service::find($id)->delete();
        return redirect()->back()->with('success', 'Service deleted successfully');
    }
}
