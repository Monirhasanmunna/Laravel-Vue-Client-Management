<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug', 'code', 'description', 'status', 'created_at', 'updated_at'];

    public function scopeSearchByName($query, $searchInput){
        return $query->where('name', 'like', '%' . $searchInput . '%')
                ->orWhere('code', 'like', '%' . $searchInput . '%');
    }
}
