<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannerSection extends Model
{
    use HasFactory;
    protected $table = 'banner_sections';
    protected $fillable = [
        'title',
        'description',
        'image',
        'created_by',
        'updated_by',
        'link',
        'tenant_id',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('latest', function (Builder $builder) {
            $builder->latest();
        });
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('banner_sections.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId() ?? null;
        });
    }
}
