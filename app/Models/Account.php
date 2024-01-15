<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['account_name', 'branch_name', 'account_number', 'balance', 'note', 'status'];


    public function scopeSearch($query, $search)
    {
       return $query->where('account_name', 'Like', '%'. $search .'%')
                    ->orWhere('account_number', 'Like', '%'. $search .'%')
                    ->orWhere('branch_name', 'Like', '%'. $search .'%');
    }
}
