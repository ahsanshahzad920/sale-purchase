<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleShippingAddress extends Model
{
    use HasFactory;
    protected $table = 'sale_shipping_addresses';
    protected $fillable = [
        'sale_id',
        'name',
        'company_name',
        'email',
        'contact_no',
        'address',
        'appartment',
        'city',
        'country',
        'state',
        'zip_code',
        'notes',
        'status'
    ];


    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('sale_shipping_addresses.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
