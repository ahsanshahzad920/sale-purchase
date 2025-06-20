<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventories';

    protected $fillable = ['reference', 'warehouse', 'total_products', 'notes', 'created_by', 'updated_by', 'deleted_by'];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function product_inventory()
    {
        return $this->hasMany(ProductInventory::class, 'inventory_id', 'id');
    }

    protected static function booted(): void
    {
        static::addGlobalScope('latest', function (Builder $builder) {
            $builder->latest();
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('inventories.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
