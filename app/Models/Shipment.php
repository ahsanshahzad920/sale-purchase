<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    use HasFactory , Searchable;
    protected $guarded = ['id'];
    protected $table = 'shipments';

    public $fillable = [
        'reference',
        'sale_id',
        'date',
        'delivered_to',
        'address',
        'details',
        'status'
    ];

    public function sales(){
        return $this->belongsTo(Sale::class,'sale_id');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['status'] = $this->status;
        return $array;
    }


    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('shipments.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }


}
