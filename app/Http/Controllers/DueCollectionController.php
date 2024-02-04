<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Client;
use App\Services\AccountServices;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DueCollectionController extends Controller
{
    public function index(Request $request)
    {
        $search     = $request->input('input');
        $item       = $request->input('select');
        $clients    = Client::all();

        $query      = Application::query();

        if($request->client_id != null){
            $query->SearchByClient($request->client_id);
        }

        $query->with(['client','service'])
              ->whereNot('due', 0)
              ->Search($search)
              ->orderByDesc('id');
              
        $dues = $query;

        return Inertia::render('Collection/Index', [
            'dues' => $dues->paginate($item),
            'clients' => $clients
        ]);
    }


    public function getApplicationById($id)
    {
        $application = Application::with(['service','client'])->find($id);
        return response()->json($application);
    }

    public function duePayment(Request $request, AccountServices $account)
    {
        $application = Application::find($request->id);
        $application->due = $application->due - $request->payAmmount;
        $application->payment = $application->payment + $request->payAmmount;
        $application->save();

        $account->paymentCreate($application->account_id, $request->payAmmount);

        return response()->json($application);
    }
}
