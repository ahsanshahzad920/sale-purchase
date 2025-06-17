<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory, Searchable;
    protected $table = 'sub_categories';
    protected $guarded = ['id'];
    protected $fillable = [
        'category_id',
        'name',
        'code',
        'description',
        'created_by',
        'updated_by',
        'status',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // public function searchableAs()
    // {
    //     return 'sub_categories_index';
    // }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('code', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['name'] = $this->name;
        $array['code'] = $this->code;
        return $array;
    }

    public function getCreatedByAttribute($value)
    {
        return User::find($value)->name ?? 'N/A';
    }

    protected static function booted(): void
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('sub_categories.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}

