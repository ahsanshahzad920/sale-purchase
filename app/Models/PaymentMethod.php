<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $table = 'payment_methods';

    protected $fillable = ['name', 'short_code', 'status', 'note', 'created_by', 'updated_by'];

    protected static function booted(): void
    {
        static::addGlobalScope('latest', function (Builder $builder) {
            $builder->latest();
        });
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('payment_methods.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
