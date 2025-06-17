<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barcode extends Model
{
    use HasFactory, Searchable;

    protected $guarded = ['id'];
    protected $fillable = ['product_id', 'symbology', 'code'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['code'] = $this->code;
        return $array;
    }

    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('barcodes.tenant_id', getTenantId()); // ✅ Fully qualified
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
