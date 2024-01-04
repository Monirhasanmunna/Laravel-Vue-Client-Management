<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search     = $request->input('input');
        $item       = $request->input('select');
        $clients    = Client::Search($search)->orderByDesc('id')->paginate($item);

        return Inertia::render('Client/ClientList', [
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Client/CreateClient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'age'       => 'required',
            'phone'     => 'required|unique:clients',
            'address'   => 'required',
            'gender'    => 'required'
        ]);

        Client::create([
            'name'      => $request->name,
            'age'       => $request->age,
            'phone'     => $request->phone,
            'address'   => $request->address,
            'gender'    => $request->gender,
        ]);

        return to_route('client.index')->with('success', 'Client Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return Inertia::render('Client/EditClient', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'      => 'required',
            'age'       => 'required',
            'phone'     => 'required|unique:clients,phone,'.$client->id,
            'address'   => 'required',
            'gender'    => 'required'
        ]);

        $client->update([
            'name'      => $request->name,
            'age'       => $request->age,
            'phone'     => $request->phone,
            'address'   => $request->address,
            'gender'    => $request->gender,
        ]);

        return to_route('client.index')->with('success', 'Client Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->back()->with('success', 'Client Deleted Successfully');
    }
}
