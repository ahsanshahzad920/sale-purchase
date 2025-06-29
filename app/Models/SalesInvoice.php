<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
    use HasFactory;

    protected $table = 'sales_invoices';
    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function salesInvoiceDetails()
    {
        return $this->hasMany(SalesInvoiceDetail::class, 'sales_invoice_id');
    }

    public function salesInvoicePayments()
    {
        return $this->hasMany(SalesInvoicePayment::class, 'sales_invoice_id');
    }

    public function salesInvoiceCreditNotes()
    {
        return $this->hasMany(SalesInvoiceCreditNotes::class, 'sales_invoice_id');
    }

    public function sales(){
        return $this->belongsTo(Sales::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('tenant', function ($builder) {
            $builder->where('sales_invoices.tenant_id', getTenantId());
        });

        static::creating(function ($model) {
            $model->tenant_id = getTenantId();
        });
    }
}
