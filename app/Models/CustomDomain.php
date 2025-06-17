<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomDomain extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'name',
        'status',
    ];


    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d ');
        // human readable date
        // return \Carbon\Carbon::parse($value)->diffForHumans();
    }
}
