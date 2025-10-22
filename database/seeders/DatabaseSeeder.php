<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user admin default
        \App\Models\User::create([
            'name' => 'Admin SMP Sahlaniyah',
            'email' => 'Admin@smpsahlaniyah.sch.id',
            'password' => \Illuminate\Support\Facades\Hash::make('AddMi1n_exxxaammple'),
            'email_verified_at' => now(),
        ]);

        // Buat user admin alternatif
        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'AAdministrator@smpsahlaniyah.sch.id',
            'password' => \Illuminate\Support\Facades\Hash::make('aadMi1n_exxxaammple22'),
            'email_verified_at' => now(),
        ]);
    }
}
