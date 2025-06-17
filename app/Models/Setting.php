<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Setting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'linkedin',
        'fb',
        'twitch',
        'twitter',
        'currency',
        'email',
        'logo',
        'company_name',
        'company_phone',
        'developed_by',
        'footer',
        'default_lang',
        'default_customer',
        'default_warehouse',
        'sms_gateway',
        'time_zone',
        'address',
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'smtp_encryption',
        'smtp_address',
        'smtp_from_name',
        'pos_note',
        'show_phone',
        'show_address',
        'show_email',
        'show_customer',
        'show_warehouse',
        'show_tax_discount',
        'show_barcode',
        'show_note_to_customer',
        'show_invoice',
        'stripe_key',
        'stripe_secret',
        'delete_stripe_key',
        'shopify_enable',
        'created_by',
        'updated_by',
        'deleted_by',
        // 'shop_domain',
        // 'access_token',
        'terms_and_conditions',
        'privacy_policy',
        'return_policy',
        'exchange_policy',
        'fedex_api_key',
        'fedex_secret_key',
        'fedex_account_number',
        'fedex_meter_number',
        'fedex_api_url',
        'paypal_client_id',
        'paypal_client_secret',
        'paypal_app_id',
        'show_pricing',
        'tenant_id',

    ];

    // protected static function booted()
    // {
    //     static::creating(function ($model) {
    //         $model->tenant_id = getTenantId() ?? null;
    //     });
    // }

    protected static function booted()
    {
        static::creating(function ($model) {
            // Safely get tenant ID without throwing exceptions
            $model->tenant_id = self::resolveTenantId();
        });
    }

    /**
     * Safely resolve the current tenant ID
     */
    protected static function resolveTenantId()
    {
        try {
            // Check if the service is bound in the container
            if (app()->bound('currentTenant')) {
                $tenant = app('currentTenant');
                return $tenant?->id ?? null;
            }
            return null;
        } catch (\Exception $e) {
            // Log the error if needed
            // logger()->debug('Tenant resolution failed: '.$e->getMessage());
            return null;
        }
    }
}
