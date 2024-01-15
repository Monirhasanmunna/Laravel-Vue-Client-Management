<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Helpers\ApplicationIDHelper;
use Illuminate\Support\Facades\Redirect;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $input = $request->input('input');
        $items = $request->input('select');

        $filterDates = [
            'fromDate' => $request->input('fromDate'),
            'toDate' => $request->input('toDate'),
        ];

        $query = Application::query();

        if($request->fromDate != null && $request->toDate != null){
            $query->SearchByDates($filterDates);
        }

        $applications = $query->with(['service','client'])->Search($input)->orderByDesc('id')->paginate($items);


        return Inertia::render('Application/Index',[
            'applications' => $applications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $clients = Client::all();
        $services = Service::all();
        $application_id = ApplicationIDHelper::ApplicationId();

        return Inertia::render('Application/Create',[
            'clients'  => $clients,
            'services' => $services,
            'application_id' => $application_id,
        ]);
    }

    public function getServiceCost($id)
    {
        $service = Service::find($id);

        return response()->json([
            'service' => $service
        ]);
    }

 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'application_no'    => 'required|unique:applications',
            'cost'              => 'required',
            'service'           => 'required',
            'client'            => 'required',
            'police_station'    => 'required',
            'date'              => 'required',
            'payment'           => 'required',

        ]);

        Application::create([
            'application_no'    => $request->application_no,
            'cost'              => $request->cost,
            'service_id'        => $request->service,
            'client_id'         => $request->client,
            'police_station'    => $request->police_station,
            'date'              => $request->date,
            'payment'           => $request->payment,
            'due'               => $request->due,
        ]);

        return to_route('application.index')->with('success', 'Application created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        $clients = Client::all();
        $services = Service::all();

        return Inertia::render('Application/Edit',[
            'clients'  => $clients,
            'services' => $services,
            'application' => $application
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        // dd($request->all());
        $request->validate([
            'application_no'    => 'required|unique:applications,application_no,'.$application->id,
            'cost'              => 'required',
            'service'           => 'required',
            'client'            => 'required',
            'police_station'    => 'required',
            'date'              => 'required',
            'payment'           => 'required',
        ]);

        $application->update([
            'application_no'    => $request->application_no,
            'cost'              => $request->cost,
            'service_id'        => $request->service,
            'client_id'         => $request->client,
            'police_station'    => $request->police_station,
            'date'              => $request->date,
            'payment'           => $request->payment,
            'due'               => $request->due,
        ]);

        return to_route('application.index')->with('success', 'Application updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return Redirect::back()->with('success', 'Application deleted successfully');
    }
}
