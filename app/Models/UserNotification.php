<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserNotification extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'message'];

    protected static function booted(): void
    {
        static::addGlobalScope('latest', function (Builder $builder) {
            $builder->latest();
        });

        // static::addGlobalScope('tenant', function (Builder $builder) {
        //     $builder->where('tenant_id', getTenantId());
        // });
        // static::creating(function ($model) {
        //     $model->tenant_id = getTenantId();
        // });
    }
}
