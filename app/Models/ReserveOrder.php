<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReserveOrder extends Model
{
    use HasFactory;
    protected $table = 'reserve_orders';

    protected $fillable = [
        'customer_id',
        'order_number',
        'date',
        'ship_to',
        'location',
        'total',
        'date',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    protected static function booted(): void
    {
        static::addGlobalScope('latest', function (Builder $builder) {
            $builder->latest();
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('reserve_orders.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
