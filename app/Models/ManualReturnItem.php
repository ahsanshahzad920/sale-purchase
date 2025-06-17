<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManualReturnItem extends Model
{
    use HasFactory;
    protected $table = 'manual_return_items';

    public function return_unit(){
        return $this->belongsTo(Unit::class,'return_unit');
    }
    public function return_units(){
        return $this->belongsTo(Unit::class,'return_unit');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('manual_return_items.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }


}
