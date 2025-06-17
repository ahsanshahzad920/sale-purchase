<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerShippingAddress extends Model
{
    use HasFactory;
    protected $table = 'customer_shipping_addresses';

    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'phone_no',
        'address',
        'address_line_2',
        'city',
        'state',
        'state_code',
        'country',
        'country_code',
        'postal_code',
        'is_default',
    ];

    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('customer_shipping_addresses.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
