<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Tax extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    protected $table = 'taxes';
    protected $fillable = ['name', 'information', 'created_by', 'updated_by', 'deleted_by'];


    protected static function booted(): void
    {
        static::addGlobalScope('latest', function (Builder $builder) {
            $builder->latest();
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('taxes.tenant_id', getTenantId());
        });
        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
