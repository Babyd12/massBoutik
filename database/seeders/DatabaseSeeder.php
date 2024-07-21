<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Role;
use App\Models\UnitPerPack;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Role::factory(1)->create();
        User::factory(1)->create();

        //create fortory for unitperpack, for product
        // UnitPerPack::factory(10)->create();
        // Product::factory(10)->create();

      

        
    }
}
