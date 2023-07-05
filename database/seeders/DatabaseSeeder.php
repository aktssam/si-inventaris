<?php

namespace Database\Seeders;

use App\Models\Conditions;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            WarehouseSeeder::class,
            InventorySeeder::class,
            ConditionSeeder::class,
        ]);
    }
}
