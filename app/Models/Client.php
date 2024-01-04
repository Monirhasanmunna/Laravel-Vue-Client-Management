<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'gender', 'age', 'address', 'created_at', 'updated_at'];

    public function scopeSearch($query, $search){
        return $query->where('name', 'Like', '%'. $search . '%')
                ->orWhere('phone', 'Like', '%'. $search . '%');
    }
}
