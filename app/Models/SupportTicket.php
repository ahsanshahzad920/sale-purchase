<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportTicket extends Model
{
    use HasFactory;
    protected $table = 'support_tickets';

    protected $fillable = [
        'customer_id',
        'ticket_id',
        'message',
        'attachment'
    ];

    public function customer(){
        return $this->belongsTo(User::class, 'customer_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('support_tickets.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
