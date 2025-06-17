<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleInvoice extends Model
{
    use HasFactory;
    protected $table = 'sale_invoices';


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function sale(){
        return $this->belongsTo(Sale::class,'sale_id');
    }

    public function saleInvoicePayment(){
        return $this->hasMany(SalesInvoicePayment::class,'sale_invoice_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('sale_invoices.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }

}
