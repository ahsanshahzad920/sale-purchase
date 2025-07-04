<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designation extends Model
{
    use HasFactory;
    protected $table = 'designations';

    protected $fillable = [
        'name',
        'department_id',
        'company_id',
        'created_by',
        'updated_by',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    protected static function booted(): void
    {
        static::addGlobalScope('latest', function (Builder $builder) {
            $builder->latest();
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('designations.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
