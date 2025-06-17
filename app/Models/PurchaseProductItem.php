<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseProductItem extends Model
{
    use HasFactory;

    protected $table = 'purchase_product_items';

    protected $fillable = [
        'item_type',
        'product_id',
        'purchase_id',
        'quantity',
        'price',
        'tax_type',
        'purchase_unit',
        'discount_type',
        'discount',
        'order_tax',
        'sub_total',
        'stock',
    ];


    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function purchase_unit(){
        return $this->belongsTo(Unit::class,'purchase_unit');
    }

    public function purchase_units(){
        return $this->belongsTo(Unit::class,'purchase_unit');
    }

    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('purchase_product_items.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
