<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'description',
        'plan_id',
        'created_by'
    ];

    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}
