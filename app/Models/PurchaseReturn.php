<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseReturn extends Model
{
    use HasFactory;
    protected $table = 'purchase_returns';

    public function return_items()
    {
        return $this->hasMany(PurchaseReturnItem::class, 'purchase_return_id');
    }
    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }

    protected static function booted(): void
    {
        static::addGlobalScope('latest', function (Builder $builder) {
            $builder->latest();
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('purchase_returns.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
