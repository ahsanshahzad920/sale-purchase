<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductInventory extends Model
{
    use HasFactory;
    protected $table = 'product_inventories';

    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function inventory(){
        return $this->belongsTo(Inventory::class,'inventory_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('product_inventories.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
