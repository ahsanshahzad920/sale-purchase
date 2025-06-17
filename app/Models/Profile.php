<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';

    protected $fillable = ['full_name','about','company','job','country','address','phone','email','img'];

    protected static function booted()
    {
        // static::addGlobalScope('tenant', function (Builder $builder) {
        //     $builder->where('tenant_id', getTenantId());
        // });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
