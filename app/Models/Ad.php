<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'url',
        'created_by',
        'updated_by',
        'tenant_id',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('latest', function (Builder $builder) {
            $builder->latest();
        });

        static::creating(function ($model) {
            // Set tenant_id automatically (example from helper)
            $model->tenant_id = getTenantId() ?? null;
        });
    }
}
