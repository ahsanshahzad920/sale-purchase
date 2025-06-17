<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'review', 'product_id', 'rating','tenant_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    // protected static function booted()
    // {
    //     static::creating(function ($model) {
    //         // Set tenant_id automatically (example from helper)
    //         $model->tenant_id = getTenantId() ?? null;
    //     });
    // }
}
