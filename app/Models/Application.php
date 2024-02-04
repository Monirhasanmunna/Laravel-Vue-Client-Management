<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable= [
        'client_id', 
        'service_id', 
        'account_id',
        'application_no', 
        'police_station', 
        'cost',
        'payment',
        'due',
        'date', 
        'time',
        'status',
        'created_at', 
        'updated_at'
    ];


    public function scopeSearch($query, $search)
    {
       return $query->where('application_no', 'Like', '%'. $search .'%')
                    ->orWhere('police_station', 'Like', '%'. $search .'%')
                    ->orWhere('status', 'Like', '%'. $search .'%');
    }

    public function scopeSearchByDates($query, $dates)
    {
       return $query->whereBetween('date', [$dates['fromDate'], $dates['toDate']]);
    }

    public function scopeSearchByClient($query, $client_id)
    {
        return $query->where('client_id', 'Like', '%'. $client_id . '%');
    }


    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}
