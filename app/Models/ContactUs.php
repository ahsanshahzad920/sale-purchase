<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'subject',
        'message',
        'tenant_id',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->tenant_id = getTenantId() ?? null;
        });
    }

}
