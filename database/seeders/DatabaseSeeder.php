<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin user',
            'email' => 'admin@filamenttenancy.com',
        ]);

        foreach (['foo','bar','baz'] as $tenant_code) {
            $tenant = \App\Models\Tenant::create([ 'id' => $tenant_code]);
            $tenant->domains()->create(['domain' => $tenant->id]);
        }
    }
}
