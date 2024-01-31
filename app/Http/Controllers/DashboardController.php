<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('select') ?? 'today';

        $receivedApplication    = $this->receivedApplication($filter);
        $deleveryApplication    = $this->deliveredApplication($filter);
        $receivedMoney          = $this->receivedMoney($filter);
        $dueMoney               = $this->dueMoney($filter);


        return Inertia::render('Dashboard',[
            'totalReceivedApp'      => $receivedApplication,
            'deleveryApplication'   => $deleveryApplication,
            'receivedMoney'         => $receivedMoney,
            'dueMoney'              => $dueMoney,
        ]);
    }

    public function receivedApplication($filter)
    {
        $query = Application::query();

        if($filter == 'today'){
            $today = Carbon::today();
            $query->whereDate('date', $today)->get();
        }

        if($filter == 'last-7-days'){
            $query->whereBetween('date', [now()->subDay(6), now()])->get();;
        }

        if($filter == 'this-month'){
            $query->whereYear('date', now()->year)
                  ->whereMonth('date', now()->month)->get();
        }

        if($filter == 'this-year'){
            $query->whereYear('date', now()->year)->get();
        }

        $totalReceivedApp = $query->count();

        return $totalReceivedApp;
    }

    
    public function deliveredApplication($filter)
    {
        $query = Application::query();

        if($filter == 'today'){
            $today = Carbon::today();
            $query->whereDate('updated_at', $today)
                  ->where('status', 'deliver')->get();
        }

        if($filter == 'last-7-days'){
            $query->whereBetween('updated_at', [now()->subDay(6), now()])
                  ->where('status', 'deliver')->get();
        }

        if($filter == 'this-month'){
            $query->whereYear('updated_at', now()->year)
                  ->whereMonth('updated_at', now()->month)
                  ->where('status', 'deliver')->get();
        }

        if($filter == 'this-year'){
            $query->whereYear('updated_at', now()->year)
            ->where('status', 'deliver')->get();
        }

        $totalApplication = $query;

        return $totalApplication->count();
    }


    public function receivedMoney($filter)
    {
        $query = Application::query();

        if($filter == 'today'){
            $today = Carbon::today();
            $query->whereDate('date', $today);
        }

        if($filter == 'last-7-days'){
            $query->whereBetween('date', [now()->subDay(6), now()]);
        }

        if($filter == 'this-month'){
            $query->whereYear('date', now()->year)
                  ->whereMonth('date', now()->month);
        }

        if($filter == 'this-year'){
            $query->whereYear('date', now()->year);
        }

        $totalReceivedMoney = $query->sum('payment');

        return $totalReceivedMoney;
    }


    public function dueMoney($filter)
    {
        $query = Application::query();

        if($filter == 'today'){
            $today = Carbon::today();
            $query->whereDate('date', $today);
        }

        if($filter == 'last-7-days'){
            $query->whereBetween('date', [now()->subDay(6), now()]);
        }

        if($filter == 'this-month'){
            $query->whereYear('date', now()->year)
                  ->whereMonth('date', now()->month);
        }

        if($filter == 'this-year'){
            $query->whereYear('date', now()->year);
        }

        $totalDueMoney = $query->sum('due');

        return $totalDueMoney;
    }
}
