<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseReturnItem extends Model
{
    use HasFactory;
    protected $table = 'purchase_return_items';

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    // public function purchase_unit(){
    //     return $this->belongsTo(Unit::class,'purchase_unit');
    // }
    public function purchase_units(){
        return $this->belongsTo(Unit::class,'purchase_unit');
    }
    public function purchase_return(){
        return $this->belongsTo(PurchaseReturn::class,'purchase_return_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('purchase_return_items.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
