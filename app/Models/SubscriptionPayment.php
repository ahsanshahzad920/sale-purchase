<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'amount',
        'payment_method',
        'payment_status',
        'transaction_id',
        'payment_date',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    
}
