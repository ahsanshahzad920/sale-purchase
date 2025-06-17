<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantOption extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'variant_options';
    protected $fillable = [ 'variant_id', 'sub_name', 'code', 'cost', 'price'];
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    protected static function booted(): void
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('variant_options.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
