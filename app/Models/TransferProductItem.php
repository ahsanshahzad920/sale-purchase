<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferProductItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'transfer_product_items';


    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function transfer(){
        return $this->belongsTo(Transfer::class,'transfer_id');
    }


    protected static function booted(): void
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('transfer_product_items.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }

}
