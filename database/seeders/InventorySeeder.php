<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::create(['name' => 'Boiler', 'uid' => Str::random(10), 'warehouse_id' => 1]);
        Inventory::create(['name' => 'Mesin Kecil', 'uid' => Str::random(10), 'warehouse_id' => 1]);
        Inventory::create(['name' => 'Mesin Besar', 'uid' => Str::random(10), 'warehouse_id' => 1]);
        Inventory::create(['name' => 'Power Unit', 'uid' => Str::random(10), 'warehouse_id' => 1]);
        Inventory::create(['name' => 'Tabung Turbin', 'uid' => Str::random(10), 'warehouse_id' => 1]);
    }
}
