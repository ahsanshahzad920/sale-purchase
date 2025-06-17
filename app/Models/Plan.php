<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        'price',
        'type',
        'link',
        'created_by',
        'status',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }


    public function scopeDisplayOn($query){
        return $query->where('status',1);
    }

    public function features()
    {
        return $this->hasMany(PlanFeature::class);
    }
}
