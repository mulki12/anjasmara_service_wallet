<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\User;
use App\Models\Wallet;
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
        // \App\Models\User::factory(10)->create();

        // Bank::factory(5)->create();
        // Wallet::factory(10)->create();
        User::factory(2)->create();
        
    }
}
