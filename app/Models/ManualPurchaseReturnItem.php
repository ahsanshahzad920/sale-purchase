<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManualPurchaseReturnItem extends Model
{
    use HasFactory;
    protected $table = 'manual_purchase_return_items';

    public function return_unit()
    {
        return $this->belongsTo(Unit::class, 'return_unit');
    }
    public function return_units()
    {
        return $this->belongsTo(Unit::class, 'return_unit');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected static function booted(): void
    {
        static::addGlobalScope('latest', function (Builder $builder) {
            $builder->latest();
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('manual_purchase_return_items.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }

    
}
