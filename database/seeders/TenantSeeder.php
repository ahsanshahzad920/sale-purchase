<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::create([
            'name' => 'Admin',
            'subdomain' => 'admin',
            'user_id' => User::where('email','admin@gmail.com')->first()->id,
        ]);
    }
}
