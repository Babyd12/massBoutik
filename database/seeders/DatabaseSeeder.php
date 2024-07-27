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
       
        $arrayRole = ['admin', 'customer'];
        foreach ($arrayRole as $role) {
            Role::factory()->create([
                'name' => $role,
            ]);
        }
        User::factory(1)->create();
        $arrayPack = [
            '12' => 'Douzaine',
            '10' => 'Dixaine',
            '6' => 'Demi Douzaine',
            '5' => 'Demain Dixaine',
            '24' => 'Deux Douzaine',
        ];
        foreach ($arrayPack as $key => $pack) {
            UnitPerPack::factory()->create([
                'title' => $pack,
                'number' => $key
            ]);
        }
    }
}
