<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'subdomain',
        'user_id',
        'status',
        'plan_id',
        'verification_token',
        'verified_at',
        'trial_end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setSubdomainAttribute($value)
    {
        $baseSubdomain = Str::slug($value);
        $subdomain = $baseSubdomain;
        $counter = 1;

        // Check if subdomain already exists
        while (Tenant::where('subdomain', $subdomain)->where('id', '!=', $this->id ?? null)->exists()) {
            $subdomain = $baseSubdomain . '-' . $counter;
            $counter++;
        }

        $this->attributes['subdomain'] = strtolower($subdomain);
    }

    /**
     * Generate a random unique subdomain if none provided
     */
    public static function generateUniqueSubdomain()
    {
        do {
            $subdomain = Str::random(8);
        } while (Tenant::where('subdomain', $subdomain)->exists());

        return $subdomain;
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    public function vendors()
    {
        return $this->hasMany(Vendor::class);
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }

    public function customDomains()
    {
        return $this->hasMany(CustomDomain::class);
    }


}
