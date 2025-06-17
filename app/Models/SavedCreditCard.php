<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SavedCreditCard extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'saved_credit_cards';
    protected $fillable = [
        'user_id',
        'card_id',
        'card_brand',
        'card_last_four',
        'card_exp_month',
        'card_exp_year',
        'card_fingerprint',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCardBrandAttribute($value)
    {
        return ucfirst($value);
    }

    protected static function booted(): void
    {
        static::addGlobalScope('latest', function (Builder $builder) {
            $builder->latest();
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('saved_credit_cards.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
