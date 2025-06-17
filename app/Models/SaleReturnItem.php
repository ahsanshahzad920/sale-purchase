<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReturnItem extends Model
{
    use HasFactory;
    protected $table = 'sale_return_items';
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function sale_return(){
        return $this->belongsTo(SaleReturn::class,'sale_return_id');
    }
    public function sale_units(){
        return $this->belongsTo(Unit::class,'sale_unit');
    }

    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('sale_return_items.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
