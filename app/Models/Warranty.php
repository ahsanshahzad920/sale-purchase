<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'warranties';
    protected $fillable = [
        'warranty_name',
        'warranty_type',
        'warranty_period',
        'warranty_description',
    ];

    protected static function booted(): void
    {

        static::addGlobalScope('tenant', function ($builder) {
            $builder->where('warranties.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
