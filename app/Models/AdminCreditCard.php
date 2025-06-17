<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminCreditCard extends Model
{
    use HasFactory;
    protected $table = 'admin_credit_cards';

    protected $fillable = [
        'card_brand',
        'card_last_four',
        'card_exp_month',
        'card_exp_year',
        'user_id',
    ];

    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('admin_credit_cards.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
