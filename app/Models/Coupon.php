<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'name',
        'code',
        'discount',
        'quantity',
        'status',
    ];

    /**
     * Get the plan associated with the coupon.
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
